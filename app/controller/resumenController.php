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
                    "item1"  => $BD->Cantidad_Registros(null, 'empresas'),
                    "item2"  => $BD->Cantidad_Registros(null, 'usuarios', [ 'roluser' => '4' ] ),
                    "item3"  => $BD->Cantidad_Registros(null, 'usuarios', [ 'roluser' => '4', 'state' => "'AC'" ] ),           
                    "item4"  => $BD->Sumar_Campo('history_exercises h', 'h.session'),
                    "item5"  => $BD->Cantidad_Registros(null, 'usuarios', [ 'roluser' => '3' ] ),
                    "item6"  => $BD->Cantidad_Registros(null, 'usuarios', [ 'roluser' => '3', 'state' => "'AC'" ] ),    
                    "item7"  => $BD->Cantidad_Registros(null, 'citas'),
                    "item8"  => $BD->Cantidad_Registros(null, 'citas', [ 'state' => "'AC'" ] )  
                );  
            break;
            case '3':
                $cond1 = [ 'state' => "'AC'", 'id_medico' => $_SESSION['gv_iduser'], 'id_empresa' => $_SESSION['gv_idempresa'] ] ;
                $cond2 = [ 'u.roluser' => '4', 'u.id' => 'ue.id_usuario', 'ue.id_empresa' => $_SESSION['gv_idempresa'] ];
                $cond3 = [ 'u.roluser' => '4', 'u.id' => 'ue.id_usuario', 'ue.id_empresa' => $_SESSION['gv_idempresa'], 'u.state' => "'AC'" ];
                $cond4 = [ 'u.roluser' => '4', 'u.id' => 'ue.id_usuario', 'ue.id_empresa' => $_SESSION['gv_idempresa'], 'u.state' => "'IN'" ];
                $cond5 = [ 'c.id_medico' => $_SESSION['gv_iduser'], 'c.id_empresa' => $_SESSION['gv_idempresa'] ];
                $cond6 = [ 'c.id_medico' => $_SESSION['gv_iduser'], 'c.id_empresa' => $_SESSION['gv_idempresa'], 'ce.state' => "'AC'"];
                $cond7 = [ 'c.id_medico' => $_SESSION['gv_iduser'], 'c.id_empresa' => $_SESSION['gv_idempresa'], 'ce.state' => "'IN'"];
                $cond8 = [ 'c.id_medico' => $_SESSION['gv_iduser'], 'c.id_empresa' => $_SESSION['gv_idempresa'], 'ce.state' => "'OK'"];

                $resp = array(
                    "item1"  => $BD->Cantidad_Registros( null, 'citas', $cond1 ),
                    "item2"  => $BD->Cantidad_Registros( 'u.id', 'usuarios u, usuario_empresa ue',  $cond2 ),
                    "item3"  => $BD->Cantidad_Registros( 'u.id', 'usuarios u, usuario_empresa ue',  $cond3 ),        
                    "item4"  => $BD->Cantidad_Registros( 'u.id', 'usuarios u, usuario_empresa ue',  $cond4 ),   
                    "item5"  => $BD->Cantidad_Registros( 'ce.id', 'cita_ejercicio ce left join citas c on c.id = ce.id_cita', $cond5 ),
                    "item6"  => $BD->Cantidad_Registros( 'ce.id', 'cita_ejercicio ce left join citas c on c.id = ce.id_cita', $cond6 ),
                    "item7"  => $BD->Cantidad_Registros( 'ce.id', 'cita_ejercicio ce left join citas c on c.id = ce.id_cita', $cond7 ),
                    "item8"  => $BD->Cantidad_Registros( 'ce.id', 'cita_ejercicio ce left join citas c on c.id = ce.id_cita', $cond8 ),
                );  

            break;
        }
        return $resp;
    }  
?>