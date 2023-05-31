
<?php 
if($_SESSION['rolId']==1){
?>
<div class=" col-md-12 col-sm-10 ">
<div class="x_title" class="">
    <small class="xc_color">POSTULADOS <br>
</div>
    <div class="  x_panel">
        <div class="  x_title">
            <ul class=" nav navbar-right panel_toolbox">
                <li>


                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="col-md-6">
            </div>
        <div class="   x_content">
            <div class="  row">
                <div class="  col-sm-12">
                    <div class="  card-box table-responsive">
                        
                <table  id="bandeja" data-url="ajax.php?modulo=Admin&amp;controlador=&amp;funcion=bandejaentrada" class="table-hover table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="bandeja_info">
                        
                     
                            <thead style="background-color: #00113d; color:#fff;">
                                <tr>
                                
                                    <th class='text-center'>Nombre/s</th>
                                    <th class='text-center'>Apellido/s</th>
                                    <th id="th_desc" class='text-center'>Correo</th>
                                    <th id="th_desc" class='text-center'>Teléfono</th>
                                    <th id="th_desc" class='text-center'>Estado</th>
                                    <th id="th_desc" class='text-center'>Vacante</th>
                                    <th id="th_desc" class='text-center'>Acciones</th>

                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach($listado as $lis){     
                                echo "<tr>";
                                echo"<td class='text-center'>".$lis['usu_nombre']."</td>";
                                echo"<td class='text-center'>".$lis['usu_apellido']."</td>";
                                echo"<td class='text-center'>".$lis['usu_correo']."</td>";
                                echo"<td class='text-center'>".$lis['usu_telefono']."</td>";
                                echo"<td class='text-center'>".$lis['selec_nombre']."</td>";
                                echo"<td class='text-center'>".$lis['vac_nombre']."</td>";
                                echo"<td class='text-center'><a  value='' name='usu_id' id='ModalInfoUsuario' data-url=".getUrl("Admin","Aspirante","ModalInfoUsuario",array("usu_id" => $lis['usu_id'],"id_vacante" =>$lis['id_vacante']),"ajax")."><button  class='btn btn-dark btn-sm' title='Vista previa'><i class='fa fa-eye'></i></button></a>";
                                echo"<a value='' name='usu_id' id='ModalEntrevistaEstado' data-url2=".getUrl("Admin","Aspirante","ModalEntrevistaEstado",array("usu_id" => $lis['usu_id'],"id_vacante"=> $lis['id_vacante']),"ajax")."><button  class='btn btn-success btn-sm' title='Estado entrevista'><i class='fa fa-gear'></i></button></a></td>";
                                echo "</tr>";                                
                            }
                                ?>
                            </tbody>
                           <!-- <a  href="../phpspreadsheet/server2.php"><button class='btn btn-dark btn-sm' title='Exportar informacion'><i class='fa fa-file-excel-o'></i></button></a>-->
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