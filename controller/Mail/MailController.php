<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

include_once '../model/Mail/MailModel.php';
include_once '../view/partials/footer.php';

class MailController
{
    //la vista de recuperar contraseña
    public function getMail()
    {
        include_once '../view/Login/RecuperacionContraseña.php';
    }
    //manda correo para recuperar contraseña
    public function postMail()
    {
        $obj = new MailModel();
 
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        $Usu_email = $_POST['usu_correo'];

        $token = str_shuffle("0123456789" . uniqid());

        $sql = "SELECT usu_id, usu_correo FROM tbl_usuario WHERE usu_correo='" . $Usu_email . "'";
        $consultMail = $obj->consult($sql);

        if (mysqli_num_rows($consultMail) > 0) {

            $mail = new PHPMailer();                              // Passing `true` enables exceptions
            try {
                //Server settings
                $mail->SMTPDebug = 0;                                // Enable verbose debug output

                $mail->CharSet = 'UTF-8';

                $mail->isSMTP();         
                                            // Set mailer to use SMTP
                $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                               // Enable SMTP authentication
                $mail->Username = 'ply@gers.com';                 // SMTP username
                $mail->Password = 'mylucsnbxtalyhzs';                           // SMTP password
                $mail->SMTPSecure =PHPMailer::ENCRYPTION_SMTPS;                            // Enable TLS encryption, `ssl` also accepted
                $mail->Port =465;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('ply@gers.com', 'Soporte Gers');
                $mail->addAddress($Usu_email);     // Add a recipient
                //$mail->addAddress("ply@gers.com.co");                    // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
               // $mail->addBCC('carolcundar19@gmail.com');
                // $mail->addCC('bcc@example.com');

                //Attachments
                $mail->addAttachment('images/G.png');     // Add attachments
                $mail->addAttachment('Gestion Humana - Gers');    // Optional name

                //Content
                $mail->isHTML(true);// Set email format to HTML
                $mail->Subject = 'Restablecimiento De Contraseña';
                $mail->Body    = "Ha solicitado cambiar contraseña, copie este codigo <b>$token</b> e ingreselo en el sistema o dele clic al siguiente enlace <strong>https://apps.gers.co:8443/RecursosHumanos/web/ajax.php?modulo=Mail&controlador=Mail&funcion=getToken</strong>, para poder restablecer tu contraseña<br><b>Si no solicito ningun restablecimiento de su contraseña en el sistema GERS S.A.S, ignore este mensaje.</b>";
                //$mail->AltBody = '';

                $mail->send();

                $sql = "UPDATE tbl_usuario SET usu_token='$token' WHERE usu_correo='$Usu_email' ";
                $execution = $obj->update($sql);
                if ($execution) {
                   redirect(getUrl("Mail", "Mail", "getToken", false, "ajax"));
                }
            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        } else {
            //aviso de mal correo
           echo '<script>alert("el correo que digito no existe");</script>';
            redirect(getUrl("Mail", "Mail", "getMail"));
        }
    }

    public function Seleccionado(){
        
    }


//la vista para el token que haya llegado al correo
    public function getToken()
    {
        include_once '../view/login/tokenPass.php';
    }
//actualizacion de contraseña al numero de indentificacion si el token es valido
    public function postToken()
    {
        $obj = new MailModel();
 
        $usu_numeroDocumento = $_POST['usu_documento'];
        $usu_token = $_POST['usu_token'];

        $sql = "SELECT usu_token FROM `tbl_usuario` WHERE usu_token='$usu_token'";
        $consultToken = $obj->consult($sql);

        if (mysqli_num_rows($consultToken) > 0) {
            $cambiodepass=password_hash($usu_numeroDocumento, PASSWORD_BCRYPT);
            $sql = "UPDATE tbl_usuario SET usu_contraseña='$cambiodepass', usu_token=NULL WHERE usu_documento='".$usu_numeroDocumento."' ";

            $execution = $obj->update($sql);

            if ($execution) {
                //aqui va una alerta para mostrar que ya se cambio 
                // echo "<script>alert('La contraseña se ha cambiado correctamente
                // Porfavor ingresa con tu numero de documento y luego cambia tu contraseña');</script>";
                echo '<script>alert("Por favor ingrese con su correo y en el campo de contraseña, digite su numero de documento. Una vez en el aplicativo puede cambiar la contraseña.");</script>';
               redirect(getUrl("Access", "Access", "login2",false,"ajax"));   
            }
        }
    }
    
}
