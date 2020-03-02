<?php
$name_ejer = ['Agudeza visual', 'Agudeza visual', 'Agudeza visual', 'Agudeza visual', 'Agudeza visual', 
'Acomodación', 'Movimientos sacádicos', 'Movimientos sacádicos', 'Movimiento de seguimiento', 
'Memoria Visual', 'Biocular', 'Binocular', '3D'];    

$desc_ejer = [  'Letras en todas las direcciones  y tamaños que el paciente debe adivinar.', 
      'Grupos de letras E en todas las direcciones, tamaños y separaciones el paciente debe enfocar la dirección en que van las 
      patas de la letras, puede ir apareciendo letras  en movimiento una por una o dejarlas  
      sin movimiento escritas por renglones  y cada renglón de tamaño diferente', 
      'Flechas en todas las direcciones  y tamaños que el paciente debe adivinar.', 
      'Juegos en el que el paciente  junte por parejas figuras iguales', 
      'Grupos de  letras  ubicados en filas y columnas  de diferentes tamaños', 
      'Figuras como avisos o carteles  que realicen movimientos de acercamiento y alejamiento.', 
      'Movimientos en sentido horizontal de izquierda  a  derecha  y viceversa, vertical  
      arriba abajo y viceversa, y oblicuos iniciando del centro a la periferia 
      en todas las direcciones y luego de la periferia al centro.', 
      'Movimientos en sentido horizontal de izquierda  a  derecha  y viceversa, 
      vertical  arriba abajo y viceversa, y oblicuos iniciando del centro a la 
      periferia en todas las direcciones y luego de la periferia al centro.', 
      'Movimiento continuo en forma recta, onda  y en todas las direcciones, 
      es decir, en sentido horizontal, vertical y circular', 
      'Recordar combinaciones de figuras con la memoria a corto plazo. 
      Es decir, las figuras imágenes se presentan en un periodo corto de tiempo', 
      'Laberinto que expande a medida que encuentra las figuras. Uso de gafas isométricas.', 
      'Evade obstáculos en la medida que avanzas, movimientos izquierdo derecho, 
      arriba, abajo, uso de gafas isométricas', 
      'Ejercicio 3d con el uso de gafas isométricas. '];

?>

<div class="tab-pane active pb-4 pt-4" id="tab_1">       
    <div class="row">
        <div class="col-12">
            <table class="col-12">
                <thead>
                    <tr style="border-bottom: 3px solid #dea5e8;">
                        <th class="text-center">Nombre Ejercicio</th>
                        <th class="text-center">N° Sesiones</th>
                        <th class="text-center">Tamaño</th>
                        <th class="text-center">Tiempo</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <?php 
                        for($i=0; $i < 13; $i++){
                            echo "<tr class='border border-top-0 border-right-0 border-left-0'>";
                    ?>
                        <td class="px-1 py-3">
                            <div class="form-check">
                                <label class="form-check-label pt-4">
                                    <input tipo="input_exercise" type="checkbox" class="form-check-input mr-2" value="<?=($i)?>" style="width:25px; height:25px;margin-top:-2px;">&nbsp;&nbsp;&nbsp;Ejecicio <?=($i+1)?> 
                                </label>
                                <i style="font-size:12px;">[ <?=($name_ejer[$i])?> ]</i> 
                                <span class="fa fa-eye cl-azul" style="cursor: pointer" onclick="cargarModal(`<?=($name_ejer[$i])?>`, `<?=($desc_ejer[$i])?>`, <?=($i)?>);"></span>
                            </div>
                        </td>
                        <td class="px-1 py-3 text-center">
                            <div class="mat-div is-completed">
                                <label for="first-name" class="mat-label"> . . . </label>
                                <select class="mat-input p-1" disabled  tipo="sel_session" indice="<?=($i)?>">
                                    <?php foreach(CONSTANTES['nosesiones'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('sesion['.$i.']', $nosesiones , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </td>
                        <td class="px-1 py-3 text-center">
                            <div class="mat-div is-completed">
                                <label for="first-name" class="mat-label"> . . . </label>
                                <select class="mat-input p-1" disabled  tipo="sel_size" indice="<?=($i)?>">
                                    <?php foreach(CONSTANTES['visual_acuity'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                                <!-- {{ Form::select('size['.$i.']', $visual_acuity , '', array('class' => 'mat-input')) }} -->
                            </div>
                        </td>
                        <td class="px-1 py-3 text-center">
                            <div class="mat-div is-completed">
                                <label for="first-name" class="mat-label"> . . . </label>
                                <select class="mat-input p-1" disabled  tipo="sel_duration" indice="<?=($i)?>">
                                    <?php foreach(CONSTANTES['nosesiones'] as $key=>$value): ?>
                                        <option value="<?=($key)?>"><?=($value)?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                        </td>
                    <?php
                            echo "</tr>";
                        }
                    ?>
                </tbody>

            </table>
        </div>     
    </div>            
</div>

<script>


function cargarModal(nombre, descripcion, i){
    $("#sp_desc").text(descripcion);
    $("#img_ejer").attr("src", "/apps/juegos/gif/"+(i+1)+".gif");
    $("#sp_name").text(nombre);
    $('#md_ejercicio').modal('show');
}
</script>

<!-- Modal -->
<div class="modal fade" id="md_ejercicio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="sp_name"></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <img src="#" style="width: 100%" id="img_ejer" />

            <p style="text-align: justify; font-size:13px;" class="mt-4"><b>Descripción del juego:&nbsp;</b><span id="sp_desc"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>