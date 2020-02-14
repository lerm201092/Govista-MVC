<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/medico/inicio.php";?>
<!-- head -->
<style>
#tbl-pacientes thead th{
color:#9c27b0;
padding: 2px 5px 2px;
font-size: 15px;   
font-weight: 500!important;
 border: none;
}
#tbl-pacientes tbody tr td{
color: gray;
padding: 4px 5px 4px;
font-size: 14px;
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

.cl-morado{
color:#9c27b0; 
}

.cl-morado-light{
            color:#a088a4; 
        }

ul.pagination{
float:right;
}

.alert-success{
color: #468847!important;
background-color: #dff0d8!important;
border-color: #d6e9c6!important;
}   
ul#tabs-ver .nav-item .nav-link{
            font-weight:400;
            color: #aba8a8!important;
          }
          ul#tabs-ver  .nav-item .active{
    font-weight:600;
    color: #9c27b0!important;
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

  .fc-toolbar h2 {
    font-size: 15px!important;
    text-transform: capitalize;
}

.fc-button-primary {
    color: #fff;
    background-color: #a088a4!important;
    border-color: #a088a4!important;
}

.fc-button-primary:not(:disabled):active, .fc-button-primary:not(:disabled).fc-button-active {
    color: #fff;
    background-color: #c1b1c3!important;
    border-color: #c1b1c3!important;
}

.fc-event, .fc-event-dot {
    background-color: #a088a4!important;
    border-color: #a088a4!important;
    cursor: pointer;
}

.fc-time{
    font-size: 11px!important;
    color: white;
}

.fc-title{
    font-size: 9px!important;
    color: white;
}

.fc-view, .fc-view > table {
    border: 1px solid rgba(51, 51, 51, 0.07)!important;
}

.fc-center{
    margin: 20px auto 20px;
}

#contenedor_principal{
    font-family: calibri;
}

@media (max-width: 600px) {
    #contenedor_principal{
        padding: 5px 5px!important;
    }

}

</style>

<link href="/apps/node/core/main.css" rel='stylesheet' />
<link href="/apps/node/daygrid/main.css" rel='stylesheet' />
<link href="/apps/node/timegrid/main.css" rel='stylesheet' />
<!-- / head -->
<?php include "../../../layouts/medico/body.php";?>
<!-- Contenedor de la pagina -->

    <div class="row px-4" id="contenedor_principal">
        <div class="col-12 card px-0">
            <div class="card-header mx-0">
                <h5 class="mb-0">Listado De Citas </h5>
            </div>
            <div class="card-body">
                    <!-- link de los tabs -->
                    <div class="row justify-content-end">
                        <a href="/apps/rol-medico/citas/nuevo" class="btn bg-verde text-light font-weight-bold float-right mx-1"><span class="fa fa-calendar-plus mr-2"></span>Crear Cita</a>  
                    </div>
                    <ul class="nav nav-tabs" role="tablist" id="tabs-ver"> 
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tab1">
                                <span class="fas fa-address-card mr-2"></span>
                                <span class="text-tab">Listado</span>
                            </a>
                        </li>
                        <li class="nav-item d-none d-sm-none d-md-block">
                            <a class="nav-link" data-toggle="tab" href="#tab2">
                                <span class="fas fa-briefcase-medical mr-2"></span>
                                <span id="open-calendar"></span>
                                <span class="text-tab">Calendario</span>
                            </a>
                        </li>
                    </ul>

                    <!-- contenedor de los tabs -->
                    <div class="tab-content p-0" style="border:1px solid #dee2e6; border-top: none">
                        <!-- PRIMER TAB -->
                        <div class="tab-pane active p-4" id="tab1">
                            <table id="tbl-pacientes" class="table table-sm table-striped table-bordered">
                                <thead class="text-primary">
                                    <th class="d-none d-sm-none d-md-block">Id Paciente</th>
                                    <th>Paciente</th>
                                    <th>Fecha de Inicio</th>
                                    <th></th>
                                </thead>
                                <tbody id="tbody_pacientes">
                                    
                                </tbody>
                            </table>

                            <div class="row">
                                <ul class="pagination justify-content-end">
                                    <li class="page-item" id="li-primero" title="Primero"><a class="page-link" href="javascript:primero()"><i class="fas fa-angle-double-left"></i></a></li>
                                    <li class="page-item" id="li-anterior" title="Anterior"><a class="page-link" href="javascript:anterior()"><i class="fas fa-angle-left"></i></a></li>

                                    <li class="page-item disabled" id="li-anterior" title="Pagina Actual"><a class="page-link" href="#"><span id="item-act">1</span></a></li>
                                    <li class="page-item disabled"><a class="page-link" href="#">/</a></li>
                                    <li class="page-item disabled" id="li-anterior" title="Cantidad de paginas"><a class="page-link" href="#"><span id="item-max">1</span></a></li>

                                    <li class="page-item" id="li-siguiente" title="Siguiente"><a class="page-link" href="javascript:siguiente()"><i class="fas fa-angle-right"></i></a></li>
                                    <li class="page-item" id="li-ultimo" title="Ultimo"><a class="page-link" href="javascript:ultimo()"><i class="fas fa-angle-double-right"></i></a></li>
                                </ul>
                            </div>
                        </div>


                        <!-- SEGUNDO TAB -->
                        <div class="tab-pane container active" id="tab2">
                            <div>                                
                                <div id='calendar' style="width:90%; margin: 0 auto"></div>                                                 
                            </div>                         
                        </div>
                    </div>
                </div>
                <!-- FIN DEL CARD BODY -->
        </div>
    </div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/medico/footer.php";?>
