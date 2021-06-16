<?php
    if(!isset($_SESSION['login'])) {
       header('Location: '.BASEURL.'login');
    }   
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Controle de Estoque - Moto-Peças</title>
    <link rel="stylesheet" href="<?php echo BASEURL; ?>css/bootstrap.css">
    <link rel="stylesheet" href="<?php echo BASEURL; ?>fonts/css/fontawesome.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="<?php echo BASEURL; ?>index.php">Moto-Peças</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Produtos
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo BASEURL; ?>produto">Gerenciar Produtos</a>
                        <a class="dropdown-item" href="<?php echo BASEURL; ?>produto/add.php">Cadastrar Produto</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Fornecedores
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo BASEURL; ?>fornecedores">Gerenciar Fornecedores</a>
                        <a class="dropdown-item" href="<?php echo BASEURL; ?>fornecedores/add.php">Cadastrar Fornecedores</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Entradas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo BASEURL; ?>entrada">Controle de Entrada de Produtos</a>
                        <a class="dropdown-item" href="<?php echo BASEURL; ?>entrada/add.php">Realizar Entrada</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Saídas
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="<?php echo BASEURL; ?>saida">Controle de Saida de Produtos</a>
                        <a class="dropdown-item" href="<?php echo BASEURL; ?>saida/add.php">Realizar Saída</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav ml-auto">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?php echo $_SESSION['email'];?>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?php echo BASEURL;?>login">Sair</a>
                            
                        </div>
                    </li>

                </ul>
        </div>
    </div>
</nav>

<div class="container">


