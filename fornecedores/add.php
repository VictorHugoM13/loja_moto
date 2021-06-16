<?php

    require_once 'functions.php';
    include_once HEADER_TEMPLATE;

    verificar_fornecedor();

?>
<form action="" method="POST">
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2>Cadastro de Fornecedores</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Cadastrar Fornecedor</button>
                <a class="btn btn-danger" href="index.php"><i class="fa fa-refresh"></i> Cancelar</a>
            </div>
        </div>
    </header>
    <hr>
    <div class="row">
        <div class="form-group col-md-10">
            <label for="">CNPJ</label>
            <input type="text" class="form-control" placeuolder="CNPJ" name="fornecedor[id]" required>
            <label for="">Nome do Fornecedor</label>
            <input type="text" class="form-control" placeuolder="Nome do Fornecedor" name="fornecedor[nome]" required>
            <label for="">Endereço</label>
            <input type="text" class="form-control" placeuolder="Endereco" name="fornecedor[endereco]" required>
            <label for="">Telefone</label>
            <input type="tel" class="form-control" placeuolder="Telefone" name="fornecedor[telefone]" required>
        </div>
               
    </div>       

</form>

<?php
    include_once FOOTER_TEMPLATE;

?>