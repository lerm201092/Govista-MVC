<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
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
</style>
<!-- / head -->
<?php include "../../../layouts/medico/body.php";?>
<!-- Contenedor de la pagina -->
<div class="card mx-2">
    <div class="card-header">
        <h6 class="cl-morado">Información del paciente <i>(<span id="nom_corto"></span>)</i></h6>
    </div>
    <div class="card-body">
        <div id="accordion">
            <!-- Acordeon 1 -->
            <div class="card">
                <div class="card-header" id="headingOne">
                    <h5 class="mb-0">
                        <button class="btn btn-link col-12" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            <span class="cl-morado float-left font-weight-bold">Datos personales </span><span class="cl-morado float-right"><i class="fas fa-folder-open"></i></span>
                        </button>
                    </h5>
                </div>

                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                    <div class="card-body" style="padding: 5px 50px 30px">
                        <?php include "./tab-ver/div1.php"; ?>
                    </div>
                </div>
            </div>

            <!-- Acordeon 2 -->
            <div class="card">
                <div class="card-header" id="headingTwo">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed col-12" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <span class="cl-morado float-left font-weight-bold">Datos de afiliación</span><span class="cl-morado float-right"><i class="fas fa-folder-open"></i></span>
                        </button>
                    </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                    <div class="card-body">
                        <?php include "./tab-ver/div2.php"; ?>
                    </div>
                </div>
            </div>


            <!-- Acordeon 3 -->
            <div class="card">
                <div class="card-header" id="heading3">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed col-12" data-toggle="collapse" data-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                            <span class="cl-morado float-left font-weight-bold">Datos de contacto</span><span class="cl-morado float-right"><i class="fas fa-folder-open"></i></span>
                        </button>
                    </h5>
                </div>
                <div id="collapse3" class="collapse" aria-labelledby="heading3" data-parent="#accordion">
                    <div class="card-body">
                        <?php include "./tab-ver/div3.php"; ?>
                    </div>
                </div>
            </div>

            <!-- Acordeon 3 -->
            <div class="card">
                <div class="card-header" id="heading4">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed col-12" data-toggle="collapse" data-target="#collapse4" aria-expanded="false" aria-controls="collapse4">
                            <span class="cl-morado float-left font-weight-bold">Datos de contacto de emergencia</span><span class="cl-morado float-right"><i class="fas fa-folder-open"></i></span>
                        </button>
                    </h5>
                </div>
                <div id="collapse4" class="collapse" aria-labelledby="heading4" data-parent="#accordion">
                    <div class="card-body">
                        <?php include "./tab-ver/div4.php"; ?>
                    </div>
                </div>
            </div>


            <!-- Acordeon 3 -->
            <div class="card">
                <div class="card-header" id="heading5">
                    <h5 class="mb-0">
                        <button class="btn btn-link collapsed col-12" data-toggle="collapse" data-target="#collapse5" aria-expanded="false" aria-controls="collapse5">
                            <span class="cl-morado float-left font-weight-bold">Datos de los padres</span><span class="cl-morado float-right"><i class="fas fa-folder-open"></i></span>
                        </button>
                    </h5>
                </div>
                <div id="collapse5" class="collapse" aria-labelledby="heading5" data-parent="#accordion">
                    <div class="card-body">
                        <?php include "./tab-ver/div5.php"; ?>
                    </div>
                </div>
            </div>

            
            <div class="row justify-content-end mb-3">                
                <a href="/apps/rol-medico/pacientes/listado "class="btn text-light bg-rojo mr-2"><i class="fas fa-caret-left mr-2"></i>Regresar</a>
            </div>              



        </div>
    </div>
</div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/medico/footer.php";?>
<!-- scripts -->
<script>
    $("#li-pacientes").addClass("active"); -
    cargando();
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

    function capitalize(string){
        if(string){
            string = string.toLowerCase();
            return string.charAt(0).toUpperCase() + string.slice(1);
        }
        return '';
    }

    var id_paciente = "<?=($_GET['id'])?>";
    id_paciente = id_paciente.trim();

    var parametros = {
        "id" : id_paciente
    };

    var url = '/apps/controller/paciente';
    var data = { funcion: "ver", parametros: parametros  };
    var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
    fetch(url, miInit).then(res => res.json()).catch(error =>  {
        console.log(error);
        swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
    }).then(resp => {
        if(resp){
            $("#nom_corto").text(capitalize(resp.name1)+" "+capitalize(resp.surname1));
            $("#identificacion").val("( "+resp.tipodoc+" )"+" "+resp.numdoc);
            $("#email").val(resp.email ? resp.email : "");
            $("#apellidos").val(capitalize(resp.surname1)+" "+capitalize(resp.surname2));
            $("#nombres").val(capitalize(resp.name1)+" "+capitalize(resp.name2));
            $("#fecha").val(resp.birthdate ? resp.birthdate : '');
            $("#sexo").val(resp.sex == 'M' ? 'Masculino' : 'Femenino' );
            $("#eps").val(capitalize(resp.eps));
            $("#estado").val(resp.state == 'AC' ? 'Activo' : 'Inactivo');
            $("#telefono").val(resp.phone ? resp.phone : "");
            $("#address").val(resp.address ? resp.address : "");
            $("#zona").val(resp.zone == 'U' ? 'Urbana' : 'Rural' );
            $("#ciudad").val( ( capitalize(resp.muni) ? capitalize(resp.muni) +" ( "+capitalize(resp.dpto)+" )" : '' ) );
            $("#telefono_contact").val(resp.contact_phone ? resp.contact_phone : "");
            $("#apellidos_contact").val(resp.contact_surnames);
            $("#nombres_contact").val(resp.contact_names);
            $("#ciudad_contact").val(capitalize(resp.muni_contact)+" ( "+capitalize(resp.dpto_contact)+" )");

            $("#padre_apellidos").val(resp.father_surname);
            $("#padre_nombres").val(resp.father_name);
            $("#padre_email").val(resp.father_email);
            $("#padre_tel").val(resp.father_phone);
            $("#madre_apellidos").val(resp.mother_surname);
            $("#madre_nombres").val(resp.mother_name);
            $("#madre_email").val(resp.mother_email);
            $("#madre_tel").val(resp.mother_phone);

            setTimeout(() => {
                swal.close();
            }, 200); 
        }      
    });    
</script>
<!-- / scripts -->
<?php include "../../../layouts/medico/fin.php";?>