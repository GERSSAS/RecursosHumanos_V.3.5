<?php
if ($_SESSION['rolId'] == 2) {
?>
    <div class="x_content">
    <div style="text-align:center;" class="x_title">
        <small class="xc_color">SU POSICIÓN EN EL PROCESO DE SELECCIÓN
        </small><br>
    </div>
    <?php
    if ($row == 0) {
        echo "<h3 class='col-md-12'>NO HAY APLICACIONES REGISTRADAS AÚN</h3>";
    } else {
        $prueba = 0;
        foreach ($listado as $lis) {


            if ($lis['selec_nombre'] == 'No seleccionado') {
            ?>
                <div class=" col-md-12 col-sm-10 ">

                    <div style="background:#817e7e;" class="x_panel col-md-12">
                        <div class="row justify-content-start col-md-12">
                            <div class="col-md-3 text-center">
                                <br>
                                <b> <label for="">VAC_<?=  $lis['id_vacante'] ?></label></b>

                            </div>
                            <div class="col-md-3 text-center">
                                <br>
                                <b> <label for=""><?= $lis['vac_nombre'] ?></label></b>

                            </div>
                            <div class="col-md-3 text-center">
                                <br>
                                <b> <label for=""><?= $lis['selec_nombre'] ?></label></b>
                            </div>
                            <a href="<?php echo getUrl("Usuario", "Ofertas", "consult") ?>" type="button" class="btn btn-primary btn-lg">Volver a
                                las vacantes</a>
                        </div>

                    </div>

                </div>
            <?php
            } else {

            ?>
                <div class=" col-md-12 col-sm-10 ">
                <b> <label  class="miclase" for=""><?= $lis['vac_nombre'] ?></label></b>
                    <div class="x_panel col-md-12 ">
                        <div id="estados<?=$prueba?>" class="row justify-content-start col-md-12">
                            <div  class="col-md-3 text-center">
                            <b> <label style="display:none;"class="estado_usuario<?=$prueba?>"><?= $lis['selec_nombre'] ?></label></b>
                                <b> <label for="">VAC_<?= $lis['id_vacante'] ?></label></b>
                            </div>
                            <div  class="arrow-steps clearfix">
                                <div id="aplicado" class="step"> <span>1. Aplicado.</span> </div>
                                <div id="vista" class="step"> <span>2. Hoja de vida vista.</span> </div>
                                <div id="proceso" class="step"> <span>3. En proceso.</span> </div>
                                <div id="finalizado" class="step"> <span>4. Finalizado.</span> </div>
                            </div>
                            <div class="nav clearfix">
                            </div>
                        </div>
                        <!-- <div class="col-md-3 text-center">
                            <br>
                            <b> <label for=""><?=$prueba++; $lis['selec_nombre'] ?></label></b>
                        </div>
                        <a href="<?php echo getUrl("Usuario", "Ofertas", "consult") ?>" type="button" class="btn btn-primary btn-lg">Volver a
                            las vacantes</a>
                    </div> -->

                    </div>

                </div>
                <br>


<?php
            }
        }
    }
} else {
    session_destroy();
    redirect("login.php");
}
?>

