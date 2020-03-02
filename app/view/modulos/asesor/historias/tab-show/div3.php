<div class="tab-pane active pb-4 pt-4" id="tab_1"> 
    <!-- LENSOMETRIA -->
    <div class="row border m-0 pb-4 mb-4">
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold">LENSOMETRIA<span onclick="$('#div_fil_1').toggle(); icono($(this))" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>
        <div id="div_fil_1" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row p-0">   
                <div class="col-lg-3">
                    <div class="mat-div my-2 is-completed">
                    <label for="first-name" class="mat-label">Tipo de lentes</label>
                    <input type="text" class="mat-input" name="av_tiplen"/>
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="mat-div my-2  is-completed">
                    <label for="first-name" class="mat-label">Color</label>
                    <input type="text" class="mat-input" name="av_color"/>
                    </div>
                </div>   
                <div class="col-lg-3">
                    <div class="mat-div my-2  is-completed">
                    <label for="first-name" class="mat-label">Filtro</label>
                    <input type="text" class="mat-input" name="av_filtro"/>
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="mat-div my-2 is-completed">
                    <label for="first-name" class="mat-label">Uso de lentes</label>
                    <input type="text" class="mat-input" name="av_usolen"/>
                    </div>
                </div>   
            </div>
        </div>
    </div>

    <!-- LENSOMETRIA -->    
    <div class="border m-0 pb-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">AGUDEZA VISUAL<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESFERA<br>(DIOPTRIAS)</p>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="av_esfera_oi"/>
                    </div>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="av_esfera_od"/>
                    </div>
                </div>   

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">CILINDRO<br>&nbsp;</p>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input  text-center" name="av_cilindro_oi"/>
                    </div>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="av_cilindro_od"/>
                    </div>
                </div> 

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE<br>&nbsp;</p>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="av_eje_oi"/>
                    </div>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="av_eje_od"/>
                    </div>
                </div>   

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PRISMA<br>&nbsp;</p>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                         <input type="number" class="mat-input text-center" name="av_prisma_oi"/>
                    </div>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="av_prisma_od"/>
                    </div>
                </div>  

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">BASE<br>&nbsp;</p>
                    <div class="mat-div my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input  text-center" name="av_base_oi"/>
                    </div>
                    <div class="mat-div my-2 my-2 mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="av_base_od"/>
                    </div>
                </div> 
            </div>
            <!-- / FILA 1 -->

            <!-- FILA 2 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AGUDEZA VISUAL DE CERCA</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div my-2 mx-1 my-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_avc_cc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 my-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_avc_cc_od"/>
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div my-2 mx- is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input  text-center" name="av_avc_sc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_avc_sc_od"/>
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AGUDEZA VISUAL DE LEJOS</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_avl_cc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_avl_cc_od"/>
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_avl_sc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_avl_sc_od"/>
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AV PH</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">&nbsp;</p>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_avl_sc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_avl_sc_od"/>
                            </div>
                        </div>
                    </div>  
                </div>  
            </div>
            <!-- / FILA 2 -->

            <!-- FILA 3 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESTADO FORICO HABITUAL</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_estforhab_cc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_estforhab_cc_od"/>
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_estforhab_sc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_estforhab_sc_od"/>
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESTADO FORICO HABITUAL LEJOS</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_estforhab_lej_cc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_estforhab_lej_cc_od"/>
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_estforhab_lej_sc_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_estforhab_lej_sc_od"/>
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">&nbsp;</p>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">OJO DOMINANTE</label>
                                <input type="text" class="mat-input text-center" name="av_ojodom"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">MANO DOMINANTE</label>
                                <input type="text" class="mat-input text-center" name="av_manodom"/>
                            </div>
                        </div>
                    </div>  
                </div>  
            </div>
            <!-- / FILA 3 -->

            <!-- FILA 4 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-6 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ANGULO KAPPA</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="text" class="mat-input text-center" name="av_angkap_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="text" class="mat-input text-center" name="av_angkap_od"/>
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-6 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PUNTO PROXIMO DE CONVERGENCIA (PPC)</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">OR</label>
                                <input type="number" class="mat-input  text-center" name="av_ppc_or"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">SF</label>
                                <input type="number" class="mat-input  text-center" name="av_ppc_sf"/>
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
            <!-- / FILA 4 -->

            <!-- FILA 5 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">FIJACIÓN<br>&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="number" class="mat-input text-center" name="av_fija_oi"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="number" class="mat-input  text-center" name="av_fija_od"/>
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">COVER TEST<br>&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Lejos</label>
                                <input type="number" class="mat-input text-center" name="av_ctest_lej"/>
                            </div>
                            <div class="mat-div my-2 mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Cerca</label>
                                <input type="number" class="mat-input text-center" name="av_ctest_cer"/>
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">DISTANCIA INTERPUPILAR<br>(MILIMETROS)</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <div class="mat-div my-2 mx-1">
                                <label for="first-name" class="mat-label text-center">&nbsp;</label>
                                <input type="number" class="mat-input text-center" name="av_distint"/>
                            </div>
                        </div>
                    </div>                  
                </div>  
            </div>
            <!-- / FILA 5 -->

            <!-- FILA 6 -->
            <div class="row border p-0 pb-4 mt-4">           
                <div class="col-lg-12 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">OBSERVACIONES</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <div class="mat-div my-2 is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Detalle de observación</label>
                                <input type="text" class="mat-input text-center" name="av_obser"/>
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
            <!-- / FILA 6 -->
        </div>          
    </div>
</div>