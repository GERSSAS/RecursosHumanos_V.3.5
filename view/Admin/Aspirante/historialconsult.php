<?php
if ($_SESSION['rolId'] == 1) {
?>
    <nav class="navbar navbar-dark navbar-expand-sm" style="background-color:#181864;">
        <a class="navbar-brand" href="#">
            Historial registrado
        </a>
    </nav>
    <!--AQUI ESTA EL CONTEDEDOR DE TODA LA EXPERIENCIA LABORAL QUE OVYA  MOSTRAR-->
    <div class="divcontenedores">

        <?php
        if ($row == 0) {
            echo "<h3 class='col-md-12'>NO HAY INFORMACION REGISTRADA</h3>";
        } else {
            foreach ($historial as $hist) { ?>
                <div style="border-radius:35px;" class="x_title">
                    <div class="x_title">
                        <div class="row justify-content-start">
                            <div class="col-md-3">
                                <label class="titulos_negrita">Fecha inicio</label>
                                <label class="fechas oferta estiloinput form-control"><?php echo $hist['hist_fecha_inicio'] ?>
                            </div>

                            <div class="col-md-3">
                                <label class="titulos_negrita">Fecha final</label>
                                <label class="fechas oferta estiloinput form-control"><?php echo $hist['hist_fecha_fin'] ?>
                            </div>

                            <div class="col-md-6">
                              
                                <label class="titulos_negrita">Trabaja Usted Actualmente</label><br>
                                <select class="form-control" name="hist_trabajoactual" id="hist_trabajoactual">
                                <option value="<?php echo $hist['hist_trabajoactual'] ?>" selected="selected"><?php echo $hist['hist_trabajoactual']; ?></option>    
                                <option value=""></option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                            
                            <div class="col-md-6">
                                <label class="titulos_negrita">Cargo</label>
                                <label class="estiloinput form-control oferta"><?php echo  $hist['hist_cargo'] ?>
                            </div>

                            <div class="col-md-6">
                                <label class="titulos_negrita">Empresa/Organización</label>
                                <label class="estiloinput form-control oferta"><?php echo  $hist['hist_empresa'] ?>
                            </div>

                            <br><br><br><br>
                            <div class="col-md-12">
                                <label class="titulos_negrita">Descripción actividades</label>
                                <textarea class="estiloinput form-control desc_tarea" cols="20" rows="4"><?php echo  $hist['hist_descripcion'] ?></textarea>
                            </div>

                            <div class="col-md-3">
                                <label class="titulos_negrita">Ciudad</label>
                                <label class="estiloinput form-control oferta"><?php echo  $hist['hist_ciudad'] ?>
                            </div>
                            <div class="col-md-3">
                                <label class="titulos_negrita">País</label>
                                <label class="estiloinput form-control oferta"><?php echo  $hist['hist_pais'] ?>
                            </div>
                            <div class="col-md-6">
                                <label class="titulos_negrita">Certificado</label><br>
                                <a id='consultarhistorial' name='id_hist' type='button' data-url="<?php echo getUrl("Usuario", "Ofertas", "consultarhistorial", array("id_hist" => $hist['id_hist']), "ajax") ?>" class='btn btn-secondary radios'><i class='fa fa-eye'></i></a>
                            </div>
                            <div class="x_content"></div>
                            <div class="row justify-content-start col-md-12" style="">
                                <div class="justify-content-start col-md-12">
                                    <div class="x_title">
                                        <h3 style="family-weigh:bolder;">ÁREA DE ESPECIALIZACIÓN</h3>
                                    </div>

                                    <input type="hidden" name="formulario" id="formulario" value="<?php echo  $hist['id_hist'] ?>">
                                    <div style="border-radius:35px;padding:5px 5px 5px 5px;" id='actividadesmore2' name='id_hist' data-url="<?php echo getUrl("Admin", "Aspirante", "actividadesdinamicas", array("id_hist" => $hist['id_hist']), "ajax") ?>" class='col-md-12 titulos_negrita efectohover'><label>↓↓Mostrar más↓↓</label>
                                    </div>
                                    <div id="result" class='x_content col-md-12'></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        <?php          }
        }
        ?>
    </div>
<?php
} else {
    redirect("indexUsu.php");
}
?>