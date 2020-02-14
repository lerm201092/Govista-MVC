<?php 
    if(basename($_SERVER['SCRIPT_NAME']) == "login.php"){
        if (@$_SESSION['gv_id_user']) {
            if($_SESSION["gv_rol_user"] == 3){
                header('Location:'.SERVER_FOLDER."apps/rol-medico/estadisticas/resumen");    
            }else if($_SESSION["gv_rol_user"] == 4){
                header('Location:'.SERVER_FOLDER."apps/rol-paciente/estadisticas/resumen");
            }else if($_SESSION["gv_rol_user"] == 1){
                header('Location:'.SERVER_FOLDER."apps/rol-administrador/estadisticas/resumen");
            }
            
        }
    }else{
        if (@!$_SESSION['gv_id_user']) {
            header('Location:'.SERVER_FOLDER.'apps/login');
        }
    }

?>