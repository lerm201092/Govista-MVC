<?php 
    require '../model/ConectarDB.php';
    require '../model/modulos/OtrosModel.php';
    require '../model/modulos/EmpresasModel.php';

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

    function listar($parametros){
        $DB                 = new OtrosModel;
        $num_page           = $parametros["pagina"];
        $offset             = ($num_page-1) * 15;
        $resp["cant_max"]   = ceil( $DB->Cantidad_Registros(null, 'empresas' ) / 15 );     
        $resp["empresas"]   = $DB->Listar_Registros(null, 'empresas', null, $offset);             
        return $resp;
    }  

    function cambiar_estado($parametros){ 
        $EmpresaDB = new EmpresasModel;
        $id     = $parametros["id"];
        $estado = $parametros["estado"];
        $resp = $EmpresaDB->Cambiar_Estado($id, $estado);
        return $resp;
    }    

    function ver($parametros){
        $EmpresaDB  = new EmpresasModel;
        $resp       = $EmpresaDB->Ver($parametros["id"]);
        return      $resp;
    }



    function crear($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Guardar_Registros('empresas', $parametros);
        return $resp;
    }

    function editar($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Editar_Registros('empresas', $parametros);
        return $resp;
    }


    function cargar_dpto(){
        $DB     = new OtrosModel;
        $resp   = $DB->Cargar_Dpto();
        return  $resp;
    }

    function cargar_munic($parametros){ 
        $DB     = new OtrosModel;
        $resp   = $DB->Cargar_Muni($parametros["dpto"]);
        return $resp;
    }
?>