<?php 
    require '../model/ConectarDB.php';
    require '../model/modulos/EjercicioModel.php';


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


    function paciente_guardar_info($parametros){
        $ejercicio = new EjercicioModel;
        $resp = $ejercicio->paciente_guardar_info($parametros);
        return $resp;
    }


    function play($parametros){
        $id = $parametros["id"];
        $ejercicio = new EjercicioModel;
        $resp = $ejercicio->paciente_play($id);
        return $resp;
    }

    function listar($parametros){
        $ejercicio = new EjercicioModel;
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
            $cant_ejercicios = $ejercicio->paciente_cant();  // Cantidad de pacientes de la empresa
            $cant_ejercicios = isset($cant_ejercicios['AC']) ? $cant_ejercicios['AC'] : 0;
            $cant_max_page   = ceil($cant_ejercicios/$cant_reg_x_page); //cantidad maxima de paginaciones posibles    
            $offset = ($num_page-1) * $cant_reg_x_page;
            $resp["cant_max"]  = $cant_max_page;
            $resp["ejercicios"]   = $ejercicio->paciente_listar($offset); 
        }            
        return $resp;
    }


    function cantEjercicios(){
        $ejercicio = new EjercicioModel;
        $arr = $ejercicio->cantEjercicios();
        return $arr;
    }


?>