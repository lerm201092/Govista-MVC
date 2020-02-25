<?php 

    require '../model/modulos/UsuariosModel.php'; 
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

    function usuario_empresa($parametros){ 
        $resp       = array();
        $UsuarioDB  = new UsuariosModel;
        $resp       = $UsuarioDB->Usuario_Empresa( [ 'u.usuario' => $parametros["usuario"], 'ue.state' => 'AC' ] );
        // Retornamos Array de BD
        return      $resp;
    }  

    function autenticar($parametros){ 
        $resp       = array();
        $UsuarioDB  = new UsuariosModel;
        $parametros = ConvertArrray($parametros);        
        $resp       = $UsuarioDB->Autenticar($parametros);
        // Retornamos Array de BD
        return      $resp;
    }  

    function ConvertArrray($entrada){
        $salida = array();
        foreach ($entrada['parametros'] as $item) {
            $salida[$item['name']] = $item['value'];
        }
        return $salida;
    }

    function listar($parametros){
        $DB                 = new OtrosModel;
        $num_page           = $parametros["pagina"];
        $offset             = ($num_page-1) * 15;
        $resp["cant_max"]   = ceil( $DB->Cantidad_Registros( 'usuarios' ) / 15 );     
        $resp["usuarios"]   = $DB->Listar_Registros('usuarios', null, $offset);             
        return $resp;
    }  

    function listar_usuario_empresa($parametros){
        $DB                 = new OtrosModel;
        $UsuarioDB          = new UsuariosModel;
        $num_page           = $parametros["pagina"];
        $offset             = ($num_page-1) * 15;
        $resp["cant_max"]   = ceil( $DB->Cantidad_Registros( 'usuario_empresa' ) / 15 );     
        $resp["usuarios"]   = $UsuarioDB->Usuario_Empresa( null, $offset );             
        return $resp;
    }  

    function ver($parametros){
        $UsuarioDB = new UsuariosModel;       
        $resp = $UsuarioDB->Ver($parametros["id"]);
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
        return $resp;
    }

    function editar($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Editar_Registros('usuarios', $parametros);
        return $resp;
    }

    function validar($parametros){
        $DB          = new OtrosModel;
        $UsuarioDB   = new UsuariosModel; 
        $usuario     = $DB->Listar_Registros('usuarios', [ 'usuario' => $parametros['usuario']  ]); 
        $empresa     = $DB->Listar_Registros('empresas', [ 'nit'     => $parametros['nit']      ]); 
        $resp = array();
        $resp["sw"]  = $UsuarioDB->Validar_Cantidad($parametros);
        if($usuario){ 
            $resp["usuario"] = $usuario[0]["nombre1"]." ".$usuario[0]["nombre2"]." ".$usuario[0]["apellido1"]." ".$usuario[0]["apellido2"]; 
            $resp["id_usuario"] = $usuario[0]["id"];
        }
        if($empresa){ 
            $resp["empresa"] = $empresa[0]["nombre"]; 
            $resp["id_empresa"] = $empresa[0]["id"]; 
        }
        return $resp;
    }

    function crear_usuario_empresa($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Guardar_Registros('usuario_empresa', $parametros);
        return $resp;
    }

    function eliminar_usuario_empresa($parametros){ 
        $DB = new OtrosModel;
        $resp = $DB->Eliminar_Registros('usuario_empresa', $parametros["id"]);
        return $resp;
    }
    
    // function listar($parametros){ 
    //     $usuario = new UsuarioModel;
    //     $cant_reg_x_page = 15;
    //     $num_page       = $parametros["pagina"];
    //     $cant_pacientes = $usuario->admin_cant();
    //     // return $cant_pacientes;
    //     $cant_max_page  = ceil($cant_pacientes/$cant_reg_x_page);     
    //     $offset = ($num_page-1) * $cant_reg_x_page;
    //     $resp["cant_max"]  = $cant_max_page;
    //     $resp["usuarios"]   = $usuario->admin_listar($offset);             
    //     return $resp;
    // }  

    // function usuario_empresa($parametros){ 
    //     $usuartio = new UsuarioModel;
    //     $resp = $usuario->userEmpresa($parametros);
    //     return $resp;
    // }  



    // function cargar_dpto(){
    //     $empresa = new EmpresaModel;
    //     $resp = array();
    //     $resp = $empresa->cargar_dpto();
    //     return $resp;
    // }

    // function cargar_eps(){
    //     $empresa = new EmpresaModel;
    //     $resp = array();
    //     $resp = $empresa->cargar_eps();
    //     return $resp;
    // }

    // function cargar_munic($parametros){ 
    //     $paciente = new PacienteModel;
    //     $resp = $paciente->cargar_munic($parametros["dpto"]);
    //     return $resp;
    // }

    // function crear($parametros){ 
    //     $usuario = new UsuarioModel;
    //     $resp = $usuario->crear($parametros);
    //     return $resp;
    // }

    // function editar($parametros){ 
    //     $usuario = new UsuarioModel;
    //     $resp = $usuario->editar($parametros);
    //     return $resp;
    // }


?>