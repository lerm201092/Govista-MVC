<?php 

    require '../model/modulos/CitaModel.php';
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

    function listar($parametros){ 
        $cita = new CitaModel;
        $resp = array();
        $cant_reg_x_page = 15; //registros por paginas
        $num_page       = $parametros["pagina"];   //numero de la pagina en la URL
        $rol = $_SESSION["gv_rol"]; // 3: Medico / 4: Paciente / 1: Administrador

        if($rol == 3){
        
            $DB                 = new OtrosModel;
            $num_page           = $parametros["pagina"];
            $estado             = $parametros["estado"];    
            $offset             = ($num_page-1) * 15;

            $campos = "c.start, c.id as cita_id, p.tipodoc, p.numdoc, p.nombre1, p.nombre2, p.apellido1, p.apellido2   ";
            $tabla  = "citas c LEFT JOIN usuarios p ON p.id = c.id_paciente LEFT JOIN usuarios m ON m.id = c.id_medico ";
            $condiciones = ['c.id_empresa' => $_SESSION['gv_idempresa'], 'c.id_medico' => $_SESSION['gv_iduser'], 'c.state' => "'AC'" ];
            $order = "p.nombre1 ASC";

            $cant = $DB->Cantidad_Registros( 'c.id' , $tabla , $condiciones );

            $resp["cant_max"]   = ceil(  $cant / 15    );     

            $resp["citas"]      = $DB->Listar_Registros(      $campos , $tabla , $condiciones , $offset, $order  );      
        
        }else if( $rol == 4 ){
        
            $DB                 = new OtrosModel;
            $num_page           = $parametros["pagina"];
            $estado             = $parametros["estado"];    
            $offset             = ($num_page-1) * 15;
            $resp["cant_max"]   = ceil( $DB->Cantidad_Registros( null, 'citas', ['id_empresa' => $_SESSION['gv_idempresa'], 'id_paciente' => $_SESSION['gv_iduser'] ] ) / 15 );     
            $resp["citas"]      = $DB->Listar_Registros(null,'citas', ['id_empresa' => $_SESSION['gv_idempresa'], 'id_paciente' => $_SESSION['gv_iduser'], 'state' ] , $offset);      
        
        }            
        return $resp;
    }  

    function crear($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Guardar_Registros('citas', $parametros);
        return $resp;
    }

    function ver($parametros){
        $cita = new CitaModel;
        $resp = $cita->ver($parametros["id"]);
        return $resp;
    }

    function editar($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Editar_Registros('citas', $parametros);
        return $resp;
    }

?>