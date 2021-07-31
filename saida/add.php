<?php

    require_once 'functions.php';
    include_once HEADER_TEMPLATE;
    verificar_quantidade();
    

?>
<form action="" method="POST">
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2>Saída de Produtos</h2>
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
            <select class="form-control" name="transacoes[id_produto]" required>
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
            <label for="">Quantidade</label>
            <input type="number" class="form-control" placeuolder="Quantidade" name="transacoes[quantidade_saida]" required>
            <!--<label for="">ID Funcionário</label>-->
            <!--<label for="">Nome do Funcionário</label>-->
            <input type="hidden" class="form-control" value= "<?php echo $_SESSION['funcionario_id']?>" name="transacoes[id_funcionario]" readonly>
            <label for="">Data de Saída</label>
            <input type="date" class="form-control"  name="transacoes[data_saida]" value="<?php echo date('Y-m-d');?>" readonly>
        </div>
        
        
    </div>       

</form>

<?php
    include_once FOOTER_TEMPLATE;

?>