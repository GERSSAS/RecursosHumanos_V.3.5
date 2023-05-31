<?php 
if($_SESSION['rolId']==1){
?>
<div class=" col-md-12 col-sm-12">
    <div>
        <small class="xc_color">USUARIOS REGISTRADOS<br>
    </div>
    <div class="x_panel">
        <div class="">
            <ul class=" nav navbar-right panel_toolbox">
                <li>


                </li>
            </ul>
           
        </div>
        <div class="col-md-12">
        </div>
        <div class="   x_content">

            <div class="row">
                <div class="  col-sm-12">
               
               
                <table  id="bandeja" data-url="ajax.php?modulo=Admin&amp;controlador=&amp;funcion=bandejaentrada" class="table-hover table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="bandeja_info">
                
                    <thead style="background-color: #00113d; color:#fff;">
                    <tr>
                    <th class='text-center'>Nombre/s</th>
                    <th class='text-center'>Apellido/s</th>
                    <th id="th_desc" class='text-center'>Correo</th>
                    <th id="th_desc" class='text-center'>Teléfono</th>
                    
                    <th id="th_desc" class='text-center'>Hoja de vida </th>
                    </tr>
                    </thead>

                

                                    <?php
                                    foreach($listado as $lis){    
                                    echo "<tr>";
                                    echo"<td class='text-center'>".$lis['usu_nombre']."</td>";
                                    echo"<td class='text-center'>".$lis['usu_apellido']."</td>";
                                    echo"<td class='text-center'>".$lis['usu_correo']."</td>";
                                    echo"<td class='text-center'>".$lis['usu_telefono']."</td>";
                                 
                                    echo"<td class='text-center'><a name='usu_id' id='ModalRegistrados' data-url=".getUrl("Admin","Aspirante","ModalUsuariosRegistrados",array("usu_id" => $lis['usu_id']),"ajax")."><button  class='btn btn-dark btn-sm' title='Vista previa'><i class='fa fa-eye'></i></button></a>";                                                          
                                    echo "</tr>";
                                }
                                ?>
                            </table>
                         
                        </id=>
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