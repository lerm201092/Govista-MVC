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
            echo json_encode($funcion($parametros));
        }else{
            echo json_encode($funcion());
        }       
    } 

    function autenticar($parametros){ 
        $usuario = new UsuarioModel;
        $resp = $usuario->autenticar($parametros);
        return $resp;
    }  

    function listar($parametros){ 
        $usuario = new UsuarioModel;
        $cant_reg_x_page = 15;
        $num_page       = $parametros["pagina"];
        $cant_pacientes = $usuario->admin_cant();
        // return $cant_pacientes;
        $cant_max_page  = ceil($cant_pacientes/$cant_reg_x_page);     
        $offset = ($num_page-1) * $cant_reg_x_page;
        $resp["cant_max"]  = $cant_max_page;
        $resp["usuarios"]   = $usuario->admin_listar($offset);             
        return $resp;
    }  

    function userEmpresa($parametros){ 
        $usuario = new UsuarioModel;
        $resp = $usuario->userEmpresa($parametros);
        return $resp;
    }  

    function ver($parametros){
        $usuario = new UsuarioModel;
        $resp = $usuario->admin_ver($parametros["id"]);
        return $resp;
    }
?>