<?php

if ($row==0){ 
    echo "<h3 class='from-control'>No se encontraron resultados</h3>";
}else {
 foreach ($formacion as $usu) {
     if($usu['form_titulo_profesional']=="" or $usu['form_titulo_profesional']=="../web/certificadodeestudio/" || $usu['form_titulo_profesional']=="../web/" || $usu['form_titulo_profesional']=="../" ){
        echo "<h3 class='from-control'>No se encontraron resultados</h3>";  
     }else {    
?>

<iframe src="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$usu['form_titulo_profesional']?>"
    frameborder="0" scrolling="yes" width="100%" height="600px"></iframe>
<?php
 }
 }
}

?>