
<?php 
if($_SESSION['rolId']==1){
?>
<div class=" col-md-12 col-sm-10 ">
<div class="x_title" class="">
    <small class="xc_color">ASPIRANTES SELECCIONADOS<br>
</div>
    <div class="  x_panel">
        <div class="  x_title">
            <ul class=" nav navbar-right panel_toolbox">
                <li>


                </li>
            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="   x_content">
            <div class="  row">
                <div class="  col-sm-12">
                    <div class="  card-box table-responsive">
                        
                        <table id="copia" class="table table-striped table-hover" style="width:100%">
                            <thead style="background-color: #00113d; color:#fff;">
                                <tr>
                                    <th class='text-center '>ID</th>
                                    <th class='text-center'>Nombre/s</th>
                                    <th class='text-center'>Apellido/s</th>
                                    <th id="th_desc" class='text-center'>Correo</th>
                                    <th id="th_desc" class='text-center'>Teléfono</th>
                                    <th id="th_desc" class='text-center'>Estado</th>
                                    <th id="th_desc" class='text-center'>Vacante</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                foreach($listado as $lis){     
                                echo "<tr>";
                                echo"<td class='text-center'>"."ASP_".$lis['usu_id']."</td>";
                                echo"<td class='text-center'>".$lis['usu_nombre']."</td>";
                                echo"<td class='text-center'>".$lis['usu_apellido']."</td>";
                                echo"<td class='text-center'>".$lis['usu_correo']."</td>";
                                echo"<td class='text-center'>".$lis['usu_telefono']."</td>";
                                echo"<td class='text-center'>".$lis['selec_nombre']."</td>";
                                echo"<td class='text-center'>".$lis['vac_nombre']."</td>";
                                echo "</tr>";                                
                            }
                                ?>
                            </tbody>
                            <!--<a  href="../phpspreadsheet/server2.php"><button class='btn btn-dark btn-sm' title='Exportar informacion'><i class='fa fa-file-excel-o'></i></button></a>-->
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