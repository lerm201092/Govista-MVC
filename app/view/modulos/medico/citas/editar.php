<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/constantes.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/medico/inicio.php";?>
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
            color:#12b8cd!important; 
        }

        .cl-morado{
            color:#9c27b0; 
        }

        .cl-morado-light{
            color:#a088a4!important; 
        }

        ul#tabs-ver .nav-item .nav-link{
          font-weight:400;
          color: #aba8a8!important;
		}
		
		.card-body p{
			font-size:14px;
        }
        
        textarea{
            border: none!important;
        }
        ul#tabs-ver  .nav-item .active{
            font-weight:600;
            color: #9c27b0!important;
        }

        .datetimepicker {
            padding: 14px!important;
        }

        .is-completed .mat-label {
    font-size: 13px;
    transform: translateY(0);
  }

  select {
      font-size: 14px!important;
  }

  select option{
      font-size: 14px!important;
  }

  .mat-input:focus{
      border-bottom : 2px solid #9c27b0;
  }

  .mat-input{
      font-size: 14px;
  }

</style>

<link href="/apps/node/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<!-- / head -->
<?php include "../../../layouts/medico/body.php";?>
<!-- Contenedor de la pagina -->
<div class="row pl-3 pr-3">

<div class="col-12 card px-0">
            <div class="card-header mx-0">
                <h5 class="mb-0">Editar cita</h5>
            </div>
        <div class="card-body px-4">
			<div class="container">    
                <p id="p-alert-idpac" class="d-none alert alert-danger">Debe seleccionar un paciente para poder registrar la cita.</p>   
                <p id="p-alert-start" class="d-none alert alert-danger">Debe seleccionar la fecha de para poder registrar la cita.</p>   
					<div class="row  px-4"> 
						<div class="col-xl-6">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Paciente</label>
                                <input type="text" required disabled class="mat-input" id="paciente" name="paciente" style="width:80%"/>
                                <input type="hidden" required name="id_patient" />
                                <a style="font-size: 18px; float:right; cursor:pointer; position: relative; top: -5px;" class="" title="Buscar Paciente"><span class="fas fa-lock mr-1"></span></a>
							</div>
						</div>
						<div class="col-xl-6">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Medico</label>
                                <input type="text" disabled value="<?=(NOMBRE_USER)?>" class="mat-input" id="medico" name="" />
							</div>
						</div>
						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Motivo de consulta</label>
                                <textarea disabled required name="title" id="title" cols="54" rows="3" style="rezise:none" class="mat-input"></textarea>
							</div>
						</div>                
						<div class="col-xl-6 pt-4">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Descripción de consulta </label>
                                <textarea disabled required name="body" id="body" cols="54" rows="3" style="rezise:none" class="mat-input"></textarea>
							</div>
                        </div>     
                    </div>

                     <form id="form-citas" action="javascript:void(0)" onsubmit="guardar()">
                        <div class="row">
                            <div class="col-xl-6 pt-4">
                                <div class="mat-div is-completed">
                                    <label for="first-name" class="mat-label mb-0">Fecha/Hora Cita inicial </label>
                                    <div class="form-group mb-0">
                                        <div class="input-group date form_datetime border-0" data-date-format="dd-mm-yyyy HH:ii" data-link-field="dtp_input1">
                                            <input required class="form-control border-0" size="16" type="text" value="" readonly style="background: transparent" name="start">
                                            <div class="input-group-prepend mb-0 p-2">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-remove fas fa-times cl-rojo"></span></span>									
                                            </div>
                                            <div class="input-group-prepend mb-0 p-2">
                                                    <span class="input-group-addon"><span class="glyphicon glyphicon-th far fa-calendar-alt cl-verde"></span></span>									
                                            </div>							
                                        </div>
                                    </div>
                                </div>
                            </div>  

                            <div class="col-xl-6 pt-4">
                                <div class="mat-div is-completed">
                                    <label for="first-name" class="mat-label">Estado</label>
                                    <select required class="mat-input p-1" name="state" id="state">
                                        <?php foreach(CONSTANTES['estado_cita'] as $key=>$value): ?>
                                            <option value="<?=($key)?>"><?=($value)?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div> 
                        </div>
                        <br><br>
                        <div class="row pt-4">
                            <div class="col-12 text-right">
                                <a href="/apps/rol-medico/citas/listado" class="btn bg-rojo text-light "><span class="fas fa-caret-left mr-2"></span>Regresar</a>
                                <button class="btn text-light bg-morado"><i class="fas fa-save mr-2"></i>Guardar</button>                         
                            </div>				
                        </div>	
                        <input type="hidden" name="id" value="<?=($_GET['id'])?>" />
                        <input type="hidden" name="updated_user" value="<?=(USERNAME)?>" />
                        <input type="hidden" name="id_medico" value="<?=($_SESSION["gv_id_medico"])?>" />
                    </div> 
				</form>	
			    
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Información de la cita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Buscar Paciente</label>
                        <input type="text" name="txt_buscar" class="mat-input" style="width:80%" />
                        <a style="font-size: 18px; float:right; cursor:pointer"><span class="fas fa-lock mr-1 cl-azul"></span></a>
                    </div>
                </div>
            </div> 
            <div class="row mt-3">
                <div class="col-12 ">
                    <p class="col-12 text-center bg-light p-2 m-0 cl-morado-light font-weight-bold mt-3 border">Listado de pacientes</p>
                    <table class="col-12 table-bordered" id="tbl_pacientes">                        
                        <thead class="bg-light cl-morado-light border">
                            <th class="pl-2">Nombre Paciente</th>
                            <th class="pl-2">Documento</th>
                            <th class="pl-2">Sel.</th>
                        </thead>
                        <tbody id="tbody_pacientes">
                            <tr><td colspan="3" class="pl-2">No hay registros</td></tr>
                        </tbody>
                    </table>

                    <div class="row mt-4">
                        <ul class="pagination justify-content-end">
                            <li class="page-item disabled" id="li-primero" title="Primero"><a class="page-link" href="javascript:primero()"><i class="fas fa-angle-double-left"></i></a></li>
                            <li class="page-item disabled" id="li-anterior" title="Anterior"><a class="page-link" href="javascript:anterior()"><i class="fas fa-angle-left"></i></a></li>

                            <li class="page-item disabled" id="li-anterior" title="Pagina Actual"><a class="page-link" href="#"><span id="item-act">1</span></a></li>
                            <li class="page-item disabled"><a class="page-link" href="#">/</a></li>
                            <li class="page-item disabled" id="li-anterior" title="Cantidad de paginas"><a class="page-link" href="#"><span id="item-max">1</span></a></li>

                            <li class="page-item disabled" id="li-siguiente" title="Siguiente"><a class="page-link" href="javascript:siguiente()"><i class="fas fa-angle-right"></i></a></li>
                            <li class="page-item disabled" id="li-ultimo" title="Ultimo"><a class="page-link" href="javascript:ultimo()"><i class="fas fa-angle-double-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>          
        </div>
      <div class="modal-footer">
        <div  style="width:100%;">
            <img src="/apps/img/logo200x53.png" alt="logo" style="height:20px;">
            <button type="button" class="btn btn-secondary" style="float:right" data-dismiss="modal">Cerrar</button>
        </div>      
      </div>
    </div>
  </div>
