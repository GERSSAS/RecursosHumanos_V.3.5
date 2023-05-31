<div class="eo #contenedor_arriba x_content">
    <div style="text-align:center;" class="x_title">
        <h5 style=" font-weight: bolder;">EXPERIENCIA LABORAL</h5>
    </div>


    <form id="alertaexperiencia" action="<?php echo getUrl("Usuario", "Ofertas", "posthistorial"); ?>" method="post" enctype="multipart/form-data">
        <div>

            <div class="">
                <div class="row justify-content-start">
                    <div id="cont_fecha_inicio" class="col-md-3">
                        <label class="titulos_negrita">Fecha Inicio<span style="color:red"></span></label>
                        <input id="hist_fecha_inicio" name="hist_fecha_inicio" value="" class="fechas oferta estiloinput form-control" type="date">
                        <p class="error"><small>debe diligenciar el campo.</small>
                    </div>

                    <div id="cont_fecha_final" class="col-md-3">
                        <label class="titulos_negrita">Fecha Final<span style="color:red"></span></label>
                        <input id="hist_fecha_fin" name="hist_fecha_fin" value="" class="fechas oferta estiloinput form-control" type="date">
                        <input type="hidden" id="mes" name="mes" value="0">
                        <input type="hidden" id="año" name="año" value="0">
                        <p class="error"><small>debe diligenciar el campo.</small>
                    </div>

                    <div id="cont_pais" class="col-md-3">
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

                    <div id="cont_estado" class="col-md-3">
                        <label class="titulos_negrita">Estado<span style="color:red"></span></label>

                        <select class="form-control" id="hist_estado" name="hist_estado">

                            <option value=""></option>
                        </select>
                    </div>


                    <div id="cont_ciudad" class="col-md-3">
                        <br>
                        <label class="titulos_negrita">Ciudad<span style="color:red"></span></label>

                        <select class="form-control" id="hist_ciudad" name="hist_ciudad">
                            <option value=""></option>
                        </select>
                    </div>



                    <div id="cont_hist_cargo" class="col-md-3">
                        <br>
                        <label class="titulos_negrita">Cargo<span style="color:red"></span></label>
                        <input id="hist_cargo" type="text" name="hist_cargo" placeholder="Cargo" class="estiloinput form-control oferta">
                        <p class="error"><small>solo puede contener letras.</small>
                    </div>
                    <div id="cont_empresa" class="col-md-3">
                        <br>
                        <label class="titulos_negrita">Empresa/Organización<span style="color:red"></span></label>
                        <input id="hist_empresa" type="text" name="hist_empresa" placeholder="Empresa/organizaación" class="estiloinput form-control oferta">
                        <p class="error"><small>solo puede contener letras.</small>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <label class="titulos_negrita">Trabaja Usted Actualmente</label><br>
                        <select class="form-control" name="hist_trabajoactual" id="hist_trabajoactual">
                            <option value=""></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <br><br><br><br>
                    <div id="cont_descripcion" class="col-md-12">
                        <br>
                        <label class="titulos_negrita">Descripción de Actividades<span style="color:red"></span></label>
                        <textarea id="hist_descripcion" name="hist_descripcion" class="estiloinput form-control desc_tarea" id="" cols="20" rows="4"></textarea>
                        <p class="error"><small>solo puede contener letras.</small></p>
                    </div>
                    <div class="col-md-6">
                        <br>
                        <label class="titulos_negrita">Certificado</label><br>
                        <input id="certificadolaboral" type="file" name="hist_certificado" placeholder="" class="form">
                    </div>

                    <div class="x_content"></div>
                    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $('form input[id="1"]').prop("disabled", false);
                            $(".agree").click(function() {

                                if ($(this).prop("checked") == false) {
                                    $('form input[id="1"]').prop("disabled", false);
                                } else if ($(this).prop("checked") == true) {
                                    $('form input[id="1"]').prop("disabled", true);
                                }
                            });
                        });
                    </script>
                    <br>
                    <div class="col-md-13">
                        <div class="row justify-content-start col-md-12" style="" id="actividades">
                            <div class="x_panel justify-content-start col-md-12">
                                <div class="x_title">

                                    <h3 style="family-weigh:bolder;">ÁREA DE ESPECIALIZACIÓN</h3>
                                </div>
                                <?php foreach ($areas as $area) { ?>
                                    <div style="float:left;" class="col-md-5">
                                        <b> <input type="checkbox" name="area[]" id="area" value="<?php echo $area['id_area'] ?>"></b><label><?php echo $area['are_nombre'] ?></label>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <input id="paisesEstados" type="hidden" data-url="<?php echo getUrl("Usuario", "Ofertas", "consultarPaises", false, "ajax"); ?>">
                </div>
            </div>
            <div style="padding:5px 5px 5px 5px;">
                <br>
                <input type="submit" style="float:right;" type="button" class="radios btn btn-primary" value="Guardar">
            </div>
            <input id="pais" type="hidden" name="pais" value="">
                    <input id="estado" type="hidden" name="estado" value="">
                    <input id="ciudad" type="hidden" name="ciudad" value="">
    </form>
<br>
<br>
    <div style="text-align:center;" class="x_title">
        <br>
        <h5 style=" font-weight: bolder;">EXPERIENCIA LABORAL REGISTRADA</h5>
    </div>
    <?php $experienciasLaborales = 0; ?>
    <!--AQUI ESTA EL CONTEDEDOR DE TODA LA EXPERIENCIA LABORAL QUE VAYA  MOSTRAR-->
    <?php foreach ($historial as $hist) {
        // $experienciasLaborales++; 
    ?>

        <div style="border-radius:35px;" class="x_title">
            <div class="x_title">
                <div class="row justify-content-start">
                    <div class="col-md-3">
                        <label class="titulos_negrita">Fecha Inicio</label>
                        <label class="fechas oferta estiloinput form-control"><?php echo $hist['hist_fecha_inicio'] ?>
                    </div>

                    <div class="col-md-3">
                        <label class="titulos_negrita">Fecha Final</label>
                        <label class="fechas oferta estiloinput form-control"><?php echo $hist['hist_fecha_fin'] ?>
                    </div>
                    <div class="col-md-3">
                        <label class="titulos_negrita">País</label>
                        <label class="estiloinput form-control oferta"><?php echo  $hist['hist_pais'] ?>
                    </div>
                    <div class="col-md-3">
                        <label class="titulos_negrita">Estado</label>
                        <label class="estiloinput form-control oferta"><?php echo  $hist['hist_estado'] ?>
                    </div>

                    <div class="col-md-3">
                        <br>
                        <label class="titulos_negrita">Ciudad</label>
                        <label class="estiloinput form-control oferta"><?php echo  $hist['hist_ciudad'] ?>
                    </div>

                    <div class="col-md-3">
                        <br>
                        <label class="titulos_negrita">Cargo</label>
                        <label class="estiloinput form-control oferta"><?php echo  $hist['hist_cargo'] ?>
                    </div>

                    <div class="col-md-3">
                        <br>
                        <label class="titulos_negrita">Empresa/Organización</label>
                        <label class="estiloinput form-control oferta"><?php echo  $hist['hist_empresa'] ?>
                    </div>
                    <div class="col-md-3">
                        <br>
                        <label class="titulos_negrita">Trabaja usted Actualmente</label><br>
                        <select class="form-control" name="hist_trabajoactual" id="hist_trabajoactual">
                            <option value="<?php echo $hist['hist_trabajoactual'] ?>" selected="selected"><?php echo $hist['hist_trabajoactual'] . ""; ?></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select>
                    </div>
                    <br><br><br><br>
                    <div class="col-md-12">
                        <br>
                        <label class="titulos_negrita">Descripción Actividades</label>
                        <textarea readonly class="estiloinput form-control desc_tarea" cols="20" rows="4"><?php echo  $hist['hist_descripcion'] ?>
                        </textarea>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <label class="titulos_negrita">Certificado</label><br>
                        <a id='consultarhistoria' name='id_hist'  target="_black" type='button' href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$hist['hist_certificado']?>" class='btn btn-secondary radios'><i class='fa fa-eye'></i></a>
                    </div>

                    <input id="pais" type="hidden" name="pais" value="">
                    <input id="estado" type="hidden" name="estado" value="">
                    <input id="ciudad" type="hidden" name="ciudad" value="">
                    <div class="x_content"></div>
                    <div class="row justify-content-start col-md-12" style="">
                        <?php  ?>
                        <div id="desplegarAreas<?php echo $experienciasLaborales; ?>" class=" desplegarAreas justify-content-start col-md-12">
                            <div style="text-align:center;" class="x_title">
                                <h5 style=" font-weight: bolder;">ÁREA DE ESPECIALIZACIÓN</h5>
                            </div>

                            <?php
                            foreach ($areaschecked as $area) {

                                if ($area['id_hist'] == $hist['id_hist']) {

                                    echo "<b><label style='font-size:20px;'>". $area['are_nombre']."</label> </b>";
                                    echo '<br>';
                                }
                            }


                            ?>




                            <!-- <input type="hidden" name="formulario<?php echo $experienciasLaborales; ?>" id="formulario<?php echo $experienciasLaborales; ?>" value="<?php echo  $hist['id_hist'] ?>">

                            <input type="hidden" name="areas" id="areas" data-url="<?php echo getUrl("Usuario", "Ofertas", "actividadesdinamicas", array("id_hist" => $hist['id_hist']), "ajax") ?>" value=""> -->
                            <!-- <div style="margin-left:450px;" id='actividadesmore' name='id_hist' data-url="<?php echo getUrl("Usuario", "Ofertas", "actividadesdinamicas", array("id_hist" => $hist['id_hist']), "ajax") ?>" class='col-md-3 titulos_negrita efectohover'><label>↓↓Mostrar más↓↓</label>
                            </div> -->

                            </p>
                            <div id='' class='actividadesresult col-md-12'></div>

                        </div>
                        <?php ?>
                        <button type='button' id='eliminarhistorialdetrabajo' name='id_hist' data-url="<?php echo getUrl("Usuario", "Ofertas", "eliminarhistorial", array("id_hist" => $hist['id_hist']), "ajax") ?>" class='btn btn-danger radios'><i class="fa fa-trash"></i> Eliminar</button><span><small style="color:black;"></small></span>
                    </div>
                </div>
            </div>
        </div>

    <?php }
    echo '<input type="hidden" name="totalExperiencias" id="totalExperiencias" value="' . $experienciasLaborales . '">';
    ?>
    </P>
    <div class="col-md-12" style="padding:6px 6px 6px 6px;">
        <!-- <a style="float:left;border-radius:5px;" href="<?php echo getUrl("Usuario", "Ofertas", "consultusu") ?>" type="button" class="btn btn-secondary siguiente">Atras</a> -->
    </div>

</div>


<script>
    const Experienciaform = document.getElementById('alertaexperiencia');
    const inputexp = document.querySelectorAll('#alertaexperiencia input');

    const expresionesexp = {
        usuario: /^[a-zA-Z0-9\_\-]{4,16}$/, // Letras, numeros, guion y guion_bajo
        password: /^.{4,12}$/, // 4 a 12 digitos.
        nombre: /^[a-zA-ZÀ-ÿ\s]{1,40}$/, // Letras y espacios, pueden llevar acentos.
        fecha: /^(?:(?:31(\/|-|\.)(?:0?[13578]|1[02]))\1|(?:(?:29|30)(\/|-|\.)(?:0?[13-9]|1[0-2])\2))(?:(?:1[6-9]|[2-9]\d)?\d{2})$|^(?:29(\/|-|\.)0?2\3(?:(?:(?:1[6-9]|[2-9]\d)?(?:0[48]|[2468][048]|[13579][26])|(?:(?:16|[2468][048]|[3579][26])00))))$|^(?:0?[1-9]|1\d|2[0-8])(\/|-|\.)(?:(?:0?[1-9])|(?:1[0-2]))\4(?:(?:1[6-9]|[2-9]\d)?\d{2})$/,
    }
    const camposexp = {
        hist_fecha_inicio: false,
        hist_fecha_fin: false,
        hist_cargo: false,
        hist_empresa: false,
        ciudad: true,
        pais: true,

    }
    const validarexp = (e) => {
        switch (e.target.name) {

            case "hist_fecha_inicio":
                if (expresionesexp.password.test(e.target.value)) {
                    document.getElementById('hist_fecha_inicio').classList.remove('procesomalo');
                    document.getElementById('hist_fecha_inicio').classList.add('procesobueno');
                    document.querySelector('#cont_fecha_inicio .error').classList.remove("error-activo");
                    camposexp['hist_fecha_inicio'] = true;
                } else {
                    document.getElementById('hist_fecha_inicio').classList.add('procesomalo');
                    document.getElementById('hist_fecha_inicio').classList.remove('procesobueno');
                    document.querySelector('#cont_fecha_inicio .error').classList.add("error-activo");
                    camposexp['hist_fecha_inicio'] = false;
                }
                break;

            case "hist_fecha_fin":
                if (expresionesexp.password.test(e.target.value)) {
                    document.getElementById('hist_fecha_fin').classList.remove('procesomalo');
                    document.getElementById('hist_fecha_fin').classList.add('procesobueno');
                    document.querySelector('#cont_fecha_final .error').classList.remove("error-activo");
                    camposexp['hist_fecha_fin'] = true;
                } else {
                    document.getElementById('hist_fecha_fin').classList.add('procesomalo');
                    document.getElementById('hist_fecha_fin').classList.remove('procesobueno');
                    document.querySelector('#cont_fecha_final .error').classList.add("error-activo");
                    camposexp['hist_fecha_fin'] = false;
                }
                break;
            case "hist_cargo":
                if (expresionesexp.nombre.test(e.target.value)) {
                    document.getElementById('hist_cargo').classList.remove('procesomalo');
                    document.getElementById('hist_cargo').classList.add('procesobueno');
                    document.querySelector('#cont_hist_cargo .error').classList.remove("error-activo");
                    camposexp['hist_cargo'] = true;
                } else {
                    document.getElementById('hist_cargo').classList.add('procesomalo');
                    document.getElementById('hist_cargo').classList.remove('procesobueno');
                    document.querySelector('#cont_hist_cargo .error').classList.add("error-activo");
                    camposexp['hist_cargo'] = false;
                }
                break;
            case "hist_empresa":
                if (expresionesexp.password.test(e.target.value)) {
                    document.getElementById('hist_empresa').classList.remove('procesomalo');
                    document.getElementById('hist_empresa').classList.add('procesobueno');
                    document.querySelector('#cont_empresa .error').classList.remove("error-activo");
                    camposexp['hist_empresa'] = true;
                } else {
                    document.getElementById('hist_empresa').classList.add('procesomalo');
                    document.getElementById('hist_empresa').classList.remove('procesobueno');
                    document.querySelector('#cont_empresa .error').classList.add("error-activo");
                    camposexp['hist_empresa'] = false;
                }
                break;
            case "ciudad":
                if (expresionesexp.password.test(e.target.value)) {
                    document.getElementById('ciudad').classList.remove('procesomalo');
                    document.getElementById('ciudad').classList.add('procesobueno');
                    document.querySelector('#cont_ciudad .error').classList.remove("error-activo");
                    camposexp['ciudad'] = true;
                } else {
                    document.getElementById('hist_ciudad').classList.add('procesomalo');
                    document.getElementById('hist_ciudad').classList.remove('procesobueno');
                    document.querySelector('#cont_ciudad .error').classList.add("error-activo");
                    camposexp['ciudad'] = false;
                }
                break;
            case "pais":
                if (expresionesexp.password.test(e.target.value)) {
                    document.getElementById('pais').classList.remove('procesomalo');
                    document.getElementById('pais').classList.add('procesobueno');
                    document.querySelector('#cont_pais .error').classList.remove("error-activo");
                    camposexp['pais'] = true;
                } else {
                    document.getElementById('pais').classList.add('procesomalo');
                    document.getElementById('pais').classList.remove('procesobueno');
                    document.querySelector('#cont_pais .error').classList.add("error-activo");
                    camposexp['pais'] = false;
                }
                break;
        }
    }
    //ejecuta la funcion
    inputexp.forEach((input) => {
        input.addEventListener('keyup', validarexp);
        input.addEventListener('blur', validarexp);
    });



    //que valide y no envie
    Experienciaform.addEventListener('submit', (e) => {

        if (camposexp.hist_fecha_inicio && camposexp.hist_fecha_fin && camposexp.hist_cargo && camposexp.hist_empresa && camposexp.ciudad && camposexp.pais) {
            $(document).on("submit", "#alertaexperiencia", function() {
                swal("Se ha agregado con exito!", "Presiona el boton!", "success");
                location.reload(5000);
            });
            return true;
        } else {
            e.preventDefault();
            alert("No tiene completos los campos  o hay datos inválidos");
            return false;
        }


    });

    // function fijarAreas(url, id_historia, numeroExperiencia) {
    //     try {
    //         $.ajax({
    //             type: 'POST',
    //             url: url,
    //             data: 'id_hist=' + id_historia,
    //             success: function(html) {
    //                 // $('#desplegarAreas' + numeroExperiencia).append(html);
    //                 // console.log('#desplegarAreas' + numeroExperiencia);
    //                 // // console.log(html);
    //             }
    //         });
    //     } catch (e) {
    //         console.log(e);
    //     }

    // }

    function load() {

        // var url = $("#areas").attr("data-url");
        // var totalExperiencias = $("#totalExperiencias").val();

        // console.log(totalExperiencias);

        // for (let i = 1; i <= totalExperiencias; i++) {

        //     var id_hist = $("#formulario" + i).val();
        //     console.log(id_hist);
        //     try {
        //         fijarAreas(url, 3, 1);
        //     } catch (e) {
        //         console.log(e);
        //     }

        // }
    }
    window.onload = load;



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