<?php include "../../../../../config/config.php"; ?>
<?php include "../../../../../config/seguridad.php"; ?>
<?php include "../../../layouts/administrador/inicio.php";?>
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

.alert-danger-lr{  
    color: #a94442;
    background-color: #f2dede;
    border-color: #ebccd1;
}

@media (max-width: 600px) {
    #contenedor_principal{
        padding: 5px 5px!important;
    }

}

</style>

<!-- / head -->
<?php include "../../../layouts/administrador/body.php";?>
<!-- Contenedor de la pagina -->
<div class="row px-4" id="contenedor_principal">
    <div class="col-12 card px-0">
        <div class="card-header mx-0">
            <h5 class="mb-0">Listado De usuarios registradas</h5>
        </div>
        <div class="card-body">
                <!-- link de los tabs -->
                <div class="row justify-content-end mb-3">
                    <a href="/apps/rol-administrador/usuarios/nuevo" class="btn bg-verde text-light font-weight-bold float-right mx-1"><span class="fas fa-user-check mr-2"></span>Nuevo Usuario</a>  
                </div>
                <!-- contenedor de los tabs -->
                <table id="tbl-pacientes" class="table table-sm table-striped table-bordered">
                    <thead class="text-primary">
                        <th class="d-none d-sm-none d-md-table-cell">Identificacion</th>
                        <th>Nombres</th>
                        <th>Apellidos</th>
                        <th class="d-none d-sm-none d-md-table-cell">Email</th>
                        <th class="d-none d-sm-none d-md-table-cell">Estado</th>
                        <th class="d-none d-sm-none d-md-table-cell">Rol</th>
                        <th></th>
                    </thead>
                    <tbody id="tbody_historias">
                        
                    </tbody>
                </table>

                <div class="row mt-4">
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
</div>






<!-- Modal -->
<div class="modal fade" id="md_asignar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-md" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sp_name">Cambio de contraseña</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="row">
          <div class="col-12 m-0 p-0 mb-3">
                <p class="mb-0 cl-rojo" style="font-weight: 600">Usuario: <span class="text-dark " id="sp_nombre"></span></p>
                <p class="mb-0 cl-rojo" style="font-weight: 600">Nombre de usuario: <span class="text-dark " id="sp_usuario"></span></p>
          </div>
      </div>
        
        <input type="hidden" id="id_pass">

         <div class="row">
            <div class="col-12 m-0 p-0">
                <div class="form-group">
                     <label for="" style="font-weight: 600">Contraseña:</label>   
                     <input style="font-size: 12px" id="pass1" type="password" class="form-control form-control-sm">
                </div>
            </div>
         </div>

         <div class="row">
            <div class="col-12 m-0 p-0">
                <div class="form-group">
                     <label for="" style="font-weight: 600">Confirmar contraseña:</label>   
                     <input style="font-size: 12px" id="pass2" type="password" class="form-control form-control-sm">
                </div>
            </div>
         </div>
         <p id="p-alerta-con" class="alert alert-danger-lr py-1" style="font-style: italic; font-weight: 550; text-align: center; display: none">¡ Contraseñas no coinciden !</p>
         <p id="p-alerta-vac" class="alert alert-danger-lr py-1" style="font-style: italic; font-weight: 550; text-align: center; display: none">¡ Complete los campos correctamente !</p>
      </div>
      <div class="modal-footer"> 
        <button id="btn-validar" type="button" onclick="cambiar_clave()" class="btn bg-azul text-light btn-sm">Cambiar Contraseña</button>
        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>









