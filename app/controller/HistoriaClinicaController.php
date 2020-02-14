<?php 

    require '../model/modulos/HistoriaClinicaModel.php';
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
            if($funcion == "crear"){
                $ejercicios = $params['ejercicios'];
                echo json_encode($funcion($parametros, $ejercicios));
            }else{
                echo json_encode($funcion($parametros));
            }

        }else{
            echo json_encode($funcion());
        }       
    } 

    function ver($parametros){
        $historia = new HistoriaClinicaModel;
        $id = $parametros["id"];
        $resp["h"] = $historia->ver_histories($id);
        $resp["h_aa"] = $historia->ver_histories_aa($id);
        $resp["h_e"] = $historia->ver_history_exercises($id);
        return $resp;
    }

    function crear($parametros, $ejercicios){
        $historia = new HistoriaClinicaModel;
        $resp = $historia->crear($parametros, $ejercicios);
        return $resp;
    }

    function listar($parametros){ 
        $historia = new HistoriaClinicaModel;
        $resp = array();
        $cant_reg_x_page = 15; //registros por paginas
        $num_page       = $parametros["pagina"];   //numero de la pagina en la URL
        $cant_citas = $historia->cantHistorias();  // Cantidad de pacientes de la empresa
        $cant_max_page  = ceil($cant_citas/$cant_reg_x_page); //cantidad maxima de paginaciones posibles    
        $offset = ($num_page-1) * $cant_reg_x_page;
        $resp["cant_max"]  = $cant_max_page;
        $resp["historias"]   = $historia->listar($offset);             
        return $resp;
    }  

?>