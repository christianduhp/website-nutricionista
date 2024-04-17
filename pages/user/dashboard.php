<?php
include_once (__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once (__DIR__ . '/../../modules/functions/routes.php');
include_once (__DIR__ . '/../../modules/database/users_functions.php');

isLoggedIn();

// Obtém os dados do usuário
$userData = getUserByEmail($_SESSION['email']);

// Atribui os valores a variáveis
$userId = $userData['id'];
$userProfilePicture = $userData['profile_picture'];
$userName = $userData['name'];

$userFirstName = explode(' ', $userName)[0];
$measurementData = getMeasurementsByUserId($userId);

$measurementData = $measurementData ?? [];
$evaluationDates = [];
$parameterNames = [];
$chartData = [];

if (!empty($measurementData)) {
  $evaluationDates = array_column($measurementData, 'measured_at');
  $parameterNames = array_keys($measurementData[0]);
  $parameterNames = array_diff($parameterNames, ['id', 'user_id', 'measured_at', 'created_at']);

}

foreach ($parameterNames as $parameter) {
  $chartData[$parameter] = array_column($measurementData, $parameter);
}
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="shortcut icon" href="../../assets/images/icon.png" type="image/x-icon">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="../../assets/css/landingpage.css">
  <link rel="stylesheet" href="../../assets/css/user.css">
  <link rel="stylesheet" href="../../assets/css/print.css" type="text/css" media="print">
  <title>Página do Usuário</title>


</head>

<body>

  <header>
    <nav class="navbar d-block d-lg-none position-fixed w-100 z-3">
      <div class="container-fluid align-items-center justify-content-between">
        <a class="navbar-brand align-self-center mx-3" href="#"><img src="../../assets/images/icon.png"
            alt="Logo Daniel Lima Nutricionista" class="" width="50"></a>
        <!-- Botão do offcanvas visível apenas em dispositivos móveis -->
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

      </div>
    </nav>

    <!-- Offcanvas visível apenas em dispositivos móveis -->
    <div class="offcanvas offcanvas-end justify-content-center d-lg-none" tabindex="-1" id="offcanvasNavbar"
      aria-labelledby="offcanvasNavbarLabel">
      <div class="offcanvas-header align-self-end">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
      </div>
      <div class="offcanvas-body ">
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="<?php echo linkTo('dashboard'); ?>"
              class="gap-3 btn fw-semibold btn_sidebar  m-1 py-2 d-flex align-items-center active" aria-current="page">
              <i class="fs-5  fa-solid fa-chart-line"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="profile.php"
              class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
              <i class="fs-5  fa-solid fa-user"></i> Perfil
            </a>
          </li>
          <li class="nav-item">
            <a href="meals.php"
              class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
              <i class="fs-5  fa-solid fa-utensils"></i> Refeições
            </a>
          </li>
          <li class="nav-item">
            <a href="questionnaire.php"
              class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
              <i class="fs-5 fa-solid fa-square-poll-vertical"></i> Questionários
            </a>
          </li>
          <li class="nav-item">
            <a href="recipes.php"
              class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
              <i class="fs-5 fa-solid fa-bowl-food"></i> Receitas
            </a>
          </li>
        </ul>
        <hr>
        <div>
          <?php if (isAdmin($_SESSION['email'])): ?>
            <a href="<?php echo linkTo('admin'); ?>"
              class="btn fw-semibold btn_sidebar m-1 py-2 px-0 d-flex align-items-center">
              <i class="fs-5 mx-2 fas fa-lock"></i> Admin
            </a>
          <?php endif; ?>

          <a href="<?php linkTo('landingpage'); ?>" class="gap-3 btn btn_sidebar text-decoration-none">
            <i class="fa-solid fa-globe"></i> Website
          </a>

          <a href="<?php linkTo('exit'); ?>"
            class="btn fw-semibold btn_sidebar m-1 py-2 px-0 d-flex align-items-center">
            <i class="fs-5 mx-2 fas fa-door-open"></i> Sair
          </a>
        </div>
      </div>
    </div>
  </header>

  <main>
    <!-- Barra lateral visível apenas em desktop -->
    <aside id="sidebar" class="sidebar d-none d-lg-block position-fixed">
      <div class="sidebar_container d-flex flex-column flex-shrink-0 p-2 min-vh-100">
        <a class="navbar-brand align-self-center " href="#"><img src="../../assets/images/icon.png"
            alt="Logo Daniel Lima Nutricionista" class="img-logo"></a>
        <hr>
        <ul class="nav nav-pills flex-column mb-auto">
          <li class="nav-item">
            <a href="<?php echo linkTo('dashboard'); ?>"
              class="gap-3 btn fw-semibold btn_sidebar  m-1 py-2 d-flex align-items-center active" aria-current="page">
              <i class="fs-5  fa-solid fa-chart-line"></i> Dashboard
            </a>
          </li>
          <li class="nav-item">
            <a href="profile.php"
              class="ajax-link gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
              <i class="fs-5  fa-solid fa-user"></i> Perfil
            </a>
          </li>
          <li class="nav-item">
            <a href="meals.php" class="ajax-link gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
              <i class="fs-5  fa-solid fa-utensils"></i> Refeições
            </a>
          </li>
          <li class="nav-item">
            <a href="questionnaire.php"
              class="ajax-link gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
              <i class="fs-5 fa-solid fa-square-poll-vertical"></i> Questionários
            </a>
          </li>
          <li class="nav-item">
            <a href="recipes.php"
              class="ajax-link gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
              <i class="fs-5 fa-solid fa-bowl-food"></i> Receitas
            </a>
          </li>
        </ul>
        <hr>

        <div class="d-flex flex-column align-items-start mx-1">

          <?php if (isAdmin($_SESSION['email'])): ?>
            <a href="<?php echo linkTo('admin'); ?>" class="gap-3 btn btn_sidebar text-decoration-none">
              <i class="fs-5 fas fa-lock"></i> Admin
            </a>
          <?php endif; ?>


          <a href="<?php echo linkTo('landingpage'); ?>" class="gap-3 btn btn_sidebar text-decoration-none">
            <i class="fa-solid fa-globe"></i> Website
          </a>

          <a href="<?php echo linkTo('exit'); ?>" class="gap-3 btn btn_sidebar text-decoration-none">
            <i class="fs-5 fas fa-door-open"></i> Sair
          </a>
        </div>
      </div>
    </aside>


    <section id="page-content" class="container-fluid main_container align-items-center d-flex flex-column vh-100">

      <!-- Foto de perfil e nome -->
      <div class="card name_container w-100 d-flex flex-row align-items-center justify-content-center p-3 mt-3">
        <img src="<?= $userData['profile_picture']; ?>" class="profile_picture rounded-circle mx-3" alt="Foto de Perfil"
          style="width: 50px; height: 50px;">
        <h3 class="name fs-md-2 m-0">Olá,
          <?php echo $userFirstName; ?>!
        </h3>
      </div>


      <div class="container-fluid mt-5">
        <?php if ($measurementData): ?>
          <div class="row">
            <?php
            $parameterMapping = [
              'body_mass' => 'Massa Corporal',
              'body_fat' => 'Massa Gorda',
              'lean_body_mass' => 'Massa Magra',
              'weight' => 'Peso',
              'bmi' => 'IMC',
              'age' => 'Idade Corporal',
              'visceral_fat' => 'Gordura Visceral',
              'basal_metabolism' => 'Metabolismo Basal',
              'waist_hip_ratio' => 'Relação Cintura Quadril',
              'trunk_measurement' => 'Medida do Tronco',
              'toracic_skinfold' => 'Dobra Cutânea - Torácica',
              'triceps_skinfold' => 'Dobra Cutânea - Tríceps',
              'abdominal_skinfold' => 'Dobra Cutânea - Abdominal',
              'thigh_skinfold' => 'Dobra Cutânea - Coxa',
              'axillary_skinfold' => 'Dobra Cutânea - Axilar Média',
              'suprailiac_skinfold' => 'Dobra Cutânea - Supra-ilíaca',
              'subscapular_skinfold' => 'Dobra Cutânea - Subescapular',
              'chest_girth' => 'Medida do Tronco - Torácica',
              'hip_girth' => 'Medida do Tronco - Quadril',
              'waist_girth' => 'Medida do Tronco - Cintura',
              'abdomen_girth' => 'Medida do Tronco - Abdome',
              'left_arm' => 'Membros Sup. - Braço Esquerdo',
              'right_arm' => 'Membros Sup. - Braço Direito',
              'left_forearm' => 'Membros Sup. - Antebraço Esquerdo',
              'right_forearm' => 'Membros Sup. - Antebraço Direito',
              'right_thigh' => 'Membros Inf. - Coxa Direita',
              'left_thigh' => 'Membros Inf. - Coxa Esquerda',
              'right_calf' => 'Membros Inf. - Panturrilha Direita',
              'left_calf' => 'Membros Inf. - Panturrilha Esquerda',
            ];


            foreach ($parameterMapping as $metric => $metricTitle) {
              echo '<div class="col-md-4 mb-4">';
              echo '<div class="card">';
              echo '<div class="card-body">';
              echo '<h5 class="card-title text-center mb-4">' . $metricTitle . '</h5>';
              echo '<canvas id="' . $metric . '_chart" width="300" height="200"></canvas>';
              echo '</div>';
              echo '</div>';
              echo '</div>';
            }
            ?>

            <!-- Tabela com informações -->
            <div class="col-md-12 mb-4 ">
              <div class="card">
                <div class="card-body">
                  <h5 class="card-title text-center">Resumo das Avaliações</h5>
                  <div class="table-responsive ">

                    <table class="table bordered-table">

                      <?php

                      if ($measurementData) {

                        echo '<thead>';
                        echo '<tr>';
                        echo '<th>Parâmetro</th>';

                        // Display evaluation dates in table header
                        foreach ($measurementData as $row) {
                          echo '<th class="text-center">' . $row['measured_at'] . '</th>';
                        }

                        echo '</tr>';
                        echo '</thead>';
                        echo '<tbody>';

                        foreach ($parameterNames as $parameter) {
                          echo '<tr>';
                          echo '<td>' . $parameterMapping[$parameter] . '</td>';

                          // Display parameter values for each evaluation date
                          foreach ($measurementData as $row) {
                            echo '<td class="text-center">' . $row[$parameter] . '</td>';
                          }

                          echo '</tr>';
                        }

                        echo '</tbody>';

                      } else {
                        // No measurement data found for the specified user
                        echo "<span class='text-center'> Nenhum registro encontrado. Faça sua primeira avaliação para visualizar </span>";
                      }
                      ?>
                    </table>

                  </div>
                </div>
              </div>
            </div>
          </div>
        <?php else: ?>
          <div class="card text-center">
            <div class="m-2 card-body">
              <h5 class="card-text">Nenhum registro encontrado. Faça sua primeira avaliação para visualizar.</h5>
              <img src="../../assets/images/no-data.png" class="img-fluid" width="250" alt="Nenhum dado encontrado">
            </div>
          </div>
        <?php endif; ?>
      </div>

    </section>
  </main>


  <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="../../assets/js/charts.js"></script>

  <script src="../../assets/js/sidebar_handler_script.js"></script>

  <script>
    <?php
    $colorPalette = [
      "#FF5733", // Orange
      "#33FF57", // Green
      "#3498DB", // Blue
      "#FF3357", // Red
      "#9B59B6", // Purple
      "#2ECC71", // Light green
      "#F39C12", // Yellow
      "#1ABC9C", // Turquoise
      "#C0392B", // Brown
      "#2980B9", // Light blue
      "#D35400", // Pumpkin
      "#27AE60", // Emerald green
      "#8E44AD", // Dark purple
      "#33FF99", // Medium green
      "#F1C40F", // Light yellow
      "#16A085", // Petroleum green
      "#FF00FF", // Magenta
      "#00FFFF"  // Cyan
    ];
    ?>

    var colorPalette = <?php echo json_encode($colorPalette); ?>;
    // Function to dynamically create charts
    function createCharts() {
      <?php
      if (isset($parameterMapping) && is_array($parameterMapping)) {
        $index = 0;
        foreach ($parameterMapping as $metric => $metricTitle) {
          // Encode data using json_encode to handle special characters
          $metricData = isset($chartData[$metric]) ? json_encode($chartData[$metric]) : '[]';
          $evaluationDatesData = isset($evaluationDates) ? json_encode($evaluationDates) : '[]';

          // Use htmlentities to handle potential issues with strings
          $metricTitle = htmlentities($metricTitle, ENT_QUOTES, 'UTF-8');

          echo "var $metric = LineChart('$metric" . "_chart', $metricData, '$metricTitle', colorPalette[$index], $evaluationDatesData);\n";
          $index = ($index + 1) % count($colorPalette);
        }
      }
      ?>

    }

    // Check if $measurementData is set and not empty
    <?php if (isset($measurementData) && is_array($measurementData) && !empty($measurementData)): ?>
      createCharts();
    <?php endif; ?>

  </script>
</body>

</html>