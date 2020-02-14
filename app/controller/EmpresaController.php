<?php 
    require '../model/ConectarDB.php';
    require '../model/modulos/EmpresaModel.php';


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

    function cargar_dpto(){
        $empresa = new EmpresaModel;
        $resp = array();
        $resp = $empresa->cargar_dpto();
        return $resp;
    }

    function listar($parametros){ 
        $empresa = new EmpresaModel;
        $cant_reg_x_page = 15;
        $num_page       = $parametros["pagina"];
        $estado         = "ALL";
        $cant_pacientes = $empresa->admin_cant( $estado );
        $cant_max_page  = ceil($cant_pacientes/$cant_reg_x_page);     
        $offset = ($num_page-1) * $cant_reg_x_page;
        $resp["cant_max"]  = $cant_max_page;
        $resp["empresas"]   = $empresa->admin_listar($offset, $estado);             
        return $resp;
    }  

    function ver($parametros){
        $empresa = new EmpresaModel;
        $resp = $empresa->admin_ver($parametros["id"]);
        return $resp;
    }

    function crear($parametros){ 
        $empresa = new EmpresaModel;
        $resp = $empresa->crear($parametros);
        return $parametros;
    }
    

    function pre_editar($parametros){ 
        $cita = new CitaModel;
        $id = $parametros["id"];
        $resp = $cita->pre_editar($id);
        return $resp;
    }

?>