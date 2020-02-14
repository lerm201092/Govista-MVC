<div class="tab-pane active pb-4 pt-4" id="tab_1"> 
    <!-- LENSOMETRIA -->
    <div class="row border m-0 pb-4 mb-4">
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold">LENSOMETRIA<span onclick="$('#div_fil_1').toggle(); icono($(this))" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>
        <div id="div_fil_1" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row p-0">   
                <div class="col-lg-3">
                    <div class="mat-div is-completed">
                    <label for="first-name" class="mat-label">Tipo de lentes</label>
                    <input type="text" class="mat-input" name="av_tiplen"/>
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="mat-div  is-completed">
                    <label for="first-name" class="mat-label">Color</label>
                    <input type="text" class="mat-input" name="av_color"/>
                    </div>
                </div>   
                <div class="col-lg-3">
                    <div class="mat-div  is-completed">
                    <label for="first-name" class="mat-label">Filtro</label>
                    <input type="text" class="mat-input" name="av_filtro"/>
                    </div>
                </div>     
                <div class="col-lg-3">
                    <div class="mat-div is-completed">
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
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <select class="mat-input p-1" name="av_esfera_oi" id="av_esfera_oi">
                            <?php foreach(CONSTANTES['esfera_cilindro'] as $key=>$value): ?>
                                <option value="<?=($key)?>"><?=($value)?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <select class="mat-input p-1" name="av_esfera_od" id="av_esfera_od">
                            <?php foreach(CONSTANTES['esfera_cilindro'] as $key=>$value): ?>
                                <option value="<?=($key)?>"><?=($value)?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>   

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">CILINDRO<br>&nbsp;</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <select class="mat-input p-1" name="av_cilindro_oi" id="av_cilindro_oi">
                            <?php foreach(CONSTANTES['esfera_cilindro'] as $key=>$value): ?>
                                <option value="<?=($key)?>"><?=($value)?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <select class="mat-input p-1" name="av_cilindro_od" id="av_cilindro_od">
                            <?php foreach(CONSTANTES['esfera_cilindro'] as $key=>$value): ?>
                                <option value="<?=($key)?>"><?=($value)?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div> 

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE<br>&nbsp;</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <select class="mat-input p-1" name="av_eje_oi">
                            <?php foreach(CONSTANTES['eje'] as $key=>$value): ?>
                            <option value="<?=($key)?>"><?=($value)?><?php if($value): ?>&#176;<?php endif; ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <select class="mat-input p-1" name="av_eje_od">
                            <?php foreach(CONSTANTES['eje'] as $key=>$value): ?>
                            <option value="<?=($key)?>"><?=($value)?><?php if($value): ?>&#176;<?php endif; ?> </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>   

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PRISMA<br>&nbsp;</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                         <input type="number" class="mat-input" name="av_prisma_oi"/>
                        <!-- {!! Form::number('av_prisma_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input" name="av_prisma_od"/>
                        <!-- {!! Form::number('av_prisma_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>  

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">BASE<br>&nbsp;</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input" name="av_base_oi"/>
                        <!-- {!! Form::number('av_base_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input" name="av_base_od"/>
                        <!-- {!! Form::number('av_base_od', null, array('class' => 'mat-input')) !!} -->
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
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_avc_cc_oi">
                                    <?php foreach(CONSTANTES['cc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avc_cc_oi', $cc , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_avc_cc_od">
                                    <?php foreach(CONSTANTES['cc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avc_cc_od', $cc , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div mx- is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_avc_sc_oi">
                                    <?php foreach(CONSTANTES['sc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avc_sc_oi', $sc , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_avc_sc_od">
                                    <?php foreach(CONSTANTES['sc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avc_sc_od', $sc , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AGUDEZA VISUAL DE LEJOS</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_avl_cc_oi">
                                    <?php foreach(CONSTANTES['cc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avl_cc_oi', $cc , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_avl_cc_od">
                                    <?php foreach(CONSTANTES['cc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avl_cc_od', $cc , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_avl_sc_oi">
                                    <?php foreach(CONSTANTES['sc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avl_sc_oi', $sc , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_avl_sc_od">
                                    <?php foreach(CONSTANTES['sc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avl_sc_od', $sc , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AV PH</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">&nbsp;</p>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_avph_oi">
                                    <?php foreach(CONSTANTES['sc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avph_oi', $sc , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_avph_od">
                                    <?php foreach(CONSTANTES['sc'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_avph_od', $sc , '', array('class' => 'mat-input')) }} -->
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
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_estforhab_cc_oi">
                                    <?php foreach(CONSTANTES['ho'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_estforhab_cc_oi', $ho , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_estforhab_cc_od">
                                    <?php foreach(CONSTANTES['ho'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_estforhab_cc_od', $ho , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_estforhab_sc_oi">
                                    <?php foreach(CONSTANTES['ho'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_estforhab_sc_oi', $ho , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_estforhab_sc_od">
                                    <?php foreach(CONSTANTES['ho'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_estforhab_sc_od', $ho , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-5 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESTADO FORICO HABITUAL LEJOS</p>
                    <div class="row">                        
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">CC</p>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_estforhab_lej_cc_oi">
                                    <?php foreach(CONSTANTES['ho'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_estforhab_lej_cc_oi', $ho , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_estforhab_lej_cc_od">
                                    <?php foreach(CONSTANTES['ho'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_estforhab_lej_cc_od', $ho , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                        <div class="col-6 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">SC</p>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_estforhab_lej_sc_oi">
                                    <?php foreach(CONSTANTES['ho'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_estforhab_lej_sc_oi', $ho , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_estforhab_lej_sc_od">
                                    <?php foreach(CONSTANTES['ho'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_estforhab_lej_sc_od', $ho , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <p class="col-12 text-center font-weight-bold mb-0 mt-3">&nbsp;</p>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">OJO DOMINANTE</label>
                                <select class="mat-input p-1" name="av_ojodom">
                                    <?php foreach(CONSTANTES['ojoDominante'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_ojodom', $ojoDominante , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">MANO DOMINANTE</label>
                                <select class="mat-input p-1" name="av_manodom">
                                    <?php foreach(CONSTANTES['ojoDominante'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_manodom', $ojoDominante , '', array('class' => 'mat-input')) }} -->
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
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <select class="mat-input p-1" name="av_angkap_oi">
                                    <?php foreach(CONSTANTES['anguloKappa'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_angkap_oi', $anguloKappa , '', array('class' => 'mat-input')) }} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <select class="mat-input p-1" name="av_angkap_od">
                                    <?php foreach(CONSTANTES['anguloKappa'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('av_angkap_od', $anguloKappa , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-6 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PUNTO PROXIMO DE CONVERGENCIA (PPC)</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">OR</label>
                                <input type="number" class="mat-input" name="av_ppc_or"/>
                                <!-- {!! Form::number('av_ppc_or', null, array('class' => 'mat-input')) !!} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">SF</label>
                                <input type="number" class="mat-input" name="av_ppc_sf"/>
                                <!-- {!! Form::number('av_ppc_sf', null, array('class' => 'mat-input')) !!} -->
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
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                                <input type="number" class="mat-input" name="av_fija_oi"/>
                                <!-- {!! Form::number('av_fija_oi', null, array('class' => 'mat-input')) !!} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                                <input type="number" class="mat-input" name="av_fija_od"/>
                                <!-- {!! Form::number('av_fija_od', null, array('class' => 'mat-input')) !!} -->
                            </div>
                        </div>
                    </div>                  
                </div>   

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">COVER TEST<br>&nbsp;</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Lejos</label>
                                <input type="number" class="mat-input" name="av_ctest_lej"/>
                                <!-- {!! Form::number('av_ctest_lej', null, array('class' => 'mat-input')) !!} -->
                            </div>
                            <div class="mat-div mx-1 is-completed">
                                <label for="first-name" class="mat-label text-center">Cerca</label>
                                <input type="number" class="mat-input" name="av_ctest_cer"/>
                                <!-- {!! Form::number('av_ctest_cer', null, array('class' => 'mat-input')) !!} -->
                            </div>
                        </div>
                    </div>                  
                </div>

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">DISTANCIA INTERPUPILAR<br>(MILIMETROS)</p>
                    <div class="row">                        
                        <div class="col-12 p-1">
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div mx-1 {!! $errors->first('av_distint', 'error-camp is-completed') !!}">
                                <label for="first-name" class="mat-label text-center">&nbsp;</label>
                                <input type="number" class="mat-input" name="av_distint"/>
                                <!-- {!! Form::number('av_distint', null, array('class' => 'mat-input')) !!} -->
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
                            <!-- <p class="col-12 text-center font-weight-bold mb-0 mt-3"></p> -->
                            <div class="mat-div is-completed mx-1">
                                <label for="first-name" class="mat-label text-center">Detalle de observación</label>
                                <input type="text" class="mat-input" name="av_obser"/>
                                <!-- {!! Form::text('av_obser', null, array('class' => 'mat-input')) !!} -->
                            </div>
                        </div>
                    </div>                  
                </div>
            </div>
            <!-- / FILA 6 -->
        </div>          
    </div>
</div>