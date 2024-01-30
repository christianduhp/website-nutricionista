<?php

include_once(__DIR__ . '/../../config.php');

function getQuestionnairesData()
{
    global $connection;

    $questionnaires = array();

    $sql = "SELECT * FROM questionnaires";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questionnaireId = $row['id'];
            $row['questions'] = getQuestionsByQuestionnaireId($questionnaireId);
            $questionnaires[] = $row;
        }   
    }

    return $questionnaires;
}

function getQuestionsByQuestionnaireId($questionnaireId)
{
    global $connection;

    $questions = array();

    $sql = "SELECT * FROM questionnaire_questions WHERE questionnaire_id = $questionnaireId";
    $result = $connection->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $questions[] = $row;
        }
    }

    return $questions;
}

function addAnswer($questionnaireId, $questionId, $userId, $response)
{
    global $connection;

    try {
        $connection->begin_transaction();

        if (is_array($response)) {
            // If the response is an array (checkbox), combine the options into a string
            $response = implode(', ', $response);
        }

        // Check if the answer already exists for the given question and user
        $existingAnswerQuery = "SELECT answer_id FROM answers WHERE questionnaire_id = ? AND question_id = ? AND user_id = ?";
        $existingAnswerStmt = $connection->prepare($existingAnswerQuery);
        $existingAnswerStmt->bind_param("iii", $questionnaireId, $questionId, $userId);
        $existingAnswerStmt->execute();
        $existingAnswerStmt->store_result();

        if ($existingAnswerStmt->num_rows > 0) {
            // Answer exists, update it
            $existingAnswerStmt->bind_result($answerId);
            $existingAnswerStmt->fetch();

            $updateQuery = "UPDATE answers SET response = ? WHERE answer_id = ?";
            $updateStmt = $connection->prepare($updateQuery);

            if (!$updateStmt) {
                throw new Exception("Prepare failed: (" . $connection->errno . ") " . $connection->error);
            }

            $updateStmt->bind_param("si", $response, $answerId);
            $result = $updateStmt->execute();

            if (!$result) {
                throw new Exception("Execute failed: (" . $updateStmt->errno . ") " . $updateStmt->error);
            }

            $updateStmt->close();
        } else {
            // Answer doesn't exist, insert a new one
            $insertQuery = "INSERT INTO answers (questionnaire_id, question_id, user_id, response) VALUES (?, ?, ?, ?)";
            $insertStmt = $connection->prepare($insertQuery);

            if (!$insertStmt) {
                throw new Exception("Prepare failed: (" . $connection->errno . ") " . $connection->error);
            }

            $insertStmt->bind_param("iiis", $questionnaireId, $questionId, $userId, $response);
            $result = $insertStmt->execute();

            if (!$result) {
                throw new Exception("Execute failed: (" . $insertStmt->errno . ") " . $insertStmt->error);
            }

            $insertStmt->close();
        }

        $existingAnswerStmt->close();
        $connection->commit();

        return true;
    } catch (Exception $e) {
        $connection->rollback();

        return false;
    }
}

function getUserQuestionnaireResponses($questionnaireId, $userId)
{
    global $connection;

    $userResponses = [];

    $selectQuery = "SELECT question_id, response FROM answers WHERE questionnaire_id = ? AND user_id = ?";
    $selectStmt = $connection->prepare($selectQuery);
    $selectStmt->bind_param("ii", $questionnaireId, $userId);
    $selectStmt->execute();
    $selectStmt->bind_result($questionId, $response);

    while ($selectStmt->fetch()) {
        $userResponses[$questionId] = $response;
    }

    $selectStmt->close();

    return $userResponses;
}

function getUserResponses($userId)
{
    global $connection;

    $userResponses = [];

    $selectQuery = "SELECT questionnaire_id, question_id, response FROM answers WHERE user_id = ?";
    $selectStmt = $connection->prepare($selectQuery);
    $selectStmt->bind_param("i", $userId);
    $selectStmt->execute();
    $selectStmt->bind_result($questionnaireId, $questionId, $response);

    while ($selectStmt->fetch()) {
        // Armazena as respostas no formato: [questionId => response]
        $userResponses[$questionId] = $response;
    }

    $selectStmt->close();

    return $userResponses;
}

function getQuestionInfo($questionId)
{
    global $connection;

    $selectQuery = "SELECT questionnaire_id, question FROM questionnaire_questions WHERE id = ?";
    $selectStmt = $connection->prepare($selectQuery);
    $selectStmt->bind_param("i", $questionId);
    $selectStmt->execute();
    $selectStmt->bind_result($questionnaireId, $question);

    $selectStmt->fetch();

    $selectStmt->close();

    return ['questionnaire_id' => $questionnaireId, 'question' => $question];
}

function getQuestionnaireInfo($questionnaireId)
{
    global $connection;

    $selectQuery = "SELECT title FROM questionnaires WHERE id = ?";
    $selectStmt = $connection->prepare($selectQuery);
    $selectStmt->bind_param("i", $questionnaireId);
    $selectStmt->execute();
    $selectStmt->bind_result($title);

    $selectStmt->fetch();

    $selectStmt->close();

    return ['title' => $title];
}

function updateAnswer($questionnaireId, $questionId, $userId, $response)
{
    global $connection;

    try {
        $connection->begin_transaction();

        if (is_array($response)) {
            // If the response is an array (checkbox), combine the options into a string
            $response = implode(', ', $response);
        }

        // Use an UPDATE query instead of INSERT
        $updateQuery = "UPDATE answers SET response = ? WHERE questionnaire_id = ? AND question_id = ? AND user_id = ?";
        $updateStmt = $connection->prepare($updateQuery);

        if (!$updateStmt) {
            throw new Exception("Prepare failed: (" . $connection->errno . ") " . $connection->error);
        }

        $updateStmt->bind_param("siii", $response, $questionnaireId, $questionId, $userId);
        $result = $updateStmt->execute();

        if (!$result) {
            throw new Exception("Execute failed: (" . $updateStmt->errno . ") " . $updateStmt->error);
        }

        $updateStmt->close();
        $connection->commit();

        return true;
    } catch (Exception $e) {
        $connection->rollback();

        return false;
    }
}

