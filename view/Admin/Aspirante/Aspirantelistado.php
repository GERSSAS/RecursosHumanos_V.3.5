<?php
if ($_SESSION['rolId'] == 1) {
?>
    <div class=" col-md-12 col-sm-12">
        <div>
            <small class="xc_color">ASPIRANTES REGISTRADOS <br>
        </div>
        <div class="x_panel">
            <div class="">
                <ul class=" nav navbar-right panel_toolbox">
                    <li>
                        <?php

                        $month = date('m');
                        $day = date('d');
                        $year = date('Y');

                        $today = $year . '-' . $month . '-' . $day;
                        ?>

                    </li>
                </ul>

            </div>
            <div class="col-md-12">
            </div>
            <div class="   x_content">

                <div class="x_panel">

                    
      
                    <div style="margin-left: 55%;" class="fechas col-md-6">
                    
                        <div class="row">
                            <label for="">Desde: </label>
                            <input class="" type="date" id="desde" name="desde">
                            <br>
                            <label style="margin-left: 5px;" for="">Hasta: </label>
                            <input class="" type="date" id="hasta" value="<?php echo $today; ?>" name="hasta">
                        </div>
                    </div>
                    <div id="contenedorgraficos" class="col-md-12 row justify-content-start eo">

                    </div>

                    <div class="col-md-4">
                        <label for="">Reporte</label><br>
                        <a href="../controller/Excel/templateExcel.php" class='btn btn-success btn-sm' id="" title='Exportar informacion'><i class='fa fa-file-excel-o'></i></a><small>Reporte en excel de todos los
                            usuarios inscritos</small><br>
                        
                    </div>
                </div>
<br>
<br>
                <div class="row">
                    <div class="  col-sm-12">

                        <div class="  card-box table-responsive">
                            <table id="bandeja" data-url="ajax.php?modulo=Admin&amp;controlador=&amp;funcion=bandejaentrada" class="table-hover table table-striped dataTable no-footer" style="width: 100%;" aria-describedby="bandeja_info">

                                <thead style="background-color: #00113d; color:#fff;">
                                    <tr>

                                        <th class='text-center'>Nombre/s</th>
                                        <th class='text-center'>Apellido/s</th>
                                        <th id="" class='text-center'>Correo</th>
                                        <th id="" class='text-center'>Teléfono</th>
                                        <th id="" class='text-center'>Estado</th>
                                        <th id="" class='text-center'>Notas</th>
                                        <th id="" class='text-center'>Vacante</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <?php
                                    foreach ($listado as $lis) {
                                        echo "<tr>";
                                        echo "<td class='text-center'>" . $lis['usu_nombre'] . "</td>";
                                        echo "<td class='text-center'>" . $lis['usu_apellido'] . "</td>";
                                        echo "<td class='text-center'>" . $lis['usu_correo'] . "</td>";
                                        echo "<td class='text-center'>" . $lis['usu_telefono'] . "</td>";
                                        echo "<td class='text-center'>" . $lis['selec_nombre'] . "</td>";
                                        echo "<td class='text-center'>" . $lis['usu_cancelado'] . "</td>";
                                        echo "<td class='text-center'>" . $lis['vac_nombre'] . "</td>";


                                        echo "</tr>";
                                    }
                                    ?>
                                </tbody>


                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- url que me lleva a la funcion -->
    <input id="grafico" type="hidden" data-url="<?php echo getUrl("Admin", "Aspirante", "Graficos", false, "ajax"); ?>">
    <input id="dataGraficos" type="hidden" data-url="<?php echo getUrl("Admin", "Aspirante", "dataGraficos", false, "ajax"); ?>">

    <!-- los inputs para mandar valor para el grafico 1 -->
    <input type="hidden" id="entrevista" value="<?php echo $entrevista ?>">
    <input type="hidden" id="seleccionados" value="<?php echo $seleccionado2 ?>">
    <input type="hidden" id="enproceso" value="<?php echo $Enproceso ?>">
    <input type="hidden" id="vacantes" value="<?php echo $vacantes ?>">
    <input type="hidden" id="cancelados" value="<?php echo $cancelados ?>">
    <!-- los inputs que mandar valor para el grafico 2 -->
    <input id="listado" type="hidden" value="<?php echo $suma ?>">
    <input id="aplicado" type="hidden" value="<?php echo $aplicado ?>">
    <input id="noaplicado" type="hidden" value="<?php echo $noaplicados ?>">

    <script>
        function mostrarMensaje(text) {
            Swal.fire(text)
        }

        function load() {

            var url = $("#grafico").attr("data-url");
            var listado = $("#listado").val();
            var aplicado = $("#aplicado").val();
            var noaplicado = $("#noaplicado").val();
            var vacantes = $("#vacantes").val();
            var cancelados = $("#cancelados").val();

            //////////////////////////graficos
            var entrevista = $("#entrevista").val();
            var seleccionados = $("#seleccionados").val();
            var enproceso = $("#enproceso").val();
            $.ajax({
                url: url,
                type: "POST",
                success: function(datos) {
                    $("#contenedorgraficos").html(`${datos}`);

                    new Chartist.Bar('#chart1', {
                        labels: ["Para Entrevista"],
                        series: [
                            [entrevista, ]
                        ]
                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });


                    new Chartist.Bar('#chart2', {
                        labels: ["Contratados", "Cancelados"],
                        series: [
                            [seleccionados, cancelados]
                        ]

                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });


                    new Chartist.Bar('#chart3', {
                        labels: ["En proceso"],
                        series: [
                            [enproceso]
                        ]

                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });

                    new Chartist.Bar('#chart4', {
                        labels: ["Usuarios registrados"],
                        series: [
                            [listado]
                        ]

                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });

                    new Chartist.Bar('#chart5', {
                        labels: ["Vacantes generadas"],
                        series: [
                            [vacantes]
                        ]

                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });


                }
            });


        }


        window.onload = load;


        $(document).on('change', '.fechas', function() {

          
           var desde = $("#desde").val();
           var hasta = $("#hasta").val();
           var url = $("#dataGraficos").attr("data-url");

           console.log(desde);
           console.log(hasta);
           $.ajax({
                url: url,
                data: { desde: desde, hasta: hasta },
                type: "POST",
                success: function(datos) {

                    // $("#contenedorgraficos").html(`${datos}`);
                    var jsonData = JSON.parse(datos);
                    $("#contenedorgraficos").html(`${jsonData.html1}`);
                    $("#contenedorgraficos").append(`${jsonData.html2}`);
                    $("#contenedorgraficos").append(`${jsonData.html3}`);
                    $("#contenedorgraficos").append(`${jsonData.html4}`);
                    $("#contenedorgraficos").append(`${jsonData.html5}`);
                    $("#contenedorgraficos").append(`${jsonData.html6}`);

                   


                    new Chartist.Bar('#chart1', {
                        labels: ["Para Entrevista"],
                        series: [
                            [jsonData.entrevista]
                        ]

                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });

                    new Chartist.Bar('#chart2', {
                        labels: ["Contratados", "Cancelados"],
                        series: [
                            [jsonData.contratados, jsonData.cancelados]
                        ]

                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });

                    new Chartist.Bar('#chart3', {
                        labels: ["En Proceso"],
                        series: [
                            [jsonData.enproceso]
                        ]

                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });

                    new Chartist.Bar('#chart4', {
                        labels: ["Usuarios registrados"],
                        series: [
                            [jsonData.totalRegistrados]
                        ]

                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });

                    new Chartist.Bar('#chart5', {
                        labels: ["Vacantes generadas"],
                        series: [
                            [jsonData.vacantes]
                        ]
                    }, {
                        seriesBarDistance: 100,
                        reverseData: true,
                        horizontalBars: true,
                        axisY: {
                            offset: 70
                        }
                    });
                }
            });
        });

    </script>
<?php
} else {
    redirect("indexUsu.php");
}
?>