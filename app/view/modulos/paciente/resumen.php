<?php include "../../../../config/config.php"; ?>
<?php include "../../../../config/seguridad.php"; ?>
<?php include "../../layouts/paciente/inicio.php";?>
<!-- head -->
<link rel="stylesheet" href="../../node/chartist/chartist.min.css"/>
<script type="text/javascript" src="../../node/chartist/chartist.min.js"></script>
<link rel="stylesheet" href="../../css/resumen_medico.css">
<!-- / head -->
<?php include "../../layouts/paciente/body.php";?>
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
                                <p class="titulos-cajas">Citas Activas</p>
                                <p id="citasActivas" class="valores-cajas">0</p>
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
                                <p class="titulos-cajas">Citas Realizadas</p>
                                <p id="citasRealizadas" class="valores-cajas">0</p>
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
                                <p class="titulos-cajas">Citas Inactivas</p>
                                <p id="citasInactivas" class="valores-cajas">0</p>
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
                                <p class="titulos-cajas">Total Citas</p>
                                <p id="totalCitas" class="valores-cajas">0</p>
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
                                <p class="titulos-cajas">Ejercicios Asignados</p>
                                <p id="totalEjercicios" class="valores-cajas">0</p>
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
                                <p class="titulos-cajas">Ejercicios Activos</p>
                                <p id="ejerciciosActivos" class="valores-cajas">0</p>
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
                                <p class="titulos-cajas">Ejercicios Incumplidos</p>
                                <p id="ejerciciosIncumplidos" class="valores-cajas">0</p>
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
                                <p class="titulos-cajas">Ejercicios Realizados</p>
                                <p id="ejerciciosRealizados" class="valores-cajas">0</p>
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
                    <p style="color: gray;" class="col-12 text-center">Graficos estadisticos - Pacientes-Citas</p>
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
<?php include "../../layouts/paciente/footer.php";?>
<!-- scripts -->
    <script>
        cargando();
        $("#li-resumen").addClass("active");   
        
        var url = '/apps/controller/resumen';
        var data = {funcion: "resumen_medico", parametros: ""};

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
            $("#citasActivas").text(resp["citasActivas"]);
            $("#citasRealizadas").text(resp["citasRealizadas"]);
            $("#citasInactivas").text(resp["CitasRealizadas"]);
            $("#totalCitas").text(resp["totalCitas"]);

            $("#totalEjercicios").text(resp["totalEjercicios"]);
            $("#ejerciciosActivos").text(resp["ejerciciosActivos"]);
            $("#ejerciciosIncumplidos").text(resp["ejerciciosIncumplidos"]);
            $("#ejerciciosRealizados").text(resp["ejerciciosRealizados"]);
            cargarGraficos(resp);

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
            labels: [' Total Citas', 'Citas activas', 'Citas inactivas', 'Citas realizadas'],
            series: [
                {
                data: [ resp["totalCitas"], resp["citasActivas"], resp["citasInactivas"], resp["citasRealizadas"]]
                }
            ]
            };

             /* Inicializar el gráfico con la configuración anterior */
            new Chartist.Line('#my-chart', data, options, responsiveOptions);
 
            
            var data2 = {
                labels: [' Ejercicios Asignados', 'Ejercicios activos', 'Ejercicios incumplidos', 'Ejercicios realizados'],
                series: [
                    {
                    data: [ resp["totalEjercicios"], resp["ejerciciosActivos"], resp["ejerciciosIncumplidos"], resp["ejerciciosRealizados"] ]
                    }
                ]
            };
            new Chartist.Line('#my-chart2', data2, options, responsiveOptions);
        }
    </script>
<!-- / scripts -->
<?php include "../../layouts/paciente/fin.php";?>
