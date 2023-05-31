<?php 
if($_SESSION['rolId']==1){
?>
<div class=" col-md-12 col-sm-12">
    <div>
        <small class="xc_color">Estado de los aspirantes<br>
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

                                    <?php

                                    $idVacante2 ="";

                                    $listaVacantes = array();

                                        foreach($listado as $lis){

                                        $idVacante = $lis['vac_nombre'];

                                        if($idVacante != $idVacante2){

                                            array_push($listaVacantes, $lis['vac_nombre']);
                                            $idVacante2 = $lis['vac_nombre'];

                                        }


                                        // if($idVacante != $idVacante2){

                                        //     $idVacante2 = $lis['vac_nombre'];
                                        //     $tabla = array();
                                        //     $key = array();
                                        //     array_push($tabla, $lis['usu_nombre'],$lis['usu_apellido'], $lis['usu_correo'], $lis['selec_nombre'], $lis['id_vacante']);
                                        //     // echo implode(" ",$tabla);
                                        //     array_push($key,[$lis['vac_nombre']]);
                                        //     $obj = (object)
                                        //     array_push($key,$tabla);
                                        //     array_push($listaVacantes, $key);
                                        //     unset($tabla);

                                        // } else{

                                        //     $tabla = array();
                                        //     $key = array();

                                        //     array_push($tabla, $lis['usu_nombre'],$lis['usu_apellido'], $lis['usu_correo'], $lis['selec_nombre'], $lis['id_vacante']);

                                        //     array_push($key,[$lis['vac_nombre']]);
                                        //     array_push($key,$tabla);
                                        //     array_push($listaVacantes, $key);
                                        //     //  echo implode(" ",$tabla);
                                        //     unset($tabla);

                                        // }

                                    }

                                    foreach($listaVacantes as $rueba){
                                     
                                         echo "<caption>".$rueba." </caption>";
                                          echo '<table  id="banda" data-url="ajax.php?modulo=Admin&amp;controlador=&amp;funcion=bandejaentrada" class="table-hover table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="bandeja_info">';
                                          echo '<thead style="background-color: #00113d; color:#fff;">';
                                          echo '<tr>';
                                          echo '<th class="ext-center">Nombre/s</th>';
                                          echo '<th class="text-center">Apellido/s</th>';
                                          echo '<th id="th_desc" class="text-center">Correo</th>';

                                          echo '<th id="th_desc" class="text-center">Estado</th>';
                                          echo '<th id="th_desc" class="text-center">Vacante</th>';
                                          echo "</tr>";
                                          echo '</thead>';

                                          foreach ($listado as $lis){

                                             if($lis['vac_nombre'] == $rueba){
                                                echo "<tr>";
                                                    echo"<td class='text-center'>".$lis['usu_nombre']."</td>";
                                                    echo"<td class='text-center'>".$lis['usu_apellido']."</td>";
                                                    echo"<td class='text-center'>".$lis['usu_correo']."</td>";
                                                    echo"<td class='text-center'>".$lis['selec_nombre']."</td>";
                                                    echo"<td class='text-center'>".$lis['id_vacante']."</td>";
                                                    echo "</tr>";
                                                }


                                        }

                                                 echo '</table>';
                                                 echo '<br>';
                                                 echo '<br>';
                                                 echo '<br>';
                                }
                                    //  foreach($listaVacantes as $key => $value){
                                    //     // //   echo $key;
                                    //     foreach ($value as $key2 => $value2){

                                    //         // echo $key2;

                                    //         foreach ($value2 as $item){

                                    //             echo $item;
                                    //         echo "<br>";

                                    //         }
                                    //     }
                                    //  }

                                    //  foreach($listaVacantes as $key => $value){

                                    //       echo "<caption>".$key." </caption>";
                                    //       echo '<table  id="banda" data-url="ajax.php?modulo=Admin&amp;controlador=&amp;funcion=bandejaentrada" class="table-hover table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="bandeja_info">';
                                    //       echo '<thead style="background-color: #00113d; color:#fff;">';
                                    //       echo '<tr>';
                                    //       echo '<th class="ext-center">Nombre/s</th>';
                                    //       echo '<th class="text-center">Apellido/s</th>';
                                    //       echo '<th id="th_desc" class="text-center">Correo</th>';

                                    //       echo '<th id="th_desc" class="text-center">Estado</th>';
                                    //       echo '<th id="th_desc" class="text-center">Vacante</th>';
                                    //       echo "</tr>";
                                    //       echo '</thead>';

                                    //      echo "<tr>";
                                    //     foreach ($value as $item){

                                    //         echo"<td class='text-center'>".$item."</td>";
                                    //     }
                                    //      echo "</tr>";
                                    //      echo '</table>';
                                    //      echo '<br>';
                                    //      echo '<br>';
                                    //      echo '<br>';
                                    //  }

                                //     foreach($listado as $lis){

                                //         $idVacante = $lis['vac_nombre'];

                                //         if($idVacante != $idVacante2){

                                //             $idVacante2 = $lis['vac_nombre'];
                                //             echo "<caption>".$lis['vac_nombre']." </caption>";
                                //             echo '<table  id="banda" data-url="ajax.php?modulo=Admin&amp;controlador=&amp;funcion=bandejaentrada" class="table-hover table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="bandeja_info">';

                                //             echo '<thead style="background-color: #00113d; color:#fff;">';
                                //             echo '<tr>';
                                //             echo '<th class="ext-center">Nombre/s</th>';
                                //             echo '<th class="text-center">Apellido/s</th>';
                                //             echo '<th id="th_desc" class="text-center">Correo</th>';

                                //             echo '<th id="th_desc" class="text-center">Estado</th>';
                                //             echo '<th id="th_desc" class="text-center">Vacante</th>';
                                //             echo "</tr>";
                                //             echo '</thead>';

                                //         echo "<tr>";
                                //         echo"<td class='text-center'>".$lis['usu_nombre']."</td>";
                                //         echo"<td class='text-center'>".$lis['usu_apellido']."</td>";
                                //         echo"<td class='text-center'>".$lis['usu_correo']."</td>";
    
                                //         echo"<td class='text-center'>".$lis['selec_nombre']."</td>";
                                //         echo"<td class='text-center'>".$lis['id_vacante']."</td>";
                                //         // echo"<td class='text-center'><a name='usu_id' id='ModalRegistrados' data-url=".getUrl("Admin","Aspirante","ModalUsuariosRegistrados",array("usu_id" => $lis['usu_id']),"ajax")."><button  class='btn btn-dark btn-sm' title='Vista previa'><i class='fa fa-eye'></i></button></a>";                                                          
                                //         echo "</tr>";

                                //         } else{

                                //             echo "<tr>";
                                //         echo"<td class='text-center'>".$lis['usu_nombre']."</td>";
                                //         echo"<td class='text-center'>".$lis['usu_apellido']."</td>";
                                //         echo"<td class='text-center'>".$lis['usu_correo']."</td>";
    
                                //         echo"<td class='text-center'>".$lis['selec_nombre']."</td>";
                                //         echo"<td class='text-center'>".$lis['id_vacante']."</td>";
                                //         // echo"<td class='text-center'><a name='usu_id' id='ModalRegistrados' data-url=".getUrl("Admin","Aspirante","ModalUsuariosRegistrados",array("usu_id" => $lis['usu_id']),"ajax")."><button  class='btn btn-dark btn-sm' title='Vista previa'><i class='fa fa-eye'></i></button></a>";                                                          
                                //         echo "</tr>";
                                //         echo '</table>';
                                //         echo '<br>';
                                //         echo '<br>';
                                //         echo '<br>';
                                //         }

                                // }
                                ?>


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