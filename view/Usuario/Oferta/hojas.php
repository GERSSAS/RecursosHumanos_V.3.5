<?php 
if($_SESSION['rolId']==2){
?>
<div class="eo #contenedor_arriba x_content">

    <div style="text-align:center;"class="x_title"><h5 style=" font-weight: bolder;">DOCUMENTOS DE SOPORTE</h5></div>

        <?php
    foreach ($usuario as $usu) {
        ?>
        
        <div class="justify-content-start">
                <form style="float:left;"id="alertahoja" class="col-md-6"
                    action="<?php echo getUrl("Usuario","Ofertas","actualizarDocumentos")?>" method="post"
                    enctype="multipart/form-data">

                    <div class="justify-content-start col-md-12 caja">
                        <label class="titulos_negrita">Hoja de Vida<span style="color:red"></span></label><br>
                        <input placeholder="" id="hojadevida" type="file" name="usu_hojadevida"
                            class="">
                            <?php if($usu['usu_hojadevida']=="" or $usu['usu_hojadevida']=="../web/hojas/" or $usu['usu_hojadevida']=="../web/" or $usu['usu_hojadevida']=="../" ){ 
                                    echo "<div class='col-md-6'><small>No ha subido ninguna hoja de vida por el momento*</small></div>";
                                    }else{?>
                        <a type="button" title="Visor hoja de vida" target="_black"
                            href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$usu['usu_hojadevida']?>"
                            class="radios modalhojadevida btn btn-success"><i
                                class="fa fa-download"></i></a><?php echo $usu['usu_fechahojadevida']?>
                             <?php }?>
                             <br>
                             <br>
                             <input type="submit" style="float:left;" type="button" class="radios btn btn-primary" value="guardar">
                    </div>   
                </form>
                <form style="float:right;" id="alertamatricula" class="col-md-6"
                    action="<?php echo getUrl("Usuario","Ofertas","actualizarDocumentos2")?>" method="post"
                    enctype="multipart/form-data">
                    <div class="col-md-12">
                        <label class="titulos_negrita">Tarjeta Profesional<span style="color:red"></span></label><br>
                        <input type="file" id="matriculaprofesional" name="usu_matricula" class="form">
                        <?php if( $usu['usu_matricula']=="../web/carta/" or $usu['usu_matricula']=="../web/" or $usu['usu_matricula']=="../" or $usu['usu_matricula']=="" ){ 
                                echo "<div class='col-md-6'><small>No ha subido ninguna matricula profesional por el momento*</small></div>";
                              }else{?>                
                        <a title="Visor matricula profesional" type="button" target="_black"
                            href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$usu['usu_matricula']?>"
                            class="radios btn btn-info"><i class="fa fa-download"></i></a><?php echo $usu['usu_fechamatricula']?>
                         <?php }?>
                         <br>
                         <br>
                         <input type="submit" style="float:left;" type="button" class="radios btn btn-primary"
                            value="guardar">
                    </div>       
                </form> 
                
    </div>

<div class="x_content"> <a style="float:right;border-radius:5px;" href="<?php echo getUrl("Usuario","Ofertas","consultusu")?>" type="button"  class="btn btn-success siguiente">Siguiente</a></div>
   
        
<?php
}
}else{
    session_destroy();
    redirect("login.php");
}
?>