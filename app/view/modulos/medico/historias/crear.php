<?php include "../../../../../config/config.php"; ?>
<?php require "../../../../../config/constantes.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/medico/inicio.php";?>
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
</style>

<!-- / head -->
<?php include "../../../layouts/medico/body.php";?>
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
                                <input disabled type="text" name="id_paciente" class="mat-input"/>
                            </div>
                        </div> 
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Paciente</label>
                                <input disabled type="text" name="paciente" class="mat-input"/>
                            </div>
                        </div>     
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Edad</label>
                                <input disabled type="text" name="edad" class="mat-input"/>
                            </div>
                        </div>   
                        <div class="col-lg-3 px-1">
                            <div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Fecha de cita</label>
                                <input disabled type="text" name="start" class="mat-input"/>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
            
            <!-- Nav tabs -->
            <ul class="nav nav-tabs" role="tablist" id="tabs-ver"> 
                <li class="nav-item">
                    <a class="nav-link active text-center" data-toggle="tab" href="#tab1-form"><span class="text-tab text-center"><span class="fas fa-home mr-1"></span>Antecendentes<br>Medicos</span></a>
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

            <form id="form-historias" action="javascript:void(0)" onsubmit="guardar()">

                <input type="hidden" name="created_user" value="<?=(USERNAME)?>" />
                <input type="hidden" name="id_appointment" value="<?=($_GET["id"])?>" />
                <input type="hidden" name="id_patient" />
                <input type="hidden" name="id_empresa" value="<?=(ID_EMPRESA)?>" />
                <input type="hidden" name="updated_user" value="<?=(USERNAME)?>" />
                <input type="hidden" name="id_medico" value="<?=($_SESSION["gv_id_medico"])?>" />

                <div class="tab-content p-0" style="border:1px solid #dee2e6; border-top: none">
                    <div class="tab-pane container active p-4" id="tab1-form"> <?php include "./tab-form/div1.php"; ?> </div>
                    <div class="tab-pane container p-4" id="tab2-form">        <?php include "./tab-form/div2.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab3-form">        <?php include "./tab-form/div3.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab4-form">        <?php include "./tab-form/div4.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab5-form">        <?php include "./tab-form/div5.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab6-form">        <?php include "./tab-form/div6.php"; ?></div>
                    <div class="tab-pane container p-4" id="tab7-form">        <?php include "./tab-form/div7.php"; ?></div>
                </div>
                <div class="row pb-4">
                    <div class="col-sm-6 text-left">
                        <a href="{{ route('modulos.pacientes.listado') }}" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a> 
                    </div>
                    <div class="col-sm-6 text-right">
                        <button class="btn bg-morado text-light">Agregar</button>
                    </div>           
                </div>
            </form>
        </div>
    </div>
</div>

<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/medico/footer.php";?>
<!-- scripts -->
<script>
    $("#li-historias").addClass("active");
    var cita = "<?=($_GET["id"])?>";
    precarga(cita);

    $("input[tipo=input_exercise]").click(function(){
        var indice = $(this).val();
        if($(this).is(":checked")){
            $("select[tipo=sel_session][indice="+indice+"]").val('').removeAttr("disabled");
            $("select[tipo=sel_duration][indice="+indice+"]").val('').removeAttr("disabled");
            $("select[tipo=sel_size][indice="+indice+"]").val('').removeAttr("disabled");
        }else{
            $("select[tipo=sel_session][indice="+indice+"]").val('').attr("disabled", "disabled");
            $("select[tipo=sel_duration][indice="+indice+"]").val('').attr("disabled", "disabled");
            $("select[tipo=sel_size][indice="+indice+"]").val('').attr("disabled", "disabled");
        }

    });

    function precarga(cita) {
        cargando();
        var url = '/apps/controller/citas';
        var data = { funcion : "ver", parametros : { "id" : cita } };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            $("input[name=id_patient]").val(resp.id_patient);
            $("input[name=id_paciente]").val(resp.tipodoc+" - "+resp.numdoc);
            $("input[name=paciente]").val(resp.name1+(resp.name2 ? ' '+resp.name2 : '')+' '+resp.surname1+(resp.surname2 ? ' '+resp.surname2 : ''));
            $("input[name=edad]").val(resp.edad > 0 ? resp.edad+ ' años' : '- - -');
            $("input[name=start]").val(resp.start);
            setTimeout(() => {
                swal.close();
            }, 200);
        });
    }

    function cargando(){
        swal('Cargando, espere un momento por favor ... ', {
            closeOnClickOutside: false,
            buttons: false,
            content: {
                element: "img",
                attributes: {
                title: "cargando",
                src: "/apps/img/cargando.gif",
                style: "width:25px; margin-bottom:20px;"
                },
            },
        });
    }

    function guardar(){        
        var sw = 0;
        var parametros = $("#form-historias").serializeArray();
        var ejercicios = [];
        $("input[tipo=input_exercise]:checked").each(function(){
            var indice = $(this).val();
            ejercicios.push({
                "id_exercise" : parseInt(parseInt(indice)+1),
                "session"   : $("select[tipo=sel_session][indice="+indice+"]").val(),
                "duration"  : $("select[tipo=sel_duration][indice="+indice+"]").val(),
                "size"      : $("select[tipo=sel_size][indice="+indice+"]").val(),
                "observation" : "Ejercicio #"+parseInt(parseInt(indice)+1)
            })
        });

        cargando();
        var url    = '/apps/controller/historia';
        var data   = { funcion: "crear", parametros: parametros, ejercicios: ejercicios };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        console.log(parametros);
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            swal("GoVista", "Registro guardado satisfactoriamente!", "success");
            setTimeout(() => {
                location.href = "/apps/rol-medico/historias/listado";
            }, 3000); 
        });
    }
</script>
<!-- / scripts -->
<?php include "../../../layouts/medico/fin.php";?>