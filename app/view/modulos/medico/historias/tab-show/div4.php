<div class="tab-pane active pb-4 pt-4" id="tab_1"> 
    <div class="border m-0 pb-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">OFTALMOMETRIA<span onclick="$('#div_fil_oft').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_oft" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">MERIDIANO 1</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input text-center" name="fo_ofmeri1_oi" />
                        <!-- {!! Form::number('fo_ofmeri1_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="fo_ofmeri1_od" />
                        <!-- {!! Form::number('fo_ofmeri1_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">MERIDIANO 2</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input text-center" name="fo_ofmeri2_oi" />
                        <!-- {!! Form::number('fo_ofmeri2_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="fo_ofmeri2_od" />
                        <!-- {!! Form::number('fo_ofmeri2_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="fo_ofeje_oi"/>
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_ofeje_od"/>
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">OBSERVACIONES</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="fo_ofobser_oi" />
                        <!-- {!! Form::text('fo_ofobser_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_ofobser_od" />
                        <!-- {!! Form::text('fo_ofobser_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>
            </div>
             <!-- / FILA 1 -->           
        </div>
    </div>   

    <!-- RETINOSCOPIA  -->
    <div class="border m-0 pb-4 mt-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">RETINOSCOPIA<span onclick="$('#div_fil_ret').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_ret" style="width:95%; margin:0 auto">
            <div class="col-12 mat-div mx-2 is-completed">
                <label for="first-name" class="mat-label">Tecnica Usada</label>
                <input type="text" class="mat-input" name="fo_rettecusa" />
                <!-- {!! Form::text('fo_rettecusa', null, array('class' => 'mat-input')) !!} -->
            </div>
            <!-- FILA 1 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESFERA</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="fo_retesf_oi"/>
                        <!-- {{ Form::select('fo_retesf_oi', $esfera_cilindro , '', array('class' => 'mat-input')) }} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_retesf_od"/>
                        <!-- {{ Form::select('fo_retesf_od', $esfera_cilindro , '', array('class' => 'mat-input')) }} -->
                    </div>
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">CILINDRO</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="fo_retcil_oi"/>
                        <!-- {{ Form::select('fo_retcil_oi', $esfera_cilindro , '', array('class' => 'mat-input')) }} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_retcil_od"/>
                        <!-- {{ Form::select('fo_retcil_od', $esfera_cilindro , '', array('class' => 'mat-input')) }} -->
                    </div>
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="fo_reteje_oi"/>
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_reteje_od"/>
                    </div>
                </div>

                <div class="col-lg-2 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">COMPENSADA</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input" name="fo_retcomp_oi" />
                        <!-- {!! Form::text('fo_retcomp_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input" name="fo_retcomp_od" />
                        <!-- {!! Form::text('fo_retcomp_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>

                <div class="col-lg-4 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">OBSERVACIONES</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input" name="fo_retobserv_oi" />
                        <!-- {!! Form::text('fo_retobserv_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_retobserv_od" />
                        <!-- {!! Form::text('fo_retobserv_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>
            </div>
             <!-- / FILA 1 -->           
        </div>        
    </div>   

      <!-- TIPO SUBJETIVO  -->
    <div class="border m-0 pb-4 mt-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">TIPO SUBJETIVO<span onclick="$('#div_fil_tpsub').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_tpsub" style="width:95%; margin:0 auto">
            <!-- FILA 1 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ESFERA</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="fo_tsubesf_oi"/>
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_tsubesf_od" />
                        <!-- {{ Form::select('fo_tsubesf_od', $esfera_cilindro , '', array('class' => 'mat-input')) }} -->
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">CILINDRO</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="fo_tsubesf_oi" />
                        <!-- {{ Form::select('fo_tsubcil_oi', $esfera_cilindro , '', array('class' => 'mat-input')) }} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_tsubcil_od" />
                        <!-- {{ Form::select('fo_tsubcil_od', $esfera_cilindro , '', array('class' => 'mat-input')) }} -->
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">EJE</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="text" class="mat-input text-center" name="fo_tsubcil_oi" />
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="text" class="mat-input text-center" name="fo_tsubeje_od" />
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">PRISMA</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubpris_oi" />
                        <!-- {!! Form::number('fo_tsubpris_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubpris_od" />
                        <!-- {!! Form::number('fo_tsubpris_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>
            </div>
            <!-- / FILA 1 -->           

            <!-- FILA 2 -->
            <div class="row border p-0 pb-4 mt-4">             
                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">BASE</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubbase_oi" />
                        <!-- {!! Form::number('fo_tsubbase_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubbase_od" />
                        <!-- {!! Form::number('fo_tsubbase_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">ADD</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubadd_oi"/>
                        <!-- {!! Form::number('fo_tsubadd_oi', null, array('class' => 'mat-input')) !!} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubadd_od"/>
                        <!-- {!! Form::number('fo_tsubadd_od', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AVCC VL</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubavc_vl_oi"/>
                        <!-- {{ Form::select('fo_tsubavc_vl_oi', $sc , '', array('class' => 'mat-input')) }} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubavc_vl_od"/>
                        <!-- {{ Form::select('fo_tsubavc_vl_od', $sc , '', array('class' => 'mat-input')) }} -->
                    </div>
                </div>

                <div class="col-lg-3 m-0 p-0">
                    <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold text-center m-0">AVCC VP</p>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Izquierdo</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubavc_vp_oi"/>
                        <!-- {{ Form::select('fo_tsubavc_vp_oi', $cc , '', array('class' => 'mat-input')) }} -->
                    </div>
                    <div class="mat-div mx-2 is-completed">
                        <label for="first-name" class="mat-label text-center">Ojo Derecho</label>
                        <input type="number" class="mat-input text-center" name="fo_tsubavc_vp_od"/>
                        <!-- {{ Form::select('fo_tsubavc_vp_od', $cc , '', array('class' => 'mat-input')) }} -->
                    </div>
                </div>
            </div>
             <!-- / FILA 2 -->   
        </div>        
    </div> 
</div>