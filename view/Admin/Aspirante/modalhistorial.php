<?php foreach ($historial as $usu) {
?>
<iframe src="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$usu['hist_certificado']?>" frameborder="0" scrolling="yes" width="100%" height="600px"></iframe>
<?php
}
?>