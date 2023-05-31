<?php
include_once '../lib/helpers.php';
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <title>Registro de cuenta</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="build/css/estilos.css">
    <link rel="stylesheet" href="build/css/Mantenimientocss.css">
    <link rel="shorcut icon" href="images/Gers.jpeg">
</head>

<body>
    <div id="particles-js">

    </div>
<br>
    <form id="registro" class="formulario1 form-box" method="POST"
        action="<?php echo getUrl("Access", "Access", "getInsert", false, "ajax"); ?>">

        <h1 class="form-title">Registro</h1>
        <div class="col-md-12">
            <div id="contenedorname" class="col-md-6">
                <label class="text-white"for="username">Nombre/s:</label>
                <input id="usu_nombre" type="text" style="text-transform:uppercase;" class="form form-control procesobueno" name="usu_nombre" placeholder="">
                <p class="error"><small>El nombre solo puede contener letras.</small>
                </p>
            </div>

            <div id="contenedorlastname" class="col-md-6">
                <label class="text-white" for="username">Apellido/s:</label>
                <input id="usu_apellido" type="text" style="text-transform:uppercase;" class="form form-control procesobueno" name="usu_apellido" placeholder="">
                <p class="error"><small>El Apellido solo puede contener letras.</small>
                </p>
            </div>
        </div>
        <div class="col-md-12">
            <!-- <div id="contenedordireccion" class="col-md-6"><br>
                <label class="text-white" for="username">Dirección:</label>
                <input id="usu_direccion" type="text" class="form form-control procesobueno" name="usu_direccion" placeholder="">
                <p class="error"><small>la direccion solo puede contener letras, numeros, puntos, guiones y guion
                        bajo.</small>
                </p>
            </div> -->
           
            <!-- <div id="contenedordireccion" class="col-md-6"><br>
                <label class="text-white" for="username">Barrio:</label>
                <input id="usu_barrio" type="text" class="form form-control procesobueno" name="usu_barrio" placeholder="">
                <p class="error"><small>Barrio solo puede contener letras, numeros, puntos, guiones y guion
                        bajo.</small>
                </p>
            </div> -->

            <!-- <div id="contenedorphone" class="col-md-6"><br>
                 <label class="text-white" for="email">Teléfono:</label>
                <input id="usu_telefono" type="text" class="form form-control procesobueno" name="usu_telefono" placeholder="">
                <p class="error"><small>El telefono solo puede tener numeros.</small>
                </p>
            </div> -->
        </div>
        <div class="col-md-12">
            <!-- <div id="contenedorcountry" class="col-md-6"><br>
                <label class="text-white" for="username">País:</label><br>
                <input id="usu_pais_residencia" type="text" class="form form-control procesobueno" name="usu_pais_residencia"
                    placeholder="">
                <p class="error"><small>El pais solo puede tener letras.</small>
                </p>
            </div> -->

            <!-- <div id="contenedorcity" class="col-md-6">
            <br>
                <label class="text-white" for="username">Ciudad:</label>
                <input id="usu_residencia" type="text" class="form form-control procesobueno" name="usu_residencia" placeholder="">
                <p class="error"><small>El ciudad solo puede tener letras.</small>
                </p>
            </div> -->
        </div>
        <div class="col-md-12">
            <!-- <div id="contenedoremail" class="col-md-6">
            <br>
                <label class="text-white" for="username">Documento:</label>
                <input id="usu_correo" type="text" class="form form-control procesobueno " name="usu_documento" placeholder="">
                <p class="error"><small>El documento solo puede tener numeros.</small>
                </p>
            </div> -->

            <!-- <div id="contenedortipo" class="col-md-6">
            <br>
                <label class="text-white" for="username">Tipo de documento:</label>
                <select id="usu_tipo_documento" type="text" class="form form-control procesobueno" name="usu_tipo_documento"
                    placeholder="">
                    <option selected="true" disabled>Tipo de documento</option>
                    <option value="Cédula ciudadania">Cédula ciudadania</option>
                    <option value="trajeta identidad">Tarjeta identidad</option>
                    <option value="Cédula de extranjeria">Cédula de extranjeria</option>
                    <option value="pasaporte">Pasaporte</option>
                </select>
                <p class="error"><small>error</small>
                </p>
            </div> -->
        </div>

        <div class="col-md-12">
            <div id="contenedoremail" class="col-md-6">
            <br>
                <label class="text-white" for="email">Correo:</label>
                <input id="usu_correo" type="email" class="form form-control procesobueno" name="usu_correo" placeholder="">
                <p class="error"><small>El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</small>
                </p>
            </div>

            <div id="contenedorpassword" class="col-md-6">
            <br>
                <label class="text-white" for="pwd">Contraseña:</label>
                <input id="usu_contraseña" type="password" class="form form-control procesobueno" name="usu_contraseña"
                    placeholder="">
                <p class="error"><small>La contraseña tiene que ser de 4 a 12 dígitos o letras.</small></p>
            </div>
        </div>

        <div class="col-md-12 formulario__mensaje" id="formulario__mensaje">
            <p><i class="fa fa-ban"><b>Error:</b> Por favor rellena el formulario correctamente.</p></i>
        </div>
        <img src="images/Gers.png" alt="logo" id="logologin">
        <div class="text-center">

            <input class="form-check-input" type="checkbox" value="1" name="usu_termino" required>
            <label class="text-white" class="form-check-label">Aceptar terminos y condiciones</label>
            <p class="text-white" >Manifiesto que autorizo a GERS SAS el tratamiento de mis datos personales para
                que puedan ser utilizados directa o indirectamente, con fines administrativos
                o comerciales, tales como: procesos de admisión, selección y vinculación
                de personal. Así mismo, autorizo a que mis datos personales y mi información
                sean almacenados en la base de datos de GERS SAS.</p>
            <p class="text-white">¿Ya tienes una cuenta?<a class="link" href="Login.php">Iniciar Sesion</a></p>
            
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>

       
    </form>

</body>
<footer>
    <script src="build/js/validacionregistro.js"></script>
    <script src="build/js/particles.min.js"></script>
    <script src="build/js/app.js"></script>
</footer>

</html>