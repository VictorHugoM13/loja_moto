<?php

    require_once '../config.php';
    require_once DBAPI;

    function fazerCadastro() {
        $link = open_database();
        if (isset($_POST['nome_cadastro']) and !empty($_POST['nome_cadastro'])) {
            $nome = $_POST['nome_cadastro'];
            $email = $_POST['email_cadastro'];
            $senha = $_POST['senha_cadastro'];
            // Fazendo uma validação no campo email, verificar se ja não foi cadastrado
            $verificar_email = "SELECT * FROM funcionario WHERE email = '$email'";
            $exec_email = $link->query($verificar_email);
    
            if(mysqli_num_rows($exec_email) > 0) {
                echo "<script>alert(' Este e-mail ja foi cadastrado, por favor, tente outro!');</script>";
            }
            else {
                $sql = "INSERT INTO funcionario (id, nome, email, senha) VALUES (null, '$nome', '$email', '$senha')";
                $exec = $link->query($sql);
                echo "<script>alert('Conta Cadastrada com sucesso!');</script>";
            }                      
        }

    }

    function fazerLogin() {
        $link = open_database();
        if (!empty($_POST['funcionario']) and isset($_POST['funcionario'])) {
            $funcionario = $_POST['funcionario'];
            $email = $funcionario['email'];
            $senha = $funcionario['senha'];
            
    
            try {
                $sql = "SELECT id, email, senha FROM funcionario WHERE email = '$email' and senha='$senha'";
                $result = mysqli_query($link, $sql);
    
                if (mysqli_num_rows($result) > 0) {
                    $_SESSION['funcionario_id'] = $result->fetch_row()[0];          
                    $_SESSION['login'] = 'login';
                    $_SESSION['email'] = $funcionario['email'];
                    header('Location: ' . BASEURL);
                    exit();
                }
                else {
                    echo "<script>alert('E-mail ou senha inválido!');</script>";
                }
                
            }
            catch (Exception $e) { 
                unset($_SESSION['login']);
                unset($_SESSION['funcionario_id']);
                unset($_SESSION['email']);
            }
        }
        else {
            unset($_SESSION['login']);
            unset($_SESSION['funcionario_id']);
            unset($_SESSION['email']);
        }
    }

?>