<?php 
if($_SESSION['rolId']==1){
?>
 <?php
foreach ($vacantes as $vac) {
?>
    <div class="modal-content">
        <form id="AlertUpdateEstado" action="<?php echo getUrl("Admin", "Formulario","UpdateEstadoVacante");?>" method="post">
            <div class="col-md-12 form-group">
                <label>Nombre de la vacante</label> 
                <input type="text" readonly  name="vac_nombre" style="text-transform:uppercase;" value="<?php echo $vac['vac_nombre']; ?>" class="form-control">
                <input type="hidden" name="id"  value="<?php echo $vac['id_vacante'] ?>" class="form-control">
            </div>
            <div class="col-md-12 form-group">
                <label>Actualizar Estado</label>
                <select id="estadochange" name="estado" class="form-control">
                    <option selected="true" disabled>Seleccione estado de la vacante</option>

                    <?php foreach ($Estados as $est) { ?>

                        <option value='<?= $est['id_estadovacante'] ?>'><?= $est['est_nombre'] ?></option>

                    <?php } ?>

                </select><br>
            </div>
            <div id="aplicaroculto" class="col-md-12 form-group">
                <label>Fecha de cierre de la vacante</label>
                <input type="date" name="cierre" class="form form-control"></input>
            </div>

            <div class="modal-footer">
                
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <input type="submit" class="btn btn-primary float-right" value="Editar">
            </div>

        </form>
        <div>

        <?php
    }
        ?>
        <?php
}else{
    redirect("indexUsu.php");
}
?>