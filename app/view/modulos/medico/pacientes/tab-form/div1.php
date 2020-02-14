<div class="row">
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Tipo Documento</label>
            <select required class="mat-input" name="tipodoc" id="tipodoc">
                <?php foreach(CONSTANTES['tipo_documento'] as $key=>$value): ?>
                    <option value="<?=($key)?>"><?=($value)?></option>
                <?php endforeach ?>
            </select>
        </div>  
    </div>
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Numero ID</label>
            <input type="number" required class="mat-input" id="numdoc" name="numdoc"/>
        </div>  
    </div>
    <div class="col-lg-6 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Email</label>
            <input type="email" required class="mat-input" id="email" name="email"/>
        </div>  
    </div>
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Primer Nombre</label>
            <input type="text" required class="mat-input" id="name1" name="name1"/>
        </div>  
    </div>
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Segundo nombre</label>
            <input type="text" class="mat-input" id="name2" name="name2"/>
        </div>  
    </div>
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Primer apellido</label>
            <input type="text" required class="mat-input" id="surname1" name="surname1"/>
        </div>  
    </div>
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Segundo apellido</label>
            <input type="text" class="mat-input" id="surname2" name="surname2"/>
        </div>  
    </div>
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Sexo</label>
            <select required class="mat-input" name="sex" id="sex">
                <option value="">- Escoja una opción -</option>
                <option value="M">Masculino</option>
                <option value="F">Femenino</option>
            </select>
        </div>  
    </div>
    <div class="col-lg-3 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Fecha de nacimiento</label>
            <input type="date" class="mat-input" id="birthdate" name="birthdate"/>
        </div>  
    </div>

</div>