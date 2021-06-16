<?php
    require_once 'functions.php';
    require_once HEADER_TEMPLATE;
    view('produto', $_GET['id']);
?>
    <header style="margin-top: 60px">
        <div class="row">
            <div class="col-sm-6">
                <h2>ID Produto <?php echo $_GET['id'];?></h2>
            </div>
            <div class="col-sm-6 text-right h2">
                <a href="edit.php?id=<?php echo $_GET['id'];?>"  class="btn btn-primary"><i class="fa fa-save"></i> Editar</a>
                <a class="btn btn-danger" href="index.php"><i class="fa fa-refresh"></i> Cancelar</a>
            </div>
        </div>
    </header>
    <hr>

    <dl class="dl-horizontal">
        <dt>Nome do Produto: </dt>
        <dd><?php echo $registro['nome_produto'];?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Quantidade: </dt>
        <dd><?php echo $registro['quantidade'];?></dd>
    </dl>
    <dl class="dl-horizontal">
        <dt>Vezes saída no dia: </dt>
        <dd><?php echo vezesSaida($_GET['id']);?></dd>
    </dl>


<?php
    require_once FOOTER_TEMPLATE;
?>