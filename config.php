<?php
    if (!isset($_SESSION)) {
        session_start();
    }

    define('DB_NAME', 'loja_moto');
    define('DB_USER', 'root');
    define('DB_PASSWORD', '');
    define('DB_HOST', 'localhost');
    define('DB_PORT', '3307');

    define('ABSPATH', dirname(__FILE__) . '/');

    define('BASEURL','/web/loja_moto/');

    define('DBAPI', ABSPATH . 'inc/database.php');
    define('HEADER_TEMPLATE', ABSPATH . 'inc/header.php' );
    define('FOOTER_TEMPLATE', ABSPATH . 'inc/footer.php' );


?>