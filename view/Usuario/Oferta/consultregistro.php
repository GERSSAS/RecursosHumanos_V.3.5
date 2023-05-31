<?php
if ($_SESSION['rolId'] == 2) {
    foreach ($usuario as $usu) {
?>

        <div class="eo #contenedor_arriba x_content">
            <div class="justify-content-start  caja">
                <div style="text-align:center;" class="x_title">
                    <h5 style=" font-weight: bolder;">INFORMACIÓN REGISTRADA</h5>
                </div>
                <form id="actualizarinformacionpersonal" action="<?php echo getUrl("Usuario", "Ofertas", "ActualizarRegistro"); ?>" method="post" enctype="multipart/form-data">
                    <div class="justify-content-start col-md-12 caja">
                        <div class="card-body p-4">
                            <div class="row justify-content-start">

                                <div class="col-md-3">
                                    <label class="titulos_negrita">Nombre/s</label>
                                    <input readonly type="text" name="" value="<?= $usu['usu_nombre'] ?>" class="estiloinput form-control oferta">
                                </div>

                                <div class="col-md-3">
                                    <label class="titulos_negrita">Apellido/s</label>
                                    <input readonly type="text" name="" value="<?= $usu['usu_apellido'] ?>" class="estiloinput form-control oferta">
                                </div>

                                <div class="col-md-3">
                                    <label class="titulos_negrita">Correo Electrónico</label>
                                    <input type="text" name="correo" value="<?= $usu['usu_correo'] ?>" class="estiloinput form-control oferta">
                                </div>
                                <div class="col-md-3">
                                    <label class="titulos_negrita">Fecha de Nacimiento</label>
                                    <input id="fecha_nacimiento" name="fecha_nacimiento" type="date" value="<?= $usu['fecha_nacimiento'] ?>" class="estiloinput form-control oferta">
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">Genero</label><br>
                                    <select class="form-control" name="usu_genero" id="usu_genero">
                                        <option value="<?php echo $usu['usu_genero']; ?>" selected="selected"><?php echo $usu['usu_genero']; ?></option>
                                        <option value="Masculino">Masculino</option>
                                        <option value="Femenino">Femenino</option>
                                        <option value="Sin definir">Sin definir</option>
                                    </select>
                                </div>
                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">Estado Civil</label>
                                    <select class="form-control" name="estado_civil" id="estado_civil">
                                        <option value="<?php echo $usu['estado_civil']; ?>" selected="selected"><?php echo $usu['estado_civil']; ?></option>
                                        <option value="Soltero">Soltero(a)</option>
                                        <option value="Casado">Casado(a)</option>
                                        <option value="Casado">Separado/Divorciado(a)</option>
                                        <option value="Casado">Viudo(a)</option>



                                    </select>

                                </div>

                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">Teléfono</label>
                                    <input type="text" name="usu_telefono" value="<?= $usu['usu_telefono'] ?>" class="estiloinput form-control oferta">
                                </div>

                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">País</label><br>
                                    <select class="form-control" id="usu_pais_residencia" name="usu_pais_residencia">
                                        <option value="<?php echo $usu['usu_pais_residencia']; ?>" selected="selected"><?php echo $usu['usu_pais_residencia']; ?></option>
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

                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">Estado</label><br>
                                    <select class="form-control" id="state" name="state">
                                        <option value="<?php echo $usu['usu_estado']; ?>" selected="selected"><?php echo $usu['usu_estado']; ?></option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">Ciudad</label>

                                    <select class="form-control" id="usu_residencia" name="usu_residencia" >
                                        <option value="<?php echo $usu['usu_residencia']; ?>" selected="selected"><?php echo $usu['usu_residencia']; ?></option>
                                        <option value=""></option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">Dirección</label>
                                    <input type="text" name="usu_direccion" value="<?= $usu['usu_direccion'] ?>" class="estiloinput form-control oferta">
                                </div>

                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">Tipo Documento</label>
                                    <select  class="form-control" id="usu_tipo_documento" name="usu_tipo_documento">
                                        <option value="<?php echo $usu['usu_tipo_documento']; ?>" selected="selected"><?php echo $usu['usu_tipo_documento']; ?></option>
                                        <option value=""></option>
                                        <option value="Cédula ciudadania">Cédula ciudadania</option>
                                        <option value="trajeta identidad">Tarjeta identidad</option>
                                        <option value="Cédula de extranjeria">Cédula de extranjeria</option>
                                        <option value="pasaporte">Pasaporte</option>
                                    </select>
                                </div>

                                <div class="col-md-3">
                                    <br>
                                    <label class="titulos_negrita">Documento</label>
                                    <input  type="text" id="documento" name="documento"  value="<?= $usu['usu_documento'] ?>" class="estiloinput form-control oferta">
                                </div>
                                <div class="col-md-3"><br>
                                    <label class="titulos_negrita">Fecha de registro</label>
                                    <input id="usu_fecha_registro" name="usu_fecha_registro" type="date" value="<?= $usu['usu_fecha_registro'] ?>" class="estiloinput form-control oferta">
                                </div>
                            </div>

                            <br>
                            <input type="submit" style="float:right;" type="button" class="radios btn btn-primary" value="Actualizar">


                        </div>
                    </div>

                    <input id="pais" type="hidden" name="pais" value="">
                    <input id="estado" type="hidden" name="estado" value="">
                    <input id="ciudad" type="hidden" name="ciudad" value="">
                </form>
            </div>
        </div>


        <div class="eo #contenedor_arriba x_content">
            <div class="justify-content-start  caja">
                <div style="text-align:center;" class="x_title">
                    <br>
                    <h5 style=" font-weight: bolder;">DOCUMENTOS DE SOPORTE</h5>
                </div>
                <div class="justify-content-start col-md-12 caja">
                    <div class=" row card-body p-4">
                        <form id="alertahoja" class="col-md-4" action="<?php echo getUrl("Usuario", "Ofertas", "actualizarDocumentos") ?>" method="post" enctype="multipart/form-data">
                            <div class="justify-content-start ">

                                <label class="titulos_negrita">Hoja de Vida<span style="color:red"></span></label><br>
                                <div class="input-group">
                                    <div class="input-group-prepend">

                                    </div>
                                    <div class="custom-file">

                                        <input class="" require id='usu_hojadevida' placeholder="" type="file" name="usu_hojadevida" class="eme2  form form-control">


                                    </div>
                                </div>

                                <?php if ($usu['usu_hojadevida'] == "" or $usu['usu_hojadevida'] == "../web/hojas/" or $usu['usu_hojadevida'] == "../web/" or $usu['usu_hojadevida'] == "../") {
                                    echo "<div class='col-md-6'><small></small></div>";
                                } else { ?>
                                    <a id="hojaVida" type="button" target="_black" title="Visor hoja de vida" href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$usu['usu_hojadevida']?>" class="radios modalhojadevida btn btn-info"><i class="fa fa-eye"></i></a><?php echo $usu['usu_fechahojadevida'] ?>

                                    <input id="hojaDeVida" name="hojaDeVida" type="hidden" value="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/RecursosHumanos' . $usu['usu_hojadevida'] ?>">
                                <?php } ?>
                                <input type="submit" style="float:right;" type="button" class="radios btn btn-primary" value="Guardar">
                            </div>
                        </form>
                        <form style="padding-left:90px;" id="alertamatricula" class="col-md-4 float-right" action="<?php echo getUrl("Usuario", "Ofertas", "actualizarDocumentos2") ?>" method="post" enctype="multipart/form-data">
                            <div class="justify-content-start  ">
                                <label class="titulos_negrita">Tarjeta Profesional<span style="color:red"></span></label><br>

                                <div class="input-group">

                                    <div class="input-group-prepend">
                                    </div>
                                    <div class="custom-file">
                                        <input class="" require id='usu_matricula' placeholder="" type="file" name="usu_matricula" class="eme2  form form-control">

                                    </div>
                                </div>

                                <?php if ($usu['usu_matricula'] == "../web/carta/" or $usu['usu_matricula'] == "../web/" or $usu['usu_matricula'] == "../" or $usu['usu_matricula'] == "") {
                                    echo "<div class='col-md-6'><small></small></div>";
                                } else { ?>

                                    <a id="tarjeta" title="Visor matricula profesional" type="button" target="_black" href="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/RecursosHumanos' . $usu['usu_matricula'] ?>" class="radios modalhojadevida btn btn-info"><i class=" fa fa-eye"></i></a><?php echo $usu['usu_fechamatricula'] ?>

                                    <input id="tarjetaProfesional" name="tarjetaProfesional" type="hidden" value="<?php echo 'https://' . $_SERVER['HTTP_HOST'] . '/RecursosHumanos' . $usu['usu_matricula'] ?>">
                                <?php } ?>
                                <input type="submit" style="float:right;" type="button" class="radios btn btn-primary" value="Guardar">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="eo #contenedor_arriba x_content">
            <div style="text-align:center;" class="x_title">
                <br>
                <h5 style=" font-weight: bolder;">CAMBIAR CONTRASEÑA</h5>
            </div>
            <form id="passwords" class="col-md-12" action="<?php echo getUrl("Usuario", "Ofertas", "updatepassword"); ?>" method="post">
                <div class="justify-content-start col-md-12 caja">
                    <div class="card-body p-4">
                        <div class="row justify-content-start">
                            <div id="contenedorpassword2" class="col-md-4">
                                <label class="titulos_negrita">Contraseña Anterior</label>
                                <input id="usu_contraseña" type="password" name="ContraseñaVieja" class="estiloinput form-control oferta">
                                <p class="error"><small>La contraseña tiene que ser de 4 a 12 dígitos o letras.</small></p>
                            </div>

                            <div id="contenedorpassword3" class="col-md-4">
                                <label class="titulos_negrita">Nueva Contraseña</label>
                                <input id="usu_contraseña2" type="password" name="ContraseñaNueva" class="estiloinput form-control oferta">
                                <p class="error"><small>La contraseña tiene que ser de 4 a 12 dígitos o letras.</small></p>
                            </div>

                            <div class='col-md-4'><br><B>
                                    <button type="submit" class=" radios btn btn-primary">Actualizar Contraseña</button>
                            </div>
                        </div>
                    </div>
                </div>

            </form>

            <input id="paisesEstados" type="hidden" data-url="<?php echo getUrl("Usuario", "Ofertas", "consultarPaises", false, "ajax"); ?>">
            <input id="estadosCiudades" type="hidden" data-url="<?php echo getUrl("Usuario", "Ofertas", "consultarCiudades", false, "ajax"); ?>">
        </div>


        <div id="myModal" class="modal fade bd-example-modal-lg" role="dialog">
            <div class="modal-dialog modal-lg">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title"> </h4>
                    </div>
                    <div class="modal-body">
                        <div class="ExternalFiles embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src=""></iframe>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>

            </div>
        </div>

<?php
    }
} else {
    session_destroy();
    redirect("login.php");
}
?>


