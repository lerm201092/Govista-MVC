<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php require "../../../../../config/constantes.php"; ?>
<?php include "../../../layouts/medico/inicio.php";?>
<!-- head -->
<style>
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

.cl-morado{
    color:#9c27b0; 
}

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
    border-bottom: 1px solid #e4e4e4;
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

  select {
      font-size: 14px!important;
  }

  select option{
      font-size: 14px!important;
  }

  .mat-input:focus{
      border-bottom : 2px solid #9c27b0;
  }
</style>
<!-- / head -->
<?php include "../../../layouts/medico/body.php";?>
<!-- Contenedor de la pagina -->
<div class="row px-4">
<div class="col-12 card px-0">
    <div class="card-header  mx-0">
        <h5>Crear nuevo paciente</h5>
    </div>

    <div class="card-body">
        <form id="form-paciente" action="javascript:void(0)" onsubmit="guardar()">
          
            <div class="row pt-4 px-3 pb-4 mb-3" style="border: 1px solid #e3e3e3; border-radius: 10px; ">
                <div class="col-12">
                    <h6>Datos personales</h6>
                </div>
                <div class="col-12">
                    <?php include "./tab-form/div1.php"; ?>
                </div>
            </div>
            <div class="row pt-4 px-3 pb-4 mb-3" style="border: 1px solid #e3e3e3; border-radius: 10px; ">
                <div class="col-12">
                    <h6>Datos de afiliación</h6>
                </div>
                <div class="col-12">
                    <?php include "./tab-form/div2.php"; ?>
                </div>
            </div>

            <div class="row pt-4 px-3 pb-4 mb-3" style="border: 1px solid #e3e3e3; border-radius: 10px; ">
                <div class="col-12">
                    <h6>Datos de contacto</h6>
                </div>
                <div class="col-12">
                    <?php include "./tab-form/div3.php"; ?>
                </div>
            </div>

            <div class="row pt-4 px-3 pb-4 mb-3" style="border: 1px solid #e3e3e3; border-radius: 10px; ">
                <div class="col-12">
                    <h6>Datos de contacto de emergencia</h6>
                </div>
                <div class="col-12">
                    <?php include "./tab-form/div4.php"; ?>
                </div>
            </div>

            <div class="row pt-4 px-3 pb-4 mb-3" style="border: 1px solid #e3e3e3; border-radius: 10px; ">
                <div class="col-12">
                    <h6>Datos de los padres</h6>
                </div>
                <div class="col-12">
                    <?php include "./tab-form/div5.php"; ?>
                </div>
            </div>
            <div class="row justify-content-end mb-3">                
                <a href="/apps/rol-medico/pacientes/listado "class="btn text-light bg-rojo mr-2"><i class="fas fa-caret-left mr-2"></i>Cancelar</a>
                <button class="btn text-light bg-morado"><i class="fas fa-save mr-2"></i>Guardar</button>
            </div>  
        </form>
    </div>
</div>

</div>






<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/medico/footer.php";?>
<!-- scripts -->
<script>
    $("#li-pacientes").addClass("active");
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
    carga_inicial();
    function carga_inicial(){
        cargando();
        var sw = 0;
        var parametros = {};

        var url = '/apps/controller/paciente';
        var data = { funcion: "pre_crear", parametros: parametros  };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            var html = "<option value=''>- Escoja una opción -</option>";
            resp.eps.forEach(function(arr){ html += "<option value='"+arr["name"]+"'>"+arr["value"]+"</option>"; });  
            $("#id_eps").html(html);  

            html = "<option value=''>- Escoja una opción -</option>";
            resp.dpto.forEach(function(arr){ html += "<option value='"+arr["name"]+"'>"+arr["value"]+"</option>"; });
            $("#dpto").html(html); 
            $("#contact_dpto").html(html); 

            setTimeout(() => {
                swal.close();
            }, 200); 
        });

    }

    function cargar_munic(cb_dpto, cb_munic){
        cargando();
        var sw = 0;
        var dpto = $("#"+cb_dpto).val();
        var parametros = { "dpto" : dpto };

        var url = '/apps/controller/paciente';
        var data = { funcion: "cargar_munic", parametros: parametros };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            var html = "<option value=''>- Escoja una opción -</option>";
            resp.forEach(function(arr){ html += "<option value='"+arr["name"]+"'>"+arr["value"]+"</option>"; });  
            $("#"+cb_munic).html(html); 
            setTimeout(() => {
                swal.close();
            }, 200); 
        });
    }

    function guardar(){
        cargando();
        var sw = 0;
        var parametros = $("#form-paciente").serializeArray();

        var url = '/apps/controller/paciente';
        var data = { funcion: "crear", parametros: parametros };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            swal("GoVista", "¡Paciente guardado satisfactoriamente!", "success");
            setTimeout(() => {
                location.href = "/apps/rol-medico/pacientes/listado";
            }, 3000);
        });
    }
</script>
<!-- / scripts -->
<?php include "../../../layouts/medico/fin.php";?>