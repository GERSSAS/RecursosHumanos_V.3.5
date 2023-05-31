<?php 
if($_SESSION['rolId']==2){
?>
<div class="eo #contenedor_arriba x_content">
    <div style="text-align:center;" class="x_title">
        <h5 style=" font-weight: bolder;">IDIOMAS</h5>
    </div>


    <div class="justify-content-start" id="contenedoridioma">

        <form action="<?php echo getUrl("Usuario", "Ofertas", "AgregarIdioma"); ?>" class="col-md-12 justify-content-start" method="post" enctype="multipart/form-data">
            <div id="copy">
                <div class="eo row justify-content-start">

                    <div class="titulos_negrita col-md-6">
                        Idioma/s
                        <input type="text" name="idioma" id="idioma" placeholder="Ejm: ingles, aleman etc." class="radios form form-control">
                    </div>
                    <div class="titulos_negrita col-md-6">
                        Nivel del Idioma<br>
                        <select type="text" name="NivelIdioma" id="NivelIdioma" placeholder="Ejm: ingles, aleman etc." class="radios form form-control">
                            <option selected="true" disabled>Nivel del Idioma</option>
                            <option value="Basico">Basico</option>
                            <option value="Intermedio">Intermedio</option>
                            <option value="Avanzado">Avanzado</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <button type="submit" style="float:left;" class="radios btn btn-success">Agregar</button>
                    </div>
                </div>

            </div>
        </form>
        <div class="col-md-12">
            <?php
            foreach ($idiomas as $idi) {
                echo "<div class='eo row justify-content-start'>
                    <div class='titulos_negrita col-md-4'>
                        Idioma/s
                        <input type='text' readonly value='" . $idi['idi_nombre'] . "'
                            class='form form-control'>
                    </div>
                    <div class='titulos_negrita col-md-4'>
                        Nivel del Idioma <br>
                        <input type='text' readonly value='" . $idi['idi_nivel'] . "' class='form form-control'> 
                    </div>
                    <div class='col-md-4'>
                        <br>
                        <button value='Eliminar' id='eliminaridioma' name='id_idioma' data-url=" . getUrl("Usuario", "Ofertas", "EliminarIdioma", array("id_idioma" => $idi['id_idioma']), "ajax") . " class='btn btn-danger'><i class='fa fa-trash'></i> Eliminar</button><span><small>*Aquí puede eliminar el registro*</small></span>
                    </div>
                </div>";
            }

            ?>
        </div>
    </div>
</div>
<?php
}else{
    session_destroy();
    redirect("login.php");
}
?>