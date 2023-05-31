<div class="eo #contenedor_arriba x_content">

    <div style="text-align:center;" class="x_title">
        <h5 style=" font-weight: bolder, corina;">GENERAR VACANTES</h5>
    </div>

    <?php
    if ($_SESSION['rolId'] == 1) {
    ?>
        <div id="validarformulario" class="justify-content-start">
            <form id="alertagenerarvacante" class="formulario" method="POST" enctype="multipart/form-data" action="<?php echo getUrl("Admin", "Formulario", "postInsert") ?>">

                <div class="x_title">
                    <h2 class="xc_color">Datos de la vacante</h2>
                    <div class="clearfix"></div>
                </div>

                <div class="row justify-content-start"  id="nombres">
                    <div class="col-md-6 caja">
                        <label><h6>Titulo de la oferta </h6> </label>
                        
                        <input id="vac_nombre" name="vac_nombre" style="text-transform:uppercase;" placeholder="Ejm: Ingeniero electrico, auxiliar" type="text" class="estiloinput form-control oferta">
                        <p class="error"><small>Debe digitar solo letras</small></p>
                    <br></div>

                    <div class="input col-md-6">
                        <label><h6>Salario </h6></label>
                        <br>
                        <input id="vac_salario" name="vac_salario" placeholder="Ejm:800.000 o A Convenir" class="estiloinput form-control oferta" type="text">
   <br> </div>

                </div>
                <div class="row justify-content-start">
                    <div class="input col-md-6">

                        <label for="text"><h6>Tipo de contrato </h6></label>
                        <select require name="vac_tipo_contrato" class="estiloinput form-control oferta" id="">
                            <option selected="true" disabled>Selecciona</option>
                            <option value="Contrato ocasional de trabajo">Contrato ocasional de trabajo</option>
                            <option value="Contrato de aprendizaje">Contrato de aprendizaje</option>
                            <option value="Contrato civil por prestación de servicios">Contrato civil por prestación de
                                servicios</option>
                            <option value="Contrato de obra o labor">Contrato de obra o labor</option>
                            <option value="Contrato a término indefinido">Contrato a término indefinido</option>
                            <option value="Contrato a término fijo">Contrato a término fijo</option>
                        </select>
   <br> </div>
    
    
                    <div class="input col-md-6">
                        <label for="text"><h6>Jornada laboral </h6></label>
                        <select require name="vac_jornada_laboral" class="estiloinput form-control oferta" id="">
                            <option selected="true" disabled>Selecciona</option>
                            <option value="Tiempo parcial">Tiempo parcial</option>
                            <option value="Tiempo completo">Tiempo completo</option>
                            <option value="Por horas">Por horas</option>
                            <option value="Desde casa">Desde casa</option>
                            <option value="Becas/Practicas">Pasantias/Practicas</option>
                        </select>
    <br></div>
    
                    
    <div class="col-md-6">
                        <label><h6>Fecha de publicación </h6></label>
                        <input require name="vac_publicacion" class=" oferta estiloinput form-control" type="date">
                   <br> </div>

                    <div class="input col-md-6">
                        <label> <h6>Fecha de finalizacion </h6></label>
                        <input require name="vac_fecha" class=" oferta estiloinput form-control" type="date">
                    <br></div>
                    <div class="input col-md-6">
                        <label><h6>Ubicacion</h6></label>
                        <input id="vac_ubicacion"  name="vac_ubicacion" placeholder="Ciudad" class="estiloinput form-control oferta" type="text">
                    <br> </div>

                    <div class="input col-md-6">
                        <label><h6>Cargo</h6></label>
                        <input id="vac_cargo" name="vac_cargo"   placeholder="Ingeniero de proyectos" class="estiloinput form-control oferta" type="text">
                    <br> </div>
                    <div class="input col-md-12">
                        <label><h6>Descripción</h6></label>
                        <textarea id="textArea" name="vac_descripcion"  class="estiloinput form-control desc_tarea" id="" cols="30" rows="8"> </textarea>
                   <br> </div>
                   <div class="input col-md-12">
                        <label><h6>Funciones generales</h6></label>
                        <textarea id="textArea" name="vac_funciones_generales"  class="estiloinput form-control desc_tarea" id="" cols="30" rows="8"> </textarea>
                   <br> </div>

                   <div class="input col-md-12">
                        <label><h6>Funciones especificas</h6></label>
                        <textarea id="textArea" name="vac_funciones_especificas"  class="estiloinput form-control desc_tarea" id="" cols="30" rows="8"></textarea>
                   <br> </div>


                </div>
        </div>
</div>

<!---2da parte del formulario --->

<div class="eo #contenedor_arriba x_content">
    <div style="text-align:center;" class="x_title">
        <h5 style=" font-weight: bolder;">REQUERIMIENTOS</h5>
    </div>


    <div class="row" id="">
        <div class="input col-md-6">
            <label><h6>Años de experiencia</h6></label>
            <input require placeholder="Ejm: 2 años de experiencia" type="text" name="vac_años_xp" class="estiloinput form-control oferta">
      <br> </div>
        <div class="col-md-6">
            <label><h6>Estudios Minimos</h6></label>
            <select require class="estiloinput form-control" style="width:520px;" name="vac_educacion" id="vac_educacion">
                <option selected="true" disabled>Selecciona</option>
                <option value="Educaciòn Bàsica Primaria">Educación Básica Primaria</option>
                <option value="Educación Básica Secundaria">Educación Básica Secundaria</option>
                <option value="Bachillerato / Educación Media">Bachillerato / Educación Media</option>
                <option value="Universidad / Carrera técnica">Universidad / Carrera técnica</option>
                <option value="Universidad / Carrera tecnológica">Universidad / Carrera tecnológica</option>
                <option value="Universidad / Carrera Profesional">Universidad / Carrera Profesional</option>
                <option value="Postgrado / Especializaciòn">Postgrado / Especializaciòn</option>
                <option value="Postgrado / Maestrìa">Postgrado / Maestrìa</option>
                <option value="Postgrado / Doctorado">Postgrado / Doctorado</option>
            </select>
       <br></div>

    </div>
    <div class="x_content"></div>
    <div class="row justify-content-end">

        <a href="indexAdmin.php" class="btn btn-danger radios">Cancelar</a>
        <button id="generarvacantes" type="submit" class="btn btn-primary float-right radios">Generar</button>

    </div>
</div>
</div>
</form>
</div>
<?php
    } else {
        redirect("indexUsu.php");
    }
?>

