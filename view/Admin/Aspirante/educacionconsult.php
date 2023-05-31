<?php 
if($_SESSION['rolId']==1){
?>

<nav class="navbar navbar-dark navbar-expand-sm" style="background-color:#181864;">
                <a class="navbar-brand" href="#">
                    Formación registrada
                </a>
            </nav>
            <!--AQUI ESTA EL CONTEDEDOR DE TODA LA FORMACION QUE VAYA  MOSTRAR-->
            <div class="divcontenedores">
                <?php
                if ($row==0){ 
                    echo "<h3 class='col-md-12'>NO HAY INFORMACION REGISTRADA</h3>";
                }else{
               foreach($ejecutar as $form){ ?>
                <div class="x_content col-md-12" style="border-top:1px solid black;display:flex;padding:5px 5px 5px 12px;">
                <form enctype="multipart/form-data">
                    <div class="row justify-content-start">
                        <div class="col-md-6">
                            <label class="titulos_negrita">Titulo Obtenido<span style="color:red"></span></label>
                            <input  type="text" style="text-transform:uppercase;" value="<?php echo $form["form_tituloname"]?>" readonly
                                class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-6">
                            <label class="titulos_negrita">Fecha Graduación<span style="color:red"></span></label>
                            <input type="text" readonly value="<?php echo $form["form_fecha_fin"]?>"
                                placeholder="Ejm: ingles, frances..." class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-6">
                            <br>
                            <label class="titulos_negrita">Nivel de Educación<span style="color:red"></span></label>
                            <input type="text" readonly value="<?php echo $form["form_nivel_de_educacion"]?>"
                                id="" class="estiloinput form-control oferta" readonly>
                        </div>
                        <div class="col-md-6">
                            <br>
                            <label class="titulos_negrita">Nombre de la Institución o Universidad<span style="color:red">*</span></label>
                            <input type="text" style="text-transform:uppercase;" value="<?php echo $form["form_nombre"]?>" readonly
                                class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-6">
                            <br>
                        <label class="titulos_negrita">Conocimientos Fundamentales<span style="color:red"></span></label>
                            <label class="titulos_negrita"><span style="color:red"></span></label>
                            <input readonly value="<?php echo $form["form_conocimientos"]?>" type="text" style="text-transform:uppercase;"
                                class="estiloinput form-control oferta">
                        </div>


                        <div class="row">
                            <div class=" mb-3 col-md-12">
                                
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
                        <div class="col-md-6">
                            <label class="titulos_negrita">Ver Certificado<label><br><br>
                                <a id='consultarhistorial' name='id_hist' type='button'
                                data-url="<?php echo getUrl("Usuario","Ofertas","consultarcertificado",array("id_formacion" => $form['id_formacion']),"ajax")?>"
                            class='btn btn-primary radios'><i class='fa fa-eye'></i></a>
                        </div>

                        <div class="col-md-6"></div>
                        <div class="col-md-6"></div>
                        <div class="col-md-6">
                            <br>
                            <div class="col-md-6">
                            </div>
                        </div>
                    </div>
                    </div>
                    <?php
    }
}
                ?>
            </div>
            <?php
}else{
    redirect("indexUsu.php");
}
?>