<?php 

    require '../model/modulos/OtrosModel.php';
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

    function resumen(){ 
        $BD = new OtrosModel;
        $resp = array();
        $rol = $_SESSION["gv_rol"]; // 3: Medico / 4: Paciente / 1: Administrador
        switch ($rol) {
            case '1':
                $resp = array(
                    "item1"  => $BD->Cantidad_Registros('empresas'),
                    "item2"  => $BD->Cantidad_Registros('usuarios', [ 'roluser' => '4' ] ),
                    "item3"  => $BD->Cantidad_Registros('usuarios', [ 'roluser' => '4', 'state' => 'AC' ] ),           
                    "item4"  => $BD->Sumar_Campo('history_exercises h', 'h.session'),
                    "item5"  => $BD->Cantidad_Registros('usuarios', [ 'roluser' => '3' ] ),
                    "item6"  => $BD->Cantidad_Registros('usuarios', [ 'roluser' => '3', 'state' => 'AC' ] ),    
                    "item7"  => $BD->Cantidad_Registros('citas'),
                    "item8"  => $BD->Cantidad_Registros('citas', [ 'state' => 'AC' ] )  
                );  
            break;
        }
        return $resp;
    }  
?>