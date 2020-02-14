<?php
    session_start();
    define('SERVER', "http://localhost/");
    define('FOLDER', "");
    define('SERVER_FOLDER', SERVER.FOLDER);
    define('NODE_MODULES', SERVER_FOLDER."node_modules");
    define('SOURCES', SERVER_FOLDER."sources");

    define('DB_HOST', "localhost");
    define('DB_NAME', "amblyopia");
    define('DB_USER', "root");
    define('DB_PASS', "");

    define('CERRAR_SESION', SERVER_FOLDER."apps/logout");


    // Variables de sesion
    if($_SESSION){
        define('ID_USER',       $_SESSION["gv_id_user"]);
        define('NOMBRE_USER',   $_SESSION["gv_nombre_user"]);
        define('USERNAME',      $_SESSION["gv_username"]);
        define('ID_EMPRESA',    $_SESSION["gv_empresa"]);
        define('ROL_USER',      $_SESSION["gv_rol_user"]);
        define('PAGO_USER',     $_SESSION["gv_pago_user"]);
    }

?>