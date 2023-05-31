<?php
include_once '../lib/helpers.php';
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>RECURSOS HUMANOS GERS</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="build/css/estilos.css">
    <link rel="stylesheet" href="build/css/Mantenimientocss.css">
    <link rel="shorcut icon" href="images/iconoGers.png">

</head>

<body>

    <div id="particles-js">

    </div>
    <form id="login" class="formulario login form-box" method="POST" action="<?php echo getUrl("Access", "Access", "login", false, 'ajax'); ?>">
        <h1 class="form-title">RECURSOS HUMANOS GERS</h1>
        <div class="x_panel contenedor">
        
            <div id="contenedor" class="text-center input-contenedor">
                <input type="text" class="login__input" name="usu_correo" id="usu_correo" placeholder="Correo Electronico">
                <p class="error"><small></small></p>
            </div>
            <div id="contenedorcontra" class="x_panel input-contenedor"><br>

                <div style="position: relative;">  
                    </i><input class="login__input" type="password" id="usu_contraseña" name="usu_contraseña" placeholder="Contraseña"><i style="color: #191919;
	color: #191919;
    position: absolute;
    width: 20px;
    height: 33px;
    left: 390px;
    top: 77%;
	transform: translateY(-50%);" class="fa fa-eye-slash icon" id="show_password"class="" type="button" onclick="mostrarPassword()"></i>
                </div>
                <p class="error"><small></small></p>
            </div>
           
            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>
<br>        
</div> 
      <div class="form-group">
       <button type="submit" class="btn btn-primary btn-lg"value="class=">Ingresar</button>       
        </div> 
            <br>
            <p><a class="link" href="<?php echo getUrl("Access", "Access", "getLogin", false, 'ajax'); ?>">Crear cuenta  </a></p>

           <a class="olvide" href="<?php echo getUrl("Mail", "Mail", "getMail", false, "ajax"); ?>">Olvide mi contraseña</a>
        </div>
    </form>
</body>
<footer>

    <script type="text/javascript">
        function mostrarPassword() {
            var cambio = document.getElementById("usu_contraseña");
            if (cambio.type == "password") {
                cambio.type = "text";
                $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
            } else {
                cambio.type = "password";
                $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
            }
        }
    </script>
    <script src="build/js/validacionlogin.js"></script>
    <script src="build/js/particles.min.js"></script>
    <script src="build/js/app.js"></script>
</footer>

</html>