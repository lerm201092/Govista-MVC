<?php 

    require '../model/modulos/CitaModel.php';
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

    function listar($parametros){ 
        $cita = new CitaModel;
        $resp = array();
        $cant_reg_x_page = 15; //registros por paginas
        $num_page       = $parametros["pagina"];   //numero de la pagina en la URL
        $rol = $_SESSION["gv_rol_user"]; // 3: Medico / 4: Paciente / 1: Administrador

        if($rol == 3){
            $cant_citas = $cita->medico_cant('AC');  // Cantidad de pacientes de la empresa
            $cant_max_page  = ceil($cant_citas/$cant_reg_x_page); //cantidad maxima de paginaciones posibles    
            $offset = ($num_page-1) * $cant_reg_x_page;
            $resp["cant_max"]  = $cant_max_page;
            $resp["citas"]   = $cita->medico_listar($offset); 
        }else if( $rol == 4 ){
            $cant_citas = $cita->paciente_cant('AC');  // Cantidad de pacientes de la empresa
            $cant_max_page  = ceil($cant_citas/$cant_reg_x_page); //cantidad maxima de paginaciones posibles    
            $offset = ($num_page-1) * $cant_reg_x_page;
            $resp["cant_max"]  = $cant_max_page;
            $resp["citas"]   = $cita->paciente_listar($offset); 
        }


            
        return $resp;
    }  

    function crear($parametros){ 
        $cita = new CitaModel;
        $resp = $cita->crear($parametros);
        return $resp;
    }

    function pre_editar($parametros){ 
        $cita = new CitaModel;
        $id = $parametros["id"];
        $resp = $cita->pre_editar($id);
        return $resp;
    }


    function editar($parametros){
        $cita = new CitaModel;
        $resp = $cita->editar($parametros);
        return $resp;
    }

    function ver($parametros){
        $cita = new CitaModel;
        $resp = $cita->ver($parametros["id"]);
        return $resp;
    }

?>