<!-- scripts -->
<script src="/apps/node/core/main.js"></script>
<script src="/apps/node/core/locales-all.js"></script>
<script src="/apps/node/interaction/main.js"></script>
<script src="/apps/node/daygrid/main.js"></script>
<script src="/apps/node/timegrid/main.js"></script>
<script>
    $("#li-citas").addClass("active");   
    $("#li-anterior").addClass("disabled");
    $("#li-primero").addClass("disabled");

    $(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function(){
    if($(this).val() === "")
      $(this).parent().removeClass("is-completed");
      $(this).parent().removeClass("is-active");
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

    listar_pacientes(1);

    function listar_pacientes(pagina){
        $("#funcion_principal").text("listar");
        $("#text_busqueda").text("");
        $("#bus_paciente").val("");
        $("#busqueda_msg").hide();

        if(pagina == 1){
            $("#item-act").text(1);
            $("#li-anterior").addClass("disabled");
            $("#li-primero").addClass("disabled");
        }
        cargando();
        var estado = $("#item_estado").text();
        var parametros = {
            "pagina" : pagina, 
            "estado" : estado
        };

        var url = '/apps/controller/citas';
        var data = { funcion: "listar", parametros: parametros };

        fetch(url, {
            method: 'POST', // or 'PUT'
            body: JSON.stringify(data), // data can be `string` or {object}!
            headers:{
                'Content-Type': 'application/json'
            },
            mode: 'cors'
        }).then(res => res.json())
        .catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        })
        .then(resp => {

            var html = "";
            $("#item-max").text(resp.cant_max);

            if( (resp.cant_max == 1) || (pagina == resp.cant_max)){
                $("#li-siguiente").addClass("disabled");
                $("#li-ultimo").addClass("disabled");
            }else{
                $("#li-siguiente").removeClass("disabled");
                $("#li-ultimo").removeClass("disabled");
            }
            for(var i=0; i < resp.citas.length; i++){
                html+="<tr>";
                html+="<td  class='d-none d-sm-none d-md-table-cell '>("+resp.citas[i].tipodoc+") "+resp.citas[i].numdoc+"</td>";
                html+="<td>"+capitalize(resp.citas[i].name1)+" "+capitalize(resp.citas[i].surname1)+"</td>";
                html+="<td>"+resp.citas[i].start+"</td>";
                html+="<td class='pl-3'>";
                    html+="<a href='/apps/rol-medico/citas/ver/"+resp.citas[i].cita_id+"' title='Ver Paciente'><i class='cl-azul fas fa-eye'></i></a>";
                    html+="<a href='/apps/rol-medico/citas/editar/"+resp.citas[i].cita_id+"' title='Editar Paciente' class='ml-2'><i class='cl-morado fas fa-user-edit'></i></a>";
                    html+="<a href='/apps/rol-medico/historias/crear/"+resp.citas[i].cita_id+"' title='Iniciar Consulta' class='ml-2'><i class='cl-verde fas fa-angle-double-right'></i></a>";
                html+="</td>";
                html+="</tr>";
            }

            if(resp.citas.length == 0){  html = "<tr><td colspan='6'>No hay registros</td></tr>";  }
            $("#tbody_pacientes").html("");
            $("#tbody_pacientes").html(html);

            cargarCalendario(resp.citas);

            setTimeout(() => {
                swal.close();
            }, 200);
        });
    }

    // **********************************************************************************

    $("#buscar").focus();
    $("#li-citas").addClass("active");

    // $("#tab2").addClass("d-none");
    // $("#tab1").addClass("d-none");

    function filtro_estado(aux){
        $(".activeItem").removeClass("d-none"); 
        $(".inactiveItem").removeClass("d-none"); 
        if(aux=="I"){
            $(".activeItem").addClass("d-none"); 
        }else if(aux=="A"){
            $(".inactiveItem").addClass("d-none"); 
        }
    }   
      
    function cargarCalendario(arr){
        $("#calendar").html("");
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            locale: 'es',
        plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        eventClick: function(info) {
            verCitaCalendario(info);
            info.el.style.borderColor = 'red';
        },
        navLinks: true, // can click day/week names to navigate views
        selectable: true,
        selectMirror: true,
        editable: false,
        eventLimit: true, // allow "more" link when too many events
        events: arr
        });
        calendar.render();

        $("#tab2").removeClass("active");
    }

    function verCitaCalendario(info){
        location.href = '/apps/rol-medico/citas/ver/'+info.event._def.extendedProps.cita_id;
    }

    // *******************************************************************************************

    function primero(){
        $("#li-anterior").addClass("disabled");
        $("#li-primero").addClass("disabled");
        var ultimo = $("#item-max").text();
        if(ultimo != 1){
            $("#li-siguiente").removeClass("disabled");
            $("#li-ultimo").removeClass("disabled");
        }
        $("#item-act").text(1);
        listar_pacientes(1);        
    }

    function anterior(){
        var num = $("#item-act").text();
        num = parseInt(num) - parseInt(1);        
        if( num == 1 ){
            $("#li-anterior").addClass("disabled");
            $("#li-primero").addClass("disabled");
        }
        if(ultimo != 1){
            $("#li-siguiente").removeClass("disabled");
            $("#li-ultimo").removeClass("disabled");
        }
        $("#item-act").text(num);

        listar_pacientes(num); 
    }

    function siguiente(){
        var num = $("#item-act").text();
        var ultimo = $("#item-max").text();
        num = parseInt(num) + parseInt(1);        
        if( num == ultimo ){
            $("#li-siguiente").addClass("disabled");
            $("#li-ultimo").addClass("disabled");
        }
        if(ultimo != 1){
            $("#li-anterior").removeClass("disabled");
            $("#li-primero").removeClass("disabled");
        }
        $("#item-act").text(num);
        listar_pacientes(num);
    }

    function ultimo(){
        var ultimo = $("#item-max").text();
        $("#li-siguiente").addClass("disabled");
        $("#li-ultimo").addClass("disabled");
        if(ultimo != 1){
            $("#li-anterior").removeClass("disabled");
            $("#li-primero").removeClass("disabled");
        }
        $("#item-act").text(ultimo);
        listar_pacientes(ultimo); 
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