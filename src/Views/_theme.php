<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $Title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="/public/assets/css/style.css">
    <script src="https://kit.fontawesome.com/da6dd6d344.js" crossorigin="anonymous"></script>
</head>
<body>
<nav>
    <?php
    if ($this->section("sidebar")):
        echo $this->section("sidebar");
    else:
        ?>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
            <div class="container">
                <a class="navbar-brand" href="<?= url(); ?>">
                    <Span>ae.arq</Span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="<?= url(); ?>">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                               data-bs-toggle="dropdown" aria-expanded="false">
                                Projetos
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="<?= url("allprojects"); ?>">Todos os Projetos</a>
                                </li>
                                <li><a class="dropdown-item"
                                       href="<?= url("allprojects/residenciais"); ?>">Residenciais</a></li>
                                <li><a class="dropdown-item" href="<?= url("allprojects/comerciais"); ?>">Comerciais</a>
                                </li>
                                <li><a class="dropdown-item" href="<?= url("allprojects/interiores"); ?>">Interiores</a>
                                </li>
                            </ul>
                        </li>

                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['logged-in']) && $_SESSION['logged-in'] === true) : ?>
                                <button type="button" class="btn btn-light">
                                    <a class="link-black" href="<?= url("logout"); ?>">Sair</a>
                                </button>
                            <?php
                            else : ?>
                                <button type="button" class="btn btn-light">
                                    <a class="link-black" href="<?= url("login"); ?>">Entrar</a>
                                </button>
                            <?php
                            endif; ?>

                        </li>

                    </ul>
                </div>
            </div>
        </nav>
    <?php
    endif; ?>
</nav>

<main class="pt-5 bg-dark">
    <?= $this->section("content"); ?>
</main
>
<footer>
    <?= $Title; ?>
</footer>
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"
        integrity="sha384-zYPOMqeu1DAVkHiLqWBUTcbYfZ8osu1Nd6Z89ify25QV9guujx43ITvfi12/QExE"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.min.js"
        integrity="sha384-Y4oOpwW3duJdCWv5ly8SCFYWqFDsfob/3GkgExXKV4idmbt98QcxXYs9UoXAB7BZ"
        crossorigin="anonymous"></script>
<?= $this->section("scripts"); ?>
</body>
</html>