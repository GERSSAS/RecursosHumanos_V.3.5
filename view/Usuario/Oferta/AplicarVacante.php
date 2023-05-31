<?php 
if($_SESSION['rolId']==2){
?>
<div class="eo #contenedor_arriba x_content">
    <form id="aplicarvacante" method="POST" enctype="multipart/form-data"
        action="<?php echo getUrl("Usuario", "Ofertas","postinsert");  ?>">
        <div class="contenedor_de_datos x_panel">
            <div class="x_title text-center">
                <h3 style="font-weight:bolder;">Vacante<br></h3>
                <?php
foreach ($vacantes as $vac) {
    echo "<h3><b>".$vac['vac_nombre']."</b></h3>";
?>
                <?php
foreach ($usuario as $usu) {
?>
            </div>
            <div class="row justify-content-start" id="nombres">

                <div class="col-md-6">
                    <label class="titulos_negrita">Nombre</label>
                    <input type="tex" style="text-transform:uppercase;" placeholder="" class="estiloinput form-control oferta" readonly
                        value="<?php echo $usu['usu_nombre']?>">
                </div>

                <div class="col-md-6">
                    <label class="titulos_negrita">Apellido</label>
                    <input type="text" style="text-transform:uppercase;" placeholder="" class="estiloinput form-control oferta" readonly
                        value="<?php echo $usu['usu_apellido']?>">
                </div>
                <br>
                <div class="col-md-6">
                    <label class="titulos_negrita">Correo</label>
                    <input type="Email" placeholder="" class="estiloinput form-control oferta" readonly
                        value="<?php echo $usu['usu_correo']?>">
                </div>
<br>
                <div class="col-md-6">
                    <label class="titulos_negrita">Teléfono/Preferido</label>
                    <label type="number" placeholder="" class="estiloinput form-control oferta"
                        readonly><?php echo $usu['usu_telefono']?>
                </div>
<br>

                <div class="col-md-6">
                    <label class="titulos_negrita">Ciudad Residencia</label>
                    <input type="text" placeholder="" class="estiloinput form-control oferta" readonly
                        value="<?php echo $usu['usu_residencia']?>">
                </div>
<br>
                <div class="col-md-6">
                    <label class="titulos_negrita">Tipo Documento</label>
                    <input type="text" placeholder="" class="estiloinput form-control oferta" readonly
                        value="<?php echo $usu['usu_tipo_documento']?>">
                </div>
<br>
                <div class="col-md-6">
                    <label class="titulos_negrita">Documento</label>
                    <input type="text" placeholder="" class="estiloinput form-control oferta" readonly
                        value="<?php echo $usu['usu_documento']?>">
                </div>
                <br>
                <div class="col-md-6">
                    <label class="titulos_negrita">País Residencia</label>
                    <input readonly value="<?php echo $usu['usu_pais_residencia']?>" type="text"
                        class="estiloinput form-control oferta">
                </div>
                <br>
                <div class="col-md-6">
                    <label class="titulos_negrita">Lugar de Residencia</label>
                    <input type="text" readonly value="<?php echo $usu['usu_residencia']?>"
                        class="estiloinput form-control oferta">
                </div>
                <br>
                <div class="col-md-6">
                    <label class="titulos_negrita">Dirección de Residencia</label>
                    <input type="text" readonly value="<?php echo $usu['usu_direccion']?>"
                        class="estiloinput form-control oferta">
                </div>
                

                <?php if($usu['usu_hojadevida']=="" or $usu['usu_hojadevida']=="../web/hojas/" or $usu['usu_hojadevida']=="../web/" or $usu['usu_hojadevida']=="../" ){ 
  echo "<div class='col-md-6'><br><br><small>No tiene almacenada hoja de vida por el momento*</small></div>";
 }else{?>
                <div class="col-md-6">
                    <label class="titulos_negrita">Visualizar hoja de vida</label><br>
                    <?php if(empty($usu['usu_hojadevida'] || $usu['usu_hojadevida']=="../web/hojas/" or $usu['usu_hojadevida']=="../web/" or $usu['usu_hojadevida']=="../" )){ echo "<h5>NO TIENE ALMACENADA NINGUNA HOJA DE VIDA</h5>"?>

                    <?php }else{?>
                    <a type="button" target="_black"
                        href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$usu['usu_hojadevida']?>"
                        class="radios modalhojadevida btn btn-dark"><i class="fa fa-eye"></i></a> Aquí puedes
                    visualizar tu hoja de vida*
                    <?php    }  ?>
                </div>
                <?php } ?>
                <div class="col-md-6 caja">
                    <label class="titulos_negrita">Carta de presentación</label><br>
                    <input placeholder="" id="cartapresentacion" type="file" name="usu_cartapresentacion"
                        class="eme2 estiloinput">
                </div>
                
                <div class="col-md-6">
                    <label class="titulos_negrita">Elegible legalmente para trabajar en el país de la
                        vacante</label><br>
                    <input type="checkbox" class="form" value="Si" name="usu_elegible">
                </div>
                <div class="col-md-6">
                    <label class="titulos_negrita">Disponibilidad para Viajar</label>
                    <br>
                    <input type="checkbox" name="usu_viajar" value="Si">
                </div>
                <div class="col-md-6"><input type="hidden" name="id_vacante" value="<?php echo $vac['id_vacante']?>">
                </div>
                <div class="col-md-12 row justify-content-end">

                    <?php  if ($rowformacion==0 and $rowhistorial==0 and $rowhojadevida==0){ 
                            echo "<div style='text-align:right;'class='col-md-12'><h5>
                            mina de llenar la información requerida para <br> poder aplicar a esta vacante<small class='red'>*</small></h5></div>";
                            echo "<br><a href='".getUrl("Usuario","Ofertas","documento")."' type='button'  class='radios btn btn-primary'>Siguiente</a>";
                        }elseif ($rowformacion>0 and $rowhistorial>0 and $rowhojadevida==0) {
                            echo "<div style='text-align:right;'class='col-md-12'><h5>Por favor sube una hoja de vida para<br> poder aplicar a esta vacante<small class='red'>*</small></h5></div>";
                            echo "<br><a href='".getUrl("Usuario","Ofertas","documento")."' type='button'  class='radios btn btn-primary'>Siguiente</a>";     
                        }elseif($rowformacion>0 and $rowhistorial==0 and $rowhojadevida>0) {
                            echo "<div style='text-align:right;'class='col-md-12'><h5>Por favor registra como minimo una experiencia laboral<br>para poder aplicar a esta vacante<small class='red'>*</small></h5></div>";
                            echo "<br><a href='".getUrl("Usuario","Ofertas","experiencia")."' type='button'  class='radios btn btn-primary'>Siguiente</a>";     
                        }elseif ($rowformacion==0 and $rowhistorial>0 and $rowhojadevida>0) {
                            echo "<div style='text-align:right;'class='col-md-12'><h5>Por favor registra como minimo una formación<br>para poder aplicar a esta vacante<small class='red'>*</small></h5></div>";
                            echo "<br><a href='".getUrl("Usuario","Ofertas","consultusu")."' type='button'  class='radios btn btn-primary'>Siguiente</a>";     
                        }elseif ($rowformacion==0 and $rowhistorial==0 and $rowhojadevida>0 or $rowformacion>0 and $rowhistorial==0 and $rowhojadevida==0 or $rowhojadevida==0 or $rowformacion>0 and $rowhistorial==0 ) {
                            echo "<div style='text-align:right;'class='col-md-12'><h5>Por favor termina de llenar la información requerida <br>para poder aplicar a esta vacante<small class='red'>*</small></h5></div>";
                            echo "<br><a href='".getUrl("Usuario","Ofertas","documento")."' type='button'  class='radios btn btn-primary'>Siguiente</a>";
                        }     
            
                        else{ ?>
                
                    <a href="<?php echo getUrl("Usuario","Ofertas","consult")?>"
                        class="radios btn btn-danger">Cancelar</a>
                    <button type="submit" class="radios btn btn-primary" value="">Aplicar</button>
                    <?php } ?>
                </div>
            </div>
        </div>
    </form>
    <?php
}
}
}else{
    session_destroy();
    redirect("login.php");
}
?>