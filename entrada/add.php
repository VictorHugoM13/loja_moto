<?php

    require_once 'functions.php';
    include_once HEADER_TEMPLATE;
    add('fornecedor_produto');
    

?>
<form action="" method="POST">
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2>Entrada de Produto</h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i>  Salvar</button>
                <a class="btn btn-danger" href="index.php"><i class="fa fa-refresh"></i> Cancelar</a>
            </div>
        </div>
    </header>
    <hr>
    <div class="row">
        <div class="form-group col-md-10">
            <label for="">Nome do Produto</label>
            <select class="form-control" name="fornecedor_produto[id_produto]" required>
            <?php
                index_registro('produto');
                if ($registros){
                    foreach($registros as $registro){
            ?>
                <option value="<?php echo $registro['id'];?>"><?php echo $registro['nome_produto']?></option>
            <?php
                }
            }
            ?>
            </select>

            <label for="">Nome do Fornecedor</label>
            <select class="form-control" class="form-control" name="fornecedor_produto[cnpj_fornecedor]" required>
            <?php
                index_registro('fornecedor');
                if ($registros){
                    foreach($registros as $registro){
            ?>
                <option value="<?php echo $registro['id'];?>"><?php echo $registro['nome']?></option>
            <?php
                }
            }
            ?>
            </select>
            <label for="">Quantidade</label>
            <input type="number" class="form-control" placeuolder="Quantidade" name="fornecedor_produto[quantidade_entrada]" required>
            <label for="">Data Entrada</label>
            <input type="date" class="form-control"  name="fornecedor_produto[data_entrada]" value="<?php echo date('Y-m-d');?>" readonly>
        </div>
        
        
    </div>       

</form>

<?php
    include_once FOOTER_TEMPLATE;

?>