<?php
include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
require_once(__DIR__ . '/../../modules/database/questionnaire_functions.php');
require_once(__DIR__ . '/../../modules/database/users_functions.php');

isLoggedIn();
$questionnairesData = getQuestionnairesData();

$userData = getUserByEmail($_SESSION['email']);
$selectedQuestionnaires = $userData['selected_questionnaires'];

?>


<section id="questionnaireContent" class="w-100">

    <div class="card name_container w-100 d-flex flex-row align-items-center justify-content-center p-3 mt-3">
        <h3 class="name fs-md-2 m-0">
            Questionários
        </h3>
    </div>

    <div class="row g-4 my-3 justify-content-center" id="questionnaireCardsContainer">
        <?php


        function createQuestionnaireCard($questionnaire, $completionPercentage, $status)
        {

            return '
            <div class="questionnaire-card w-100">
            <div class="card h-100">
        
        
                <div class="card-body d-flex flex-column ">
                    
                  
                        <h5 class="card-title">' . $questionnaire['title'] . '</h5>
                        <p class="card-text my-1 py-1">' . $questionnaire['description'] . '</p>
        
                        <div class="progress my-2">
                            <div class="progress-bar fw-bolder" role="progressbar"
                                style="width: ' . $completionPercentage . '%;" aria-valuenow="' . $completionPercentage . '"
                                aria-valuemin="0" aria-valuemax="100">' .
                $completionPercentage . '%</div>
                        </div>
        
                        <p class="card-text mb-0">Status: ' . $status . '</p>
        
                        <div class="mt-auto d-flex align-self-end">
                            <a href="javascript:void(0);" class="btn btn-primary-2"
                                onclick="loadQuestionnaireAnswers(' . $questionnaire['id'] . ', \'' . $questionnaire['title'] . '\')">
                                Responder
                            </a>
                        </div>
                   
                </div>
            </div>
        </div>';
        }

        function getStatusFromPercentage($completionPercentage)
        {
            if ($completionPercentage == 0) {
                return 'Não Iniciado';
            } elseif ($completionPercentage > 0 && $completionPercentage < 100) {
                return 'Em Progresso';
            } else {
                return 'Concluído';
            }
        }

        foreach ($questionnairesData as $questionnaire) {

            if (in_array($questionnaire['title'], explode(',', $selectedQuestionnaires))) {
                $completionPercentage = getCompletionPercentage($questionnaire['id'], $userData['id']);
                $status = getStatusFromPercentage($completionPercentage);
                echo createQuestionnaireCard($questionnaire, $completionPercentage, $status);
            }
        }

        ?>

    </div>
</section>

<script src="../../assets/js/questionnaires_script.js"></script>