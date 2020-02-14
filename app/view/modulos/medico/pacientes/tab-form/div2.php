<div class="row">
    <div class="col-lg-9 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Entidad promotora de salud</label>
            <select class="mat-input" name="id_eps" id="id_eps">
                <?php foreach(CONSTANTES['tipo_documento'] as $key=>$value): ?>
                    <option value="<?=($key)?>"><?=($value)?></option>
                <?php endforeach ?>
            </select>
        </div>  
    </div>
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Estado</label>
            <select required class="mat-input" name="state" id="state">
                <?php foreach(CONSTANTES['estado'] as $key=>$value): ?>
                    <option value="<?=($key)?>"><?=($value)?></option>
                <?php endforeach ?>
            </select>
        </div>  
    </div>
</div>