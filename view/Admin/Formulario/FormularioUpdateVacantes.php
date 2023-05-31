<?php
if ($_SESSION['rolId'] == 1) {
?>
    <?php
    foreach ($Vacante as $vac) {
    ?>
        <div class="eo #contenedor_arriba x_content">
            <div class="encabezadoForm text-center x_title ">
                EDITAR VACANTE: <br><?php echo $vac['vac_nombre'] ?>
            </div>
            <form id="alertaactualizarvacante" method="POST" enctype="multipart/form-data" action="<?php echo getUrl("Admin", "Formulario", "UpdateForm"); ?>">
                <div class="justify-content-start">

                    <div class="x_title">
                        <h2 class="xc_color">Datos de la Vacante</h2>
                        <div class="clearfix"></div>
                    </div>

                    <div class="row justify-content-start" id="nombres">
                        <div class="col-md-6 caja">
                            <label><h6>Titulo de la oferta *</h6></label>
                            <input type="hidden" name="id_vacante" value="<?php echo $vac['id_vacante'] ?>">
                            <input name="vac_nombre" style="text-transform:uppercase;" value="<?php echo $vac['vac_nombre'] ?>" type="text" class="estiloinput form-control oferta">
                            <br></div>

                        <div class=" input col-md-6">
                        <label><h6>Salario*</h6></label> 
                            <input name="vac_salario" value="<?php echo $vac['vac_salario'] ?>" class="estiloinput form-control oferta" type="text">
                        </div><br>
                        </div>
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <label for="text"><h6>Tipo de contrato</h6></label>
                            <select name="vac_tipo_contrato" class="estiloinput form-control oferta" id="">
                                <option value="<?php echo $vac['vac_tipo_contrato'] ?>"><?php echo $vac['vac_tipo_contrato'] ?>
                                </option>
                                <option value="Contrato ocacional de trabajo">Contrato ocasional de trabajo</option>
                                <option value="Contrato de aprendizaje">Contrato de aprendizaje</option>
                                <option value="Contrato civil por prestación de servicio">Contrato civil por prestación de
                                    servicio</option>
                                <option value="Contrato de obra o labor">Contrato de obra o labor</option>
                                <option value="Contrato a término indefinido">Contrato a término indefinido</option>
                                <option value="Contrato a término fijo">Contrato a término fijo</option>
                            </select> </div>

                            <div class="col-md-6">

                            <label for="text"><h6>Jornada laboral</h6></label>
                            <select name="vac_jornada_laboral" class="estiloinput form-control oferta" id="">
                                <option value="<?php echo $vac['vac_jornada_laboral'] ?>">
                                    <?php echo $vac['vac_jornada_laboral'] ?></option>
                                <option value="Tiempo parcial">Tiempo parcial</option>
                                <option value="Tiempo completo">Tiempo completo</option>
                                <option value="Por horas">Por horas</option>
                                <option value="Desde casa">Desde casa</option>
                                <option value="Becas/Practicas">Pasantias/Practicas</option>
                            </select>
                      <br>  </div>

                      <div class="col-md-6">
                        <label><h6>Fecha de publicación</h6></label>
                        <input name="vac_publicacion" value="<?php echo $vac['vac_publicacion'] ?>" class="oferta estiloinput form-control" type="date">
                        <!--<input require name="vac_publicacion" class=" oferta estiloinput form-control" type="date">-->
                   <br> </div>

                        <div class="col-md-6">
                            <label><h6>Fecha de finalizacion*</h6></label>
                            <input name="vac_fecha" value="<?php echo $vac['vac_fecha'] ?>" class="oferta estiloinput form-control" type="date">
                        </div>

                        

                        <div class="input col-md-6">
                        <label><h6>Ubicacion</h6></label>
                        <input id="vac_ubicacion" style="text-transform:uppercase;" name="vac_ubicacion" placeholder="Ciudad" class="estiloinput form-control oferta" type="text">
                         </div>

                         <div class="input col-md-6">
                        <label><h6>Cargo</h6></label>
                        <input id="vac_cargo" style="text-transform:uppercase;" name="vac_cargo" placeholder="Ingeniero de proyectos" class="estiloinput form-control oferta" type="text" value=<?php echo $vac['vac_cargo'] ?>>
                         <br></div>
                        

                         
                        <div class="col-md-12">
                            <label><h6>Descripción</h6></label>
                            <textarea name="vac_descripcion" class="estiloinput form-control desc_tarea" id="" cols="30" rows="8"><?php echo $vac['vac_descripcion'] ?></textarea>
                        <br></div>

                        <div class="col-md-12">
                            <label><h6>Funciones generales*</h6></label>
                            <textarea name="vac_funciones_generales" class="estiloinput form-control desc_tarea" id="" cols="30" rows="8"><?php echo $vac['vac_funciones_generales'] ?></textarea>
                        <br></div>

                        <div class="col-md-12">
                            <label><h6>Funciones especificas*</h6></label>
                            <textarea name="vac_funciones_especificas" class="estiloinput form-control desc_tarea" id="" cols="30" rows="8"><?php echo $vac['vac_funciones_especificas'] ?></textarea>
                        </div>

                        
                    </div>
                </div>
        </div>

        <!---2da parte del formulario --->


        <div class="eo #contenedor_arriba x_content">
            <div class="encabezadoForm  clearfix text-center">
                REQUERIMIENTOS
            </div>
            <div class="row justify-content-start">
                <div class=" col-md-6 caja">
                    <label><h6>Años de experiencia*</h6></label>
                    <input value="<?php echo $vac['vac_años_xp'] ?>" type="text" name="vac_años_xp" class="estiloinput form-control oferta">
                </div>
                <div class="col-md-6 caja">
                    <label><h6>Estudios Minimos*</h6></label>
                    <select class="estiloinput form-control" style="width:520px;" name="vac_educacion" >
                        <option value="<?php echo $vac['vac_educacion'] ?>"><?php echo $vac['vac_educacion'] ?></option>
                        <option value="Educación Básica Primaria">Educación Básica Primaria</option>
                        <option value="Educación Básica Secundaria">Educación Básica Secundaria</option>
                        <option value="Bachillerato / Educaciòn Media">Bachillerato / Educación Media</option>
                        <option value="Universidad / Carrera técnica">Universidad / Carrera técnica</option>
                        <option value="Universidad / Carrera tecnológica">Universidad / Carrera tecnológica</option>
                        <option value="Universidad / Carrera Profesional">Universidad / Carrera Profesional</option>
                        <option value="Postgrado / Especialización">Postgrado / Especialización</option>
                        <option value="Postgrado / Maestrìa">Postgrado / Maestrìa</option>
                        <option value="Postgrado / Doctorado">Postgrado / Doctorado</option>
                    </select>
                </div>
            </div>
            <div class="x_content"></div>
            <div class="row justify-content-end">

                <a href="<?php echo getUrl("Admin", "Formulario", "consult"); ?>" class="btn btn-danger radios">Cancelar</a>
                <input type="submit" class="btn btn-primary float-right radios" value="Actualizar">

            </div>
        </div>
        </form>
    <?php
    }
    ?>
<?php
} else {
    redirect("indexUsu.php");
}
?>