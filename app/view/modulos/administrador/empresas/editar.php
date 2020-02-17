<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/constantes.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/administrador/inicio.php";?>
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

  .col-xl-6{
      padding-top: 25px;
  }

</style>

<link href="/apps/node/datetimepicker/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">

<!-- / head -->
<?php include "../../../layouts/administrador/body.php";?>
<!-- Contenedor de la pagina -->
<div class="row pl-3 pr-3">

<div class="col-12 card px-0">
            <div class="card-header mx-0">
                <h5 class="mb-0">Registrar nueva cita</h5>
            </div>
        <div class="card-body px-4">
			<div class="container">    
                <p id="p-alert" class="d-none alert alert-danger">Debe seleccionar un paciente para poder registrar la cita.</p>   
				<form id="form-empresas" action="javascript:void(0)" onsubmit="guardar()">
					<div class="row  px-4"> 
                        <div class="col-xl-6">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">NIT</label>
                                <input type="text" disabled class="mat-input" name="nit" />
							</div>
						</div>
						<div class="col-xl-6">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Nombre de la empresa</label>
                                <input type="text" required class="mat-input" name="nombre" />
							</div>
						</div>
                        <div class="col-xl-6">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Contacto</label>
                                <input type="text" required class="mat-input" name="contacto" />
							</div>
						</div>
                        <div class="col-xl-6">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Email</label>
                                <input type="text" required class="mat-input" name="email" />
							</div>
						</div>
                        <div class="col-xl-6">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Teléfono</label>
                                <input type="text" required class="mat-input" name="telefono" />
							</div>
						</div>
						<div class="col-xl-6">
							<div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Dirección</label>
                                <input type="text" required class="mat-input" name="direccion" />
							</div>
						</div>
                        <div class="col-xl-6">
                            <div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Departamento</label>
                                <select class="mat-input" required name="" id="dpto" onchange="cargar_munic('dpto', 'id_area')">
                                </select>
                            </div>  
                        </div>
                        <div class="col-xl-6">
                            <div class="mat-div is-completed">
                                <label for="first-name" class="mat-label">Ciudad</label>
                                <select class="mat-input" required name="id_area" id="id_area">
                                    <option value='x'>- Escoja una opción -</option>
                                </select>
                            </div>  
                        </div>
                    </div>
                    <input type="hidden" name="estado" value="AC" />
                    <input type="hidden" name="modcoduser" value="<?=(USERNAME)?>" />
                    <input type="hidden" name="id" value="<?=($_GET["id"])?>" />

                    <div class="row pt-4">
						<div class="col-12 text-right">
							<a href="/apps/rol-administrador/empresas/listado" class="btn btn-secondary text-light "><span class="fas fa-caret-left mr-2"></span>Regresar</a>
                            <button class="btn text-light bg-morado"><i class="fas fa-save mr-2"></i>Guardar</button>                         
						</div>				
					</div>	
				</form>	
			</div>     
		</div>
	</div>
</div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/administrador/footer.php";?>
<!-- scripts -->

<script type="text/javascript" src="/apps/node/datetimepicker/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="/apps/node/datetimepicker/js/bootstrap-datetimepicker.es.js" charset="UTF-8"></script>
<script>
  $("#li-empresas").addClass("active");
  cargar_dpto();
  $(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function(){
    if($(this).val() === "")
      $(this).parent().removeClass("is-completed");
      $(this).parent().removeClass("is-active");
    })

    function pre_carga(){
        cargando(); 
        var sw = 0;
        var id_paciente = "<?=($_GET['id'])?>";
        id_paciente = id_paciente.trim();
        var parametros = { "id" : id_paciente };
        
        var url = '/apps/controller/empresa';
        var data = { funcion: "pre_editar", parametros: parametros };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            console.log(resp);
            var campos = Object.keys(resp);
            $("#dpto").val(resp["dpto"]);
            campos.forEach(item => {
                if($("input[name="+item+"]")){
                    $("input[name="+item+"]").val(resp[item]);
                }else{
                    $("select[name="+item+"]").val(resp[item]);
                }
            });
            cargar_munic(resp.id_area);
            setTimeout(() => { swal.close(); });
        });
    }


    function cargar_dpto(){
        var url = '/apps/controller/empresa';
        var data = { funcion : 'cargar_dpto', parametros : { } };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            var html = "<option value=' '>- Escoja una opcion -</option>";
            if(resp){ resp.forEach(function(arr){ html += "<option value='"+arr["name"]+"'>"+arr["value"]+"</option>"; });  }
            pre_carga();
            $("#dpto").html(html);
        });
    }

    function cargar_munic(mun){
        cargando();
        var sw = 0;
        var dpto = $("#dpto").val();
        var parametros = { "dpto" : dpto };

        var url = '/apps/controller/paciente';
        var data = { funcion: "cargar_munic", parametros: parametros };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            var html = "<option value=''>- Escoja una opción -</option>";
            resp.forEach(function(arr){ html += "<option "+(arr["name"] == mun ? 'selected ' : '')+"value='"+arr["name"]+"'>"+arr["value"]+"</option>"; });  
            $("#id_area").html(html); 
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
        cargando();
        var parametros = $("#form-empresas").serializeArray();
        var url    = '/apps/controller/empresa';
        var data   = { funcion: "editar", parametros: parametros };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un xxx error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            if( resp.toUpperCase() == "OK"){
                swal('¡Registro guardado satisfactoriamente!', { closeOnClickOutside: false, buttons: false, icon : "success"}); 
                setTimeout(() => {
                    location.href = "/apps/rol-administrador/empresas/listado";
                }, 3000);   
            }else{
                console.log(resp);
                swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
            }

        });           
    }

</script>
<!-- / scripts -->
<?php include "../../../layouts/administrador/fin.php";?>