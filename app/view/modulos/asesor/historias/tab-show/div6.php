<div class="tab-pane active pb-4 pt-0" id="tab_1">       
       <!-- RETINOSCOPIA  -->
       <div class="border m-0 pb-4 mt-4">   
        <p class="col-12 titulo-row p-2 cl-morado-light font-weight-bold mb-0">CAUSA EXTERNA<span onclick="$('#div_fil_2').toggle(); icono($(this));" class="fas fa-folder-minus" style="float: right; position: relative; right: 20px; top:5px;"></span></p>     
        <div id="div_fil_2" style="width:95%; margin:0 auto">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Diagnostico Principal</label>
                        <select name="diag_principal" class="mat-input">
                            <option value=""></option>
                            <?php foreach(CONSTANTES['rips'] as $key=>$value): ?>
                                <?php if($key) : ?>
                                    <option value="<?=($key)?>">[ <?=($key)?> ] - <?=($value)?></option>
                                <?php endif; ?>                               
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Diagnostico Relacional 1</label>
                        <select name="diag_rel_1" class="mat-input">
                            <option value=""></option>
                            <?php foreach(CONSTANTES['rips'] as $key=>$value): ?>
                                <?php if($key) : ?>
                                    <option value="<?=($key)?>">[ <?=($key)?> ] - <?=($value)?></option>
                                <?php endif; ?>                               
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-12 mb-4">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Diagnostico Relacional 2</label>
                        <select name="diag_rel_2" class="mat-input">
                            <option value=""></option>
                            <?php foreach(CONSTANTES['rips'] as $key=>$value): ?>
                                <?php if($key) : ?>
                                    <option value="<?=($key)?>">[ <?=($key)?> ] - <?=($value)?></option>
                                <?php endif; ?>                               
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-12 mb-4 is-completed">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Diagnostico Relacional 3</label>
                        <select name="diag_rel_3" class="mat-input">
                            <option value=""></option>
                            <?php foreach(CONSTANTES['rips'] as $key=>$value): ?>
                                <?php if($key) : ?>
                                    <option value="<?=($key)?>">[ <?=($key)?> ] - <?=($value)?></option>
                                <?php endif; ?>                               
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>

                <div class="col-12 mb-4 is-completed">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Complicación</label>
                        <input type="text" class="mat-input" name="diag_compli" />
                        <!-- {!! Form::text('diag_compli', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>

                <div class="col-12 mb-4 is-completed">
                    <div class="mat-div is-completed">
                        <label for="first-name" class="mat-label">Finalidad de consulta</label>
                        <input type="text" class="mat-input" name="diag_finconsul" />
                        <!-- {!! Form::text('diag_finconsul', null, array('class' => 'mat-input')) !!} -->
                    </div>
                </div>
            </div>             
        </div>        
    </div>     
</div>