<?php foreach ($formacion as $usu) {
?>
<iframe src="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$usu['form_titulo_profesional']?>" frameborder="0" scrolling="yes" width="100%" height="600px"></iframe>
<?php
}
?>