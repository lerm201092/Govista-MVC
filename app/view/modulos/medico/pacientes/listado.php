<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/medico/inicio.php";?>
<!-- head -->
<link rel="stylesheet" href="/apps/css/medico-paciente-listado.css">
<style>
    .btn-estados{
        max-width: 110px;
    }
</style>
<!-- / head -->
<?php include "../../../layouts/medico/body.php";?>
<!-- Contenedor de la pagina -->

    <div class="row px-4">
        <div class="col-12 card px-0">
            <div class="card-header mx-0 mb-0">
                <h5 class="mb-0">Listado de pacientes <span id="funcion_principal" class="d-none">listar</span> <i id="busqueda_msg" style="font-size:14px">(<span>Busqueda realizada : <span id="text_busqueda"></span></span>)</i></h5>
            </div>
            <div class="card-body">

                <p id="item_estado" class="d-none">ALL</p>
                <div class="row mb-4">
                    <div class="col-lg-2 pt-4 px-0">
                        <div class="row">
                            <div class="col-12 px-0">
                                <a href="/apps/rol-medico/pacientes/nuevo" class="btn bg-verde text-light font-weight-bold"><span class="fa fa-calendar-plus mr-2"></span>Nuevo Paciente</a>
                            </div>
                        </div>                          
                    </div>
                    <div class="col-lg-10 px-0">
                        <div class="row">
                            <div class="col-lg-8 pt-4 px-0">
                                <div class="row">
                                    <div class="col-4 px-0" style="padding: 0px 1px!important">
                                        <a href="javascript:void(0)" onclick="$('#item_estado').text('IN'); listar_pacientes(1)" class="btn-estados btn bg-rojo text-light font-weight-bold mx-0 col-12"><span class="fas fa-filter mr-2"></span>Inactivos</a>  
                                    </div>
                                    <div class="col-4 px-0" style="padding: 0px 1px!important">
                                        <a href="javascript:void(0)" onclick="$('#item_estado').text('AC'); listar_pacientes(1)" class="btn-estados btn bg-azul text-light font-weight-bold mx-0 col-12"><span class="fas fa-filter mr-2"></span>Activos</a>
                                    </div>
                                    <div class="col-4 px-0" style="padding: 0px 1px!important">
                                        <a href="javascript:void(0)" onclick="$('#item_estado').text('ALL'); listar_pacientes(1)" class="btn-estados btn bg-amarillo text-light font-weight-bold mx-0 col-12"><span class="fas fa-filter mr-2"></span>Todos</a>                          
                                    </div>
                                </div>
                                
                                
                                
                            </div>
                            <div class="col-lg-4">
                                <div class="mat-div is-completed" style="width:80%; float:left;">
                                    <label for="first-name" class="mat-label">Buscar Pacientes</label>
                                    <input type="text" class="mat-input" id="bus_paciente"/>
                                </div>   
                                <div class="pt-4" style="width:20%; float:left">
                                    <a href="javascript:buscar_pacientes(1)" class="btn bg-morado" style="border-radius: 50%" title="Crear nuevo paciente"><i class="fas fa-search text-light"></i></a>
                                </div>
                                             
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-right">
                        
                    </div>
                </div>
                <div class="row">
                    <table class="table table-sm table-striped table-bordered">
                        <thead>
                                <th class="d-none d-sm-none d-md-table-cell">Documento</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th class="d-none d-sm-none d-md-table-cell">Ciudad</th>
                                <th class="d-none d-sm-none d-md-table-cell">Estado</th>
                                <th></th>
                        </thead>
                        <tbody id="tbody_pacientes">

                        </tbody>
                    </table>
                </div>
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
        </div>
    </div>
<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/medico/footer.php";?>
<!-- scripts -->
<script>

String.prototype.capitalize = function(allWords) {
   return (allWords) ? // if all words
      this.split(' ').map(word => word.capitalize()).join(' ') : //break down phrase to words then  recursive calls until capitalizing all words
      this.charAt(0).toUpperCase() + this.slice(1); // if allWords is undefined , capitalize only the first word , mean the first char of the whole string
}

