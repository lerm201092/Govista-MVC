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

        .titulo{
            color: #a088a4!important;
            font-weight: 600;
            font-style : italic;
        }

        .div_celda{
            border-bottom: 1px solid #e3e3e3;
        }
</style>
<!-- / head -->
<?php include "../../../layouts/medico/body.php";?>
<!-- Contenedor de la pagina -->

<div class="row px-1">
    <div class="col-12 card px-0">
        <div class="card-header mx-0">
            <h5>Ver información de usuarios </h5>
        </div>
        <div class="card-body px-4">
            <div class="row">
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Identificación:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="tipodoc"></span>&nbsp;-&nbsp;<span tipo="campo_bd" id="numdoc"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Usuario:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="usuario"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Nombre:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="nombre1"></span>&nbsp;<span tipo="campo_bd" id="nombre2"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Apellido:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="apellido1"></span>&nbsp;<span tipo="campo_bd" id="apellido2"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Email:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="email"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Teléfono:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="telefono"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Dirección:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="direccion"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Ciudad:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="muni"></span>&nbsp;-&nbsp;<span tipo="campo_bd" id="dpto"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><sapn class="titulo">Rol:</sapn></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="descrol"></span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Estado:</span></div>
                <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="estado_f"></span></div>
                <div id="paciente" class="d-none" style="width:100%">
                    <div class="row">
                        <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Eps:</span></div>
                        <div class="col-6 col-lg-9 py-2 div_celda "><span tipo="campo_bd" id="eps"></span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Carnet:</span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="pac_carnet"></span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Teléfono contacto:</span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="pac_contact_phone"></span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Nombre contacto:</span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="pac_contact_name"></span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Apellido contacto:</span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="pac_contact_surname"></span></div>    


                        <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Email contacto:</span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="pac_contact_email"></span></div>                     
                    </div>
                </div>
                <div id="medico" class="d-none" style="width:100%">
                    <div class="row">
                        <div class="col-6 col-lg-3 py-2 div_celda "><span class="titulo">Especialidad:</span></div>
                        <div class="col-6 col-lg-3 py-2 div_celda "><span tipo="campo_bd" id="med_especialidad"></span></div>                  
                    </div>
                </div>



            
            </div>

            <div class="row py-4 mt-4">
				<a href="/apps/rol-medico/pacientes/listado" class="btn btn-secondary text-light"><span class="fas fa-caret-left mr-2"></span>Regresar</a>
			</div>

        </div>
     

    </div>
</div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/medico/footer.php";?>
<!-- scripts -->
<script>
    $("#li-pacientes").addClass("active");  
    cargando(); 
    var url = '/apps/controller/paciente';
    var data = { funcion : "ver", parametros : {'id' : '<?=($_GET['id'])?>' } };
    var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
    fetch(url, miInit).then(res => res.json()).catch(error =>  {
        console.log(error);
        swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
    }).then(resp => {
        if(resp.roluser == 4){
            $("#paciente").removeClass("d-none");
        }else if(resp.roluser == 3){
            $("#medico").removeClass("d-none");
        }
        $("span[tipo=campo_bd]").each(function(){
            var name = $(this).attr("id"), valor = resp[name];
            $(this).text(valor);
        });

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