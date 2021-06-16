<?php

    require_once 'functions.php'; 
    include_once HEADER_TEMPLATE;   
     
    callPcr();
    index_('produto');
?>
<header style="margin-top: 60px">
    <div class="row">
        <div class="col-sm-6">
            <h2>Produtos</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Cadastrar Produto</a>
            
            <a class="btn btn-danger" href=""><i class="fa fa-refresh"></i> Atualizar</a>
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
            <th>ID</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Status</th>
            <th class="text-right">Opções</th>
        </tr>
    </thead>
    <tbody>

<?php

    if ($registros){
        foreach($registros as $registro){
?>
        <tr>
            <th><?php echo $registro['id'];?></th>
            <th><?php echo $registro['nome_produto'];?></th>
            <th><?php echo $registro['quantidade'];?></th>
            <th><?php echo $registro['status_estoque'];?></th>
            <th class="text-right">
                <a href="edit.php?id=<?php echo $registro['id'];?>" class="btn btn-sm btn-info">Editar</a>
                <a href="view.php?id=<?php echo $registro['id'];?>" class="btn btn-sm btn-success">Visualizar</a>

            
            </th>
        </tr>
<?php            
        }
    }
    else{
?>
        <tr>
            <th colspan="4">Sem registros no Banco de Dados!</th>
        </tr>    
    </tbody>
</table>
<?php
    }

    include_once FOOTER_TEMPLATE;
?>