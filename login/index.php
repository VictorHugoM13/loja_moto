<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/517e6af943.js" crossorigin="anonymous"></script>
</head>

<?php
 
    require_once 'functions.php'; 
    require_once DBAPI;
    fazerCadastro();
    fazerLogin()
?>

<body>
    <div class="container">
        <div class="content first-content">
            <div class="first-column">
                <h2 class="title title-primary">Bem-vindo</h2>
                <p class="description">Fique conectado</p>
                <p class="description">por favor, faça seu login</p>
                <button id="signin" class="btn btn-primary">Login</button>
            </div>

            <div class="second-column">
                <h2 class="title title-second">Criar Conta</h2>
                <form class="form" method="POST">
                    <label class="label-input" for="">
                        <i class="far fa-user icon-modify"></i>
                        <input type="text" placeholder="Nome" name="nome_cadastro" required>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="E-mail" name="email_cadastro" required>
                    </label>
                    
                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="senha_cadastro" required>
                    </label>

                    <button class="btn btn-second">Cadastrar</button>
                </form>
            </div>
        </div>

        <div class="content second-content">
            <div class="first-column">
                <h2 class="title title-primary">hello, friend!</h2>
                <p class="description">Entre com seus dados pessoais</p>
                <p class="description">e faça seu registro</p>
                <button id="signup" class="btn btn-primary">Cadastrar</button>
            </div>

            <div class="second-column">
                <h2 class="tittle title-second">Faça seu Login</h2>
                <form class="form" method="POST">
                    <label class="label-input" for="">
                        <i class="far fa-envelope icon-modify"></i>
                        <input type="email" placeholder="E-mail" name="funcionario[email]" required>
                    </label>

                    <label class="label-input" for="">
                        <i class="fas fa-lock icon-modify"></i>
                        <input type="password" placeholder="Senha" name="funcionario[senha]" required>
                    </label>        
                    <button class="btn btn-second" name="entrar">Logar</button>
                </form>
            </div>
            
        </div>
    </div>
    <script src="../js/app.js"></script>
</body>
</html>