<script>
    const registro = document.getElementById('passwords');
    const inputs = document.querySelectorAll('#passwords input');

    const expresiones = {
        password: /^.{4,12}$/ // 4 a 12 digitos.
    }
    const campos = {
        ContraseñaVieja: false,
        ContraseñaNueva: false,
    }
    const validarmodal2 = (e) => {
        switch (e.target.name) {

            case "ContraseñaVieja":
                if (expresiones.password.test(e.target.value)) {
                    document.getElementById('usu_contraseña').classList.remove('procesomalo');
                    document.getElementById('usu_contraseña').classList.add('procesobueno');
                    document.querySelector('#contenedorpassword2 .error').classList.remove("error-activo");
                    campos['ContraseñaVieja'] = true;
                } else {
                    document.getElementById('usu_contraseña').classList.add('procesomalo');
                    document.getElementById('usu_contraseña').classList.remove('procesobueno');
                    document.querySelector('#contenedorpassword2 .error').classList.add("error-activo");
                    campos['ContraseñaVieja'] = false;
                }
                break;

            case "ContraseñaNueva":
                if (expresiones.password.test(e.target.value)) {
                    document.getElementById('usu_contraseña2').classList.remove('procesomalo');
                    document.getElementById('usu_contraseña2').classList.add('procesobueno');
                    document.querySelector('#contenedorpassword3 .error').classList.remove("error-activo");
                    campos['ContraseñaNueva'] = true;
                } else {
                    document.getElementById('usu_contraseña2').classList.add('procesomalo');
                    document.getElementById('usu_contraseña2').classList.remove('procesobueno');
                    document.querySelector('#contenedorpassword3 .error').classList.add("error-activo");
                    campos['ContraseñaNueva'] = false;
                }
                break;
        }
    }
    //ejecuta la funcion
    inputs.forEach((input) => {
        input.addEventListener('keyup', validarmodal2);
        input.addEventListener('blur', validarmodal2);
    });
    //que valide y no envie
    registro.addEventListener('submit', (e) => {

        if (campos.ContraseñaNueva && campos.ContraseñaVieja) {
            $(document).on("submit", "#passwords", function() {
                // swal("Se ha actualizado con exito!", "Presiona el boton!", "success");
                location.reload();
            });
            return true;
        } else {
            e.preventDefault();
            alert("No tiene completos los campos o son datos invalidos");
            document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
            return false;
        }


    });

    $("#pais").val($("#usu_pais_residencia option:selected").text());
    $("#estado").val($("#state option:selected").text());
    $("#ciudad").val($("#usu_residencia option:selected").text());


    $(document).on('click', '#tarjeta', function() {
        var url = $("#tarjetaProfesional").val();
        $("iframe").attr("src", url);
    });

    $(document).on('click', '#hojaVida', function() {
        var url = $("#hojaDeVida").val();
        $("iframe").attr("src", url);
    });

    $(document).on('change', '#usu_pais_residencia', function() {

        var url = $("#paisesEstados").attr("data-url");
        $("#paisesEstados").attr("data-url");

        $("#pais").val($("#usu_pais_residencia option:selected").text());

        var countryID = $(this).val();

        if (countryID) {
            $.ajax({
                type: 'POST',
                url: url,
                data: 'id_pais=' + countryID,
                success: function(html) {
                    $('#state').html(html);
                    $('#usu_residencia').html('<option value="">Selecionar estado/provincia primero</option>');
                }
            });
        } else {
            $('#state').html('<option value="">Select country first</option>');
            $('#usu_residencia').html('<option value="">Selecionar estado/provincia primero</option>');
        }

    });

    $(document).on('change', '#state', function() {

        var url = $("#paisesEstados").attr("data-url");
        $("#estado").val($("#state option:selected").text());
        var stateID = $(this).val();
        if (stateID) {
            $.ajax({
                type: 'POST',
                url: url,
                data: 'id_estado=' + stateID,
                success: function(html) {
                    $('#usu_residencia').html(html);
                }
            });
        } else {
            $('#usu_residencia').html('<option value="">Selecionar estado/provincia primero</option>');
        }
    });

    $(document).on('change', '#usu_residencia', function() {

        $("#ciudad").val($("#usu_residencia option:selected").text());


    });
</script>