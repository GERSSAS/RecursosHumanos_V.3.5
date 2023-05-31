<?php

if ($row==0){ 
    echo "<h3 class='from-control'>No se encontraron resultados2</h3>";
}else {
 foreach ($historial as $usu) {
    if($usu['hist_certificado']=="" or $usu['hist_certificado']=="../web/certificadodetrabajo/"){
        echo "<h3 class='from-control'>No se encontraron resultados</h3>";  
     }else {    
?>
<iframe src="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$usu['hist_certificado']?>" frameborder="0"
    scrolling="yes" width="100%" height="600px"></iframe>
<?php
}
}
}

?>