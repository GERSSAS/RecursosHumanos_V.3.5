<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

include_once '../model/Admin/FormularioVacantesModel.php';


Class FormularioController
{
    //la vista para crear una vacante 
    public function create(){
        include_once '../view/Admin/Formulario/FormularioVacantes.php';
    }
    //para consultar todas las vacantes registradas
    public function consult(){
        $obj= new FormularioVacantesModel();
        $sql= "SELECT tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_vacante.vac_fecha,tbl_vacante.vac_publicacion,tbl_estadovacante.id_estadovacante,tbl_estadovacante.est_nombre
               FROM (tbl_vacante INNER JOIN tbl_estadovacante ON tbl_vacante.id_estadovacante=tbl_estadovacante.id_estadovacante)
               GROUP BY tbl_vacante.id_vacante ASC";
        $Vacantes=$obj->consult($sql);

        $sql="SELECT tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_vacante.vac_fecha,tbl_vacante.vac_publicacion,tbl_estadovacante.id_estadovacante,tbl_estadovacante.est_nombre
        FROM (tbl_vacante INNER JOIN tbl_estadovacante ON tbl_vacante.id_estadovacante=tbl_estadovacante.id_estadovacante)
        WHERE vac_correosclientes IS NULL AND tbl_vacante.id_estadovacante=2
        GROUP BY tbl_vacante.id_vacante ASC";
        $vacanteinactiva=$obj->consult($sql);
        include_once '../view/Admin/Formulario/FormularioConsultVacantes.php';
    }

    //la vista para actualizar una vacante creada
    public function FormUpdate()
    {
        $Vacante = $_GET['id_vacante'];
        $obj = new FormularioVacantesModel();
        $sql = "SELECT * FROM tbl_vacante where id_vacante=$Vacante";
        $Vacante=$obj->consult($sql);
        include_once '../view/Admin/Formulario/FormularioUpdateVacantes.php';

    }


    public function eliminarVacante()
    {
      $obj = new FormularioVacantesModel();
      $id_vacante = $_GET['id_vacante'];
      $sql = "DELETE FROM tbl_vacante WHERE id_vacante='" . $id_vacante . "'";
      $delete = $obj->delete($sql);
      redirect(getUrl("Admin","Formulario","consult"));
    }


    //los datos que llegan de la vista dodne creas una vacante
    public function postInsert(){
        $obj=new FormularioVacantesModel();
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';  

        $id=$obj->autoIncrement("tbl_vacante","id_vacante");
        $vac_nombre=$_POST['vac_nombre'];
        $vac_descripcion=$_POST['vac_descripcion'];
        $vac_jornada_laboral=$_POST['vac_jornada_laboral'];
        $vac_tipo_contrato=$_POST['vac_tipo_contrato'];
        $vac_salario=$_POST['vac_salario'];
        $vac_fecha=$_POST['vac_fecha'];
        $vac_años_xp=$_POST['vac_años_xp'];
        $vac_educacion=$_POST['vac_educacion'];
        $vac_ubicacion=$_POST['vac_ubicacion'];
        $vac_cargo=$_POST['vac_cargo'];
        $vac_funciones_generales=$_POST['vac_funciones_generales'];
        $vac_funciones_especificas=$_POST['vac_funciones_especificas'];
       
          
        if(empty($vac_nombre) or empty( $vac_descripcion) or empty($vac_jornada_laboral) or empty($vac_tipo_contrato) or empty($vac_salario) or empty($vac_fecha) or empty($vac_años_xp) or empty($vac_educacion) or empty($vac_cargo) or empty($vac_funciones_generales) or empty($vac_funciones_especificas) ){
                echo "
                <script>alert('No puedes tener campos vacios al momento de crear la vacante');</script>";
                redirect(getUrl("Admin","Formulario","create"));
        }else{
        $sql="INSERT INTO tbl_vacante(id_vacante, vac_nombre, vac_descripcion, vac_jornada_laboral, vac_tipo_contrato, vac_salario, vac_fecha, vac_años_xp, vac_educacion, id_estadovacante, vac_publicacion, vac_cargo, vac_funciones_generales, vac_funciones_especificas) 
        VALUES($id,'".$vac_nombre."','".$vac_descripcion."','".$vac_jornada_laboral."','".$vac_tipo_contrato."','".$vac_salario."','".$vac_fecha."','".$vac_años_xp."','".$vac_educacion."', 1,CURRENT_TIMESTAMP, '".$vac_cargo."','".$vac_funciones_generales."','".$vac_funciones_especificas."')";
        $ejecutar=$obj->insert($sql);
        
        
        $sql="SELECT usu_correo FROM tbl_usuario WHERE rol_id='2'";
        $usuarios=$obj->consult($sql);

        //Enviar notificaciones por correo

        foreach ($usuarios as $usu) {
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
                $mail->Port =587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('no.reply@gers.com', 'Soporte Gers');
                $mail->addAddress($usu['usu_correo']);     // Add a recipient
                //$mail->addAddress(".$Usu_email.");                    // Name is optional
                // $mail->addReplyTo('info@example.com', 'Information');
               // $mail->addBCC('carolcundar19@gmail.com');
                // $mail->addCC('bcc@example.com');

                //Attachments
                $mail->addAttachment('images/G.png');     // Add attachments
                $mail->addAttachment('Gestion Humana - Gers');    // Optional name

                //Content
                $mail->isHTML(true);// Set email format to HTML
                $mail->Subject = 'ALERTAS DE GERS S.A.S';
                $mail->Body    = "<b>$vac_nombre</b> <br> Se ha generado una nueva vacante que te podria interesar.<br>Ingresa a nuestro portal y descrubre como postularte y ser parte de esta gran familia <b>GERS S.A.S</b><br><b>Copia link o ingresa:</b><br>https://apps.gers.co:8443/RecursosHumanos/web/login.php";
                //$mail->AltBody = '';
                $mail->send();

            } catch (Exception $e) {
                echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
            }
        }
        redirect(getUrl("Admin","Formulario","consult"));
    }
        
    }
  //actualizar una vacante creadas
   public function UpdateForm(){
    $obj=new FormularioVacantesModel();
    $id_vacante=$_POST['id_vacante'];
    $vac_nombre=$_POST['vac_nombre'];
    $vac_descripcion=$_POST['vac_descripcion'];
    $vac_jornada_laboral=$_POST['vac_jornada_laboral'];
    $vac_tipo_contrato=$_POST['vac_tipo_contrato'];
    $vac_salario=$_POST['vac_salario'];
    $vac_fecha=$_POST['vac_fecha'];
    $vac_años_xp=$_POST['vac_años_xp'];
    $vac_educacion=$_POST['vac_educacion'];
    $vac_ubicacion=$_POST['vac_ubicacion'];
    $vac_cargo=$_POST['vac_cargo'];
    $vac_funciones_generales=$_POST['vac_funciones_generales'];
    $vac_funciones_especificas=$_POST['vac_funciones_especificas'];
    
    


    if(empty($vac_nombre) or empty( $vac_descripcion) or  empty($vac_jornada_laboral) or empty($vac_tipo_contrato) or empty($vac_salario) or empty($vac_fecha) or empty($vac_años_xp) or empty($vac_cargo) or empty($vac_funciones_generales) or empty($vac_funciones_especificas)){
        echo "<script>alert(' $vac_nombre + $vac_descripcion + $vac_jornada_laboral + $vac_tipo_contrato + $vac_salario + $vac_fecha + $vac_años_xp + $vac_cargo + $vac_funciones_generales + $vac_funciones_especificas No puedes tener campos vacios al momento de actualizar la vacante');</script>";

        redirect(getUrl("Admin","Formulario","consult"));
}else{

    $sql = "UPDATE tbl_vacante SET vac_nombre='" . $vac_nombre . "',vac_descripcion='" . $vac_descripcion . "',vac_jornada_laboral='" . $vac_jornada_laboral. "'
    ,vac_tipo_contrato='".$vac_tipo_contrato."',vac_salario='" . $vac_salario. "', vac_fecha='" . $vac_fecha. "',vac_años_xp='" . $vac_años_xp. "'
    ,vac_educacion='" . $vac_educacion. "', vac_cargo='" .$vac_cargo. "', vac_funciones_generales='".$vac_funciones_generales."', vac_funciones_especificas='" .$vac_funciones_especificas."' WHERE id_vacante = $id_vacante";
    $ejecutar=$obj->update($sql);

}

    redirect(getUrl("Admin","Formulario","consult"));
   }
  
   
