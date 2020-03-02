<?php 

require '../model/modulos/UsuariosModel.php'; 
require '../model/modulos/PacienteModel.php'; 
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
        $DB                 = new OtrosModel;
        $num_page           = $parametros["pagina"];
        $estado             = $parametros["estado"];

        $campo = "u.*, concat( m.nomarea, ' - ', d.nomarea ) AS ciudad ";
        $tabla = "usuarios u left join areas m on m.id = u.id_area left join areas d on d.id = m.padre ";
        $condicion = ( $estado == "ALL" ?  [ 'u.roluser' => '4', 'u.id_empresa' => $_SESSION['gv_idempresa']] : [ 'u.roluser' => '4', 'u.state' => "'".$estado."'", 'u.id_empresa' => $_SESSION['gv_idempresa'] ] );

        $offset             = ($num_page-1) * 15;
        $resp["cant_max"]   = ceil( $DB->Cantidad_Registros( $campo, $tabla, $condicion ) / 15 );     
        $resp["pacientes"]  = $DB->Listar_Registros($campo, $tabla, $condicion , $offset);      
        return $resp;
    } 
    
    function buscar($parametros){ 
        $paciente = new PacienteModel;
        $cant_reg_x_page = 15; //registros por paginas
        $num_page       = $parametros["pagina"];   //numero de la pagina en la URL
        $texto          = $parametros["texto"];   //numero de la pagina en la URL

        $cant_pacientes = $paciente->Cantidad_Busqueda( $texto );  // Cantidad de pacientes de la empresa
        // return $cant_pacientes;

        $cant_max_page  = ceil($cant_pacientes/$cant_reg_x_page);

        $offset = ($num_page - 1) * $cant_reg_x_page;
        $pacientes["cant_max"]   = $cant_max_page;
        $pacientes["pacientes"]  = $paciente->medico_buscar($offset, $texto);
       
        return $pacientes;
    } 


    function ver($parametros){
        $UsuarioDB = new UsuariosModel;       
        $resp = $UsuarioDB->Ver($parametros["id"]);
        return $resp;
    }

    function editar($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Editar_Registros('usuarios', $parametros);
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

    function cargar_eps(){ 
        $DB     = new OtrosModel;
        $resp   = $DB->Cargar_Eps();
        return $resp;
    }

    function crear($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Guardar_Registros('usuarios', $parametros);
        if($resp == "OK"){
            $usuario = valor_x_name($parametros, 'usuario');
            $id_usuario = $DB->Valor_Campo('id', 'usuarios', ['usuario' => "'".$usuario."'" ] );   
            $aux[0] = array( 'name' => 'id_usuario', 'value' => $id_usuario  );
            $aux[1] = array( 'name' => 'id_empresa', 'value' => $_SESSION['gv_idempresa']);
            $aux[2] = array( 'name' => 'state'     , 'value' => 'AC');
            $resp = $DB->Guardar_Registros('usuario_empresa', $aux);
        }
        return $resp;
    }

    function valor_x_name($entrada, $campo){
        $salida = null;
        foreach ($entrada as $item) {
            if($item["name"] == $campo ){
                return $item["value"];
            }
        }
        return $salida;
    }
    
    // function listar($parametros){ 
    //     $paciente = new PacienteModel;
    //     $cant_reg_x_page = 15;
    //     $num_page       = $parametros["pagina"];
    //     $estado         = $parametros["estado"];
    //     $cant_pacientes = $paciente->medico_cant( $estado );
    //     $cant_max_page  = ceil($cant_pacientes/$cant_reg_x_page);     
    //     $offset = ($num_page-1) * $cant_reg_x_page;
    //     $resp["cant_max"]  = $cant_max_page;
    //     $resp["pacientes"]   = $paciente->medico_listar($offset, $estado);             
    //     return $resp;
    // }  


    // function ver($parametros){ 
    //     $paciente = new PacienteModel;
    //     $id       = $parametros["id"];   //numero de la pagina en la URL
    //     $paciente  = $paciente->ver($id);
    //     return $paciente;
    // }

    // function crear($parametros){ 
    //     $paciente = new PacienteModel;
    //     $resp = $paciente->crear($parametros);
    //     return $resp;
    // }

    // function pre_crear(){ 
    //     $paciente = new PacienteModel;
    //     $resp["eps"] = $paciente->cargar_eps();
    //     $resp["dpto"] = $paciente->cargar_dpto();
    //     return $resp;
    // }

    // function pre_editar($parametros){ 
    //     $paciente = new PacienteModel;
    //     $resp["eps"] = $paciente->cargar_eps();
    //     $resp["dpto"] =  $paciente->cargar_dpto();
    //     $resp["muni"] = array();
    //     $resp["contact_muni"] = array();

    //     $resp["paciente"] = $paciente->pre_editar($parametros["id"]);

    //     $dpto = $resp["paciente"]["dpto"];
    //     $contact_dpto = $resp["paciente"]["contact_dpto"];

    //     if($dpto > 0){
    //         $resp["muni"] = $paciente->cargar_munic($dpto);
    //     }
    //     if($contact_dpto > 0){
    //         $resp["contact_muni"] = $paciente->cargar_munic($contact_dpto);
    //     }
        
       
    //     return $resp;
    // }

    // function editar($parametros){ 
    //     $paciente = new PacienteModel;
    //     $resp = $paciente->editar($parametros);
    //     return $resp;
    // }

    // function cargar_munic($parametros){ 
    //     $paciente = new PacienteModel;
    //     $resp = $paciente->cargar_munic($parametros["dpto"]);
    //     return $resp;
    // }


?>