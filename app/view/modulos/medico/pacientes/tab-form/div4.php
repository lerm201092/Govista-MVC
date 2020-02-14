<div class="row">
    <div class="col-lg-6 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Nombres</label>
            <input type="text" class="mat-input" id="contact_names" name="contact_names"/>
        </div>  
    </div>
    <div class="col-lg-6 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Apellidos</label>
            <input type="text" class="mat-input" id="contact_surnames" name="contact_surnames"/>
        </div>  
    </div>
    <div class="col-lg-4 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Departamento</label>
            <select class="mat-input" name="" id="contact_dpto" onchange="cargar_munic('contact_dpto', 'contact_city')">
            </select>
        </div>  
    </div>
    <div class="col-lg-4 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Ciudad</label>
            <select class="mat-input" name="contact_city" id="contact_city">
                <option value=''>- Escoja una opción -</option>
            </select>
        </div>  
    </div>
    <div class="col-lg-4 my-3">
        <div class="mat-div is-completed">
            <label for="first-name" class="mat-label" style="float:left;">Telefono</label>
            <input type="text" class="mat-input" id="contact_phone" name="contact_phone"/>
        </div>  
    </div>
</div>