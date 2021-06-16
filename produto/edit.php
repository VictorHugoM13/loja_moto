<?php
    require_once 'functions.php';    
    include_once HEADER_TEMPLATE;
    edit_produto('produto');
?>

<form action="" method="POST">
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2>Atualizar Produto</h2>
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
            <label for="">Nome do Produto</label>
            <input type="text" class="form-control" value="<?php echo $produto['nome_produto'];?>"
            placeholder="Nome do Produto" name="produto[nome_produto]" required>
        </div>

        <div class="form-group col-md-12">
        <label for="">Quantidade</label>
            <input type="number" class="form-control" value="<?php echo $produto['quantidade'];?>"
            placeholder="Quantidade" name="produto[quantidade]" readonly>
        </div>


</form>

<?php
    include_once FOOTER_TEMPLATE;


?>