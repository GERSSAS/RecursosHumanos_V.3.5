<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../model/Access/AccessModel.php';

class AccessController
{
    //Visualizar la vista de login
    public function getLogin()
    {
        include_once '../view/Registro/registrovista.php';
    }
    //Regitrar usuarios en la base de datos
    public function getInsert()
    {
        $obj = new AccessModel();
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        extract($_POST);
        $correo = $_POST['usu_correo'];
        $hash = password_hash($_POST['usu_contraseña'], PASSWORD_BCRYPT);
        $sql2 = "SELECT usu_correo FROM tbl_usuario WHERE  usu_correo='" . $correo . "'";
        $correobd = $obj->consult($sql2);
        $row = $correobd->num_rows;
        if ($row == 0) {
            $token = str_shuffle("0123456789" . uniqid());
            $usu_id = $obj->autoIncrement("tbl_usuario", "usu_id");
            $usu_telefono = 0;
            $usu_pais_residencia = "";
            $usu_residencia = "";
            $usu_direccion = "";
            $usu_barrio = "";
            $usu_tipo_documento =  "";
            $usu_documento  = "";
            $fecha = date("Y-m-d");
            $sql = "INSERT INTO tbl_usuario VALUES('$usu_id ', '$usu_nombre ','$usu_apellido ',
        '$usu_correo ', '$usu_telefono ','$usu_pais_residencia','$usu_residencia','$usu_direccion',
        '$usu_tipo_documento ', '$usu_documento ','$hash','$usu_termino',2, NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,$fecha)";
            $execution2 = $obj->insert($sql);
            ////// MANDAR CORREO CUANDO YA SE VALIDO QUE ES CORREO NO SE HAYA UTILIZADO YA EN EL SISTEMA
            //VALIDAR EL CORREO
            $mail = new PHPMailer();                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                // Enable verbose debug output

                $mail->CharSet = 'UTF-8';

                $mail->isSMTP();
                // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'no.reply@gers.com';                 // SMTP username
                $mail->Password = 'jrxvtpydedfoolza';                           // SMTP password
                $mail->SMTPSecure = 'TSL';                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('no.reply@gers.como', 'Soporte Gers');
                $mail->addAddress($correo);     // Add a recipient
                //$mail->addAddress("no.reply@gers.com.co");                    // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
                // $mail->addBCC('');
                // $mail->addCC('bcc@example.com');

                //Attachments
                $mail->addAttachment('images/G.png');     // Add attachments
                $mail->addAttachment('Gestion Humana - Gers');    // Optional name

                //Content
                $mail->isHTML(true); // Set email format to HTML
                $mail->Subject = 'Validación de correo electronico';
                $mail->Body    = "Ha iniciado el proceso de registro en nuestro sistema de <b>RECURSOS HUMANOS</b>, copie este código <b>$token</b> e ingreselo en el sistema o dele clic al siguiente enlace <strong>https://apps.gers.co:8443/RecursosHumanos/web/ajax.php?modulo=Access&controlador=Access&funcion=viewcorreo</strong>, para poder registrarte<br><b>Sí no solicitó ningun código de registro de su correo electrónico en el sistema GERS S.A.S, ignore este mensaje.</b>";
                //$mail->AltBody = '';
                $mail->send();
                $sql = "UPDATE tbl_usuario SET usu_validarcorreo='$token' WHERE usu_correo='$correo' ";
                $execution2 = $obj->update($sql);
                if ($execution2) {
                    echo "<script>alert('Hemos enviado a su correo electrónico un código de verificación (Revise su carpeta de spam).');</script>";
                    redirect(getUrl("Access", "Access", "viewcorreo", false, "ajax"));
                }
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
            //FIN DE VALIDAR CORREO
            ////////////////////////////////////FIN DE LA VALIDACION DE CORREO
        } else {
            echo "<script>alert('Este correo electrónico ya se encuentra registrado en el sistema');</script>";
            redirect('Login.php');
        }
        redirect('Login.php');
    }


    //FUNCION PARA VALIDAR CORREO ELECTRONICO
    public function validarcorreo()
    {
        $obj = new AccessModel();
        $usu_correo = $_POST['usu_correo'];
        $usu_token = $_POST['usu_token'];

        $sql = "SELECT usu_validarcorreo,usu_correo FROM `tbl_usuario` WHERE usu_validarcorreo='$usu_token' AND usu_correo='$usu_correo'";
        $consultToken = $obj->consult($sql);

        if (mysqli_num_rows($consultToken) > 0) {
            $sql = "UPDATE tbl_usuario SET usu_validarcorreo=NULL WHERE usu_correo='" . $usu_correo . "' ";

            $execution2 = $obj->update($sql);

            if ($execution2) {
                //aqui va una alerta para mostrar que ya se cambio 
                echo '<script>alert("El correo electrónico se ha validado correctamente!");</script>';
                redirect('login.php');
            }
        } else {
            //aqui una alerta por si no se cambio.
            echo '<script>alert("Ha ingresado datos incorrectos por favor intentelo nuevamente!");</script>';
            redirect(getUrl("Access", "Access", "viewcorreo", false, "ajax"));
        }
    }

    //FUNCION DE LA VISTA PARA VALIDAR EL CODIGO
    public function viewcorreo()
    {

        include_once '../view/login/validarcorreo.php';
    }
    public function login2()
    {
        redirect('login.php');
    }

    //acceso en el login

    public function login()
    {


        $obj = new AccessModel();


        $usu_correo = $_POST['usu_correo'];
        $usu_contraseña = $_POST['usu_contraseña'];


        //pregunta si me llega una consulta y si el campo de valido es null, para que valide su cuenta

        $selectedPass = "SELECT usu_contraseña FROM tbl_usuario WHERE usu_correo='$usu_correo'";
        $passord_V = $obj->consult($selectedPass);
        if (mysqli_num_rows($passord_V) > 0) {
            $correovalidado = "SELECT usu_correo FROM tbl_usuario WHERE usu_correo='$usu_correo' AND usu_validarcorreo IS NULL";
            $passord_V2 = $obj->consult($correovalidado);
            //pregunta si me llega mas de una consulta
            if (mysqli_num_rows($passord_V2) > 0) {
                foreach ($passord_V as $pass) {
                    $hash_verify_db = $pass['usu_contraseña'];
                }
                //si concuerda la contraseña seleccioneme ese usuario y redireccionalo a ADMIN O USUARIO
                if (password_verify($usu_contraseña, $hash_verify_db)) {

                    $sqlUser = "SELECT usu_id, usu_nombre, usu_apellido, usu_correo, usu_contraseña, rol_id FROM tbl_usuario WHERE usu_correo='" . $usu_correo . "' AND usu_contraseña='" . $hash_verify_db . "' AND rol_id=1";
                    $usuario = $obj->consult($sqlUser);
                    if (mysqli_num_rows($usuario) > 0) {
                        foreach ($usuario as $user) {

                            $_SESSION['nameUser'] = $user['usu_nombre'];
                            $_SESSION['surnameUser'] = $user['usu_apellido'];
                            $_SESSION['rolId'] = $user['rol_id'];
                            $_SESSION['idUser'] = $user['usu_id'];
                            $_SESSION['auth'] = "ok";
                        }
                        if ($_SESSION['idUser'] > 0) {
                            $sql = "UPDATE tbl_vacante SET id_estadovacante = 2 WHERE DATE_FORMAT(CURDATE(),'%y%m%d') >= vac_fecha  AND id_estadovacante=1";
                            $resultado = $obj->update($sql);
                        }
                        redirect("indexAdmin.php");
                    }
                    $sqlUser2 = "SELECT usu_id, usu_nombre, usu_apellido, usu_correo, usu_contraseña, rol_id FROM tbl_usuario WHERE usu_correo='" . $usu_correo . "' AND usu_contraseña='" . $hash_verify_db . "' AND rol_id=2";
                    $usuario2 = $obj->consult($sqlUser2);
                    if (mysqli_num_rows($usuario2) > 0) {
                        foreach ($usuario2 as $user) {

                            $_SESSION['nameUser'] = $user['usu_nombre'];
                            $_SESSION['surnameUser'] = $user['usu_apellido'];
                            $_SESSION['rolId'] = $user['rol_id'];
                            $_SESSION['idUser'] = $user['usu_id'];
                            $_SESSION['auth'] = "ok";
                        }
                        if ($_SESSION['idUser'] > 0) {
                            $sql = "UPDATE tbl_vacante SET id_estadovacante = 2 WHERE DATE_FORMAT(CURDATE(),'%y%m%d') >=  vac_fecha  AND id_estadovacante=1";
                            $resultado = $obj->update($sql);
                        }

                        redirect("indexUsu.php");
                    } else {
                        echo "<script>alert('El correo o contraseña no coinciden Vuelva a intentarlo'); </script>";
                        redirect('login.php');
                    }
                } else {
                    //alerta de que no coincide la contraseña
                    echo "<script>alert('El correo o contraseña no coinciden Vuelva a intentarlo'); </script>";
                    redirect('login.php');
                }
            } else {
                echo "<script>alert('Aún no ha activado su cuenta, por favor ingrese a su correo electronico para la validación'); </script>";
                redirect('login.php');
            }
        } else {
            echo "<script>alert('El correo o contraseña no coinciden Vuelva a intentarlo'); </script>";
            redirect('login.php');
        }
    }


    // CIERRE DE SESION
    public function logOut()
    {
        session_destroy();
        redirect('login.php');
    }

    public function timeline()
    {
        $obj = new AccessModel();
        /// TIME LINE
        //DOCUMENTOS DE SOPORTE DEL USUARIO
        $sql = "SELECT usu_hojadevida,usu_matricula,usu_fechamatricula,usu_fechahojadevida FROM tbl_usuario WHERE usu_id='" . $_SESSION['idUser'] . "'";
        $usuario = $obj->consult($sql);
        ///ESTUDIOS DE LA PERSONA
        $sql = "SELECT * FROM tbl_formacion WHERE usu_id='" . $_SESSION['idUser'] . "'";
        $formacion = $obj->consult($sql);
        //EXPERIENCIA DE LA PERSONA
        $sql = "SELECT * FROM tbl_historial_de_trabajo WHERE usu_id='" . $_SESSION['idUser'] . "'";
        $historial = $obj->consult($sql);
        //IDIOMAS
        $sql = "SELECT * FROM tbl_idiomas WHERE usu_id='" . $_SESSION['idUser'] . "'";
        $idioma = $obj->consult($sql);
        //INFORMACION PERSONAL
        $sql = "SELECT * FROM tbl_usuario WHERE usu_id='" . $_SESSION['idUser'] . "'";
        $perfil = $obj->consult($sql);

        echo "<div class='card'>
            <div  class='text-center titles card-header'>
           INFORMACIÓN PERSONAL
            </div>"; ?>
<?php foreach ($perfil as $perfi) { ?>

<div class="eo #contenedor_arriba x_content">
    <div class="justify-content-start col-md-12 caja">


        <form id="actualizarinformacionpersonal"
            action="<?php echo getUrl("Usuario", "Ofertas", "ActualizarRegistro"); ?>" method="post"
            enctype="multipart/form-data">
            <div class="justify-content-start col-md-12 caja">
                <div class="card-body p-4">
                    <div class="row justify-content-start">

                        <div class="col-md-3">
                            <label class="titulos_negrita">Nombre/s</label>
                            <input readonly type="text" name="" value="<?= $perfi['usu_nombre'] ?>"
                                class="estiloinput form-control oferta">
                        </div>

                        <div class="col-md-3">
                            <label class="titulos_negrita">Apellido/s</label>
                            <input readonly type="text" name="" value="<?= $perfi['usu_apellido'] ?>"
                                class="estiloinput form-control oferta">
                        </div>


                        <div class="col-md-3">
                            <label class="titulos_negrita">Correo Electrónico</label>
                            <input readonly type="text" value="<?= $perfi['usu_correo'] ?>"
                                class="estiloinput form-control oferta">
                        </div>

                        <div class="col-md-3">
                            <label class="titulos_negrita">Fecha de Nacimiento</label>
                            <input readonly type="date" value="<?= $perfi['fecha_nacimiento'] ?>"
                                class="estiloinput form-control oferta">
                        </div>

                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Género</label>
                            <input readonly type="text" value="<?= $perfi['usu_genero'] ?>"
                                class="estiloinput form-control oferta">
                        </div>

                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Estado Civil</label>
                            <input readonly type="text" name="usu_telefono" value="<?= $perfi['estado_civil'] ?>"
                                class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Teléfono</label>
                            <input readonly type="text" name="usu_telefono" value="<?= $perfi['usu_telefono'] ?>"
                                class="estiloinput form-control oferta">
                        </div>

                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">País</label><br>
                            <input readonly type="text" name="usu_pais_residencia"
                                value="<?= $perfi['usu_pais_residencia'] ?>" class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Estado</label><br>
                            <input readonly type="text" name="usu_pais_residencia" value="<?= $perfi['usu_estado'] ?>"
                                class="estiloinput form-control oferta">
                        </div>

                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Ciudad</label>
                            <input readonly type="text" name="usu_residencia" value="<?= $perfi['usu_residencia'] ?>"
                                class="estiloinput form-control oferta">
                        </div>

                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Dirección</label>
                            <input readonly type="text" name="usu_direccion" value="<?= $perfi['usu_direccion'] ?>"
                                class="estiloinput form-control oferta">
                        </div>


                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Tipo Documento</label>
                            <input readonly type="text" name="" value="<?= $perfi['usu_tipo_documento'] ?>"
                                class="estiloinput form-control oferta">
                        </div>

                        <div class="col-md-3">
                            <br>
                            <label class="titulos_negrita">Documento</label>
                            <input readonly type="text" name="" value="<?= $perfi['usu_documento'] ?>"
                                class="estiloinput form-control oferta">
                        </div>
                        <div class='col-md-6'><br>
                        </div><br>

                    </div>
                    <!-- <a class="float-right" href="<?php echo getUrl2("Usuario", "Ofertas", "consultaregistro"); ?>" style=''><i class="fa fa-pencil" style="font-size: 2rem; color: cornflowerblue;"></i></a> -->
                </div>
            </div>

        </form>
    </div>
</div>
</div>

<!-- <div class='card-body'>
    <blockquote class='blockquote mb-0'>

        <p class="time"><b>Nombre/s:</b>
        <?php echo $perfi['usu_nombre'] ?></p>
        <p class="time"><b>Apellido/s:</b>
        <?php echo $perfi['usu_apellido'] ?></p>
        <p class="time"><b>Correo Electronico:</b>
        <?php echo $perfi['usu_correo'] ?></p>
        <p class="time"><b>Telefono:</b><?php echo $perfi['usu_telefono'] ?></p>
        <p class="time"><b>Pais:</b>
        <?php echo $perfi['usu_pais_residencia'] ?></p>
        <p class="time"><b>Ciudad:</b>
        <?php echo $perfi['usu_residencia'] ?></p>
        <p class="time"><b>Dirección:</b>
        <?php echo $perfi['usu_direccion'] ?></p>
         <p class="time"><b>Barrio:</b><?php echo $perfi['usu_barrio'] ?></p>
        <?php echo $perfi['usu_barrio'] ?></p>
        <p class="time"><b>Tipo de Documento :</b>
        <?php echo $perfi['usu_tipo_documento'] ?></p>
        <p class="time"><b>Número de Documento :</b>
        <?php echo $perfi['usu_documento'] ?></p>
    
        </blockquote>
</div> -->


<?php   } ?>

<div class='card'>
    <?php
            echo "<div class='card'>
            <div  class='text-center titles card-header'>
           EXPERIENCIA PROFESIONAL
            </div>"; ?>
    <?php foreach ($historial as $hist) { ?>
    <div class='card-body'>
        <blockquote class='blockquote mb-0'>
            <div class="justify-content-start col-md-12 caja">
                <div class="card-body p-4">
                    <h2>
                        <p class="titulos_negrita"><b><?php echo $hist['hist_cargo'] ?></b></p>
                    </h2>
                    <div class="row justify-content-start">

                        <div class="col-md-3">
                            <label class="titulos_negrita">Empresa</label>
                            <input readonly type="text" name="" value="<?php echo $hist['hist_empresa'] ?>"
                                class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <label class="titulos_negrita">Descripcion de Actividades</label>
                            <input readonly type="text" name="" value="<?php echo $hist['hist_descripcion'] ?>"
                                class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <label class="titulos_negrita">Pais</label>
                            <input readonly type="text" name="" value="<?php echo $hist['hist_pais'] ?>"
                                class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <label class="titulos_negrita">Estado</label>
                            <input readonly type="text" name="" value="<?php echo $hist['hist_estado'] ?>"
                                class="estiloinput form-control oferta">
                        </div>
                        <div class="col-md-3">
                            <label class="titulos_negrita">Cuidad</label>
                            <input readonly type="text" name="" value="<?php echo $hist['hist_ciudad'] ?>"
                                class="estiloinput form-control oferta">
                        </div>


                        <div class="col-md-3">
                            <label class="titulos_negrita">Certificado</label>

                            <p class="time"><a type="button" id='consultarhistoria' name='id_hist' target="_black"
                                    href="<?php echo 'https://'.$_SERVER['HTTP_HOST'].'/RecursosHumanos'.$hist['hist_certificado']?>"
                                    class='btn btn-primary radios'><i class='fa fa-eye'></i></a></p>
                        </div>
                    </div>
                    <!-- <a class="float-right" href="<?php echo getUrl2("Usuario", "Ofertas", "experiencia"); ?>"><i class="fa fa-pencil" style="font-size: 2rem; color: cornflowerblue;"></i></a> -->
                </div>
            </div>
        </blockquote>
    </div>

    <?php   } ?>

</div><br>
<div class='card'>
    <div class='titles text-center card-header '>
        ESTUDIOS
    </div><?php
                    foreach ($formacion as $form) {
                        echo "<div class='card-body'>
                        <blockquote class='blockquote mb-0'>
                        <div class='justify-content-start col-md-12 caja'>
                        <div class='card-body p-4'>
                            <footer style='text-align:right;'class='blockquote-footer'><b>Fecha graduación: </b><cite title='Source Title'>" . $form["form_fecha_fin"] . "</cite></footer>
                            <br>
                            <div class='row justify-content-start'>
                                <div class='col-md-3'>
                                    <label class='titulos_negrita'>Titulo obtenido</label>
                                    <input readonly type='text' name='' value=" . $form['form_tituloname'] . " class='estiloinput form-control oferta'>
                                </div>
                                 <div class='col-md-3'>
                                    <label class='titulos_negrita'>Nivel de Educación</label>
                                    <input readonly type='text' name='' value=" . $form["form_nivel_de_educacion"] . " class='estiloinput form-control oferta'>
                                </div>
                                <div class='col-md-3'>
                                    <label class='titulos_negrita'>Nombre de la Institución</label>
                                    <input readonly type='text' name='' value=" . $form["form_nombre"] . " class='estiloinput form-control oferta'>
                                </div>
                                <div class='col-md-3'>
                                    <label class='titulos_negrita'>Conocimientos Fundamentales</label>
                                    <input readonly type='text' name='' value=" . $form["form_conocimientos"] . " class='estiloinput form-control oferta'>
                                </div>
                        
                        </div><br><p class='time'><b>Titulo obtenido</b>
                        <p class='time'><a  type='button'id='consultarcertificad'target='_black' href='https://" . $_SERVER['HTTP_HOST'].'/RecursosHumanos'.$form['form_titulo_profesional'] . "'
                                class='btn btn-primary radios'><i class='fa fa-eye'></i></a></p>
                                <footer  style='text-align:right;'class='blockquote-footer'>Registrado:<cite title='Source Title'>" . $form['form_time'] . "</cite></footer>
                                </div></div><br></blockquote> 
                       
                                </div> ";
                    }
                   
                foreach ($usuario as $usu) {
                ?>

    <?php  } ?>



    <?php  }

    // vacantes del exteriro del sistema
    public function vacantes()
    {
        $obj = new AccessModel();
        $sql = "SELECT * FROM tbl_vacante WHERE id_estadovacante='1'";
        $aplicaciones = $obj->consult($sql);
    ?>
    <!-- PARA LA VISTA DE AFUERA DE LOS USUARIOS -->
    <div style="padding-top:10px;" class="x_title">
        <h1 style="font-weight:bolder;" class="text-center">OFERTAS LABORALES</h1>
    </div>
    <div style="padding-top:10px;" class="x_content justify-content-start col-md-12">

            <?php
            $vacantes_abiertas = false;

            while ($row = $aplicaciones->fetch_assoc()) {
                if(!isset($row["vac_nombre"])){
                    
                    $vacantes_abiertas = false;
                } else
                {
                    $vacantes_abiertas = true;
                }
            }


            if($vacantes_abiertas == true){
                
                foreach ($aplicaciones as $vac) { ?>
                    <!-- Post preview-->
                    
                    <div style='' class='card col-md-12' class="post-preview">
        
        
                        <h6 class="post-title" style="text-transform:uppercase;"><?php echo $vac['vac_nombre'];?></h6>
                        <ul class="post-title">
                            <li class=''><b>Fecha de finalizacion de la vacante: </b><?php echo $vac['vac_fecha']  ;?></li>
                            <li class=''><b>Años de experiencia: </b> <?php echo$vac['vac_años_xp'] ;?></li>
                            <li class=''><b>Jornada laboral:</b> <?php echo $vac['vac_jornada_laboral'] ;?></li>
                            <li class=''><b>Tipo contrato:</b> <?php echo $vac['vac_tipo_contrato'] ;?></li>
                            <li class=''><b>Salarío:</b> <?php echo $vac['vac_salario'] ;?></li>
                            <li class=''><b>Nivel de Educación:</b> <?php echo $vac['vac_educacion'] ;?></li>
                            <li class=''><b>Cargo:</b> <?php echo $vac['vac_cargo'] ;?></li>
                            
                        </ul>
                        <div class="d-flex justify-content-end mb-4">
                            <div style='padding-top:10px;' class='card-body'>
                                <a id='modaldetallevacante' class="btn btn-primary text-uppercase" value = ''  data-url='<?php echo getUrl("Usuario", "Ofertas", "modaldetalle", array("id_vacante" => $vac['id_vacante']), "ajax"); ?>'>Ver detalle</a>
                            
                            <a class='radios btn btn-warning text-uppercase'  name='id_vacante' href='./login.php'>Aplicar</a>             
                            </div>    
                        </div>                      
                            </div>
                            <!-- Divider-->
                            <hr class=" my-4" />
                            
         <?php } ?>
    </div>
        <?php } else { ?> 
            <div style=''  class="post-preview">
            <h3>Proximamente estaremos publicando nuevas vacantes</h3>
            <br><br><br><br><br><br><br><br><br>
            </div>
            <!-- Divider-->
            <hr class=" my-4" />
        <?php } 
    }}
?>