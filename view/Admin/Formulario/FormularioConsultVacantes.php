
<?php 
if($_SESSION['rolId']==1){
?>

<div class="col-md-12 col-sm-12 ">
<div class="x_title" class="divTitulo">
    <small class="xc_color">VACANTES GENERADAS</small>
</div>
    <div class="  x_panel">
        <div class="  x_content">
            <div class="  row">
                <div class="  col-sm-12">
              
                    <div class="card-box   table-responsive">
                    <table  id="bandeja"class="table-hover table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="bandeja_info">

                     
                        
                            <thead style="background-color: #00113d; color:#fff;">
                                <tr>
                                    <th   class='text-center '>ID</th>
                                    <th  class='text-center'>Vacante</th>
                                    <th  id="th_desc" class='text-center'>Fecha publicación</th>
                                    <th  id="th_desc" class='text-center'>Fecha solicitud</th>
                                    <th  id="th_desc" class='text-center'>Fecha limite</th>
                                    <th  id="th_desc" class='text-center'>Estado</th>
                                    <th  class='text-center ' >Acciones</th>
                                </tr>
                            </thead> 

                            <tbody class="vacantecontenedor">
                            <?php 
                            foreach($Vacantes as $vac){ 
                                echo"<tr>";
                                echo "<td class='text-center'>"."VAC_".$vac['id_vacante']."</td>";
                                echo "<td class='text-center'>".$vac['vac_nombre']."</td>";
                                echo "<td class='text-center'>".$vac['vac_publicacion']."</td>";
                                echo "<td class='text-center'>".$vac['vac_fecha']."</td>";
                                echo "<td class='text-center'>".$vac['vac_fecha']."</td>";
                                echo "<td class='text-center'>".$vac['est_nombre']."</td>";
                                echo "<td class='text-center'>
                                    <button id='copiarVacante' class='btn btn-sm btn-dark' data-toggle='tooltip' value='' title='Copiar vacante' data-id='".$vac['id_vacante']."' data-url='".getUrl("Admin","Formulario","copiarvacantes",array("id" => $vac['id_vacante']),"ajax")."' data-placement='bottom'><i class='fa fa-copy'></i></button>
                                    <a  href=".getUrl("Admin","Aspirante","filtroadicional",array("id_vacante" => $vac['id_vacante']))."><button name='id_vacante'  class='btn btn-light btn-sm' title='Listado'><i class='fa fa-users'></i></button></a>                              
                                    <a  href=".getUrl("Admin","Formulario","FormUpdate",array("id_vacante" => $vac['id_vacante']))."><button title='Editar'  class='btn btn-primary btn-sm ' ><i class='fa fa-pencil'></i></button>
                                    </a>
                                    <button id='modalestado' class='btn btn-sm btn-success' data-toggle='tooltip' data-url='".getUrl("Admin","Formulario","estadovacante",array("id_vacante"=>$vac['id_vacante']), "ajax") . "'  data-placement='bottom' value='' title='Estado'>
                                    <i class='fa fa-gear'></i>
                                    </button>
                                    <a  class='btn btn-sm btn-danger'   href='".getUrl("Admin", "Formulario", "eliminarVacante", array("id_vacante" => $vac['id_vacante'])). "' >
                                    <i class='fa fa-trash'></i>
                                    </a>
                                  
                                     </td>";
                               echo  "</tr>";
                            }
                            ?>                        
                            </tbody>
                           
                        </table>
                        <!--<a  href="../phpspreadsheet/server.php"><button class='btn btn-dark btn-sm' title='Exportar informacion'><i class='fa fa-file-excel-o'></i></button></a>-->
                    </div>
                   
                </div>
                
            </div>
            
        </div>
    </div>
    <div class="x_panel table-responsive">
    <div class="x_title" class="divTitulo">
    <small class="xc_color">CORREOS PENDIENTES</small>
</div>
                    <table id="prueba" class="table table-striped table-hover" style="width:100%">
                        
                        <thead style="background-color: #00113d; color:#fff;">
                            <tr>
                                <th   class='text-center '>ID</th>
                                <th  class='text-center'>Vacante</th>
                                <th  id="th_desc" class='text-center'>Fecha publicación</th>
                                <th  id="th_desc" class='text-center'>Fecha limite</th>
                                <th  id="th_desc" class='text-center'>Estado</th>
                                <th  class='text-center ' >Acciones</th>
                            </tr>
                        </thead> 

                        <tbody class="vacantecontenedor">
                        <?php 
                        foreach($vacanteinactiva as $vac){ 
                            echo"<tr>";
                            echo "<td class='text-center'>"."VAC_".$vac['id_vacante']."</td>";
                            echo "<td class='text-center'>".$vac['vac_nombre']."</td>";
                            echo "<td class='text-center'>".$vac['vac_publicacion']."</td>";
                            echo "<td class='text-center'>".$vac['vac_fecha']."</td>";
                            echo "<td class='text-center'>".$vac['est_nombre']."</td>";
                            echo "<td class='text-center'>
                                <button id='Enviarcorreos' class='btn btn-sm btn-dark' data-toggle='tooltip' value='' title='Enviar correos' data-id='".$vac['id_vacante']."' data-url='".getUrl("Admin","Formulario","noseleccionados",array("id" => $vac['id_vacante']),"ajax")."' data-placement='bottom'><i class='fa fa-send'></i></button>
                                </button>
                                 </td>";
                           echo  "</tr>";
                        }
                        ?>                        
                        </tbody>
                       
                    </table>
                    </div>
</div>
</div>
<?php
}else{
    redirect("indexUsu.php");
}
?>
