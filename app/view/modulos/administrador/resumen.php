<?php include "../../../../config/config.php"; ?>
<?php include "../../../../config/seguridad.php"; ?>
<?php include "../../layouts/administrador/inicio.php";?>
<!-- head -->
<link rel="stylesheet" href="../../node/chartist/chartist.min.css"/>
<script type="text/javascript" src="../../node/chartist/chartist.min.js"></script>
<link rel="stylesheet" href="../../css/resumen_medico.css">
<!-- / head -->
<?php include "../../layouts/administrador/body.php";?>
<!-- Contenedor de la pagina -->
 <!-- Inicio - Fila -->
 <div class="row pl-4 pr-4">
        <!-- Caja 1 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-verde align-middle">
                                <span class="far fa-calendar-alt "></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Empresas Registradas</p>
                                <p id="item1" class="valores-cajas">0</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div>  
        <!-- Caja 2 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-amarillo">
                                <span class="fas fa-user-friends"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Pacientes Registrados</p>
                                <p id="item2" class="valores-cajas">0</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div>  

        <!-- Caja 3 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-rojo">
                                <span class="fas fa-user-friends"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Pacientes Activos</p>
                                <p id="item3" class="valores-cajas">0</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div>  

        <!-- Caja 4 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-azul">
                                <span class="fas fa-user-friends"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Ejercicios Asignados</p>
                                <p id="item4" class="valores-cajas">0</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div>  
        <!-- Caja 5 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-verde">
                                <span class="fa fa-gamepad"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Medicos Registrados</p>
                                <p id="item5" class="valores-cajas">0</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div> 

        <!-- Caja 6 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-amarillo">
                                <span class="fa fa-gamepad"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Medicos Activos</p>
                                <p id="item6" class="valores-cajas">0</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div> 

        <!-- Caja 7 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-rojo">
                                <span class="fa fa-gamepad"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Citas Registradas</p>
                                <p id="item7" class="valores-cajas">0</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div> 

        <!-- Caja 8 -->
        <div class="col-lg-6 col-xl-3 mb-4 pl-1 pr-1">
            <div class="card">
                <div class="card-body pb-0 pt-0 pl-1 pr-1">
                    <div class="row">
                        <div class="col-3 pl-2 pr-0">
                            <span class="iconos-cajas bg-azul">
                                <span class="fa fa-gamepad"></span>
                            </span>
                        </div>
                        <div class="col-9 pl-0 pr-2">
                            <div class="text-right">
                                <p class="titulos-cajas">Citas Activas</p>
                                <p id="item8" class="valores-cajas">0</p>
                            </div>
                        </div>
                    </div>
            
                </div>
            </div>           
        </div> 
    </div>
    <!-- Fin - Fila -->

    <div class="row pl-4 pr-4">
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body pb-4 pt-4 pl-3 pr-3">
                    <p style="color: gray;" class="col-12 text-center">Citas Activas</p>
                    <div id="my-chart" style="width:100%;" ></div>
                </div>
            </div>
        </div>        
        <div class="col-lg-6 mb-4">
            <div class="card">
                <div class="card-body pb-4 pt-4 pl-3 pr-3">
                    <p style="color: gray;" class="col-12 text-center">Graficos estadisticos - Ejercicios</p>
                    <div id="my-chart2" style="width:100%; "></div>
                </div>
            </div>
        </div>
    </div>




<!-- / Contenedor de la pagina -->
<?php include "../../layouts/administrador/footer.php";?>
<!-- scripts -->
    <script>
        cargando();
        $("#li-resumen").addClass("active");   
        cargar();

        function cargar(){
            var url = '/apps/controller/resumen';
            var data = { funcion : "resumen", parametros : { } };
            var miInit = {  method: 'POST', body: JSON.stringify(data), headers:{ 'Content-Type': 'application/json' }};
            fetch(url, miInit).then(res => res.json()).catch(error =>  {
                console.log(error);
                swal("GoVista", "¡Se ha generado un error en el servidor, por favor contacte al administrador!", "error");
            }).then(resp => {
                $("p.valores-cajas").each(function(){
                    var id = $(this).attr("id");
                    $(this).text( resp[id] ?? 0 );
                });
                cargarGraficos(resp);
                setTimeout(() => {  swal.close(); }, 200);    
            });   
        }
 

        function cargando(){
            swal('Cargando, espere un momento por favor ... ',{
                closeOnClickOutside: false,
                buttons: false,
                content: {
                    element: "img",
                    attributes: {
                    title: "cargando",
                    src: "../../img/cargando.gif",
                    style: "width:25px; margin-bottom:20px;"
                    },
                },
            });
        }

        function cargarGraficos(resp){
            var responsiveOptions = [
                ['screen and (min-width: 641px) and (max-width: 1024px)', {
                    showPoint: false,
                    axisX: {
                    labelInterpolationFnc: function(value) {
                        return '' + value;
                    }
                    }
                }],
                ['screen and (max-width: 640px)', {
                    showLine: false,
                    axisX: {
                    labelInterpolationFnc: function(value) {
                        return '' + value;
                    }
                    }
                }]
            ];

            /* Establezca algunas opciones básicas (la configuración anulará la configuración predeterminada en Chartist.js * ver configuración predeterminada *). Estamos agregando una función básica de interpolación de etiquetas para las etiquetas xAxis. */
            var options = {
                axisX: {
                    labelInterpolationFnc: function(value) {
                    return '' + value;
                    }
                },
                height: 300
            };            
        
            /* Agregar una serie de datos básica con seis etiquetas y valores */
            var data = {
            labels: ['Pacientes Registrados', 'Pacientes Activos', 'Citas Registradas', 'Citas Activas'],
            series: [
                {
                data: [ resp["item2"], resp["item3"], resp["item7"], resp["item8"]]
                }
            ]
            };

             /* Inicializar el gráfico con la configuración anterior */
            new Chartist.Line('#my-chart', data, options, responsiveOptions);
 
            
            var data2 = {
                labels: ['Empresas Registradas', 'Medicos Registrados', 'Medicos Activos', 'Ejercicios Asignados'],
                series: [
                    {
                    data: [ resp["item1"], resp["item5"], resp["item6"], resp["item4"] ]
                    }
                ]
            };
            new Chartist.Line('#my-chart2', data2, options, responsiveOptions);
        }
    </script>
<!-- / scripts -->
<?php include "../../layouts/administrador/fin.php";?>
