<?php include "../../../config/config.php"; ?>
<?php include "../../../config/seguridad.php"; ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>GoVista - Login</title>

        <link rel="stylesheet" href="/apps/node/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="/apps/css/all.css">   

        <style>
            html{
                background-color : black;
                background-image: url('/apps/img/bg.jpg'); 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover; 
                height: 100%!important;
            }

            .focused{
                border: 1px solid red;
                padding: 10px 10px;
                box-sizing: border-box;
            }
        
            .form-group{
                margin:0;
            }
        </style>     
    </head>

    <body style="position: absolute; height: 100%; width: 100%; background: #00000061;">
        <div class="row justify-content-end">
            <div class="col-lg-3 bg-white" style="position: absolute; height: 100%;">
                <p style="font-size: 30px; color: #d81b5c; font-family: calibri; margin-top: 20px; margin-bottom: 20px;" class="col-12 text-center">INICIAR SESIÓN</p>

                <form id="form-login" class="row" onsubmit="return false">
                    <div class="col-12">
                        <div class="form-group py-2 px-3" >
                            <label class="mb-0" for="username" style="font-style: italic">Usuario</label>
                            <input type="text" id="username" name="username" style="font-style: italic" class="form-control  form-control-sm" placeholder="Ingrese su usuario">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group py-2 px-3">
                            <label class="mb-0" for="username" style="font-style: italic">Contraseña</label>
                            <input type="password" id="password" name="password" style="font-style: italic" class="form-control  form-control-sm" placeholder="Ingrese su contraseña">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group py-2 px-3">
                            <label class="mb-0" for="username" style="font-style: italic">Empresa</label>
                            <select name="companies" style="font-style: italic" class="form-control form-control-sm" id="companies" required>
                                <option value="" >- Escoja una opción -</option>
                            </select>
                            <span id="car_companies" class="d-none text-primary" style="font-size:11px;">Cargando Empresas . . .</span>
                        </div>
                    </div>
                    <div class="col-12 mt-4  mb-2">
                        <div class="form-group py-2 px-3">
                            <button type="submit" class="btn btn-block bg-azul text-light" id="btn-ingresar">Ingresar</button>
                            <br>
                            <a href="#" class="mt-3" style="color:#086edc">¿ Olvidaste tu cuenta ?</a>
                        </div>    
                    </div>

                    <div class="col-12 mt-5">
                        <div class="form-group py-2 px-0 ">
                            <div class="row px-0">
                                <div class="col-lg-4 px-0 text-center">
                                    <p><img src="/apps/img/twitter.png" alt="" style="width: 30px; height: 30px;"></p>
                                    <p style="font-size: 13px; font-style: italic; color: #3e3e3e">@GoVistaLab</p>
                                </div>
                                <div class="col-lg-4 px-0 text-center">
                                    <p><img src="/apps/img/insta.png" alt="" style="width: 30px; height: 30px;"></p>
                                    <p style="font-size: 13px; font-style: italic; color: #3e3e3e">@GoVistaLab</p>
                                </div>
                                <div class="col-lg-4 px-0 text-center">
                                    <p><img src="/apps/img/face.png" alt="" style="width: 30px; height: 30px;"></p>
                                    <p style="font-size: 13px; font-style: italic; color: #3e3e3e">/GoVistaLab</p>
                                </div>
                            </div>
                        </div>    
                    </div>

                </form>
            </div>
        </div>
        <!-- <div class="container">
            <div class="row justify-content-center py-4">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="card-header">
                            Acceso al sistema
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-center">
                                    <img src="/apps/img/logo.png" alt="">
                                </div>
                            </div>
                            <form id="form-login" onsubmit="return false">
                                <div class="form-group mb-3">
                                    <label for="username" class="mb-1">Usuario</label>
                                    <input type="text" id="username" name="username" class="form-control form-control-sm" required/>
                                    <small id="err_username" class="d-none text-danger">Debe ingresar un usuario.</small>
                                </div>
                                <div class="form-group mb-2 has-danger">
                                    <label for="password" class="mb-1">Contraseña</label>
                                    <input type="password" id="password" name="password" class="form-control form-control-sm" required />
                                    <small id="err_password" class="d-none text-danger">Debe ingresar una contraseña.</small>
                                </div>
                                <div class="form-group mb-4">
                                    <label for="password" class="mb-1">Empresa</label>
                                    <select name="companies" class="form-control form-control-sm" id="companies" required>
                                        <option value="">- Escoja una opción -</option>
                                    </select>
                                    <small id="err_companies" class="d-none text-danger">Debe seleccionar una empresa.</small>
                                    <span id="car_companies" class="d-none text-primary" style="font-size:11px;">Cargando Empresas . . .</span>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn bg-azul text-light" id="btn-ingresar">Ingresar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>            
            </div>
        </div> -->


        <script src="/apps/node/jquery/dist/jquery.min.js"></script>
        <script src="/apps/node/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/apps/node/popper.js/dist/umd/popper.min.js"></script>
        <script src="/apps/node/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(document).ready(function(){
                $('#btn-ingresar').on('click', function(e) {
                    e.preventDefault();                 
                    autenticar();
                }); 

                $("#form-login :input").on("keyup", function(){
                    $("small").addClass("d-none");
                });

                // $("#username").focusin(function(){
                //     $(this).attr("placeholder", "");
                //     $("label[for=username]").removeClass("d-none")
                // }).focusout(function(){
                //     if($(this).val() == ""){
                //         $(this).attr("placeholder", "Ingrese su usuario");
                //         $("label[for=username]").addClass("d-none");
                //     } 
                // });

                $("#username").blur(function(){
                    if($(this).val().trim()!=""){
                        cargarEmpresas();
                    }                    
                });

                $("#companies").on("change", function(){
                    $("#err_companies").addClass("d-none");
                });
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

            function autenticar(){
                var form = $("#form-login :input");
                if(validarCampos(form)){
                    cargando();
                    var  parametros = {
                        "username" : $("input[name=username]").val(),
                        "password" : $("input[name=password]").val(),
                        "companies" : $("select[name=companies] option:selected").val(),
                        "name_companies" : $("select[name=companies] option:selected").text()
                    };   
                    console.log(parametros);                 
                    var url = '/apps/controller/usuario';
                    var data = {funcion: "autenticar", parametros: parametros};

                    fetch(url, {
                        method: 'POST', // or 'PUT'
                        body: JSON.stringify(data), // data can be `string` or {object}!
                        headers:{
                            'Content-Type': 'application/json'
                        }
                    }).then(res => res.json())
                    .catch(error => {
                        console.log(error);
                        swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
                    })
                    .then(resp => {
                        if(resp["OK"]){ 
                            location.href = resp["homepage"];
                        }else{
                            setTimeout(() => {
                                swal("GoVista", "¡Usuario y/o contraseña incorrectos!", "error");
                            }, 200);                               
                        }
                    });
                }else{
                    $("#div-alerta").removeClass("d-none");
                }
            }

            function validarCampos(form){
                var sw = true;
                form.each(function(){
                    if($(this).attr("required")){
                        var val = $(this).val(); 
                       if( val === "" ){
                            var id=$(this).attr("id");
                            $("#err_"+id).removeClass("d-none");
                            sw = false;
                       }
                    }
                });
                return sw;
            }

            function cargarEmpresas(){
                $("#car_companies").removeClass("d-none");
                var usuario = $("#username").val();
                var parametros = "username="+usuario;
                if(usuario.trim() != ""){
                    var url = '/apps/controller/usuario';
                    var data = {funcion: "userEmpresa", parametros: parametros};

                    fetch(url, {
                        method: 'POST', // or 'PUT'
                        body: JSON.stringify(data), // data can be `string` or {object}!
                        headers:{
                            'Content-Type': 'application/json'
                        }
                    }).then(res => res.json())
                    .catch(error =>  {
                        console.log(error);
                        swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
                    })
                    .then(resp => {
                        var html = "<option value=''>- Escoja una opción -</option>";
                        for(var i=0; i < resp.length; i++){
                            html += "<option value = '"+resp[i].id_empresa+"'>"+resp[i].nombre+"</option>";
                        }
                        $("#companies").html(html);
                        setTimeout(() => {
                            $("#car_companies").addClass("d-none");
                        }, 300);
                    });
                }
            }
        </script>

    </body>
</html>