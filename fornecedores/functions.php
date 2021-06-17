<?php

require_once '../config.php';
    require_once DBAPI;

    $registros = null;
    $registro = null;

    function index($table){
        global $registros;
        $registros = find_all($table);
    }

    function find_all($table){
        return find($table);
    }

    function find($table = null, $id = null){
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

    function add($table) {
        if (!empty($_POST[$table])){
            //$agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
            //$registro['data_entrada'] = $agora->format("Y-m-d"); 
            $registro = $_POST[$table];
            save($table, $registro);
            //header('Location: index.php');
            echo '<script>window.location="/web/loja_moto/fornecedores"</script>';
            exit();
        }
    }

    function save ($table, $dados) {
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

    function verificar_fornecedor() {
        $link = open_database();
        if (!empty($_POST['fornecedor']) and isset($_POST['fornecedor'])){
            $fornecedor = $_POST['fornecedor'];
            $verificar_fornecedor = "SELECT * FROM fornecedor WHERE id = '$fornecedor[id]' or nome = '$fornecedor[nome]'";
            $exec = $link->query($verificar_fornecedor);    
            if(mysqli_num_rows($exec) > 0) {
                $_SESSION['message'] = 'Fornecedor já cadastrado.';
                $_SESSION['type'] = 'danger';
                echo '<script>window.location="/web/loja_moto/fornecedores"</script>';
            }
            else {
                add('fornecedor');
            }
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

    function edit_fornecedor($table) {
        if (isset($_GET['id'])){
            if (!empty($_POST['fornecedor']) and isset($_POST['fornecedor'])){
                $fornecedor = $_POST['fornecedor'];
                //$agora = date_create('now', new DateTimeZone('America/Sao_Paulo'));
                //$pedido['modificado'] = $agora->format("Y-m-d H:i:s");                
                update($table, $_GET['id'], $fornecedor);
                //header('Location: index.php');
                echo '<script>window.location="/web/loja_moto/fornecedores"</script>';                              
            }
            
            else {
                global $fornecedor;
                $fornecedor = find($table, $_GET['id']);
            }
        }
        else {
            //header('Location: index.php');
            echo '<script>window.location="'. BASEURL. '"</script>';   
        }
    }


?>