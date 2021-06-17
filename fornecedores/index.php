<?php
    require_once 'functions.php';    
    include_once HEADER_TEMPLATE;    
    index('fornecedor');
?>
<header style="margin-top: 60px">
    <div class="row">
        <div class="col-sm-6">
            <h2>Fornecedores</h2>
        </div>
        <div class="col-sm-6 text-right h2">
            <a class="btn btn-primary" href="add.php"><i class="fa fa-plus"></i> Cadastrar Fornecedores</a>
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
            <th>CNPJ</th>
            <th>Nome</th>
            <th>Endereço</th>
            <th>Telefone</th>
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
            <th><?php echo $registro['nome'];?></th>
            <th><?php echo $registro['endereco'];?></th>
            <th><?php echo $registro['telefone'];?></th>
            <th class="text-right">
                <a href="edit.php?id=<?php echo $registro['id'];?>" class="btn btn-sm btn-info">Editar</a>
            
            </th>
        </tr>
<?php            
        }
    }else{
?>
        <tr>
            <th colspan="4">Nenhum fornecedor cadastrado!</th>
        </tr>    
    </tbody>
</table>
<?php
    }

    include_once FOOTER_TEMPLATE;
?>