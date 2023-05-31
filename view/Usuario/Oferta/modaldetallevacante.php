<?php

foreach($vacantes as $vac) {
?>
      <div class="modal-body">  
      </div>

     <div class="col-md-12">
        <!--<img class="logousu" src="images/logogersazul.png">imagen en el panel de ver detalle-->
      </div>

      <div class="row justify-content-start" size >
        <div   id="desc" class="col-md-12">
            <label class="titulos_negrita">Descripción</label><br>
           <textarea style="overflow-y: scroll;" class=" form-control oferta" readonly cols="30" rows="10"><?= $vac['vac_descripcion']?></textarea>
           <div   id="desc" class="col-md-12">
            <label class="titulos_negrita">Funciones Generales</label><br>
           <textarea style="overflow-y: scroll;" class="form-control oferta" readonly cols="30" rows="10"><?= $vac['vac_funciones_generales']?></textarea>
        </div>
        <div   id="desc" class="col-md-12">
            <label class="titulos_negrita">Funciones Especificas</label><br>
           <textarea style="overflow-y: scroll;" class="form-control oferta" readonly cols="30" rows="10"><?= $vac['vac_funciones_especificas']?></textarea>
        </div>
          </div>
    </div> 
<?php  
 }
              
?>

