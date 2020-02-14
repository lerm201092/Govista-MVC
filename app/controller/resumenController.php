<?php 

    require '../model/modulos/PacienteModel.php';
    require '../model/modulos/CitaModel.php';
    require '../model/modulos/EjercicioModel.php';
    require '../model/modulos/MedicoModel.php';
    require '../model/modulos/EmpresaModel.php';
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

    function resumen_medico(){ 
        $paciente = new PacienteModel;
        $cita     = new CitaModel;
        $ejercicio = new EjercicioModel;
        $medico = new MedicoModel;
        $empresa = new EmpresaModel;
        $rol = $_SESSION["gv_rol_user"]; // 3: Medico / 4: Paciente / 1: Administrador
        if($rol == 3){
            $arr_ejer = $ejercicio->medico_cant();
            $EjerciciosActivos     = isset($arr_ejer['AC'])? $arr_ejer['AC']: 0;
            $EjerciciosIncumplidos = isset($arr_ejer['IN'])? $arr_ejer['IN']: 0;
            $EjerciciosRealizados  = isset($arr_ejer['OK'])? $arr_ejer['OK']: 0;

            $total = $EjerciciosActivos + $EjerciciosIncumplidos + $EjerciciosRealizados;

            $resp = array(
                "totalPacientes"        => $paciente->medico_cant( "ALL"),
                "pacientesActivos"      => $paciente->medico_cant( "AC"),
                "pacientesInactivos"    => $paciente->medico_cant("IN"),
                "citasActivas"          => $cita->medico_cant( 'AC' ),
                "totalEjercicios"       => $total,
                "ejerciciosActivos"     => $EjerciciosActivos,
                "ejerciciosIncumplidos" => $EjerciciosIncumplidos,
                "ejerciciosRealizados"  => $EjerciciosRealizados            
            );   

        }else if( $rol == 4){
            $cita_activa        = $cita->paciente_cant( "AC" );
            $cita_inactiva      = $cita->paciente_cant( "IN" );
            $cita_realizada     = $cita->paciente_cant( "RE" );
            $cita_total         = $cita_activa + $cita_inactiva + $cita_realizada;

            $arr_ejer = $ejercicio->paciente_cant();
            $EjerciciosActivos     = isset($arr_ejer['AC'])? $arr_ejer['AC']: 0;
            $EjerciciosIncumplidos = isset($arr_ejer['IN'])? $arr_ejer['IN']: 0;
            $EjerciciosRealizados  = isset($arr_ejer['OK'])? $arr_ejer['OK']: 0;

            $total = $EjerciciosActivos + $EjerciciosIncumplidos + $EjerciciosRealizados;

            $resp = array(
                "citasActivas"          => $cita_activa,
                "citasRealizadas"       => $cita_realizada,
                "citasInactivas"        => $cita_inactiva,                
                "totalCitas"            => $cita_total,

                "totalEjercicios"       => $total,
                "ejerciciosActivos"     => $EjerciciosActivos,
                "ejerciciosIncumplidos" => $EjerciciosIncumplidos,
                "ejerciciosRealizados"  => $EjerciciosRealizados         
            );  

        }else if( $rol == 1){
            $cita_total        = $cita->admin_cant( "ALL" );
            $cita_activa       = $cita->admin_cant( "AC" );
            $paciente_total    = $paciente->admin_cant( "ALL" );
            $paciente_activo   = $paciente->admin_cant( "AC" );
            $empresa_total     = $empresa->admin_cant("ALL");
            $medico_total    = $medico->admin_cant( "ALL" );
            $medico_activo   = $medico->admin_cant( "AC" );
            $ejercicio_total = $ejercicio->admin_cant();

            $resp = array(
                "citasActivas"          => $cita_activa,
                "pacienteActivos"       => $paciente_activo,
                "totalCitas"            => $cita_total,                
                "totalPacientes"        => $paciente_total,

                "totalMedicos"       => $medico_total,
                "medicoActivos"     => $medico_activo,
                "ejerciciosAsignados" => $ejercicio_total,
                "empresasRegistradas"  => $empresa_total      
            );  

        }
        
        return $resp;
 
            
        // echo json_encode($resp);
    }  
?>