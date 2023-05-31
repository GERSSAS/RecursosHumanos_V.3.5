$(document).ready(function() {
    //LOGO responsivo 
    $(document).on("click", ".menu", function() {
        var estado = $("#logo").attr("data-estado");

        if (estado == 1) {
            $("#logo").attr("src", "images/g-blanco.png");
            $("#logo").attr("width", "52px");
            $("#logo").attr("style", "");
            $("#logo").attr("data-estado", "2");
        } else {
            $("#logo").attr("src", "images/iconoGers.png");
            $("#logo").attr("width", "100px");
            $("#logo").attr("style", "margin-left:15px");
            $("#logo").attr("data-estado", "1");
        }
    });




    //BOTO DE ESTADO DE VACANTE
    $(document).on('click', '#modalestado', function() {
        var url = $(this).attr('data-url');
        var datos = $(this).val();
        console.log(url);

        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $("#contenedor").html(datos);
                $("#modalAdmin").modal("show");
            }
        });
    });

    //MODAL INFOUSUARIO
    $(document).on('click', '#ModalInfoUsuario', function() {
        var url = $(this).attr('data-url');
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(".modal-content").html(datos);
                $("#modalAdminLarge").modal("show");

            }
        });
    });
    //MODAL ModalEntrevistaEstado
    $(document).on('click', '#ModalEntrevistaEstado', function() {
        var url = $(this).attr('data-url2');
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(".modal-content").html(datos);
                $(".modal-content").prepend("<div class='x_title'>Actualizar estado de aspirante</div>");
                $("#modalAdminLarge").modal("show");

            }
        });
    });

    $(document).on('click', '.pruebax', function() {
        var url = $(this).attr('data-url');
        sessionStorage.setItem('mySelectOption', $(this).attr("id"));
        // console.log($(this).attr('id'));
    });


    $( window ).on( "load", function() {

        var prueba = sessionStorage.getItem('mySelectOption');
        $("#"+prueba).parent('li').addClass('current-page');
    });
    //BOTON DE MODAL OFERTA

    $(document).on('click', '#modaldetallevacante', function() {
        var url = $(this).attr('data-url');
        var datos = $(this).val();
        console.log(url);
        $.ajax({
            url: url,
            data: "datos=" + datos,
            type: "POST",
            success: function(datos) {

                $("#contenedor").html(datos);
                $("#modalUsu").modal("show");
            }
        });
    });

    //ELIMINAR FORMACION EN USUARIOS
    $(document).on("click", "#eliminarformacion", function() {
        var url = $(this).attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {

                swal({
                        title: "Eliminado",
                        text: "se ha eliminado con exito!",
                        icon: "success",
                        button: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.reload(5000);
                        } else {
                            location.reload(5000);
                        }
                    });


            }
        })
    });

    $(document).on("click", "#eliminarhistorialdetrabajo", function() {
        var url = $(this).attr('data-url');
        var id = $(this).val();

        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {

                swal({
                        title: "Eliminado",
                        text: "se ha eliminado con exito!",
                        icon: "success",
                        button: true,
                    })
                    .then((willDelete) => {
                        if (willDelete) {
                            location.reload(5000);
                        } else {
                            location.reload(5000);
                        }
                    });


            }
        })

    });

    $(document).on("click", "#consultarcertificado", function() {
        var url = $(this).attr('data-url');
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(".modal-content").html(datos);
                $("#modalAdminLarge").modal("show");
            }
        })
    });