<!-- / Contenedor de la pagina -->
<?php include "../../../layouts/administrador/footer.php";?>
<!-- scripts -->
<script>
    $("#li-usuarios").addClass("active");
    listar(1);
    function listar(pagina){
        if(pagina == 1){
            $("#item-act").text(1);
            $("#li-anterior").addClass("disabled");
            $("#li-primero").addClass("disabled");
        }
        var url = '/apps/controller/usuario';
        var parametros = { "pagina" : pagina };
        var data = { funcion : "listar", parametros : parametros };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        cargando();
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

            if(resp.usuarios.length == 0){
                html = "<tr><td colspan='7'><b>No hay registros</b></td></tr>";
            }

            for(var i=0; i < resp.usuarios.length; i++){
                html+="<tr>";
                html+="<td>("+resp.usuarios[i].tipodoc+" ) "+resp.usuarios[i].numdoc+"</td>";
                html+="<td id='td_nombre_"+resp.usuarios[i].id+"'>"+( resp.usuarios[i].nombre1 ?? '')+" "+(resp.usuarios[i].nombre2 ?? '')+"</td>";
                html+="<td id='td_apellido_"+resp.usuarios[i].id+"'>"+( resp.usuarios[i].apellido1 ?? '' )+" "+( resp.usuarios[i].apellido2 ?? '' )+"</td>";
                html+="<td>"+( resp.usuarios[i].email ?? '' )+"</td>";
                html+="<td id='td_est_"+resp.usuarios[i].id+"'>"+( resp.usuarios[i].state ?? '' )+"</td>";
                html+="<td>"+( resp.usuarios[i].roluser ? rol_user(resp.usuarios[i].roluser) : '' )+"</td>";
                html+="<td>";
                    html+="<a disabled href='/apps/rol-administrador/usuarios/ver/"+resp.usuarios[i].id+"' class='cl-azul mx-1'><i class='fas fa-eye'></i></a>";
                    html+="<a disabled href='/apps/rol-administrador/usuarios/editar/"+resp.usuarios[i].id+"' class='cl-amarillo mx-1 mr-2'><i class='fas fa-edit'></i></a>  ";
                    html+="<a disabled href='javascript:pre_cambio_contrasena("+resp.usuarios[i].id+")' class='cl-rojo mx-1 mr-2'><i class='fa fa-unlock-alt'></i></a>  ";
                    html+=`<a id='a_est_`+resp.usuarios[i].id+`' disabled href="javascript:cambiar_estado(`+resp.usuarios[i].id+`, '`+resp.usuarios[i].state+`')" class="cl-`+(resp.usuarios[i].state == 'AC' ? 'rojo' : 'verde')+` mx-1"><i id="i_est_`+resp.usuarios[i].id+`" class="`+(resp.usuarios[i].state == 'AC' ? 'fas fa-minus-circle' : '	fas fa-power-off')+`"></i></a>`;
                html+="</td>";
                html+="</tr>";
            }
            $("#tbody_historias").html("");
            $("#tbody_historias").html(html);
            setTimeout(() => {
                swal.close();
            }, 200);
        });
    }

    function pre_cambio_contrasena(id_user){
        $("#pass1").val("");
        $("#pass2").val("");
        $("#id_pass").val(id_user);
        $("#sp_usuario").text( $("#td_usuario_"+id_user).text() );
        $("#sp_nombre").text( $("#td_nombre_"+id_user).text() + " " + $("#td_apellido_"+id_user).text()  );
        $("#md_asignar").modal("show");
    }

    function cambiar_clave(){
        var pass1 = $("#pass1").val();
        var pass2 = $("#pass2").val();
        var id_pass = $("#id_pass").val();

        if( (pass1 == "") || (pass2 == "") ){
            $("#p-alerta-vac").show(50);
            setTimeout(() => {
                $("#p-alerta-vac").hide(50);
            }, 4000);
        }else{
            if((pass1 == pass2)){
                var parametros = [{"name": "password", "value" : pass1 },{ "name" : "id", "value" : $("#id_pass").val() }];
                var url    = '/apps/controller/usuario';
                var data   = { funcion: "editar", parametros: parametros };
                var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
                fetch(url, miInit).then(res => res.json()).catch(error =>  {
                    console.log(error);
                    swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
                }).then(resp => {
                    if(resp == "OK"){
                        swal('¡Registro actualizado satisfactoriamente!', { closeOnClickOutside: false, buttons: false, icon : "success"});
                        setTimeout(() => { location.href = "/apps/rol-administrador/usuarios/listado";  }, 3000);
                    }else{
                        console.error(resp);
                        const wrapper = document.createElement('p');
                        wrapper.innerHTML = Exception(resp);
                        swal({
                            title: "GoVista",
                            content: wrapper, 
                            icon: "warning"
                        });
                    }

                }); 
            }else{
                $("#p-alerta-con").show(50);
                setTimeout(() => {
                    $("#p-alerta-con").hide(50);
                }, 4000);
            }
        }        
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

    function cambiar_estado(id, estado){
        cargando();
        var url = '/apps/controller/usuario';
        var data = { funcion : 'cambiar_estado', parametros : { 'id' : id, 'estado' : (estado == 'AC' ? 'IN' : 'AC') } };
        var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
        fetch(url, miInit).then(res => res.json()).catch(error =>  {
            console.log(error);
            swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
        }).then(resp => {
            if(resp == 'OK'){
                $("#i_est_"+id).removeClass().addClass(estado == 'AC' ? 'fas fa-power-off' : 'fas fa-minus-circle');
                $("#a_est_"+id).removeClass('cl-verde').removeClass('cl-rojo').addClass(estado == 'AC' ? 'cl-verde' : 'cl-rojo').attr("href", "javascript:cambiar_estado("+id+", '"+(estado == 'AC' ? 'IN' : 'AC')+"')");
                $("#td_est_"+id).text(estado == 'AC' ? 'IN' : 'AC');
               
                swal('', '¡Registro actualizado satisfactoriamente!', "success"); 
            }else{
                alert("Error");
            }            
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

    function rol_user(rol){
        switch (rol) {
            case '1':
                return 'Admin.';
                break;
            case '2':
                return 'Asesor Comercial';
                break;
            case '3':
                return 'Medico';
                break;
            case '4':
                return 'Paciente';
                break;
            case '5':
                return 'Admin. Clinica';
                break;
            default:
                return 'Hola mundo';
            break;
        }
    }

    function Exception(arr){
        if( arr["errorInfo"] ){
            if( arr["errorInfo"][0] == '23000' ){
                console.log();
                var array = TextoComillas(arr["errorInfo"][2]);
                var campo = array[1], valor = array[0];
                var mensaje = "<p>¡Advertencia, El campo <b><i>'"+campo+"'</i></b> con valor <b><i>'"+valor+"'</i></b> ya se encuentra registrado.!</p>";
                return mensaje;
            }
        }
        return "¡Se ha generado un error en el servidor, por favor contacte al administrador!";
    }

    function TextoComillas(texto) {
        const regex = /[^'"\\]*(?:\\.[^'"\\]*)*(["'])([^"'\\]*(?:(?:(?!\1)["']|\\.)[^"'\\]*)*)\1/gy;
        var   grupo,
            resultado = [];
        
        while ((grupo = regex.exec(texto)) !== null) {
            //el grupo 1 contiene las comillas utilizadas
            //el grupo 2 es el texto dentro de éstas
            resultado.push(grupo[2]);
        }
        return resultado;
    }
    </script>


</script>
<!-- / scripts -->
<?php include "../../../layouts/administrador/fin.php";?>