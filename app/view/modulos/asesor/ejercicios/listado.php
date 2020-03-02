<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/asesor/inicio.php";?>
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

<!-- / head -->
<?php include "../../../layouts/asesor/body.php";?>
<!-- Contenedor de la pagina -->
<div class="row px-4" id="contenedor_principal">
    <div class="col-12 card px-0">
        <div class="card-header mx-0">
            <h5 class="mb-0">Listado de ejercicios a realizar </h5>
        </div>
        <div class="card-body">
                <!-- link de los tabs -->
                <!-- contenedor de los tabs -->
                <table id="tbl-pacientes" class="table table-sm table-striped table-bordered">
                    <thead class="text-primary">
                        <th class="d-none d-sm-none d-md-table-cell">Codigo de HC</th>
                        <th>Fecha HC</th>
                        <th>Medico</th>
                        <th class="d-none d-sm-none d-md-table-cell">Observación</th>
                        <th class="d-none d-sm-none d-md-table-cell">Sesiones</th>
                        <th class="d-none d-sm-none d-md-table-cell">Realizadas</th>
                        <th class="d-none d-sm-none d-md-table-cell">Duración (min)</th>
                        <th></th>
                    </thead>
                    <tbody id="tbody_historias">
                        
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
</div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/asesor/footer.php";?>
<!-- scripts -->
<script>
    $("#li-ejercicios").addClass("active");
    listar();
    function listar(){

        var html = "", array = [
                { id : '1', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #1', session : '3', session_ok : '3', duration : '1' },
                { id : '2', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #2', session : '2', session_ok : '1', duration : '2' },
                { id : '3', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #3', session : '2', session_ok : '1', duration : '1' },
                { id : '4', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #4', session : '3', session_ok : '1', duration : '3' },
                { id : '5', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #5', session : '2', session_ok : '1', duration : '1' },
                { id : '6', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #6', session : '1', session_ok : '1', duration : '2' },
            
                { id : '7', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #7', session : '3', session_ok : '3', duration : '1' },
                { id : '8', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #8', session : '2', session_ok : '1', duration : '2' },
                { id : '9', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #9', session : '2', session_ok : '1', duration : '1' },
                { id : '10', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #10', session : '3', session_ok : '1', duration : '3' },
                { id : '11', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #11', session : '2', session_ok : '1', duration : '1' },
                { id : '12', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #12', session : '1', session_ok : '1', duration : '2' },
                { id : '13', fecha : '2020-01-29 12:01 pm', name : 'Ian Ramos', observacion : 'Ejercicio #13', session : '1', session_ok : '1', duration : '2' }
            
            ];

            for(var i=0; i < array.length; i++){
                html+="<tr>";
                html+="<td>"+array[i].id+"</td>";
                html+="<td>"+array[i].fecha+"</td>";                
                html+="<td>"+array[i].name+"</td>";
                html+="<td>"+array[i].observacion+"</td>";
                html+="<td>"+array[i].session+"</td>";
                html+="<td>"+(array[i].session_ok ? array[i].session_ok : 0 )+"</td>";
                html+="<td>"+array[i].duration+"</td>";
                html+="<td>";
                    html+="<a href='/apps/rol-asesor/ejercicios/play/"+array[i].id+"/"+array[i].id+"/"+array[i].duration+"/2/"+array[i].id+"' class='cl-verde mx-1'><i class='fas fa-play-circle'></i></a>";
                html+="</td>";
                html+="</tr>";
            }
            $("#tbody_historias").html("");
            $("#tbody_historias").html(html);
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

    

    function primero(){
        $("#li-anterior").addClass("disabled");
        $("#li-primero").addClass("disabled");
        var ultimo = $("#item-max").text();
        if(ultimo != 1){
            $("#li-siguiente").removeClass("disabled");
            $("#li-ultimo").removeClass("disabled");
        }
        $("#item-act").text(1);
        var fun = $("#funcion_principal").text();
        listar(1); 
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
        listar(num);
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
        listar(num);

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
        listar(ultimo); 
    }

</script>
<!-- / scripts -->
<?php include "../../../layouts/asesor/fin.php";?>