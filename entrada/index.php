<?php
    require_once 'functions.php';
       
    include_once HEADER_TEMPLATE;    
    index('vw_entrada');
    
?>
<header style="margin-top: 60px">
    <div class="row">
        <div class="col-sm-6">
            <h2>Controle de Entrada de Produtos</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Entrada de Produtos</a>
            <a class="btn btn-danger" href="index.php"><i class="fa fa-refresh"></i> Atualizar</a>
        </div>
    </div>
</header>

<?php
    if (!empty($_SESSION['message'])) {
?>
    <div class="alert alert-<?php echo $_SESSION['type']; ?> alert-dismissible" role="alert">
    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <?php echo $_SESSION['message']; ?>
 </div>
<?php
    //session_destroy();
    unset($_SESSION['message']);
    
 }
 ?>

<table class="table table-hover">
    <thead>
        <tr>
            <th>Nome do Fornecedor</th>
            <th>Nome do Produto</th>
            <th>Quantidade da Entrada</th>
            <th>Data</th>
            
        </tr>
    </thead>
    <tbody>

<?php

    if ($registros){
        foreach($registros as $registro){
?>
        <tr>
            <th><?php echo $registro['nome_fornecedor'];?></th>
            <th><?php if ( $registro['nome_produto'] == ''){echo 'Produto Apagado';} else{echo  $registro['nome_produto'];};?></th>
            <th><?php echo $registro['quantidade_entrada'];?></th>
            <th><?php echo (new DateTime($registro['data_entrada']))->format('d/m/Y');?></th>
        </tr>
<?php            
        }
    }else{
?>
        <tr>
            <th colspan="4">Nenhum registro encontrado!</th>
        </tr>    
    </tbody>
</table>
<?php
    }

    include_once FOOTER_TEMPLATE;
?>