// MODAL DE LA PARTE DE USUARIOS REGISTRADOS
$(document).on("click", "#ModalRegistrados", function() {
    var url = $(this).attr('data-url');
    $.ajax({
        url: url,
        type: "POST",
        success: function(datos) {
            $(".modal-content").html(datos);
            $("#modalAdminLarge").modal("show");
        }
    })
});
// FIN DA LA MODAL

    $(document).on("click", "#consultarcertificadoadmin", function() {
        var url = $(this).attr('data-url');
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(".modal-content").html(datos);
                $("#modalAdminLarge").modal("show");
            }
        })

    });
    $(document).on("click", "#consultarcertificado", function() {
        var url = $(this).attr('data-url');
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(".modal-content").html(datos);
                $("#modalAdminLarge").modal("show");
            }
        })

    });

    $(document).on("click", "#consultarhistorial", function() {
        var url = $(this).attr('data-url');
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(".modal-content").html(datos);
                $("#modalAdminLarge").modal("show");
            }
        })
    });
    $(document).on("click", "#consultarhistorialadmin", function() {
        var url = $(this).attr('data-url');
        var id = $(this).val();
        console.log(id);
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(".modal-content").html(datos);
                $("#modalAdminLarge").modal("show");
            }
        })
    });
    //
    $(document).on("click", "#eliminaridioma", function() {
            var url = $(this).attr("data-url");
            var id = $(this).val();
            console.log(id);
            $.ajax({
                url: url,
                type: "POST",
                success: function(datos) {

                    swal("Eliminado!", "se ha elminado con exito!", "info");
                    swal({
                            title: "Eliminado",
                            text: "se ha eliminado con exito!",
                            icon: "success",
                            button: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                location.reload(5000);
                            } else {
                                location.reload(5000);
                            }
                        });


                }
            })
        })
        //
    $(document).ready(function() {
        var table = $('#data').DataTable({
            responsive: true,
            orderCellsTop: true,
            fixedHeader: true,
            language: {
                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ registros Totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Numero de filas _MENU_",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron resultados",
                "paginate": {

                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Proximo",
                    "previous": "Anterior"
                }
            },
        });
        //Creamos una fila en el head de la tabla y lo clonamos para cada columna
        $('#data thead tr').clone(true).appendTo('#data thead');
        $('#data thead tr:eq(1) th').each(function(i) {
            var title = $(this).text(); //es el nombre de la columna
            $(this).html('<input type="text" class="form form-control" placeholder="' + title + '" />');
            $('input', this).on('keyup change', function() {
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        });
    });

    /////////////////////////////////////////////////////////



    //usuarios dinamicos
    $(".actividadesbox").on('change', function() {
        var array = [];
        $(".actividadesbox:checked").each(function() {
            var id_actividades = $(this).val();
            array.push(id_actividades);
        });
       
        $.ajax({
            url: url,
            data: { data: jsonString },
            type: "POST",
            success: function(datos) {

           
                var table2 = $('#prueba').DataTable({
                    responsive: true,
                    orderCellsTop: true,
                    fixedHeader: true,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay datos",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                        "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                        "infoFiltered": "(Filtro de _MAX_ registros Totales)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Numero de filas _MENU_",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "No se encontraron resultados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Proximo",
                            "previous": "Anterior"
                        }
                    },
                });
                // $('#prueba thead tr').clone(true).appendTo('#prueba thead');
                $('#prueba thead tr:eq(1) th').each(function(i) {
                    var title = $(this).text(); //es el nombre de la columna
                    $(this).html('<input type="text" class="form form-control" placeholder="' + title + '" />');
                    $('input', this).on('keyup change', function() {
                        if (table2.column(i).search() !== this.value) {
                            table2
                                .column(i)
                                .search(this.value)
                                .draw();
                        }
                    });
                });
            }
        });
    });

    //Años o meses que termine su ultimo estudio en la vista de formacion de usuario
    $("#form_fecha_fin").on("change", function() {
        var fecha = new Date(document.getElementById("form_fecha_fin").value)
        var dia = new Date(document.getElementById("dia").value)
        var hoy = new Date();
        var fechafin1 = moment(fecha);
        var fechafin2 = moment(hoy);
        var compararmes = fechafin2.diff(fechafin1, "months");
        var compararaños = fechafin2.diff(fechafin1, "years");
        var comparardias = fechafin2.diff(fechafin1, "days");
        var comparar = fechafin2.diff(fechafin1, "days");
        //comparar si año es mayor que 0
        if (compararaños > 0) {
            document.getElementById("dia").value = 0;
            var años = (compararaños);
            document.getElementById("año").value = años;
            for (let i = 1; i <= compararaños; i++) {
                compararmes = compararmes - 12;
                if (compararmes > 0) {
                    var mes = (compararmes);
                    document.getElementById("dia").value = 0;
                    document.getElementById("mes").value = mes;
                } else if (compararmes <= 0) {
                    document.getElementById("mes").value = 0;
                }
            }
        } else if (compararaños <= 0) {
            var años = (compararaños);
            document.getElementById("año").value = 0;
        }
        //comparar si mes es mayor que 0
        if (compararmes > 0) {
            var mes = (compararmes);
            document.getElementById("mes").value = mes;
            document.getElementById("dia").value = 0;
        } else if (compararmes <= 0) {
            var mes = (compararmes);
            document.getElementById("mes").value = 0;
        }

        if (compararaños == 0 && compararmes == 0) {
            var dia = (comparardias);
            if (dia <= 0) {
                document.getElementById("dia").value = 0;
            } else {
                document.getElementById("dia").value = dia;
            }
        }
        document.getElementById("comparar").value = comparar;

    });



    //fechas años xp
    $(".fechas").on("change", function() {
        var fecha = new Date(document.getElementById("hist_fecha_inicio").value);
        var fecha2 = new Date(document.getElementById("hist_fecha_fin").value);
        var fechafin1 = moment(fecha);
        var fechafin2 = moment(fecha2);
        var compararmes = fechafin2.diff(fechafin1, "months");
        var compararaños = fechafin2.diff(fechafin1, "years");
        //comparar si año es mayor que 0
        if (compararaños > 0) {
            var años = (compararaños);
            document.getElementById("año").value = años;
            for (let i = 1; i <= compararaños; i++) {
                compararmes = compararmes - 12;
                if (compararmes > 0) {
                    var mes = (compararmes);
                    document.getElementById("mes").value = mes;
                } else if (compararmes <= 0) {
                    document.getElementById("mes").value = 0;
                }
            }
        } else if (compararaños <= 0) {
            var años = (compararaños);
            document.getElementById("año").value = 0;
        }
        //comparar si mes es mayor que 0
        if (compararmes > 0) {
            var mes = (compararmes);
            document.getElementById("mes").value = mes;
        } else if (compararmes <= 0) {
            var mes = (compararmes);
            document.getElementById("mes").value = 0;
        }
    });



    // ALERTAS
    //generar vacantes
    $(document).on("submit", "#alertagenerarvacante", function() {
        event.preventDefault();
        swal({
            title: '¿Desea generar está vacante?',
            text: 'Se generara la vacante y sera publica.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Generar vacante',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }

        });
    });
    //aplicar vacantes usu
    $(document).on("submit", "#aplicarvacante", function() {
        event.preventDefault();
        swal({
            title: '¿Desea aplicar a está vacante?',
            text: 'Se aplicaran todos sus datos a la vacante.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Aplicar',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }

        });
    });
    //aactualizar informacion personal usu
    $(document).on("submit", "#actualizarinformacionpersonal", function() {
        event.preventDefault();
        swal({
            title: '¿Desea actualizar su información?',
            text: 'Se actualizaran sus datos.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Actualizar',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }

        });
    });

    //actualizar vacantes
    $(document).on("submit", "#alertaactualizarvacante", function() {
        event.preventDefault();
        swal({
            title: '¿Desea editar la vacante',
            text: 'Se editaran todos los datos que fueron modificados.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Editar vacante',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }

        });
    });
    //actualziar estado de la vacante
    $(document).on("submit", "#AlertUpdateEstado ", function() {
        event.preventDefault();
        swal({
            title: '¿Desea actualizar el estado de la vacante?',
            text: 'Se modificara el estado actual de la vacante.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Editar estado de la vacante',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }
        });
    });

    //actualizar proceso de aspirante
    $(document).on("submit", "#alertaestadoaspirante", function() {
        event.preventDefault();
        swal({
            title: '¿Desea editar el estado del aspirante?',
            text: 'Se editaran todos los datos que lleno.',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Editar estado del aspirante',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }

        });
    });
    //alerta de modal del usuario
    $(document).on("click", "#aceptado", function() {
        event.preventDefault();
        swal({
            title: '¿Desea editar el estado del aspirante a "selecionado"?',
            text: 'Él aspirante sera aceptado para selecionados y sera enviado al apartado de "selecionados".',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Seleccionar',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $("#usuario").submit();
                swal("Espere un momento que se ejecute el envió de correo al aspirante");
            }

        });
    });
    //alerta de modal de actualizar hoja
    $(document).on("submit", "#alertahoja", function() {
        event.preventDefault();
        swal({
            title: '¿Desea actualizar la hoja de vida?',
            text: 'la hoja de vida se actualizara',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Actualizar',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }

        });
    });
    //actualizar matriculaprofesional
    $(document).on("submit", "#alertamatricula", function() {
        event.preventDefault();
        swal({
            title: '¿Desea actualizar la matricula profesional?',
            text: 'la matricula profesional se actualizara',
            type: 'info',
            icon: 'info',
            buttons: {
                confirm: {
                    text: 'Actualizar',
                    className: 'btn btn-primary'
                },

                cancel: {
                    visible: true,
                    text: "Cancelar",
                    className: 'btn btn-danger'
                }

            }
        }).then((Delete) => {
            if (Delete) {
                $(this).submit();
            }

        });
    });



    $(document).on("click", "#copiarVacante", function() {
            var url = $(this).attr('data-url');
            var datos = $(this).attr('data-id');
            swal({
                title: '¿Desea generar una copia de esta vacante?',
                text: 'Se generara una copia de la vacante y estara activa. Puedes cambiar el estado de la vacante desde el boton "Estado".',

                type: 'warning',
                icon: 'warning',
                buttons: {
                    confirm: {
                        visible: true,
                        text: "Copiar",
                        className: 'btn btn-primary'
                    },

                    cancel: {
                        visible: true,
                        text: 'Cancelar',
                        className: 'btn btn-danger'
                    }

                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: url,
                        data: "id_copia=" + datos,
                        type: "POST",
                        success: function() {
                            document.location.reload();
                        }
                    });
                }
            });
            //  
        })
        //
        // VALIDAR HOJDA DE VIDA A LA HORA DE SUBIR UN ARCHIVO
    $("#hojadevida").on("change", function() {
        var archivoInput = document.getElementById('hojadevida');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.pdf)$/i;
        var tamañohojadevida = document.getElementById('hojadevida').files[0].size;
        if (tamañohojadevida > 2097152) {
            alert('el tamaño del archivo excede las (2 megas)');
            archivoInput.value = '';
            return false;
        } else {
            if (!extPermitidas.exec(archivoRuta)) {
                alert("Recuerde que solo se permite pdf");
                archivoInput.value = '';
                return false;
            } else {

            }
        }


    });
    /// VALIDAR MATRICULA PROFESIONAL A LA HORA DE SUBIR UN ARCHIVO
    $("#matriculaprofesional").on("change", function() {
        var archivoInput = document.getElementById('matriculaprofesional');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.pdf)$/i;
        var tamañomatricula = document.getElementById('matriculaprofesional').files[0].size;
        console.log(tamañomatricula);
        if (tamañomatricula > 2097152) {
            alert('el tamaño del archivo excede las (2 megas)');
            archivoInput.value = '';
            return false;
        } else {

            if (!extPermitidas.exec(archivoRuta)) {
                alert("Recuerde que solo se permite pdf");
                archivoInput.value = '';
                return false;
            } else {

            }
        }
    });
    $("#certificadodeestudio").on("submit", function() {

    });


    //VALIDAR CERTIFICADO DE ESTUDIO
    $("#certificadodeestudio").on("change", function() {
        var archivoInput = document.getElementById('certificadodeestudio');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.pdf)$/i;
        var certificadodeestudio = document.getElementById('certificadodeestudio').files[0].size;
        if (certificadodeestudio > 2097152) {
            alert('el tamaño del archivo excede las (2 megas)');
            archivoInput.value = '';
            return false;
        } else {

            if (!extPermitidas.exec(archivoRuta)) {
                alert("Recuerde que solo se permite pdf");
                archivoInput.value = '';
                return false;
            } else {

            }
        }
    });






    //VALDIAR CERTIFICADO DE TRABAJO
    $("#certificadolaboral").on("change", function() {
        var archivoInput = document.getElementById('certificadolaboral');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.pdf)$/i;
        var certificadolaboral = document.getElementById('certificadolaboral').files[0].size;
        if (certificadolaboral > 2097152) {
            alert('el tamaño del archivo excede las (2 megas)');
            archivoInput.value = '';
            return false;
        } else {

            if (!extPermitidas.exec(archivoRuta)) {
                alert("Recuerde que solo se permite pdf");
                archivoInput.value = '';
                return false;
            } else {

            }
        }
    });

    //VALIDAR CARTA PRESENTACION
    $("#cartapresentacion").on("change", function() {
        var archivoInput = document.getElementById('cartapresentacion');
        var archivoRuta = archivoInput.value;
        var extPermitidas = /(.pdf)$/i;
        var cartapresentacion = document.getElementById('cartapresentacion').files[0].size;
        if (cartapresentacion > 2097152) {
            alert('el tamaño del archivo excede las (2 megas)');
            archivoInput.value = '';
            return false;


        } else {

            if (!extPermitidas.exec(archivoRuta)) {
                alert("Recuerde que solo se permite pdf");
                archivoInput.value = '';
                return false;
            } else {

            }
        }
    });

    ////////////////////////////////
    $(document).on("click", "#Enviarcorreos", function() {
            var url = $(this).attr('data-url');
            var datos = $(this).attr('data-id');
            swal({
                title: '¿Desea generar el envió de correos a esta vacante?',
                text: 'Al momento de aceptar el envió de correos, debes esperar a que la pagína se recargue nuevamente mientras se hace el envió de correos.',
                type: 'warning',
                icon: 'warning',
                buttons: {
                    confirm: {
                        visible: true,
                        text: "Aceptar",
                        className: 'btn btn-primary'
                    },

                    cancel: {
                        visible: true,
                        text: 'Cancelar',
                        className: 'btn btn-danger'
                    }

                }
            }).then((Delete) => {
                if (Delete) {
                    $.ajax({
                        url: url,
                        data: "id=" + datos,
                        type: "POST",
                        success: function() {
                            document.location.reload();
                        }
                    });
                }
            });
            //  
        })
        //////////////////////////////
    $(document).on('change', '#estadochange', function() {
        var valor = $(this).val();
        console.log(valor);
        if (valor == 2) {
            var ocultar = $('#aplicaroculto').hide();
        } else {
            var ocultar = $('#aplicaroculto').show();
        }
    });
    ////////////////
    ///exportar excel de listado aspirante
    // $(document).on("click", "#exportarlistado", function() {
    //     var url = $(this).attr("data-url");
    //     $.ajax({
    //         url: url,
    //         type: "POST",
    //         success: function(datos) {


    //         }
    //     });

    // });
    ///////////////////////////////////////////////
    // para que las actividades se ejecuten dependiendo de cada formulario /////////////////USUARIO
    $(document).on("click", "#actividadesmore", function() {
        var url = $(this).attr("data-url");
        var aqui = $(this).next();
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(aqui).html(datos);
                console.log(datos);
            }
        })
    });
    //////////////////////////////////////////////
    // para que las actividades se ejecuten dependiendo de cada formulario ///////////ADMINISTRADOR 
    $(document).on("click", "#actividadesmore2", function() {
        var url = $(this).attr("data-url");
        var aqui = $(this).next();
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                $(aqui).html(datos);
                console.log(datos);
            }
        })
    });
    //////////////////////////////////////////////
    // DATA TABLE el id para la tabla del principio
    $(document).ready(function() {
        var table = $('#bandeja').DataTable({

            responsive: true,
            orderCellsTop: true,
            fixedHeader: true,

            language: {

                "decimal": "",
                "emptyTable": "No hay datos",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
                "infoEmpty": "Mostrando 0 a 0 de 0 registros",
                "infoFiltered": "(Filtro de _MAX_ registros Totales)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Numero de filas _MENU_",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "No se encontraron resultados",
                "paginate": {

                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Proximo",
                    "previous": "Anterior"
                }
            },
            "order": [
                [1, "desc"]
            ]
        });
    });

    $(document).on('change', '#estadoasp', function() {
        var valor = $(this).val();
        console.log(valor);
        if (valor == 5) {
            var mostrar = $("#motivos").show();

        } else {

            var ocultar = $("#motivos").hide();
        }
    });

    for (let i = 0; i < 10; i++) {

        var prueba = $( ".estado_usuario"+i ).text();

        if(prueba =="Seleccionado"){

            $("#estados"+i).find("#aplicado").addClass( "current");
        }

        if(prueba =="Revision de hoja de vida"){

            $("#estados"+i).find("#vista").addClass( "current");

        }


        if(prueba =="Aceptado para entrevista" || prueba =="Examenes medicos"){

            $("#estados"+i).find("#proceso").addClass( "current");

        }

        if(prueba =="Contratado" || prueba =="Cancelado"){

            $("#estados"+i).find("#finalizado").addClass( "current");

        }

        console.log(prueba);
        console.log('\n');
      }


})