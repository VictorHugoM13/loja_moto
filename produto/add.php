<?php

    require_once 'functions.php';
    include_once HEADER_TEMPLATE;
    
    verificar_produto();


?>
<form action="" method="POST">
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2>Cadastro de Produtos</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Cadastrar Produto</button>
                <a class="btn btn-danger" href="index.php"><i class="fa fa-refresh"></i> Cancelar</a>
            </div>
        </div>
    </header>
    <hr>
    <div class="row">
        <div class="form-group col-md-10">
            <label for="">Nome do Produto</label>
            <input type="text" class="form-control" placeuolder="Nome do Produto" name="produto[nome_produto]" required>
        </div>     
        <div class="form-group col-md-10">
            <label for="">Quantidade</label>
            <input type="text" class="form-control" value="0" name="produto[quantidade]" readonly>
        </div>      
    </div>       
</form>

<?php
    include_once FOOTER_TEMPLATE;

?>