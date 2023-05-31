<?php
if ($_SESSION['rolId'] == 2) {
?>
    <div class="eo #contenedor_arriba x_content">
        <div style="text-align:center;" class="x_title">
            <h5 style=" font-weight: bolder;">FORMACIÓN</h5>
        </div>
        
        <form id="alertaformacion" action="<?php echo getUrl("Usuario", "Ofertas", "postformacion") ?>" method="post" enctype="multipart/form-data">
            <div class="row justify-content-start">
                <div id="cont_tituloname" class="col-md-9">
                    <label class="titulos_negrita">Título Obtenido<span style="color:red"></span></label>
                    <input type="text" id="form_tituloname" style="text-transform:uppercase;" name="form_tituloname" class="estiloinput form-control oferta">
                    <p class="error"><small>solo debe contener letras.</small>
                    </p>
                </div>
                <div id="cont_fecha_fin" class="col-md-3">
                    <label class="titulos_negrita">Fecha Graduación<span style="color:red"></span></label>
                    <input type="date" id="form_fecha_fin" name="form_fecha_fin" placeholder="Ejm: ingles, frances..." class="estiloinput form-control oferta">
                    <p class="error"><small>solo debe contener letras.</small>
                    </p>
                    <input type="hidden" id="mes" name="mes" value="0">
                    <input type="hidden" id="año" name="año" value="0">
                    <input type="hidden" id="dia" name="dia" value="0">
                    <input type="hidden" id="comparar" name="comparar" value="0">
                </div>

                <div id="cont_pais" class="col-md-4">
                    <br>
                    <label class="titulos_negrita">País<span style="color:red"></span></label>
                    <select class="form-control" id="hist_pais" name="hist_pais">
                        <option value=""></option>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo '<option value="';
                                echo $row['id_pais'];
                                echo '">';
                                echo $row['nombre_pais'];
                                echo '</option>';
                            }
                        } else {
                            echo '<option value="">Pais no disponible</option>';
                        }
                        ?>
                    </select>
                </div>

                <div id="cont_estado" class="col-md-4">
                    <br>
                    <label class="titulos_negrita">Estado<span style="color:red"></span></label>

                    <select class="form-control" id="hist_estado" name="hist_estado">

                        <option value=""></option>
                    </select>
                </div>


                <div id="cont_ciudad" class="col-md-4">
                    <br>
                    <label class="titulos_negrita">Ciudad<span style="color:red"></span></label>

                    <select class="form-control" id="hist_ciudad" name="hist_ciudad">
                        <option value=""></option>
                    </select>
                </div>
                <div class="col-md-6">
                    <br>
                    <label class="titulos_negrita">Nivel de Educación<span style="color:red"></span></label>
                    <select id="form_nivel_de_educacion" class="eme2 estiloinput form form-control" name="form_nivel_de_educacion">
                        <option selected="true" disabled>Nivel de Educación</option>
                        <option value="Educación Básica Primaria">Educación Básica Primaria</option>
                        <option value="Educación Básica Secundaria">Educación Básica Secundaria</option>
                        <option value="Bachillerato / Educaciòn Media">Bachillerato / Educación Media
                        </option>
                        <option value="Universidad / Carrera técnica">Universidad / Carrera técnica</option>
                        <option value="Universidad / Carrera tecnológica">Universidad / Carrera tecnológica
                        </option>
                        <option value="Universidad / Carrera Profesional">Universidad / Carrera Profesional
                        </option>
                        <option value="Postgrado / Especialización">Postgrado / Especialización</option>
                        <option value="Postgrado / Maestrìa">Postgrado / Maestrìa</option>
                        <option value="Postgrado / Doctorado">Postgrado / Doctorado</option>
                    </select>

                </div>
                <div id="cont_nombre" class="col-md-6">
                    <br>
                    <label class="titulos_negrita">Nombre de la Institución o Universidad<span style="color:red"></span></label>
                    <input type="text" id="form_nombre" name="form_nombre" style="text-transform:uppercase;" class="estiloinput form-control oferta">
                    <p class="error"><small>solo debe contener letras.</small>
                    </p>
                </div>
                <div id="cont_conocimientos" class="col-md-12">
                    <br>
                    <label class="titulos_negrita">Conocimientos Fundamentales<span style="color:red"></span></label>
                    <textarea id="form_conocimientos" name="form_conocimientos" style="text-transform:uppercase;" class="estiloinput form-control desc_tarea" cols="20" rows="4" placeholder="Ejm: word, excel, solidworks..." class="estiloinput form-control oferta"></textarea>
                    <p class="error"><small>solo debe contener letras.</small>
                    </p>
                </div>
                <!--AQUI ESTA EL CONTEDEDOR DE TODA LA FORMACION QUE VAYA  MOSTRAR-->
                <div class="row">
                    <div class=" mb-3 col-md-12">
                        <table class="table table-sm " id="dynamic_field">
                            <tbody>
                                <tr>
                                    <td class="col-md-6"> <label class="titulos_negrita">Idioma<span style="color:red"></span></label>
                                        <input type="text" name="idioma[]" id="idioma[]" placeholder="Ejm: ingles, aleman etc." class=" form form-control">
                                    </td>

                                    <td class="col-md-6"><label class="titulos_negrita"> Nivel del idioma<span style="color:red"></span></label><br><select type="text" name="NivelIdioma[]" id="NivelIdioma[]" placeholder="Ejm: ingles, aleman etc." class=" form form-control">
                                            <option value="Basico">Básico</option>
                                            <option value="Intermedio">Intermedio</option>
                                            <option value="Avanzado">Avanzado</option>
                                        </select></td>
                                    <td><br><br><button type="button" style="margin-left: 15px;" name="add" id="add" class="radios btn btn-primary">Agregar</button></td>
                                </tr>
                                <br>
                                <br>
                            </tbody>
                        </table>
                    </div>
                </div>


                <div id="cont_conocimientos" class="col-md-12">
                    <div class="col-md-6">
                        <label class="titulos_negrita">Adjunte título profesional<span style="color:red"></span></label>
                        <br>
                        <input class="" require id='certificadodeestudio' placeholder="" type="file" name="form_titulo_profesional" class="eme2  form form-control">

                    </div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6"></div>
                    <div class="col-md-6">
                        <br>

                        <div class="col-md-6">
                        </div>
                        <input id="pais" type="hidden" name="pais" value="">
                        <input id="estado" type="hidden" name="estado" value="">
                        <input id="ciudad" type="hidden" name="ciudad" value="">
                    </div>
                    <input id="paisesEstados" type="hidden" data-url="<?php echo getUrl("Usuario", "Ofertas", "consultarPaises", false, "ajax"); ?>">
                </div>
                <div class="col-md-3">
                    <button type="submit" name="submit" class="radios btn btn-primary">Guardar</button>
        </form>
    </div>


    <div>
        <br>
        <br>
        <div style="text-align:center;" class="x_title">
            <h5 style=" font-weight: bolder;">FORMACIÓN REGISTRADA</h5>
        </div>
        <?php $prueba = false;
        foreach ($formacion as $form) { $prueba = true;?>

            <div class="x_content col-md-12" style="border-top:1px solid black;display:flex;padding:5px 5px 5px 12px;">
                <form enctype="multipart/form-data">
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <label class="titulos_negrita">Título Obtenido<span style="color:red"></span></label>
                            <input type="text" value="<?php echo $form["form_tituloname"] ?>" readonly class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <label class="titulos_negrita">Fecha Graduación<span style="color:red"></span></label>
                            <input type="text" readonly value="<?php echo $form["form_fecha_fin"] ?>" placeholder="Ejm: ingles, frances..." class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <label class="titulos_negrita">Pais<span style="color:red"></span></label>
                            <input type="text" readonly value="<?php echo $form["form_pais"] ?>" class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Estado<span style="color:red"></span></label>
                            <input type="text" readonly value="<?php echo $form["form_estado"] ?>" class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Ciudad<span style="color:red"></span></label>
                            <input type="text" readonly value="<?php echo $form["form_ciudad"] ?>" class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-6">
                            <br>
                            <label class="titulos_negrita">Nivel de Educación<span style="color:red"></span></label>
                            <input type="text" readonly value="<?php echo $form["form_nivel_de_educacion"] ?>" id="" class="estiloinput form-control oferta" readonly>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <label class="titulos_negrita">Nombre de la Institución o Universidad<span style="color:red"></span></label>
                            <input type="text" value="<?php echo $form["form_nombre"] ?>" readonly class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-6">
                            <br>
                            <label class="titulos_negrita">Conocimientos Fundamentales<span style="color:red"></span></label>
                            <input readonly value="<?php echo $form["form_conocimientos"] ?>" type="text" class="estiloinput form-control oferta">
                        </div>

                        <div class="row">
                            <div class=" mb-3 col-md-12">
                                <br>
                                <table class="table table-sm " id="dynamic_field">
                                    <tbody>
 
                                        <?php $int_idiomas = $form['form_idiomas'];
                                        $int_nivel_idiomas = $form['form_nivel_idiomas'];

                                        $array_nivel_idiomas = explode(";",  $int_nivel_idiomas);

                                        $array_idiomas = explode(";",  $int_idiomas);
                                        $longitud = count($array_idiomas);

                                        for ($i = 1; $i <= ( $longitud); $i++) {

                                                echo ' <tr>';
                                                echo '<td class="col-md-3"><label class="titulos_negrita">Idioma<span style="color:red"></span></label><input type="text" readonly name="idioma[]" id="idioma[]" value="' .  $array_idiomas[$i - 1] . '"" class=" form form-control"></td>';
                                                echo '<td class="col-md-3"><label class="titulos_negrita"> Nivel del idioma<span style="color:red"></span></label><br><input type="text" readonly name="idioma[]" id="idioma[]" value="' .  $array_nivel_idiomas[$i - 1] . '"" class=" form form-control"></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                         
                                    </tbody>
                                </table>
                            </div>
                        </div>


                        <!--<div class="col-md-6">
                                   <div></div>
                                    <a id='consultarcertificado' type='button'
                                        data-url="<?php echo getUrl("Usuario", "Ofertas", "consultarcertificado", array("id_formacion" => $form['id_formacion']), "ajax") ?>"
                                    class='btn btn-primary radios'><i class='fa fa-file'></i></a>
                                </div>-->

                        <div class="col-md-6">
                            <br>
                            <br>
                            <label class="titulos negrita"></label>Certificado <label>
                                <br>

                                <a id='consultarcertificado' type='button' data-url="<?php echo getUrl("Usuario", "Ofertas", "consultarcertificado", array("id_formacion" => $form['id_formacion']), "ajax") ?>" class='btn btn-primary radios'><i class='fa fa-eye'></i></a>
                        </div>


                        <div class="col-md-6"></div>

                        <div class="col-md-6">
                            <br>

                        </div>
                        <div class="col-md-4" style="float:right;">
<?php   

        if ($prueba == true) { ?>
       
    <button id='eliminarformacion' type="button" data-url="<?php echo getUrl("Usuario", "Ofertas", "eliminarforma", array("id_formacion" => $form['id_formacion']), "ajax") ?>" class='btn btn-danger radios' value='Eliminar'><i class="fa fa-trash"></i> Eliminar</button></i>
<?php } else{ ?>
    
<?php } ?>
    <!-- <a href="<?php echo getUrl("Usuario", "Ofertas", "experiencia") ?>" type="button" class="btn btn-success radios">Siguiente</a> -->
</div>
                    </div>
            </div>
    </div>
<?php      } ?>

<?php
} else {
    session_destroy();
    redirect("login.php");
}
?>
<script>
    const registro2 = document.getElementById('alertaformacion');
    const inputs1 = document.querySelectorAll('#alertaformacion input');
    const expresiones2 = {
        usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
        password: /^.{4,12}$/, // 4 a 12 digitos.
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        fecha: /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/,
    }
    const campos2 = {
        form_tituloname: false,
        form_nombre: false,
        form_conocimientos: false,
        form_fecha_fin: false,

    }
    const validarmodal1 = (e) => {
        switch (e.target.name) {

            case "form_tituloname":
                if (expresiones2.nombre.test(e.target.value)) {
                    document.getElementById('form_tituloname').classList.remove('procesomalo');
                    document.getElementById('form_tituloname').classList.add('procesobueno');
                    document.querySelector('#cont_tituloname .error').classList.remove("error-activo");
                    campos2['form_tituloname'] = true;
                } else {
                    document.getElementById('form_tituloname').classList.add('procesomalo');
                    document.getElementById('form_tituloname').classList.remove('procesobueno');
                    document.querySelector('#cont_tituloname .error').classList.add("error-activo");
                    campos2['form_tituloname'] = false;
                }
                break;

            case "form_nombre":
                if (expresiones2.nombre.test(e.target.value)) {
                    document.getElementById('form_nombre').classList.remove('procesomalo');
                    document.getElementById('form_nombre').classList.add('procesobueno');
                    document.querySelector('#cont_nombre .error').classList.remove("error-activo");
                    campos2['form_nombre'] = true;
                } else {
                    document.getElementById('form_nombre').classList.add('procesomalo');
                    document.getElementById('form_nombre').classList.remove('procesobueno');
                    document.querySelector('#cont_nombre .error').classList.add("error-activo");
                    campos2['form_nombre'] = false;
                }
                break;
            case "form_conocimientos":
                if (expresiones2.nombre.test(e.target.value)) {
                    document.getElementById('form_conocimientos').classList.remove('procesomalo');
                    document.getElementById('form_conocimientos').classList.add('procesobueno');
                    document.querySelector('#cont_conocimientos .error').classList.remove("error-activo");
                    campos2['form_conocimientos'] = true;
                } else {
                    document.getElementById('form_conocimientos').classList.add('procesomalo');
                    document.getElementById('form_conocimientos').classList.remove('procesobueno');
                    document.querySelector('#cont_conocimientos .error').classList.add("error-activo");
                    campos2['form_conocimientos'] = true;
                }
                break;
            case "form_fecha_fin":
                if (expresiones2.password.test(e.target.value)) {
                    document.getElementById('form_fecha_fin').classList.remove('procesomalo');
                    document.getElementById('form_fecha_fin').classList.add('procesobueno');
                    document.querySelector('#cont_fecha_fin .error').classList.remove("error-activo");
                    campos2['form_fecha_fin'] = true;
                } else {
                    document.getElementById('form_fecha_fin').classList.add('procesomalo');
                    document.getElementById('form_fecha_fin').classList.remove('procesobueno');
                    document.querySelector('#cont_fecha_fin .error').classList.add("error-activo");
                    campos2['form_fecha_fin'] = false;
                }
                break;
        }
    }
    //ejecuta la funcion 
    inputs1.forEach((input) => {
        input.addEventListener('keyup', validarmodal1);
        input.addEventListener('blur', validarmodal1);
    });


    //que valide y no envie
    registro2.addEventListener('submit', (e) => {

        if (campos2.form_tituloname && campos2.form_nombre && campos2.form_fecha_fin) {
            $(document).on("submit", "#alertaformacion", function() {

                location.reload();
            });
            return true;
        } else {
            e.preventDefault();
            alert("No tiene completos los campos o tiene datos inválidos");
            return false;
        }
    });


    var i = 1;
    $('#add').click(function() {
        i++;
        $('#dynamic_field').append('<tr id="row' + i + '" ><td><input type="text" name="idioma[]" id="idioma[]" placeholder="Ejm: ingles, aleman etc." class=" form form-control" required></td><td ><select type="text" name="NivelIdioma[]" id="NivelIdioma[]" required placeholder="Ejm: ingles, aleman etc." class=" form form-control"><option selected="true" disabled>Nivel del Idioma</option><option value="Basico">Basico</option><option value="Intermedio">Intermedio</option><option value="Avanzado">Avanzado</option></select></td><td><button type="button" name="remove" id="' + i + '" class="btn btn-danger btn_remove"  style="margin-left: 30px;" >X</button></td></tr>');
    });

    $(document).on('click', '.btn_remove', function() {
        var button_id = $(this).attr("id");
        $('#row' + button_id + '').remove();
    });










    $("#pais").val($("#hist_pais option:selected").text());
    $("#estado").val($("#hist_estado option:selected").text());
    $("#ciudad").val($("#hist_ciudad option:selected").text());

    $(document).on('change', '#hist_pais', function() {

        var url = $("#paisesEstados").attr("data-url");
        $("#paisesEstados").attr("data-url");

        $("#pais").val($("#hist_pais option:selected").text());

        var countryID = $(this).val();

        if (countryID) {
            $.ajax({
                type: 'POST',
                url: url,
                data: 'id_pais=' + countryID,
                success: function(html) {
                    $('#hist_estado').html(html);
                    $('#hist_ciudad').html('<option value="">Selecionar estado/provincia primero</option>');
                }
            });
        } else {
            $('#hist_estado').html('<option value="">Select country first</option>');
            $('#hist_ciudad').html('<option value="">Selecionar estado/provincia primero</option>');
        }

    });

    $(document).on('change', '#hist_estado', function() {

        var url = $("#paisesEstados").attr("data-url");

        $("#estado").val($("#hist_estado option:selected").text());

        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: 'POST',
                url: url,
                data: 'id_estado=' + stateID,
                success: function(html) {
                    $('#hist_ciudad').html(html);
                }
            });
        } else {
            $('#hist_ciudad').html('<option value="">Selecionar estado/provincia primero</option>');
        }
    });

    $(document).on('change', '#hist_ciudad', function() {

        $("#ciudad").val($("#hist_ciudad option:selected").text());

    });
</script>
<!---finnallllllllllll---->