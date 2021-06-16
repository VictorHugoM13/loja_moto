<?php
    require_once 'functions.php';  

    del('fornecedor', $_GET['id']);
    header ('Location: index.php');
?>