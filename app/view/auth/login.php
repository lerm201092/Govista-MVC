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

                <form id="form-login" action="javascript:void(0)" onsubmit="autenticar()">
                    <div class="col-12">
                        <div class="form-group py-2 px-3" >
                            <label class="mb-0" for="username" style="font-style: italic">Usuario</label>
                            <input required type="text" id="usuario" name="usuario" style="font-style: italic" class="form-control  form-control-sm" placeholder="Ingrese su usuario">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group py-2 px-3">
                            <label class="mb-0" for="username" style="font-style: italic">Contraseña</label>
                            <input required type="password" id="password" name="password" style="font-style: italic" class="form-control  form-control-sm" placeholder="Ingrese su contraseña">
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group py-2 px-3">
                            <label class="mb-0" for="username" style="font-style: italic">Empresa</label>
                            <select name="id_empresa" style="font-style: italic" class="form-control form-control-sm" id="id_empresa" required>
                                <option value="" >- Escoja una opción -</option>
                            </select>
                            <span id="id_empresa" class="d-none text-primary" style="font-size:11px;">Cargando Empresas . . .</span>
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

                    <input type="hidden" name="empresa" value="" />
                </form>
            </div>

        <script src="/apps/node/jquery/dist/jquery.min.js"></script>
        <script src="/apps/node/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/apps/node/popper.js/dist/umd/popper.min.js"></script>
        <script src="/apps/node/sweetalert/dist/sweetalert.min.js"></script>

        <script>
            $(document).ready(function(){
                $("#form-login :input").on("keyup", function(){
                    $("small").addClass("d-none");
                });

                $("#usuario").blur(function(){
                    if($(this).val().trim()!=""){
                        usuario_empresa();
                    }                    
                });

                $("select[id=id_empresa]").on("change", function(){
                    var empresa = $(this).children("option:selected").text();
                    $("input[name=empresa]").val( empresa );
                    $("#err_companies").addClass("d-none");
                });
            });

            function autenticar(){
                var parametros = $("#form-login").serializeArray();
                var url = '/apps/controller/usuario';
                var data = { funcion : "autenticar",  parametros : { parametros }  };
                var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
                fetch(url, miInit).then(res => res.json()).catch(error =>  {
                    console.log(error);
                    swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
                }).then(resp => {
                    if(resp["OK"]){ 
                        // console.log(resp["homepage"]);
                        location.href = resp["homepage"];
                    }else{
                        setTimeout(() => { swal("GoVista", "¡Usuario y/o contraseña incorrectos!", "error");  }, 200 );   
                    }                                                       
                });
            }

            function usuario_empresa(){
                $("span[id=id_empresa]").removeClass("d-none");
                var usuario =  $("#usuario").val();                
                if(usuario.trim() != ""){
                    var parametros = { "usuario" : usuario }
                    var url = '/apps/controller/usuario';
                    var data = { funcion : "usuario_empresa", parametros : { 'usuario' : usuario } };
                    var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
                    fetch(url, miInit).then(res => res.json()).catch(error =>  {
                        console.log(error);
                        swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
                    }).then(resp => {
                        var html = "<option value=''>- Escoja una opción -</option>";
                        for(var i=0; i < resp.length; i++){
                            html += "<option value = '"+resp[i].id_empresa+"'>"+resp[i].empresa+"</option>";
                        }
                        $("select[id=id_empresa]").html(html);
                        setTimeout(() => {
                            $("span[id=id_empresa]").addClass("d-none");
                        }, 300);
                    });
                }
            }

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
        </script>

    </body>
</html>