<div class="row">
    <div class="col-lg-6 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Dirección</label>
            <input type="text" class="mat-input" id="address" name="address"/>
        </div>  
    </div>
    <div class="col-lg-6 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Teléfono</label>
            <input type="text" class="mat-input" id="phone" name="phone"/>
        </div>  
    </div>
    <div class="col-lg-4 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Departamento</label>
            <select class="mat-input" name="" id="dpto" onchange="cargar_munic('dpto', 'id_area')">
            </select>
        </div>  
    </div>
    <div class="col-lg-4 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Ciudad</label>
            <select class="mat-input" name="id_area" id="id_area">
                <option value=''>- Escoja una opción -</option>
            </select>
        </div>  
    </div>
    <div class="col-lg-4 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Zona</label>
            <select class="mat-input" name="zone" id="zone">
                <?php foreach(CONSTANTES['zona'] as $key=>$value): ?>
                        <option value="<?=($key)?>"><?=($value)?></option>
                <?php endforeach ?>
            </select>
        </div>  
    </div>
</div>