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
                $sql = "SELECT * FROM $table order by data_saida desc";
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
            $registro = $_POST[$table];
            save($table, $registro);
            echo '<script>window.location="/web/loja_moto/saida"</script>';
            exit();
        }
    }

    function save($table, $dados) {
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
            $_SESSION['message'] = 'Saída realizada com sucesso.';
            $_SESSION['type'] = 'success';
        } 
        
        catch (mysqli_sql_exception $e) {
            $_SESSION['message'] = 'Não foi possivel realizar a operação.';
            $_SESSION['type'] = 'danger';           
        }
    }

    function verificar_quantidade() {
        $link = open_database();
        if (!empty($_POST['transacoes']) and isset($_POST['transacoes'])){
            $transacoes = $_POST['transacoes'];
            $verificar_quantidade = "SELECT quantidade FROM produto where id = '$transacoes[id_produto]'";
            $exec = $link->query($verificar_quantidade);
            if(($exec->fetch_row()[0]) < $transacoes['quantidade_saida']) {
                $_SESSION['message'] = 'Quantidade Indisponível.';
                $_SESSION['type'] = 'danger';
                echo '<script>window.location="/web/loja_moto/saida"</script>';
            }
            else {
                add('transacoes');
            }
        }
    }

    function index_registro($table){
        global $registros;
        $registros = find_all_registro($table);
    }

    function find_all_registro($table){
        return find_registro($table);
    }

    function find_registro($table = null, $id = null){
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


?>