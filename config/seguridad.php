<?php 
    if(basename($_SERVER['SCRIPT_NAME']) == "login.php"){
        if (@$_SESSION['gv_iduser']) {
            if($_SESSION["gv_rol"] == 3){
                header('Location:'.SERVER_FOLDER."apps/rol-medico/estadisticas/resumen");    
            }else if($_SESSION["gv_rol"] == 4){
                header('Location:'.SERVER_FOLDER."apps/rol-paciente/estadisticas/resumen");
            }else if($_SESSION["gv_rol"] == 1){
                header('Location:'.SERVER_FOLDER."apps/rol-administrador/estadisticas/resumen");
            }
            
        }
    }else{
        if (@!$_SESSION['gv_iduser']) {
            header('Location:'.SERVER_FOLDER.'apps/login');
        }
    }

?>