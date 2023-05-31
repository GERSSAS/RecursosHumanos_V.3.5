<?php 
if ($row==0){ 
    echo "<h3 class='from-control'>No se encontraron resultados de '".$buscar."'</h3>";
}
else{
    foreach($Usuario as $usu){     
        echo "<tr>";
        echo"<td class='text-center'>"."ASP_".$usu['usu_id']."</td>";
        echo"<td class='text-center'>".$usu['usu_nombre']."</td>";
        echo"<td class='text-center'>".$usu['usu_apellido']."</td>";
        echo"<td class='text-center'>".$usu['usu_telefono']."</td>";
        echo"<td class='text-center'>".$usu['usu_correo']."</td>";
        echo"<td class='text-center'>".$usu['selec_nombre']."</td>";
        echo"<td> <a  href=".getUrl("Admin","Aspirante","consult",array("usu_id" => $usu['usu_id']))."><button name='id_vacante'  class='btn btn-dark btn-sm' title='Listado'><i class='fa fa-eye'></i></button></a></td>
        </tr>";                                
    }
   
}
?>