//vista actualizar vacantes
    public function update(){
        include_once '../view/Admin/Formulario/FormularioUpdateVacantes.php';

    }
//vista de la vacante para cambiar su estado (activa,inactiva)
    public function estadovacante(){
        $obj = new FormularioVacantesModel();
        $vacante_id = $_GET['id_vacante'];
        $sql = "SELECT tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_estadovacante.est_nombre,tbl_estadovacante.id_estadovacante
                FROM tbl_vacante INNER JOIN tbl_estadovacante ON tbl_vacante.id_estadovacante=tbl_estadovacante.id_estadovacante 
                WHERE id_vacante=$vacante_id";
        $vacantes=$obj->consult($sql);

        $sql="SELECT * FROM tbl_estadovacante";
        $Estados=$obj->consult($sql);

        include_once '../view/Admin/Formulario/modalVacante.php';
  

    }
//al cerrar vacante se vayan a no seleccionados
//y mandar correo a los seleccionados
  public function UpdateEstadoVacante(){
    $obj= new FormularioVacantesModel();
    $id=$obj->autoIncrement("tbl_vacante","id_vacante");
    $vacante_id=$_POST['id'];
    $id_estadovacante=$_POST['estado'];
    $cierre=$_POST['cierre'];
    
    if($id_estadovacante==2){///desactivando vacante
        //1- activa
        //2- inactiva
    $sql="UPDATE tbl_vacante SET id_estadovacante='2'
          WHERE  id_vacante='".$vacante_id."'";
    $ejecutar=$obj->Update($sql);
    $sql="UPDATE tbl_usuariovacante SET id_seleccionado=2
    WHERE id_vacante='".$vacante_id."' AND tbl_usuariovacante.id_seleccionado=3";
    $ejecutar2=$obj->Update($sql);
    }
   
    if($id_estadovacante==1 and $cierre<>0000-00-00	){//activando vacante
        //////////////////////////////////////
            $sql="SELECT * FROM tbl_vacante WHERE id_vacante ='".$vacante_id."'";
            $vacante=$obj->consult($sql);
    foreach ($vacante as $vac) {
         //1- activa
        //2- inactiva
        if ($vac['id_estadovacante']==2) {
        //validando que esta desactivado
        $sql="SELECT * FROM tbl_vacante WHERE id_vacante='".$vacante_id."'";
        $ejecutar2=$obj->consult($sql); 
        foreach ($ejecutar2 as $vac) {
         $sql="INSERT INTO tbl_vacante (`id_vacante`, `vac_nombre`, `vac_descripcion`, `vac_jornada_laboral`, `vac_tipo_contrato`, `vac_salario`, `vac_fecha`, `vac_años_xp`, `vac_educacion`, `id_estadovacante`, `vac_publicacion``vac_ubicacion`,`vac_cargo``vac_funciones_generales`,`vac_funciones_especificas` )
               VALUES($id,'".$vac['vac_nombre']."','".$vac['vac_descripcion']."','".$vac['vac_jornada_laboral']."','".$vac['vac_tipo_contrato']."','".$vac['vac_salario']."','".$cierre."','".$vac['vac_años_xp']."','".$vac['vac_educacion']."','".$vac['vac_ubicacion']."',1,current_timestamp(),'".$vac['vac_cargo']."','".$vac['vac_funciones_generales']."', '".$vac['vac_funciones_especificas']."')";
               $ejecutarcopia=$obj->insert($sql);
    
        }
        }else{
            echo "<script>alert('Esta vacante ya se encuentra activa');</script>";
        }
    }
    }else{
        echo "<script>alert('Agregue una fecha para el día de cierre de la vacante');</script>";
    }

    redirect(getUrl("Admin","Formulario","consult")); 

}

