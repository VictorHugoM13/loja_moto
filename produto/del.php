<?php
    require_once 'functions.php';

    del('produto', $_GET["id"]);
    header('Location: index.php');
?>