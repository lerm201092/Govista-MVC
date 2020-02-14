<?php 

    require '../model/modulos/UsuarioModel.php';
    require '../model/ConectarDB.php';

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
    header('Access-Control-Allow-Methods: GET, POST, PUT, DELETE');
    $params = json_decode( file_get_contents( 'php://input' ), true ); 

    // Comprobamos que el valor no venga vacío
    if(isset($params['funcion']) && !empty($params['funcion'])) {
        $funcion = $params['funcion'];
        if(isset($params['parametros']) && !empty($params['parametros'])) {
            $parametros = $params['parametros'];
            $funcion($parametros);
        }else{
            $funcion();
        }       
    } 

    function autenticar($parametros){ 
        $usuario = new UsuarioModel;
        $auth = $usuario->autenticar($parametros);
        $resp = json_encode($auth);
        echo $resp;
    }  

    function userEmpresa($parametros){ 
        $usuario = new UsuarioModel;
        $auth = $usuario->userEmpresa($parametros);
        $resp = json_encode($auth);
        echo $resp;
    }  
?>