//AQUI VA MANDAR CORREOS A NO SELECCIONADOS
public function noseleccionados(){
    $obj=new FormularioVacantesModel();
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

        $vacante_id=$_POST['id']; 
        
        $sql="UPDATE tbl_vacante SET vac_correosclientes=1
        WHERE id_vacante='".$vacante_id."'";
        $actualizar=$obj->Update($sql);
        $sql="SELECT tbl_usuariovacante.id_vacante,tbl_usuariovacante.id_seleccionado,tbl_vacante.vac_nombre,tbl_usuario.usu_id,tbl_usuario.usu_correo,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_tipo_documento,tbl_usuario.usu_documento
        FROM tbl_usuariovacante INNER JOIN tbl_usuario ON tbl_usuariovacante.usu_id=tbl_usuario.usu_id
                                INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante
        WHERE tbl_usuariovacante.id_vacante='".$vacante_id."' AND tbl_usuariovacante.id_seleccionado=2";
        $correos=$obj->Update($sql);
        //CORREOS DE USUARIOS SELECCIONADOS
        foreach ($correos as $correo) {
        $mail = new PHPMailer();                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output

            $mail->CharSet = 'UTF-8';

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'no.reply@gers.com';                 // SMTP username
            $mail->Password = 'jrxvtpydedfoolzar';                           // SMTP password
            $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('no.reply@gers.com', 'Soporte Gers');
            $mail->addAddress($correo['usu_correo']);     // Add a recipient
            //$mail->addAddress(".$Usu_email.");                    // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
           // $mail->addBCC('');
            // $mail->addCC('bcc@example.com');

            //Attachments
            $mail->addAttachment('images/copia.jpg');     // Add attachments
            $mail->addAttachment('Recursos humanos - Gers');    // Optional name

            //Content
            $mail->isHTML(true);// Set email format to HTML
            $mail->Subject = "RESPUESTA A LA SOLICITUD DE LA VACANTE  ".$correo['vac_nombre']."";
            $mail->Body    = "Estimado/a <b>".$correo['usu_nombre']." ".$correo['usu_apellido']."</b> identificado con <b>".$correo['usu_tipo_documento']."</b> número <b>".$correo['usu_documento']."</b><br> el motivo de este e-mail es responder la oferta laboral <b>".$correo['vac_nombre'].".</b><br> donde lamentablemente <b>NO</b> ha sido seleccionado/a.<br> 
                              Gracias por haber participado en esta convocatoria laboral.
                              <br>
                              <table style='border-left:3px solid blue;'>
                              <tr>
                              <td><b>ALBA INÉS NARANJO S.</b><br>
                              <b>Jefe de Gestión Humana</b><br>
                              Calle 3ª A # 65-118<br>
                              Cali, Colombia<br>
                              Tel: +57-2-4897000 – 1015 Cel: +57-3187353790<br> 
                              alba.naranjo@gers.com / www.gers.com</td>
                              </tr>
                              </table>";
            //$mail->AltBody = 'gers';

            $mail->send();
            if ($execution) {
               //echo '<script> alert("SE HA EJECUTADO PERFECTAMENTE")</script>';
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }
 


}

//CORREOS A NO SELECCIONADOS


//cuando aceptas un usuario aceptado a entrevista
public function modalentrevista(){
    $obj= new FormularioVacantesModel();
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';
    $usu_id=$_POST['usu_id'];
    $id_vacante=$_POST['id_vacante']; 
 
    $sql="UPDATE tbl_usuariovacante SET id_seleccionado=1
    WHERE  usu_id='".$usu_id."' AND id_vacante='".$id_vacante."'";
    $ejecutar=$obj->Update($sql);

    $sql="SELECT tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_tipo_documento,tbl_usuario.usu_correo,tbl_usuario.usu_documento,tbl_vacante.vac_nombre
           FROM tbl_usuariovacante INNER JOIN tbl_usuario ON tbl_usuariovacante.usu_id=tbl_usuario.usu_id
                                   INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante
          WHERE tbl_usuariovacante.usu_id='".$usu_id."' AND tbl_vacante.id_vacante='".$id_vacante."'";
    $usuario=$obj->consult($sql); 

    /// mandar correo cuando fue aceptado para entrevista
    $mail = new PHPMailer();                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 0;                                 // Enable verbose debug output

        $mail->CharSet = 'UTF-8';

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'no.reply@gers.com';                 // SMTP username
        $mail->Password = 'jrxvtpydedfoolza';                           // SMTP password
        $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to
foreach ($usuario as $usu) {
    # code...

        //Recipients
        $mail->setFrom('no.reply@gers.com', 'Soporte Gers');
        $mail->addAddress($usu['usu_correo']);     // Add a recipient
        //$mail->addAddress(".$Usu_email.");                    // Name is optional
        // $mail->addReplyTo('info@example.com', 'Information');
       // $mail->addBCC('');
        // $mail->addCC('bcc@example.com');

        //Attachments
        $mail->addAttachment('images/copia.jpg');     // Add attachments
        $mail->addAttachment('Recursos humanos - Gers');    // Optional name

        //Content
        $mail->isHTML(true);// Set email format to HTML
        $mail->Subject = "SU ESTADO HA SIDO ACTUALIZADO";
        $mail->Body    = "Estimado/a <b>".$usu['usu_nombre']." ".$usu['usu_apellido']."</b> identificado con <b>".$usu['usu_tipo_documento']."</b> número <b>".$usu['usu_documento']."</b><br> el motivo de este e-mail es responder la oferta laboral <b>".$usu['vac_nombre'].",</b><br>Donde usted  ha sido actualizado, proximamente estaremos contactandonos con usted.<br> 
                          Gracias por haber participado en esta convocatoria laboral.
                          <br>
                          <table style='border-left:3px solid blue;'>
                          <tr>
                          <td><b>ALBA INÉS NARANJO S.</b><br>
                          <b>Jefe de Gestión Humana</b><br>
                          Calle 3ª A # 65-118<br>
                          Cali, Colombia<br>
                          Tel: +57-2-4897000 – 1015 Cel: +57-3187353790<br> 
                          alba.naranjo@gers.com / www.gers.com.co</td>
                          </tr>
                          </table>";
        //$mail->AltBody = 'gers';
    }
        $mail->send();
    } catch (Exception $e) {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    } 

    /////////////////////////////////////////////////////
   redirect(getUrl("Admin","Aspirante","entrevistas")); 
}

  //actualizar estado ya cuando esta en la vista de entrevista y manda correo
  public function modalentrevistaupdate(){
    
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    $obj= new FormularioVacantesModel();
    $asp_id=$_POST['asp_id'];
    $id_vacante=$_POST['id_vacante']; 
    $cancelado=$_POST ['cancelado']; 
    $estado=$_POST['estado'];
    if($estado==5 and $cancelado<>NULL){
        $sql="UPDATE tbl_usuariovacante SET id_seleccionado='".$estado."',usu_cancelado='".$cancelado."'
        WHERE  usu_id='".$asp_id."' AND id_vacante='".$id_vacante."'";
        $ejecutar=$obj->Update($sql); 
    }else{
    $sql="UPDATE tbl_usuariovacante SET id_seleccionado='".$estado."'
          WHERE  usu_id='".$asp_id."' AND id_vacante='".$id_vacante."'";
    $ejecutar=$obj->Update($sql);}
    if($estado==6){
        $sql="SELECT tbl_usuariovacante.id_vacante,tbl_usuariovacante.id_seleccionado,tbl_vacante.vac_nombre,tbl_usuario.usu_id,tbl_usuario.usu_correo,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_tipo_documento,tbl_usuario.usu_documento
        FROM tbl_usuariovacante INNER JOIN tbl_usuario ON tbl_usuariovacante.usu_id=tbl_usuario.usu_id
                                INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante
        WHERE tbl_usuariovacante.id_vacante='".$id_vacante."' AND tbl_usuariovacante.id_seleccionado=2 AND tbl_usuario.usu_id='".$asp_id."'";
        $correos=$obj->consult($sql);
        
        foreach ($correos as $correo) {
        $mail = new PHPMailer();                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output

            $mail->CharSet = 'UTF-8';

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'ply@gers.com';                 // SMTP username
            $mail->Password = 'jrxvtpydedfoolza';                           // SMTP password
            $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('no.reply@gers.com', 'Soporte Gers');
            $mail->addAddress($correo['usu_correo']);     // Add a recipient
            //$mail->addAddress(".$Usu_email.");                    // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
           // $mail->addBCC('');
            // $mail->addCC('bcc@example.com');

            //Attachments
            $mail->addAttachment('images/copia.jpg');     // Add attachments
            $mail->addAttachment('Recursos humanos - Gers');    // Optional name

            //Content
            $mail->isHTML(true);// Set email format to HTML
            $mail->Subject = "RESPUESTA A LA SOLICITUD DE LA VACANTE  ".$correo['vac_nombre']."";
            $mail->Body    = "Estimado/a <b>".$correo['usu_nombre']." ".$correo['usu_apellido']."</b> identificado con <b>".$correo['usu_tipo_documento']."</b> número <b>".$correo['usu_documento']."</b><br> el motivo de este e-mail es responder la oferta laboral <b>".$correo['vac_nombre'].".</b><br> donde lamentablemente <b>NO</b> ha sido seleccionado/a.<br> 
                              Gracias por haber participado en esta convocatoria laboral.
                              <br>
                              <table style='border-left:3px solid blue;'>
                              <tr>
                              <td><b>ALBA INÉS NARANJO S.</b><br>
                              <b>Jefe de Gestión Humana</b><br>
                              Calle 3ª A # 65-118<br>
                              Cali, Colombia<br>
                              Tel: +57-2-4897000 – 1015 Cel: +57-3187353790<br> 
                              alba.naranjo@gers.com / www.gers.com.co</td>
                              </tr>
                              </table>";
            //$mail->AltBody = 'gers';

            $mail->send();
            if ($execution) {
               //echo '<script> alert("SE HA EJECUTADO PERFECTAMENTE")</script>';
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        } 
        }
    }
 //manda correo a seleccionado
    if($estado==5){
        $sql="SELECT tbl_usuariovacante.id_vacante,tbl_usuariovacante.id_seleccionado,tbl_vacante.vac_nombre,tbl_usuario.usu_id,tbl_usuario.usu_correo,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_tipo_documento,tbl_usuario.usu_documento
        FROM tbl_usuariovacante INNER JOIN tbl_usuario ON tbl_usuariovacante.usu_id=tbl_usuario.usu_id
                                INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante
        WHERE tbl_usuariovacante.id_vacante='".$id_vacante."' AND tbl_usuariovacante.id_seleccionado=1 AND tbl_usuario.usu_id='".$asp_id."'";
        $correos=$obj->consult($sql);
      
        foreach ($correos as $correo) {
        $mail = new PHPMailer();                              // Passing `true` enables exceptions
        try {
            //Server settings
            $mail->SMTPDebug = 0;                                 // Enable verbose debug output

            $mail->CharSet = 'UTF-8';

            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com';                     // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'no.reply@gers.com';                 // SMTP username
            $mail->Password = 'jrxvtpydedfoolza';                           // SMTP password
            $mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('no.reply@gers.com', 'Soporte Gers');
            $mail->addAddress($correo['usu_correo']);     // Add a recipient
            //$mail->addAddress(".$Usu_email.");                    // Name is optional
            // $mail->addReplyTo('info@example.com', 'Information');
           // $mail->addBCC('');
            // $mail->addCC('bcc@example.com');

            //Attachments
            $mail->addAttachment('images/copia.jpg');     // Add attachments
            $mail->addAttachment('Recursos humanos - Gers');    // Optional name

            //Content
            $mail->isHTML(true);// Set email format to HTML
            $mail->Subject = "RESPUESTA A LA SOLICITUD DE LA VACANTE  ".$correo['vac_nombre']."";
            $mail->Body    = "Estimado/a <b>".$correo['usu_nombre']." ".$correo['usu_apellido']."</b> identificado con <b>".$correo['usu_tipo_documento']."</b> número <b>".$correo['usu_documento']."</b><br> Agradecemos la postulación y envío de su hoja de vida a la oferta laboral <b>".$correo['vac_nombre'].".</b><br> Le informamos que usted <b>ha sido seleccionado/a</b> para laboral con nosotros, nos comunicaremos con usted de acuerdo con la información registrado en el sistema, para continuar con el proceso de contratación.<br> 
                              Cordialmente.
                              <br>
                              <table style='border-left:3px solid blue;'>
                              <tr>
                              <td><b>ALBA INÉS NARANJO S.</b><br>
                              <b>Jefe de Gestión Humana</b><br>
                              Calle 3ª A # 65-118<br>
                              Cali, Colombia<br>
                              Tel: +57-2-4897000 – 1015 Cel: +57-3187353790<br> 
                              alba.naranjo@gers.com / www.gers.com</td>
                              </tr>
                              </table>";
            //$mail->AltBody = 'gers';

            $mail->send();
            if ($execution) {
               //echo '<script> alert("SE HA EJECUTADO PERFECTAMENTE")</script>';
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        } 
        }
    }


    redirect(getUrl("Admin","Aspirante","entrevistas")); 
  }

//copia la vacante que el administrador elija
public function copiarvacantes(){
    $obj=new FormularioVacantesModel();
    $id=$obj->autoIncrement("tbl_vacante","id_vacante");
    $vacante_id=$_POST['id_copia'];
    $sql="SELECT * FROM tbl_vacante WHERE id_vacante='".$vacante_id."'";
    $ejecutar=$obj->consult($sql); 
        foreach ($ejecutar as $vac) {
         $sql="INSERT INTO tbl_vacante (`id_vacante`, `vac_nombre`, `vac_descripcion`, `vac_jornada_laboral`, `vac_tipo_contrato`, `vac_salario`, `vac_fecha`, `vac_años_xp`, `vac_educacion`, `id_estadovacante`, `vac_publicacion`, `vac_cargo`, `vac_funciones_generales`, `vac_funciones_especificas`)
               VALUES($id,'".$vac['vac_nombre']."','".$vac['vac_descripcion']."','".$vac['vac_jornada_laboral']."','".$vac['vac_tipo_contrato']."','".$vac['vac_salario']."','".$vac['vac_fecha']."','".$vac['vac_años_xp']."','".$vac['vac_educacion']."',1,current_timestamp(),'".$vac['vac_cargo']."','".$vac['vac_funciones_generales']."','".$vac['vac_funciones_especificas']."')";
               $ejecutarcopia=$obj->insert($sql); 
        }
 }

       
}
   

?>