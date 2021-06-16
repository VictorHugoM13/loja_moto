<?php

    require_once '../config.php';
    require_once DBAPI;

    $registros = null;
    $registro = null;

    function index_($table){
        global $registros;
        $registros = find_all_produto($table);
    }

    function find_all_produto($table){
        return find_produto($table);
    }

    function find_produto($table = null, $id = null){
        $link = open_database();
        $found = null;
        try {
            if ($id){
                $sql = "SELECT * FROM $table WHERE id = $id ";
                $exec = $link->query($sql);
                if ($exec->num_rows > 0) {
                    $found = $exec->fetch_assoc();
                }
            }
            else {
                //todos os registros
                $sql = "SELECT * FROM $table";
                $exec = $link->query($sql);
                if ($exec->num_rows > 0 ){
                    $found = $exec->fetch_all(MYSQLI_ASSOC);
                }
            }                        
        }
        catch (Exception $e)
        {
            $found = null;
        }
        return $found;
    }

    function callPcr() {
        $link = open_database();
        try {
            $sql = "CALL prc_controle_status()";
            $exec = $link->query($sql);
        }                                 
        catch (Exception $e) {
            $_SESSION['message'] = 'Não foi possivel realizar a operação.';
            $_SESSION['type'] = 'danger'; 
        }
    }
        

    function add_produto($table) {
        if (!empty($_POST[$table])){
            $registro = $_POST[$table];
            save_produto($table, $registro);
            //header('Location: index.php');
            echo '<script>window.location="/web/loja_moto/produto"</script>';
            exit();
        }
    }

    function save_produto($table, $dados) {
        $link = open_database();
        $colunas = null;
        $valores = null;
        foreach($dados as $key => $value) {
            $colunas .= $key . ",";
            $valores .= "'$value',";
        }
        $colunas  = rtrim($colunas, ",");
        $valores  = rtrim($valores, ",");
        $sql  = "INSERT INTO $table ($colunas) VALUES ($valores)";
        try {
            $link->query($sql);
            $_SESSION['message'] = 'Registro cadastrado com sucesso.';
            $_SESSION['type'] = 'success';
        } 
        
        catch (mysqli_sql_exception $e) {
            $_SESSION['message'] = 'Não foi possivel realizar a operação.';
            $_SESSION['type'] = 'danger';           
        }
    }

    function verificar_produto() {
        $link = open_database();
        if (!empty($_POST['produto']) and isset($_POST['produto'])){
            $produto = $_POST['produto'];
            $verificar_produto = "SELECT * FROM produto WHERE nome_produto = '$produto[nome_produto]'";
            $exec = $link->query($verificar_produto);    
            if(mysqli_num_rows($exec) > 0) {
                $_SESSION['message'] = 'Produto já cadastrado.';
                $_SESSION['type'] = 'danger';
                echo '<script>window.location="/web/loja_moto/produto"</script>';
            }
            else {
                add_produto('produto');
            }
        }
    }


    function edit_produto($table) {
        if (isset($_GET['id'])) {
            if (!empty($_POST['produto']) and isset($_POST['produto'])){
                $produto = $_POST['produto'];
                                
                update($table, $_GET['id'], $produto);
                echo '<script>window.location="/web/loja_moto/produto"</script>';                             
            }
            
            else {
                global $produto;
                $produto = find_produto($table, $_GET['id']);
            }
        }
        else {
            header('Location: index.php');
        }
    }

    function update($table, $id, $dados) {        
            $itens = null;
        foreach ($dados as $coluna => $valor){
            $itens .= "$coluna = '$valor',";
        }
        $itens = rtrim($itens, ",");  

        try {          
            $link = open_database();
            $sql = "UPDATE $table SET $itens WHERE id = $id";
            $link->query($sql);
            $_SESSION['message'] = 'Registro atualizado com sucesso.';
            $_SESSION['type'] = 'success';
        }
        catch (mysqli_sql_exception $e){
            $_SESSION['message'] = 'Não foi possivel realizar a operação. ERRO número:'.$e->getCode();
            $_SESSION['type'] = 'danger'; 
        }        
    }

    function view($table, $id){
        global $registro;
        $registro = find_produto($table, $id);
    }

    function vezesSaida($id) {
        $link = open_database();
        $found = null;
        try {
            $sql = "SELECT fnc_cont_saida($id) as total";
            $exec = $link->query($sql);
            $found = $exec->fetch_assoc();
            $found = $found['total'];
        }                                 
        catch (Exception $e) {
            $_SESSION['message'] = 'Não foi possivel realizar a operação.';
            $_SESSION['type'] = 'danger'; 
        }
        return $found;
    }



?>