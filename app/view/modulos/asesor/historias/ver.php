<?php include "../../../../../config/config.php"; ?>
<?php require "../../../../../config/constantes.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/asesor/inicio.php";?>
<!-- head -->
<style>
    #tabs-ver li a.nav-link{
        font-size:13px;

    }
    
.mat-label {
    display: block;
    font-size: 14px;
    font-weight:450!important;
    transform: translateY(25px);
    color: gray;
    transition: all 0.2s;
  }

  select{
      padding-left:5px!important;
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
  
    ul#tabs-ver .nav-item .nav-link{
        font-weight:400;
        color: #aba8a8!important;
    }
    ul#tabs-ver  .nav-item .active{
        font-weight:600;
        color: #9c27b0!important;
    }
  
    .alert-danger {
        color: #a94442!important;
        background-color: #f2dede!important;
        border-color: #ebccd1!important;
    }
    textarea{
            border: none!important;
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
        color:#12b8cd!important; 
    }

    .cl-morado{
        color:#9c27b0; 
    }

    .cl-morado-light{
        color:#a088a4!important; 
    }

    .titulo-row{
        background: #f1f1f1;
        font-size: 14px;
    }

    .mat-input{
        font-size: 14px;
    }

    .li-error{
        font-size:13px;
        font-weight: 450px;
    }

    .error-camp{
        border-bottom: 2px solid red!important;
    }

    .error-camp label{
        color: red!important;
        font-weight: 600!important;
    }

    .mat-div label{
        color:#a088a4!important; 
        font-weight: bolder!important;
        font-style: italic;
    }

    a#li-medico.active{
        background: #9c27b0!important;
    }
</style>

<!-- / head -->
<?php include "../../../layouts/asesor/body.php";?>
<!-- Contenedor de la pagina -->

<div class="row pl-3 pr-3">

    <div class="card col-md-12">
        <div class="card-body">             
            <!-- LENSOMETRIA -->
            <div class="row border m-0 pb-4 mb-4">
                <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold">DATOS DE CREACION DE CONSULTA<span onclick="$('#div_fil_1').toggle(); icono($(this))" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>
                <div id="div_fil_1" style="width:95%; margin:0 auto">
                    <!-- FILA 1 -->
                    <div class="row p-0">   
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">ID Paciente</label>
                            <input disabled type="text" name="id_paciente" class="mat-input" value="(TI) 9201020029"/>
                            </div>
                        </div> 
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Paciente</label>
                            <input disabled type="text" name="paciente" class="mat-input" value="Luis Ramos"/>
                            </div>
                        </div>     
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Edad (Años)</label>
                            <input disabled type="text" name="edad" class="mat-input" value="12"/>
                            </div>
                        </div>   
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                            <label for="first-name" class="mat-label">Fecha de historia clinica</label>
                            <input disabled type="text" name="historydate" class="mat-input" value="2020-01-01 12:43 pm"/>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>




            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tabs-ver"> 
                <li class="nav-item">
                    <a class="nav-link active text-center" data-toggle="tab" href="#tab1-form"><span class="text-tab text-center"></span>Antecendentes<br>Medicos</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab2-form"><span class="text-tab text-center">Anamnesis<br>&nbsp;</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab3-form"><span class="text-tab text-center">Agudeza<br>Visual (AV)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab4-form"><span class="text-tab text-center">Funcional<br>Optometria</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab5-form"><span class="text-tab text-center">Motilidad<br>Ocular</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab6-form"><span class="text-tab text-center">Diagnostico<br>&nbsp;</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-center" data-toggle="tab" href="#tab7-form"><span class="text-tab text-center">Asignar<br>Ejercicios</span></a>
                </li>
            </ul>

            <form action="{{ route('modulos.historiaclinica.insert') }}" method="POST">
                <div class="tab-content p-0" style="border:1px solid #dee2e6; border-top: none">
                    <div class="tab-pane container active p-4" id="tab1-form"> <?php include "./tab-show/div1.php"; ?> </div>
                    <div class="tab-pane container p-4" id="tab2-form">        <?php include "./tab-show/div2.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab3-form">        <?php include "./tab-show/div3.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab4-form">        <?php include "./tab-show/div4.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab5-form">        <?php include "./tab-show/div5.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab6-form">        <?php include "./tab-show/div6.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab7-form">        <?php include "./tab-show/div7.php"; ?></div>
                
                </div>
              
              </div>
              <div class="row pb-4">
                  <div class="col-sm-6 text-left">
                      <a href="/apps/rol-medico/historias/listado" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a> 
                  </div>
                <div class="col-sm-6 text-right">
                <!-- {!! Form::submit( 'Agregar', ['class' => 'btn bg-morado text-light']) !!} 	 -->
                </div>           
              </div>

            </form>

  

    </div>
</div>





<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/asesor/footer.php";?>
<!-- scripts -->
<script>
    $("#li-medico").addClass("active");

    $(document).ready(function(){
        $("input, select, textarea").prop("disabled", "disabled");
    });

</script>
<!-- / scripts -->
<?php include "../../../layouts/asesor/fin.php";?>