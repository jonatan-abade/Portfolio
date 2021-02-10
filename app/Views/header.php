<?php
include './../app/config.php';
include './../app/libraries/Rota.php';
include './../app/libraries/Controller.php';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= APP_NOME ?></title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= URL ?>public/css/style.css">
</head>

<body>
    <header class="bg-dark">
        <div class="container">
            <nav class="navbar navbar-expand-sm navbar-dark">
                <a class="navbar-brand" href="<?= URL ?>">Jonatan Abade</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>" data-tooltip="tooltip" title="Página Inicial">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= URL ?>paginas/sobre" data-tooltip="tooltip" title="Página Inicial">Sobre nós</a>
                        </li>
                    </ul>

                    <span class="navbar-text">
                        <a class="btn btn-info" href="#" data-tooltip="tooltip" title="Não tem uma conta? Cadastre-se">Cadastre-se</a>
                        <a class="btn btn-info" href="#" data-tooltip="tooltip" title="Tem uma conta? Fazer login">Entrar</a>
                    </span>
                </div>

            </nav>
    </header>
    <div class="container">