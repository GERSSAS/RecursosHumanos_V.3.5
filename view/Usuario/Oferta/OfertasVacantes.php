
<br>
<br>
<div style="padding-top:10px;"  class="col-md-12 col-sm-12 justify-content-start">

   <div style="padding-top:10px;" class="x_title">
    <h5 style="font-weight:bolder;" class="text-center">OFERTAS LABORALES</h5>
</div>
<div style="padding-top:10px;"  class="x_content justify-content-start col-md-12">
                            <?php
                            foreach ($aplicaciones as $vac) {
                            echo"<div  style='' class='card col-md-12'>
                              <div class='card-body'>
                              <p style='float:right;'>Fecha de publicación: ".$vac['vac_publicacion']."</p>
                                <h5 class='card-title'><b>".$vac['vac_nombre'] ."</b></h5>";
                            echo "<p class='card-text'></p>
                            </div>
                              <ul class='card-body'>
                                <li class=''><b>Fecha de finalizacion de la vacante: </b>". $vac['vac_fecha']."</li>
                                <li class=''><b>Años de experiencia: </b>". $vac['vac_años_xp']."</li>
                                <li class=''><b>Jornada laboral:</b> ".$vac['vac_jornada_laboral']."</li>
                                <li class=''><b>Tipo contrato:</b> ".$vac['vac_tipo_contrato']."</li>
                                <li class=''><b>Salarío:</b> ".$vac['vac_salario']."</li>
                                <li class=''><b>Nivel de educación:</b> ".$vac['vac_educacion']."</li>
                                <li class=''><b>Cargo:</b> ".$vac['vac_cargo']."</li>
                                <li class=''><b>Funciones generales:</b> ".$vac['vac_funciones_generales']."</li>
                                <li class=''><b>Funciones especificas:</b> ".$vac['vac_funciones_especificas']."</li>
                                
                               
                            </ul>
                            
                            <div style='padding-top:10px;' class='card-body'>
                            <a id='modaldetallevacante' class='radios btn btn-warning' value'' data-url='" . getUrl("Usuario", "Ofertas", "modaldetalle", array("id_vacante" => $vac['id_vacante']), "ajax") . "'>Ver detalle</a>
                                <a class='radios btn btn-primary'  name='id_vacante' href='" . getUrl("Usuario", "Ofertas", "vistaAplicar", array("id_vacante" => $vac['id_vacante'])) . "'>Aplicar</a>
                            </div>
                            
                            </div>";

                            }
                            ?>
</div> 