$("#li-pacientes").addClass("active");   
    $("#li-anterior").addClass("disabled");
    $("#li-primero").addClass("disabled");

    $(".mat-input").focus(function(){
    $(this).parent().addClass("is-active is-completed");
  });

  $(".mat-input").focusout(function(){
    if($(this).val() === "")
      $(this).parent().removeClass("is-completed");
      $(this).parent().removeClass("is-active");
    })

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

        var url = '/apps/controller/paciente';
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

            for(var i=0; i < resp.pacientes.length; i++){
                html+="<tr>";
                html+="<td class='d-none d-sm-none d-md-table-cell'>( "+resp.pacientes[i].tipodoc+" ) "+resp.pacientes[i].numdoc+"</td>";
                html+="<td>"+resp.pacientes[i].nombre1+" "+ ( resp.pacientes[i].nombre2 ?? '' )+"</td>";
                html+="<td>"+resp.pacientes[i].apellido1+" "+ ( resp.pacientes[i].apellido2 ?? '' ) +"</td>";
                html+="<td class='d-none d-sm-none d-md-table-cell'>"+ ( resp.pacientes[i].ciudad ? resp.pacientes[i].ciudad.toLowerCase().capitalize(true) : '') +" </td>";
                html+="<td class='d-none d-sm-none d-md-table-cell'>"+resp.pacientes[i].state+"</td>";
                html+="<td class='pl-3'><a href='/apps/rol-medico/pacientes/ver/"+resp.pacientes[i].id+"' title='Ver Paciente'><i class='cl-azul fas fa-eye'></i></a><a href='/apps/rol-medico/pacientes/editar/"+resp.pacientes[i].id+"' title='Editar Paciente' class='ml-2'><i class='cl-morado fas fa-user-edit'></i></a></td>";
                html+="</tr>";
            }
            $("#tbody_pacientes").html("");
            $("#tbody_pacientes").html(html);
            setTimeout(() => {
                swal.close();
            }, 200);
        });
    }

    function buscar_pacientes(pagina){
        var texto = $("#bus_paciente").val();
        $("#item_estado").text("ALL");
        $("#busqueda_msg").show();
            texto = texto.trim();
        $("#funcion_principal").text("buscar");
        $("#text_busqueda").text(texto);
        if(pagina == 1){
            $("#item-act").text(1);
            $("#li-anterior").addClass("disabled");
            $("#li-primero").addClass("disabled");
        }
        cargando();

        var parametros = {
            "pagina" : pagina, 
            "texto"  : texto
        };

        var url = '/apps/controller/paciente';
        var data = {funcion: "buscar", parametros: parametros };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            var html = "";
            $("#item-max").text(resp.cant_max);

            if( (resp.cant_max == 1) || (pagina == resp.cant_max)){
                $("#li-siguiente").addClass("disabled");
                $("#li-ultimo").addClass("disabled");
            }else{
                $("#li-siguiente").removeClass("disabled");
                $("#li-ultimo").removeClass("disabled");
            }
            for(var i=0; i < resp.pacientes.length; i++){
                html+="<tr>";
                html+="<td class='d-none d-sm-none d-md-table-cell'>( "+resp.pacientes[i].tipodoc+" ) "+resp.pacientes[i].numdoc+"</td>";
                html+="<td>"+resp.pacientes[i].name1+" "+ ( resp.pacientes[i].name2 ? resp.pacientes[i].name2 : '' )+"</td>";
                html+="<td>"+resp.pacientes[i].surname1+" "+ ( resp.pacientes[i].surname2 ? resp.pacientes[i].surname2 : '' ) +"</td>";
                html+="<td class='d-none d-sm-none d-md-table-cell'>"+ ( resp.pacientes[i].munic ?  resp.pacientes[i].munic+" ( "+resp.pacientes[i].dpto+" )"  : '') +" </td>";
                html+="<td class='d-none d-sm-none d-md-table-cell'>"+resp.pacientes[i].state+"</td>";
                html+="<td class='pl-3'><a href='/apps/rol-medico/pacientes/ver/"+resp.pacientes[i].id+"' title='Ver Paciente'><i class='cl-azul fas fa-eye'></i></a><a href='/apps/rol-medico/pacientes/editar/"+resp.pacientes[i].id+"' title='Editar Paciente' class='ml-2'><i class='cl-morado fas fa-user-edit'></i></a></td>";
                html+="</tr>";
            }

            if(resp.pacientes.length == 0){  html = "<tr><td colspan='6'>No hay registros</td></tr>";  }
            $("#tbody_pacientes").html("");
            $("#tbody_pacientes").html(html);
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
        if(fun == "listar"){
            listar_pacientes(1);
        }else{
            $("#bus_paciente").val($("#text_busqueda").text());
            buscar_pacientes(1);
        }        
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

        var fun = $("#funcion_principal").text();
        if(fun == "listar"){
            listar_pacientes(num);
        }else{
            $("#bus_paciente").val($("#text_busqueda").text());
            buscar_pacientes(num);
        }   
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

        var fun = $("#funcion_principal").text();
        if(fun == "listar"){
            listar_pacientes(num);
        }else{
            $("#bus_paciente").val($("#text_busqueda").text());
            buscar_pacientes(num);
        }   
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

        var fun = $("#funcion_principal").text();
        if(fun == "listar"){
            listar_pacientes(ultimo);
        }else{
            $("#bus_paciente").val($("#text_busqueda").text());
            buscar_pacientes(ultimo);
        }   
    }

</script>
<!-- / scripts -->
<?php include "../../../layouts/medico/fin.php";?>