</div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/medico/footer.php";?>
<!-- scripts -->

<script type="text/javascript" src="/apps/node/datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/apps/node/datetimepicker/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script>
  $("#li-citas").addClass("active");
  $(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function(){
    if($(this).val() === "")
      $(this).parent().removeClass("is-completed");
      $(this).parent().removeClass("is-active");
    })

    $('.form_datetime').datetimepicker({
        language: 'es',
        format: 'yyyy/mm/dd HH:ii',
        weekStart: 1,
        todayBtn:  1,
		autoclose: 1,
		todayHighlight: 1,
		startView: 2,
		forceParse: 0,
        showMeridian: 1
    });

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

    var parametros = {
        "id" :  "<?=($_GET['id'])?>"
    }
    var url = '/apps/controller/citas';
    var data = { funcion : 'pre_editar', parametros : parametros };
    var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
    fetch(url, miInit).then(res => res.json()).catch(error =>  {
        console.log(error);
        swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
    }).then(resp => {
        console.log(resp);
        $("#paciente").val("("+resp.tipodoc+")"+" "+resp.numdoc+" - "+resp.name1+(resp.name2 ? ' '+resp.name2+' ' : ' ')+resp.surname1+(resp.surname2 ? ' '+resp.surname2+' ' : ' '));
        $("input[name=start]").val(resp.start.replace('-', '/').replace('-', '/'));
        $("textarea[name=body]").val(resp.body);
        $("textarea[name=title]").val(resp.title);

    });


    function guardar(){
        var parametros = $("#form-citas").serializeArray();
        var start      = $("input[name=start]").val(), start = start.trim();
        if( start != "" ){
            var url = '/apps/controller/citas';
            var data = { funcion: "editar", parametros: parametros };
            var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
            fetch(url, miInit).then(res => res.json()).catch(error =>  {
                console.log(error);
                swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
            }).then(resp => {
                swal('¡Registro guardado satisfactoriamente!', {
                    closeOnClickOutside: false,
                    buttons: false,
                    icon : "success"
                }); 
                setTimeout(() => {
                    location.href = "/apps/rol-medico/citas/listado";
                }, 3000);
            });
        }else{
            $("#p-alert-start").removeClass("d-none");
            location.href = "#p-alert-start";
            setTimeout(() => {
                $("#p-alert-start").addClass('d-none');    
            }, 5000);     
        }
    }

   
</script>
<!-- / scripts -->
<?php include "../../../layouts/medico/fin.php";?>