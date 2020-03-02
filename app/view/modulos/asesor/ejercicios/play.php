<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/asesor/inicio.php";?>
<?php
    $name_ejer = ['Agudeza visual', 'Agudeza visual', 'Agudeza visual', 'Agudeza visual', 'Agudeza visual', 
    'Acomodación', 'Movimientos sacádicos', 'Movimientos sacádicos', 'Movimiento de seguimiento', 
    'Memoria Visual', 'Biocular', 'Binocular', '3D'];    
?>
<!-- head -->
<style>

.mat-label {
  display: block;
  font-size: 14px;
  font-weight:450!important;
  transform: translateY(25px);
  color: gray;
  transition: all 0.2s;
}

.mat-input {
  position: relative;
  background: transparent;
  width: 100%;
  border: none;
  outline: none;
  padding: 2px 0;
  font-size: 16px;
  border-bottom: .5px solid #e4e4e4;
}

.mat-div {
  padding: 10px 0 0 0;  
  position: relative;
}

.mat-div:after, .mat-div:before {
  content: "";
  position: absolute;
  display: block;
  width: 100%;
  height: 2px;
  background-color: #e2e2e2; 
  bottom: 0;
  left: 0;
  transition: all 0.2s;
}

.mat-div::after {
  background-color: #8E8DBE;
  transform: scaleX(0);
}

.is-active::after {
  transform: scaleX(1);
}

.is-active .mat-label {
  color: #8E8DBE;
}

.is-completed .mat-label {
  font-size: 13px;
  transform: translateY(0);
}

.bg-verde{
    background:#5eb562; 
}

.bg-amarillo{
    background:#fc9208; 
}

.bg-rojo{
    background:#ec4a47; 
}

.bg-azul{
    background:#12b8cd; 
}

.bg-morado{
            background:#9c27b0; 
		}
		
		.cl-verde{
            color:#5eb562; 
        }

        .cl-amarillo{
            color:#fc9208; 
        }

        .cl-rojo{
            color:#ec4a47; 
        }

        .cl-azul{
            color:#12b8cd; 
        }

        .cl-morado-light{
            color:#a088a4; 
        }

        ul#tabs-ver .nav-item .nav-link{
          font-weight:400;
          color: #aba8a8!important;
		}
		
		.card-body p{
			font-size:14px;
		}
        ul#tabs-ver  .nav-item .active{
  font-weight:600;
  color: #9c27b0!important;
}
</style>
    <link rel="stylesheet" href="/apps/juegos/juegos/exercise-<?=($_GET["id_exercise"])?>/TemplateData/style.css">
    <script src="/apps/juegos/juegos/exercise-<?=($_GET["id_exercise"])?>/TemplateData/UnityProgress.js"></script>
    <script src="/apps/juegos/juegos/exercise-<?=($_GET["id_exercise"])?>/Build/UnityLoader.js"></script>
<script>
    $(document).ready(function(){
        $("#li-ejercicios").addClass("active");
    });
    var gameInstance;
    cargar_juego();
    function cargar_juego(){
        var ruta = "/apps/juegos/juegos/exercise-"+(<?=($_GET["id_exercise"])?>)+"/Build/exercise-"+(<?=($_GET["id_exercise"])?>)+".json";
        gameInstance = UnityLoader.instantiate("gameContainer", ruta);
    }


</script>
<script>


    function SetData() {
        gameInstance.SendMessage('MinigameHUD', 'SetUserName', "<?=($_SESSION['gv_nombre'])?>");
        gameInstance.SendMessage('MinigameHUD', 'SetId',  <?=($_GET['id'])?> );
        gameInstance.SendMessage('MinigameHUD', 'SetIdHis',  <?=($_GET['idhis'])?>);
        gameInstance.SendMessage('MinigameHUD', 'SetDuration', <?=($_GET['duration'])?>);
        gameInstance.SendMessage('MinigameHUD', 'SetSize', <?=($_GET['size'])?> );
        gameInstance.SendMessage('MinigameHUD', 'SetLeft', "");
        gameInstance.SendMessage('MinigameHUD', 'SetRight', "");
        gameInstance.SendMessage('MinigameHUD', 'SetAge', 0);
        gameInstance.SendMessage('MinigameHUD', 'SetStatus', "AC" );
        gameInstance.SendMessage('MinigameHUD', 'SetReturnUrl',"/apps/rol-asesor/ejercicios/listado");//url a la cual volver cuando se termine el juego o el jugador se salga por el menu de pause
        gameInstance.SendMessage('MinigameHUD', 'SetSnellenValues',"-");//en caso de que se quieran sobreescribir los valores de la tabla de snellen, si no dejar asi
        gameInstance.SendMessage('MinigameHUD', 'SetPlayDistance',0);//en caso de que se quiera cambiar la distancia de juego por defecto, actualmente 1m, si no dejar asi
        gameInstance.SendMessage('MinigameHUD', 'SetCoins', 0);//monedas ganadas por el jugador, acciones acertadas
        gameInstance.SendMessage('MinigameHUD', 'SetStars', 0);//estrellas ganadas por el jugador, juegos completados exitosamente
    }

    var isAjaxState = false;
    
    function SaveData(id, id_history, duration, Failure, Progress, status_game, coins, stars){
        // swal("Govista", "Aciertos: "+Progress+", Fallos: "+Failure, "info");
        console.log(id);
    }

    function ForceSave() { 
        // Intento de que al jugador cerrar el navegador primero guarde los datos de juego, no estoy seguro de si esta funcionando correctamten igual es opcional
        if (!isAjaxState) {
        gameInstance.SendMessage('MinigameHUD','ForceSave');
        }
    }

    window.onbeforeunload = function() { 
        // Funciona con el metodo de arriba		    
        if (!isAjaxState) {
        ForceSave();
        }
        return "asd";
    }
    
</script>



 

<!-- / head -->
<?php include "../../../layouts/asesor/body.php";?>
<!-- Contenedor de la pagina -->

<div class="container-fluid">

        <? print_r($_GET); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card p-4">                    
                    <div id="contenedor" class="container">
                        <p style="color :#869099; font-weight:600; font-size: 19px;">Ejercicio #<?=($_GET["id"])?> - Duración <?=($_GET["duration"])?> Min. - <?=($name_ejer[ $_GET["id"] - 1])?></p>
                        <div class="row">
                            <div class="col-12">
                                <div class="panel-body text-canteer">
                                    <div id="gameContainer" style="width:100%; height: auto;"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row pb-4 pl-4">
                            <a href="/apps/rol-asesor/ejercicios/listado" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/asesor/footer.php";?>
<!-- scripts -->

<!-- / scripts -->
<?php include "../../../layouts/asesor/fin.php";?>