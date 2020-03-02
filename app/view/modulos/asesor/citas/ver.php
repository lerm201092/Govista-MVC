<?php include "../../../../../config/config.php"; ?>
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
<!-- / head -->
<?php include "../../../layouts/medico/body.php";?>
<!-- Contenedor de la pagina -->

<div class="row px-4">
    <div class="col-12 card px-0">
        <div class="card-header mx-0">
            <h5>Ver información de citas </h5>
        </div>
        <div class="card-body px-4">
			<div class="row border-top-0 border border-top-0 border-left-0 border-right-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Documento</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2" id="id_paciente"></p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Paciente</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2" id="nombre_paciente"></p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Motivo de consulta</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2" id="motivo_cita"></p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Descricion de la consulta</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2" id="descripcion_cita"></p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Fecha/Hora de la cita</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2" id="fecha_cita"></p></div>
			</div>
			<div class="row border border-left-0 border-right-0 border-top-0 p-0">
				<div class="col-md-4 p-0"><p class="p-0 m-0 py-2 font-weight-bold cl-morado-light">Teléfono</p></div>
				<div class="col-md-8 p-0"><p class="p-0 m-0 py-2"  id="telefono_paciente"></p></div>
			</div>


			<div class="row py-4">
				<a href="/apps/rol-medico/citas/listado" class="btn bg-morado text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a>
			</div>
        </div>
     

    </div>
</div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/medico/footer.php";?>
<!-- scripts -->
<script>
    $("#li-citas").addClass("active");  
    cargando(); 
    var url = '/apps/controller/citas';
    var data = { funcion : "ver", parametros : {'id' : '<?=($_GET['id'])?>' } };
    var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
    fetch(url, miInit).then(res => res.json()).catch(error =>  {
        console.log(error);
        swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
    }).then(resp => {
        $("#id_paciente").text("( "+resp.tipodoc+" ) "+resp.numdoc);
        $("#nombre_paciente").text(capitalize(resp.name1)+" "+capitalize(resp.surname1));
        $("#telefono_paciente").text(resp.phone);
        $("#motivo_cita").text(resp.title);
        $("#descripcion_cita").text(resp.body);
        $("#fecha_cita").text(resp.start);
        setTimeout(() => {
            swal.close();
        }, 200);
    });

    function cargando(){
            swal('Cargando, espere un momento por favor ... ',{
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

        function capitalize(string){
        if(string){
            string = string.toLowerCase();
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        return '';
    }
</script>
<!-- / scripts -->
<?php include "../../../layouts/medico/fin.php";?>