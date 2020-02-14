<?php 
    require '../model/modulos/PacienteModel.php';
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
        $paciente = new PacienteModel;
        $cant_reg_x_page = 15;
        $num_page       = $parametros["pagina"];
        $estado         = $parametros["estado"];
        $cant_pacientes = $paciente->medico_cant( $estado );
        $cant_max_page  = ceil($cant_pacientes/$cant_reg_x_page);     
        $offset = ($num_page-1) * $cant_reg_x_page;
        $resp["cant_max"]  = $cant_max_page;
        $resp["pacientes"]   = $paciente->medico_listar($offset, $estado);             
        return $resp;
    }  

    function buscar($parametros){ 
        $paciente = new PacienteModel;
        $cant_reg_x_page = 15; //registros por paginas
        $num_page       = $parametros["pagina"];   //numero de la pagina en la URL
        $texto          = $parametros["texto"];   //numero de la pagina en la URL
        $cant_pacientes = $paciente->medico_cant_busqueda($texto);  // Cantidad de pacientes de la empresa
        $cant_max_page  = ceil($cant_pacientes/$cant_reg_x_page);

        $offset = ($num_page - 1) * $cant_reg_x_page;
        $pacientes["cant_max"]   = $cant_max_page;
        $pacientes["pacientes"]  = $paciente->medico_buscar($offset, $texto);
       
        return $pacientes;
    } 

    function ver($parametros){ 
        $paciente = new PacienteModel;
        $id       = $parametros["id"];   //numero de la pagina en la URL
        $paciente  = $paciente->ver($id);
        return $paciente;
    }

    function crear($parametros){ 
        $paciente = new PacienteModel;
        $resp = $paciente->crear($parametros);
        return $resp;
    }

    function pre_crear(){ 
        $paciente = new PacienteModel;
        $resp["eps"] = $paciente->cargar_eps();
        $resp["dpto"] = $paciente->cargar_dpto();
        return $resp;
    }

    function pre_editar($parametros){ 
        $paciente = new PacienteModel;
        $resp["eps"] = $paciente->cargar_eps();
        $resp["dpto"] =  $paciente->cargar_dpto();
        $resp["muni"] = array();
        $resp["contact_muni"] = array();

        $resp["paciente"] = $paciente->pre_editar($parametros["id"]);

        $dpto = $resp["paciente"]["dpto"];
        $contact_dpto = $resp["paciente"]["contact_dpto"];

        if($dpto > 0){
            $resp["muni"] = $paciente->cargar_munic($dpto);
        }
        if($contact_dpto > 0){
            $resp["contact_muni"] = $paciente->cargar_munic($contact_dpto);
        }
        
       
        return $resp;
    }

    function editar($parametros){ 
        $paciente = new PacienteModel;
        $resp = $paciente->editar($parametros);
        return $resp;
    }

    function cargar_munic($parametros){ 
        $paciente = new PacienteModel;
        $resp = $paciente->cargar_munic($parametros["dpto"]);
        return $resp;
    }


?>