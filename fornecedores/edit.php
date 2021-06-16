<?php

    // require_once '../produto/functions.php';   
    require_once 'functions.php'; 
    include_once HEADER_TEMPLATE;
    edit_fornecedor('fornecedor');
?>
<form action="" method="POST">
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2>Atualizar Fornecedor</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <button type="submit" class="btn btn-primary" ><i class="fa fa-save"></i> Salvar</button>
                <a class="btn btn-danger" href="index.php"><i class="fa fa-refresh"></i> Cancelar</a>
            </div>
        </div>
    </header>
    <hr>
    <div class="row">
        <div class="form-group col-md-12">
            <label for="">Nome do Fornecedor</label>
            <input type="text" class="form-control" value="<?php echo $fornecedor['nome'];?>"
            placeholder="Nome do Fornecedor" name="fornecedor[nome]" required>
        </div>

        <div class="form-group col-md-12">
            <label for="">Endereço do Fornecedor</label>
            <input type="text" class="form-control" value="<?php echo $fornecedor['endereco'];?>"
            placeholder="Endereço do Fornecedor" name="fornecedor[endereco]" required>
        </div>
        <div class="form-group col-md-12">
            <label for="">Telefone do Fornecedor</label>
            <input type="tel" class="form-control" value="<?php echo $fornecedor['telefone'];?>"
            placeholder="Telefone do Fornecedor" name="fornecedor[telefone]" required>
        </div>
    </div>

</form>

<?php
    include_once FOOTER_TEMPLATE;


?>