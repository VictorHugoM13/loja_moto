<?php
    require_once 'config.php';
    require_once DBAPI;
    include_once HEADER_TEMPLATE;
    

    $conn = open_database();
    echo "<h2 style='margin-top: 60px ;'> Gerenciamento de Estoque</h2>";
    echo "<br>";

    if ($conn){
?>
    <div class="row">
        <div class="col-sm-3">
            <a href="<?php echo BASEURL . 'produto/'?>" class="btn btn-success col-sm-12 text-center">
                <i class="fas fa-cart-arrow-down fa-5x"></i><br>
                <p>Produtos</p>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="<?php echo BASEURL . 'fornecedores/'?>" class="btn btn-warning col-sm-12 text-center">
                <i class="fas fa-truck-moving fa-5x"></i>
                <p>Fornecedores</p>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="<?php echo BASEURL . 'entrada/'?>" class="btn btn-info col-sm-12 text-center">
                <i class="fas fa-chart-line fa-5x"></i>
                <p>Entrada de Produtos</p>
            </a>
        </div>
        <div class="col-sm-3">
            <a href="<?php echo BASEURL . 'saida/'?>" class="btn btn-danger col-sm-12 text-center">
                <i class="fas fa-chart-bar fa-5x"></i>
                <p>Saída de Produtos</p>
            </a>
        </div>
    </div>
<?php
    }else {
?>
    <div class="alert alert-danger" role="alert">
        <p><strong>ERRO!</strong> Não foi possível conectar ao banco de dados!</p>
    </div>
<?php
    }


?>
    
<?php

    include_once FOOTER_TEMPLATE;
?>