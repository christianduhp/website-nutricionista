<?php
include_once(__DIR__ . '/../../config.php');

$mealsNames = ['Café da Manhã', 'Lanche da Manhã', 'Almoço', 'Lanche da Tarde', 'Jantar'];
$defaultFood = 'Alimento Padrão';
function fetchMealPlans()
{
    global $connection;

    $query = "SELECT * FROM meal_plans ORDER BY plan_name, option, meal_name";
    $result = $connection->query($query);

    $mealPlans = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $mealPlans[$row['plan_name']][$row['option']][$row['meal_name']][] = $row;
    }


    function mealOrder($meal)
    {
        global $mealsNames;
        return array_search($meal, $mealsNames);
    }

    foreach ($mealPlans as $planName => $options) {
        uksort($mealPlans[$planName], 'strnatcasecmp');
        foreach ($options as $optionName => $meals) {
            uksort($meals, function ($a, $b) {
                return mealOrder($a) - mealOrder($b);
            });
            $mealPlans[$planName][$optionName] = $meals;
        }
    }

    return $mealPlans;
}

function getMealPlan($planName)
{
    global $connection;

    $mealPlans = array();

    $sql = "SELECT DISTINCT option FROM meal_plans WHERE plan_name = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bind_param("s", $planName);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $mealPlans[] = $row['option'];
    }

    $fullMealPlans = array();

    foreach ($mealPlans as $plan) {
        $sql = "SELECT * FROM meal_plans WHERE option = '$plan' AND plan_name = '$planName'";
        $result = $connection->query($sql);

        if ($result === false) {
            die("Erro na consulta: " . $connection->error);
        }

        $fullMealPlans[$plan] = array();

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $mealName = $row['meal_name'];
                $foodName = $row['food_name'];

                // Verifica se a refeição já existe no plano
                $mealExists = false;
                foreach ($fullMealPlans[$plan] as &$meal) {
                    if ($meal['meal_name'] === $mealName) {
                        $meal['foods'][] = $foodName;
                        $mealExists = true;
                        break;
                    }
                }

                // Se a refeição não existe, adiciona uma nova
                if (!$mealExists) {
                    $fullMealPlans[$plan][] = array(
                        'meal_name' => $mealName,
                        'foods' => array($foodName),
                    );
                }
            }
        }
    }

    return $fullMealPlans;
}

function removeFood($foodId)
{
    global $connection;

    $deleteQuery = "DELETE FROM meal_plans WHERE id = ?";
    $stmt = mysqli_prepare($connection, $deleteQuery);
    mysqli_stmt_bind_param($stmt, 'i', $foodId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function addFood($planName, $optionName, $mealName, $newFoodName)
{
    global $connection;

    // Verifica se o nome do alimento é vazio
    if (empty($newFoodName)) {
        echo json_encode(['status' => 'error', 'message' => 'O nome do alimento não pode ser vazio.']);
        exit;
    }

    // Verifica se o alimento já existe
    if (foodExists($planName, $optionName, $mealName, $newFoodName)) {
        echo json_encode(['status' => 'error', 'message' => "O alimento '$newFoodName' já existe para esta refeição. Escolha outro nome."]);
        exit;
    }

    $insertQuery = "INSERT INTO meal_plans (plan_name, option, meal_name, food_name) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($connection, $insertQuery);
    mysqli_stmt_bind_param($stmt, 'ssss', $planName, $optionName, $mealName, $newFoodName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    echo json_encode(['status' => 'success']);
    exit;
}

function removeOption($optionName, $planName)
{
    global $connection;

    $deleteOptionQuery = "DELETE FROM meal_plans WHERE `option` = ? AND plan_name = ?";
    $stmt = mysqli_prepare($connection, $deleteOptionQuery);
    mysqli_stmt_bind_param($stmt, 'ss', $optionName, $planName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

function addOption($selectedPlan)
{
    global $connection;
    global $mealsNames;
    global $defaultFood;

    $maxOptionQuery = "SELECT MAX(CAST(SUBSTRING(`option`, 7) AS UNSIGNED)) FROM meal_plans WHERE `option` LIKE 'Opção%' AND `plan_name` = ?";
    $stmt = mysqli_prepare($connection, $maxOptionQuery);
    mysqli_stmt_bind_param($stmt, 's', $selectedPlan);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $maxNumber = intval(mysqli_fetch_row($result)[0]);
    mysqli_stmt_close($stmt);
    $newOption = 'Opção ' . ($maxNumber + 1);

    // Adiciona refeições padrão para a nova opção e plano

    foreach ($mealsNames as $meal) {
        $insertMealQuery = "INSERT INTO meal_plans (`plan_name`, `option`, meal_name, food_name) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $insertMealQuery);
        mysqli_stmt_bind_param($stmt, 'ssss', $selectedPlan, $newOption, $meal, $defaultFood);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }
}

function addPlan($newPlanName)
{
    global $connection;
    global $mealsNames;
    global $defaultFood;

    // Verifica se o nome do plano é vazio
    if (empty($newPlanName)) {
        echo json_encode(['status' => 'error', 'message' => 'O nome do plano não pode ser vazio.']);
        exit;
    }

    // Verifica se o plano já existe
    if (planExists($newPlanName)) {
        echo json_encode(['status' => 'error', 'message' => "O plano com o nome '$newPlanName' já existe. Escolha outro nome."]);
        exit;
    }


    $newOption = 'Opção 1';

    foreach ($mealsNames as $meal) {
        $insertMealQuery = "INSERT INTO meal_plans (`plan_name`, `option`, meal_name, food_name) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($connection, $insertMealQuery);
        mysqli_stmt_bind_param($stmt, 'ssss', $newPlanName, $newOption, $meal, $defaultFood);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    // Envie uma resposta JSON de sucesso
    echo json_encode(['status' => 'success']);
    exit;
}

function planExists($planName)
{
    global $connection;

    $checkPlanQuery = "SELECT COUNT(*) FROM meal_plans WHERE plan_name = ?";
    $stmt = mysqli_prepare($connection, $checkPlanQuery);
    mysqli_stmt_bind_param($stmt, 's', $planName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $planCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $planCount > 0;
}

function foodExists($planName, $optionName, $mealName, $foodName)
{
    global $connection;

    $checkPlanQuery = "SELECT COUNT(*) 
                        FROM meal_plans 
                        WHERE plan_name = ? 
                        AND option = ?
                        AND meal_name = ?
                        AND food_name = ?";


    $stmt = mysqli_prepare($connection, $checkPlanQuery);
    mysqli_stmt_bind_param($stmt, 'ssss', $planName, $optionName, $mealName, $foodName);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_bind_result($stmt, $foodCount);
    mysqli_stmt_fetch($stmt);
    mysqli_stmt_close($stmt);

    return $foodCount > 0;
}


function removePlan($selectedPlan)
{
    global $connection;
    $deletePlanQuery = "DELETE FROM meal_plans WHERE `plan_name` = ?";
    $stmt = mysqli_prepare($connection, $deletePlanQuery);
    mysqli_stmt_bind_param($stmt, 's', $selectedPlan);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}

