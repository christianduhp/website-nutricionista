<?php

include_once(__DIR__ . '/../../modules/authentication/authentication_functions.php');
include_once(__DIR__ . '/../../modules/database/database.php');
include_once(__DIR__ . '/../../modules/database/users_functions.php');
include_once(__DIR__ . '/../../modules/functions/admin_functions.php');


isUserAdmin();
$dbSize = getTotalDatabaseSize();

$profilesDir = '../../uploads/profiles';
$recipesDir = '../../uploads/recipes';

$profilesInfo = countAndSizeImages($profilesDir);
$recipesInfo = countAndSizeImages($recipesDir);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="../../assets/images/icon.png" type="image/x-icon">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap CSS  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.4/font/bootstrap-icons.css">


    <link rel="stylesheet" href="../../assets/css/landingpage.css">
    <link rel="stylesheet" href="../../assets/css/user.css">
    <link rel="stylesheet" href="../../assets/css/admin.css">
    <title>Painel Admin</title>
</head>

<body>

    <header>
        <nav class="navbar d-block d-lg-none position-fixed w-100">
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
                        <a href="admin_dashboard.php"
                            class="gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center active"
                            aria-current="page">
                            <i class="fs-5  fa-solid fa-chart-line"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php linkTo('adminUsers'); ?>"
                            class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
                            <i class="fs-5  fa-solid fa-users"></i> Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php linkTo('adminMeals'); ?>"
                            class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
                            <i class="fs-5  fa-solid fa-utensils"></i> Planos Alimentares
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php linkTo('adminRecipes'); ?>"
                            class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
                            <i class="fs-5 fa-solid fa-bowl-food"></i> Receitas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
                            <i class="fs-5 fas fa-cog"></i> Configurações
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li class="nav-item">
                                <a class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center"
                                    href="<?php linkTo('adminSmtp'); ?>">
                                    <i class="fs-5 fas fa-at"></i> E-mail
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="ajax-link-offcanvas gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center"
                                    href="<?php linkTo('adminLandingPage'); ?>">
                                    <i class="fs-5 fas fa-paint-brush"></i> Landing page
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>
                <div>
                    <?php if (isAdmin($_SESSION['email'])): ?>
                        <a href="<?php echo linkTo('home'); ?>"
                            class="btn fw-semibold btn_sidebar m-1 py-2 px-0 d-flex align-items-center">
                            <i class="fs-5 mx-2 fas fa-user"></i> Usuário
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
                        <a href="admin_dashboard.php"
                            class="gap-3 btn fw-semibold btn_sidebar  m-1 py-2 d-flex align-items-center active"
                            aria-current="page">
                            <i class="fs-5  fa-solid fa-chart-line"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php linkTo('adminUsers'); ?>"
                            class="gap-3 btn fw-semibold btn_sidebar ajax-link m-1 py-2 d-flex align-items-center">
                            <i class="fs-5 fa-solid fa-users"></i> Usuários
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php linkTo('adminMeals'); ?>"
                            class="gap-3 btn fw-semibold btn_sidebar ajax-link m-1 py-2 d-flex align-items-center">
                            <i class="fs-5 fa-solid fa-utensils"></i> Planos Alimentares
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?php linkTo('adminRecipes'); ?>"
                            class="gap-3 btn fw-semibold btn_sidebar ajax-link m-1 py-2 d-flex align-items-center">
                            <i class="fs-5 fa-solid fa-bowl-food"></i> Receitas
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#homeSubmenu" data-bs-toggle="collapse" aria-expanded="false"
                            class="dropdown-toggle gap-3 btn fw-semibold btn_sidebar m-1 py-2 d-flex align-items-center">
                            <i class="fs-5 fas fa-cog"></i> Configurações
                        </a>
                        <ul class="collapse list-unstyled" id="homeSubmenu">
                            <li class="nav-item">
                                <a class="gap-3 btn fw-semibold btn_sidebar ajax-link m-1 py-2 d-flex align-items-center"
                                    href="<?php linkTo('adminSmtp'); ?>">
                                    <i class="fs-5 fas fa-at"></i> E-mail
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="gap-3 btn fw-semibold btn_sidebar ajax-link m-1 py-2 d-flex align-items-center"
                                    href="<?php linkTo('adminLandingPage'); ?>">
                                    <i class="fs-5 fas fa-paint-brush"></i> Landing page
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
                <hr>

                <div class="d-flex flex-column align-items-start mx-1">

                    <?php if (isAdmin($_SESSION['email'])): ?>
                        <a href="<?php echo linkTo('home'); ?>" class="gap-3 btn btn_sidebar text-decoration-none">
                            <i class="fs-5 fas fa-user"></i> Usuário
                        </a>
                    <?php endif; ?>

                    <a href="<?php linkTo('landingpage'); ?>" class="gap-3 btn btn_sidebar text-decoration-none">
                        <i class="fa-solid fa-globe"></i> Website
                    </a>

                    <a href="<?php linkTo('exit'); ?>" class="gap-3 btn btn_sidebar text-decoration-none">
                        <i class="fs-5 fas fa-door-open"></i> Sair
                    </a>
                </div>
            </div>
        </aside>

        <section id="page-content" class="container-fluid main_container align-items-center d-flex flex-column">
            <div class="wrapper d-flex w-100">
                <!-- container -->
                <div class="w-100 p-md-3">

                    <div class="container mt-2 px-md-2">
                        <div class="mt-2 w-100">
                            <div class="card shadow p-4 my-3">
                                <h1>Bem-vindo ao Painel de Administrador</h1>
                                <p class="lead">Selecione uma opção no menu à esquerda para começar.</p>
                            </div>

                            <div class="row flex-column flex-lg-row">
                                <div class="col-lg-4 mb-3 mb-lg-3">
                                    <!-- Gráfico de Banco de Dados -->
                                    <div class="card shadow h-100">
                                        <div class="card-header text-center">
                                            Uso do Banco de Dados
                                        </div>
                                        <div class="card-body">
                                            <canvas id="databaseChart" class="w-100 p-5 p-lg-0"></canvas>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-8 mb-3 mb-lg-3">
                                    <div class="card shadow h-100">
                                        <div class="card-header text-center">
                                            Galeria de Imagens
                                        </div>
                                        <div class="card-body text-center">
                                            <canvas id="imageChart" width="400" height="200"></canvas>

                                            <!-- <small>
                                                No diretório uploads, há um total de
                                                <?php echo $recipesInfo['count'] + $profilesInfo['count']; ?> imagens.
                                                O espaço total ocupado é
                                                <?php echo $recipesInfo['size'] + $profilesInfo['size']; ?> MB.
                                            </small> -->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3 mb-lg-0 h-100">

                                    <div class="card shadow ">
                                        <div class="card-header text-center">
                                            Novos usuários por mês
                                        </div>
                                        <div class="card-body text-center">
                                            <!-- Adicione o conteúdo adicional aqui -->
                                            <canvas id="usersChart" width="400" height="100"></canvas>
                                            <!-- <small>
                                                Há um total de
                                                <?php $users = getAllUsers();
                                                $numberOfUsers = count($users);
                                                echo $numberOfUsers; ?> usuários cadastrados.
                                            </small> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>


    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

    <!-- Bootstrap JS (v5.3.2) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="../../assets/js/charts.js"></script>
    <script src="../../assets/js/dashboard_admin_script.js"></script>

    <script>
        const totalSize = 10000;
        const dbSize = <?php echo $dbSize; ?>;

        DoughnutChart(
            'databaseChart',           // ID do canvas
            totalSize,                 // Tamanho total
            dbSize,                    // Tamanho usado 
            ['Espaço Usado (' + dbSize + ' MB)', 'Espaço livre (' + (totalSize - dbSize) + ' MB)'],  // Rótulos
            ['#ebb250', '#4CAF50'],    // Cores de fundo 
            ['#d09631', '#388E3C'],                  // Cor da borda
            ''                         // Título do gráfico
        );

        var profilesInfo = <?php echo json_encode($profilesInfo); ?>;
        var recipesInfo = <?php echo json_encode($recipesInfo); ?>;

        createBarChart('imageChart', ['Quantidade de imagens'], 'Usuários', [profilesInfo.count], 'rgba(255, 99, 132, 0.4)',
            'Receitas', [recipesInfo.count], 'rgba(54, 162, 235, 0.4)');

        const userStats = <?php echo json_encode(getUsersByMonth()); ?>;
        LineChartByMonths('usersChart', userStats);

    </script>

</body>

</html>