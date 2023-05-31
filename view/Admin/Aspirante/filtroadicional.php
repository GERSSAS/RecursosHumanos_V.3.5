<?php 
if($_SESSION['rolId']==1){
?>
<div class=" col-md-12 col-sm-10 ">
    <div class="x_title" class="">
        <small class="xc_color">ASPIRANTES REGISTRADOS <br><?php
                     echo $nombre;
                    ?>
        </small>
    </div>
    <div class=" x_panel">
    <?php foreach ($areas as $area) {?>
                        <div style="float:left;" class="col-md-5">
                        <b><input type="checkbox" name="area[]" id="area" value="<?php echo $area['id_area']?>" class="actividadesbox" data-url="<?php echo getUrl("Admin", "Aspirante", "aspirantesdinamicos",array("id_vacante"=>$id), "ajax") ?>"></b><label><?php echo $area ['are_nombre']?></label>
                    </div>
                    <?php } ?>
        </div>
        <div class="col-md-6">
            <?php
                    foreach($Usuario as $usu){
                   echo"<input type='hidden' id='id_vacante' name='id_vacante' value='".$usu['id_vacante']."'>";
                     }
                    ?>
        </div>
        <div class="x_content">
            <div class="row">
                <div class="col-sm-12">

                    <!-- <input type="text" name="filtro" id="filtro"
                    data-url=""
                class="form-control"> -->
                <table  id="bandeja" data-url="ajax.php?modulo=Admin&amp;controlador=&amp;funcion=bandejaentrada" class="table-hover table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="bandeja_info">


                    <div id="copia" class="card-box table-responsive">
                      
                            <thead>
                                <tr>
                                    <th class='text-light text-center'>Nombre/s</th>
                                    <th class=' text-light text-center'>Apellido/s</th>
                                    <th id="th_desc" class='text-light text-center'>Estado</th>
                                    <th id="th_desc" class='text-light text-center'>Experiencia Laboral</th>
                                    <th id="th_desc" class='text-light text-center'>Correo</th>
                                    <th id="th_desc" class='text-light text-center'>Acciones</th>
                                </tr>
                            </thead>
                            <?php   
                            foreach ($Usuario as $usu) {
                                echo"<tr>";
                                echo"<td class='text-center'>".$usu['usu_nombre']."</td>";
                                echo"<td class='text-center'>".$usu['usu_apellido']."</td>";
                                echo"<td class='text-center'>".$usu['selec_nombre']."</td>";
                                echo"<td class='text-center'>".$usu['SUM(hist_añosxp)']." años</td>";
                                echo"<td class='text-center'>".$usu['usu_correo']."</td>";
                                echo"<td class='text-center'><a  value='' name='usu_id' id='ModalInfoUsuario' data-url=".getUrl("Admin","Aspirante","ModalInfoUsuario",array("usu_id" => $usu['usu_id'],"id_vacante" => $usu['id_vacante']),"ajax")."><button  class='btn btn-dark btn-sm' title='Vista previa'><i class='fa fa-eye'></i></button></a></td>
                                    </tr>";
                            }                        
                        ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
</div>
<?php
}else{
    redirect("indexUsu.php");
}
?>