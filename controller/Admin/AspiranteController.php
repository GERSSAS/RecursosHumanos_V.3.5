<?php

include_once '../model/Admin/AspiranteVacantesModel.php';
//PARA ASPIRANTE CONSULTA
//aplicados a una vacante


class AspiranteController{

      //SELECCIONA TODOS LOS ASPIRANTES QUE ESTAN REGISTRADOS EN ALGUNA VACANTE Y SE PUEDE VISUALIZAR SU ESTADO
    public function listado(){
        $obj=new AspiranteVacantesModel();
        $sql = "SELECT tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_correo,tbl_usuario.usu_telefono,tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_vacante.vac_publicacion,tbl_seleccionado.id_seleccionado,tbl_seleccionado.selec_nombre,tbl_usuariovacante.usu_cancelado
                FROM  ((tbl_usuario  INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id)
                                     INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante)
                                     INNER JOIN tbl_seleccionado ON tbl_usuariovacante.id_seleccionado=tbl_seleccionado.id_seleccionado";
        $listado=$obj->consult($sql);
        // consulta para los graficos y saber cuantos usuarios hay y demás
        $sql="SELECT COUNT(usu_id) FROM tbl_usuario WHERE rol_id=2";
        $contador=$obj->consult($sql);
        $suma = 0;
        $vacantes = 0;
        $sqlvacante="SELECT COUNT(id_vacante) FROM tbl_vacante";
        $vacantesLista=$obj->consult($sqlvacante);

        foreach ($vacantesLista as $key) {
          $vacantes=$key['COUNT(id_vacante)'];
        }

      foreach ($contador as $key) {
        $suma=$key['COUNT(usu_id)'];
      }

        $validar=array();
        $yaesta=array();
        $cont=0;
        //consulta todos los usuarios
        $sql="SELECT * FROM tbl_usuario where rol_id=2";
        $aplicados=$obj->consult($sql);
        //consulta los usuarios que han aplicado a las vacantes en un array
        foreach ($aplicados as $apli) {
          array_push($validar,$apli["usu_id"]);
          array_push($yaesta,0);
        }
        //consultar usuarios y su respectiva vacante con la que aplicaron
        $sql="SELECT usu_id FROM tbl_usuariovacante";
        $relacionado=$obj->consult($sql);
        // validar que no este repetido el usuario
        foreach ($relacionado as $rela) {
          for($i=0;$i<count($validar);$i++){
            if($validar[$i]==$rela["usu_id"] && $yaesta[$i]==0){
              $yaesta[$i]=1;
              $cont++;
            }
          }
        }
       //variables para los graficos que estan en listado
        $aplicado=$cont;
        $noaplicados=$suma-$aplicado;

        // para saber cuantas aplicaciones en proceso hay
        $sql="SELECT COUNT(id_seleccionado) FROM tbl_usuariovacante WHERE id_seleccionado='3' OR id_seleccionado='1' OR id_seleccionado='2' OR id_seleccionado='4'";
        $enproceso=$obj->consult($sql);
        foreach ($enproceso as $key) {
          $Enproceso=$key['COUNT(id_seleccionado)'];
        }
        // para saber cuantas aplicaciones en aceptado para entrevista hay
        $sql="SELECT COUNT(id_seleccionado) FROM tbl_usuariovacante WHERE id_seleccionado='3'";
        $aceptado=$obj->consult($sql);
        foreach ($aceptado as $key) {
          $entrevista=$key['COUNT(id_seleccionado)'];
        }
        // para saber cuantos fueron seleccionados
        $sql="SELECT COUNT(id_seleccionado) FROM tbl_usuariovacante WHERE id_seleccionado='5'";
        $seleccionado=$obj->consult($sql);
        foreach ($seleccionado as $key) {
          $seleccionado2=$key['COUNT(id_seleccionado)'];
        }

        $sql3="SELECT COUNT(id_seleccionado) FROM tbl_usuariovacante WHERE id_seleccionado='6'";
        $listcancelado=$obj->consult($sql3);
        foreach ($listcancelado as $key) {
          $cancelados=$key['COUNT(id_seleccionado)'];
        }

        include_once '../view/Admin/Aspirante/Aspirantelistado.php';

    }
    
    //SELECCIONA EL USUARIO Y DEPENDIENDO EL QUE HAYAS SELECCIONADO NOS DARA SU INFORMACION AL MOMENTO QUE ESTAMOS DE UNA VACANTE
    public function ModalInfoUsuario(){
        $obj=new AspiranteVacantesModel();
        $id_usuario=$_GET['usu_id'];
        $id_vacante=$_GET['id_vacante'];  
        $sql="SELECT * FROM tbl_usuario
        WHERE tbl_usuario.usu_id=$id_usuario";
        $Usuario=$obj->consult($sql);
        $sql="SELECT * FROM tbl_usuariovacante
              WHERE tbl_usuariovacante.id_vacante='".$id_vacante."' AND tbl_usuariovacante.usu_id='".$id_usuario."'";
        $Usuariovacante=$obj->consult($sql);
      //validar cual es su ultimo estudio y asi poder decir cuanto tiempo lleva de que fue su ultimo estudio
        $sql="SELECT * FROM tbl_formacion
              WHERE  usu_id='".$id_usuario."'
              ORDER BY form_comparar ASC";
        $formacion=$obj->consult($sql);
      /////////////////////////////////////////


        include_once "../view/Admin/Aspirante/ModalUsuario.php";
    }
    
    public function ModalUsuariosRegistrados(){
      $obj=new AspiranteVacantesModel();
      $id_usuario=$_GET['usu_id'];
      $sql="SELECT * FROM tbl_usuario
      WHERE usu_id=$id_usuario";
      $Usuario=$obj->consult($sql);
      include_once "../view/Admin/Aspirante/Modalusuariosregistrados.php";
  }
  
    //muestra todos los usuarios que estas pendientes a una entrevista
    public function entrevistas(){
        $obj=new AspiranteVacantesModel();
        $sql = "SELECT tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_correo,tbl_usuario.usu_telefono,tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_vacante.vac_publicacion,tbl_seleccionado.id_seleccionado,tbl_seleccionado.selec_nombre
        FROM  ((tbl_usuario  INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id)
                             INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante)
                             INNER JOIN tbl_seleccionado ON tbl_usuariovacante.id_seleccionado=tbl_seleccionado.id_seleccionado
                             WHERE tbl_seleccionado.id_seleccionado=4 OR tbl_seleccionado.id_seleccionado=5 OR tbl_seleccionado.id_seleccionado=1 OR tbl_seleccionado.id_seleccionado=3 OR tbl_seleccionado.id_seleccionado=2";
        $listado=$obj->consult($sql);
        include_once "../view/Admin/Aspirante/entrevistas.php";
    }
   //MUESTRA TODOS LOS USUARIOS QUE EL ADMINISTRADOR HAYA SELECCIONADO EN EL SISTEMA
    public function seleccionados(){
        $obj=new AspiranteVacantesModel();
        $sql = "SELECT tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_correo,tbl_usuario.usu_telefono,tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_vacante.vac_publicacion,tbl_seleccionado.id_seleccionado,tbl_seleccionado.selec_nombre
                FROM  ((tbl_usuario INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id)
                                    INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante)
                                    INNER JOIN tbl_seleccionado ON tbl_usuariovacante.id_seleccionado=tbl_seleccionado.id_seleccionado
                                    WHERE tbl_seleccionado.id_seleccionado=1";
        $listado=$obj->consult($sql);
        include_once "../view/Admin/Aspirante/seleccionados.php";
    }
    //muestra las opciones de la tabla "seleccionados" seleccionado,no seleccionado, en proceso, aceptado para entrevista.
    //para poder cambiar el estado del usuario
    public function ModalEntrevistaEstado(){
        $obj=new AspiranteVacantesModel();
        $id_usuario= $_GET['usu_id'];
        $id_vacante=$_GET['id_vacante'];
        $sql = "SELECT tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_correo,
        tbl_usuario.usu_telefono
                FROM tbl_usuario
                WHERE tbl_usuario.usu_id='".$id_usuario."'";
        $usuario=$obj->consult($sql);
        $sql="SELECT * FROM tbl_vacante WHERE tbl_vacante.id_vacante='".$id_vacante."'";
        $vacante=$obj->consult($sql);
        $sql="SELECT * FROM tbl_seleccionado";
        $Estados=$obj->consult($sql);
        include_once "../view/Admin/Aspirante/ModalEntrevistaEstado.php";
    }

    //una modal que deja ver la hoja de vida del usuario
    public function modalhojadevida(){
        $obj=new AspiranteVacantesModel();
        $usu_id=$_POST["usu_id"];
        
        $sql="SELECT usu_id,usu_hojadevida FROM tbl_usuario WHERE tbl_usuario.usu_id='".$usu_id."'";

        include_once "../view/Admin/Aspirante/Modalhojadevida.php";
    }
    //informacion adicional de la modal de usuario
    public function educacion(){
        $obj=new AspiranteVacantesModel();
        $id_usuario=$_GET['usu_id'];
        $sql="SELECT * FROM tbl_formacion WHERE usu_id='".$id_usuario."'";
        $ejecutar=$obj->consult($sql);
        $row=$ejecutar->num_rows;
        include_once '../view/Admin/Aspirante/educacionconsult.php';
      }
      //muestra el historial de cada usuario dependiendo el que seleccionemos desde admin
    public function historial(){
        $obj=new AspiranteVacantesModel();
        $id_usuario=$_GET['usu_id'];
        $sql="SELECT * FROM tbl_historial_de_trabajo WHERE usu_id='".$id_usuario."'";
        $historial=$obj->consult($sql);
        $row=$historial->num_rows;
        include_once '../view/Admin/Aspirante/historialconsult.php';
      }
      // mostrar la carta laboral de su historial de trabajo si es que lo tiene
      public function consultarhistorial(){
        $obj=new AspiranteVacantesModel(); 
        $id_hist=$_GET['id_hist'];
        $sql="SELECT * FROM tbl_historial_de_trabajo WHERE id_hist='".$id_hist."'";
        $historial=$obj->consult($sql);
        include_once '../view/Admin/Aspirante/modalhistorial.php';
      }
      //mostrar el certificado de estudio del usuario seleccionado
      public function consultarcertificado(){
        $obj= new AspiranteVacantesModel();
        $id_formacion=$_GET['id_formacion'];
        $sql="SELECT * FROM tbl_formacion WHERE id_formacion='".$id_formacion."'";
        $formacion=$obj->consult($sql);
        include_once '../view/Admin/Aspirante/modalformacion.php'; 
      }
      //esta es la vista dentro de cada vacante cuando seleccionamos una vacante desde administrados
      // para poder aplicar los filtros de los aspirantes que se hayan registrado
public function filtroadicional(){
          $obj= new AspiranteVacantesModel();
         
          $aplicados=$_GET['id_vacante'];

          $sql="SELECT * FROM tbl_area";
          $areas=$obj->consult($sql);

          $sql="SELECT vac_nombre,id_vacante FROM tbl_vacante WHERE id_vacante='".$aplicados."'";
          $name=$obj->consult($sql);
          foreach ($name as $nam) {
            $id=$nam['id_vacante'];
            $nombre=$nam['vac_nombre'];
          }
          $sql = "SELECT tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,
          tbl_usuario.usu_telefono,tbl_usuario.usu_correo,tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_seleccionado.selec_nombre,
          tbl_vacante.vac_nombre,SUM(hist_añosxp),tbl_formacion.form_años,tbl_formacion.form_meses,tbl_formacion.form_dias
          FROM  (((((tbl_usuario
                             INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id)
                             INNER JOIN tbl_seleccionado ON tbl_usuariovacante.id_seleccionado=tbl_seleccionado.id_seleccionado)
                             INNER JOIN tbl_historial_de_trabajo ON tbl_usuario.usu_id=tbl_historial_de_trabajo.usu_id)
                             INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante)
                             INNER JOIN tbl_historiadetalle ON tbl_usuario.usu_id=tbl_historiadetalle.usu_id)
                             INNER JOIN tbl_formacion ON tbl_usuario.usu_id=tbl_formacion.usu_id
                             WHERE tbl_vacante.id_vacante='".$aplicados."'
                             GROUP BY  tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,
          tbl_usuario.usu_telefono,tbl_usuario.usu_correo,tbl_vacante.id_vacante,
          tbl_vacante.vac_nombre";  
          $Usuario=$obj->consult($sql);         
          include_once '../view/Admin/Aspirante/filtroadicional.php'; 
      }

      //aplica los filtro para ver los aspirantes que cumplan con los requisitos segun lo seleccionemos
      public function aspirantesdinamicos(){
        $obj=new AspiranteVacantesModel();
        $aplicados=$_GET['id_vacante'];
        //Cadena de texto dependiendo cuales seleccionas.
        $id_area=json_decode(stripslashes($_POST['data']));
        //vectores que utilizaremos
        $seleccionados=array();
        $yaesta=array();

        $sql="SELECT usu_id FROM tbl_usuariovacante WHERE tbl_usuariovacante.id_vacante='".$aplicados."'";

        $ejecutarsql=$obj->consult($sql);

        //todo los usuarios que hay
        foreach($ejecutarsql as $ejecu){
          array_push($seleccionados,$ejecu["usu_id"]);
          array_push($yaesta,0);
        }
  
        //todos los seleccionados
        foreach($id_area as $id_area){
        $sql="SELECT tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,
        tbl_usuario.usu_telefono,tbl_usuario.usu_correo,tbl_vacante.id_vacante,tbl_seleccionado.selec_nombre,
        tbl_vacante.vac_nombre,SUM(hist_añosxp)
        FROM  ((((tbl_usuario
                             INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id)
                             INNER JOIN tbl_seleccionado ON tbl_usuariovacante.id_seleccionado=tbl_seleccionado.id_seleccionado)
                             INNER JOIN tbl_historial_de_trabajo ON tbl_usuario.usu_id=tbl_historial_de_trabajo.usu_id)
                             INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante)
                             INNER JOIN tbl_historiadetalle ON tbl_usuario.usu_id=tbl_historiadetalle.usu_id
                             WHERE tbl_vacante.id_vacante='".$aplicados."'
                             AND tbl_historiadetalle.id_area='".$id_area."'
                             GROUP BY  tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,
        tbl_usuario.usu_telefono,tbl_usuario.usu_correo,tbl_vacante.id_vacante,
        tbl_vacante.vac_nombre";
        $usuariosarea=$obj->consult($sql);

        //los que estan en la tabla relaccionados
        foreach($usuariosarea as $usu){
        //   //evaluando que no este repetido
          for($i=0; $i<count($seleccionados);$i++){    //no esta impreso
              if($seleccionados[$i]==$usu["usu_id"] && $yaesta[$i]==0){
            //ya esta impreso
             $yaesta[$i]=1;
           echo"<tr>";
                                 echo"<td class='text-center'>".$usu['usu_nombre']."</td>";
                                 echo"<td class='text-center'>".$usu['usu_apellido']."</td>";
                                 echo"<td class='text-center'>".$usu['selec_nombre']."</td>";
                                 echo"<td class='text-center'>".$usu['SUMA(hist_añosxp)']." años</td>";
                                 echo"<td class='text-center'>".$usu['usu_correo']."</td>";
                                 echo"<td class='text-center'><a  value='' name='usu_id' id='ModalInfoUsuario' data-url=".getUrl("Admin","Aspirante","ModalInfoUsuario",array("usu_id" => $usu['usu_id'],"id_vacante" => $usu['id_vacante']),"ajax")."><button  class='btn btn-dark btn-sm' title='Vista previa'><i class='fa fa-eye'></i></button></a></td>
              </tr>";
                                        
                }
            }    
        }    
    }

}



//MUESTRA TODOS LOS USUARIOS 
public function todosUsuarios(){
  $obj=new AspiranteVacantesModel();
  // $sql = "SELECT * FROM tbl_usuario";
  // $sql="SELECT tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,
  // tbl_usuario.usu_telefono,tbl_usuario.usu_correo,tbl_vacante.id_vacante,tbl_seleccionado.selec_nombre,
  // tbl_vacante.vac_nombre,SUM(hist_añosxp)
  // FROM  ((((tbl_usuario
  //                      INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id)
  //                      INNER JOIN tbl_seleccionado ON tbl_usuariovacante.id_seleccionado=tbl_seleccionado.id_seleccionado)
  //                      INNER JOIN tbl_historial_de_trabajo ON tbl_usuario.usu_id=tbl_historial_de_trabajo.usu_id)
  //                      INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante)
  //                      INNER JOIN tbl_historiadetalle ON tbl_usuario.usu_id=tbl_historiadetalle.usu_id
  //                      WHERE tbl_vacante.id_vacante='".$aplicados."'
  //                      AND tbl_historiadetalle.id_area='".$id_area."'
  //                      GROUP BY  tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,
  // tbl_usuario.usu_telefono,tbl_usuario.usu_correo,tbl_vacante.id_vacante,
  // tbl_vacante.vac_nombre";
  $sql="SELECT * FROM tbl_usuario WHERE rol_id=2";
// $sql="SELECT * FROM tbl_usuario INNER JOIN tbl_historial_de_trabajo ON tbl_usuario.usu_id=tbl_historial_de_trabajo.usu_id";
  
  $listado=$obj->consult($sql);
  include_once "../view/Admin/Aspirante/usuariosRegistrados.php";
}




///GRAFICOS DEL ADMIN
public function graficos(){
  $obj= new AspiranteVacantesModel();
  echo "
  
  <div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart1'></div></div>

<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart2'></div></div>

</div><div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart3'></div></div>

<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart4'></div></div>

<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart5'></div></div>";
}


public function dataGraficos(){
  $obj= new AspiranteVacantesModel();
       $desde= $_POST['desde'];
       $hasta= $_POST['hasta'];

        $vacantes = 0;
        $sqlvacante="SELECT COUNT(id_vacante) FROM tbl_vacante where vac_publicacion between '$desde' and '$hasta';";

        $vacantesLista=$obj->consult($sqlvacante);

        foreach ($vacantesLista as $key) {
          $vacantes=$key['COUNT(id_vacante)'];
        }


        $sql="SELECT COUNT(id_seleccionado) FROM tbl_usuariovacante WHERE id_seleccionado='3' OR id_seleccionado='1' OR id_seleccionado='2' OR id_seleccionado='4'AND usuvac_fecha between '$desde' and '$hasta'";
        $enproceso=$obj->consult($sql);
        foreach ($enproceso as $key) {
          $Enproceso=$key['COUNT(id_seleccionado)'];
        }

        $sql="SELECT COUNT(id_seleccionado) FROM tbl_usuariovacante WHERE id_seleccionado='3' AND usuvac_fecha between '$desde' and '$hasta'";
        $entrevista=0;
        $aceptado=$obj->consult($sql);
        foreach ($aceptado as $key) {
          $entrevista=$key['COUNT(id_seleccionado)'];
        }

        $sql="SELECT COUNT(id_seleccionado) FROM tbl_usuariovacante WHERE id_seleccionado='5' AND usuvac_fecha between '$desde' and '$hasta'";
        $seleccionado=$obj->consult($sql);
        $contratados =0;
        foreach ($seleccionado as $key) {
          $contratados=$key['COUNT(id_seleccionado)'];
        }


        $sql="SELECT COUNT(usu_id) FROM tbl_usuario WHERE rol_id='2' AND usu_fecha_registro between '$desde' and '$hasta'";
        $registrados =$obj->consult($sql);
        $totalRegistrados =0;
        foreach ($registrados as $key) {
          $totalRegistrados=$key['COUNT(usu_id)'];
        }

       
        $sql3="SELECT COUNT(id_seleccionado) FROM tbl_usuariovacante WHERE id_seleccionado='6' AND usuvac_fecha between '$desde' and '$hasta'";
        $cancelados =0;
        $listcancelado=$obj->consult($sql3);
        foreach ($listcancelado as $key) {
          $cancelados=$key['COUNT(id_seleccionado)'];
        }

        $respuesta = array(
          "html1" => "<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart1'></div></div>",
          "vacantes"  => "$vacantes",
          "html2" => "<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart2'></div></div>",
          "enproceso"  => "$Enproceso",
          "html3" => "<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart3'></div></div>",
          "entrevista"  => "$entrevista",
          "html4" => "<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart4'></div></div>",
          "contratados"  => "$contratados",
          "html5" => "<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart5'></div></div>",
          "totalRegistrados"  => "$totalRegistrados",
          "html6" => "<div class='col-md-3 text-center'><div class='ct-chart ct-golden-section' id='chart6'></div></div>",
          "cancelados"  => "$cancelados"
        );

        echo json_encode($respuesta);


}

//consult de usuario en admin
public function  actividadesdinamicas(){
  $obj = new AspiranteVacantesModel();
  $form=$_GET['id_hist'];
  $sql="SELECT tbl_area.are_nombre,tbl_area.id_area
  FROM ((tbl_area 
  INNER JOIN tbl_historiadetalle ON tbl_historiadetalle.id_area=tbl_area.id_area)
  INNER JOIN tbl_historial_de_trabajo ON tbl_historial_de_trabajo.id_hist=tbl_historiadetalle.id_hist)
  INNER JOIN tbl_usuario ON tbl_historial_de_trabajo.usu_id=tbl_usuario.usu_id
  WHERE tbl_historiadetalle.id_hist='".$form."'";
  $areaschecked=$obj->consult($sql);

  foreach ($areaschecked as $area) {
  
  echo "<div style='float:left;' class='col-md-5'>
    <b><label style='font-size:20px;'>'". $area['are_nombre']."'</label> <input type='checkbox' disabled checked value='". $area['id_area']."'></b>
    </div>";
  }
}
//consult para los que han aplicado a las vacantes
public function bandejaentrada(){
    $obj=new AspiranteVacantesModel();
    $sql="SELECT tbl_vacante.vac_nombre,tbl_usuariovacante.usuvac_fecha,tbl_vacante.id_vacante
          FROM tbl_vacante
          INNER JOIN tbl_usuariovacante 
          ON tbl_vacante.id_vacante=tbl_usuariovacante.id_vacante 
          ORDER BY usuvac_fecha DESC";
    $bandeja=$obj->consult($sql);
    include_once '../view/partials/bandejadeentrada.php'; 
}

public function motivo(){
  $obj=new AspiranteVacantesModel();
  $sql="SELECT tbl_vacante.vac_nombre,tbl_usuariovacante.usuvac_fecha,tbl_vacante.id_vacante
        FROM tbl_vacante
        INNER JOIN tbl_usuariovacante 
        ON tbl_vacante.id_vacante=tbl_usuariovacante.id_vacante 
        ORDER BY usuvac_fecha DESC";
  $bandeja=$obj->consult($sql);
  include_once '../view/partials/modalmotivo.php'; 
}

public function estadoAspirantes(){
  $obj=new AspiranteVacantesModel();
  // $sql="SELECT * FROM tbl_usuario INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id";
  $sql = "SELECT tbl_usuario.usu_id,tbl_usuario.usu_nombre,tbl_usuario.usu_apellido,tbl_usuario.usu_correo,tbl_usuario.usu_telefono,tbl_vacante.id_vacante,tbl_vacante.vac_nombre,tbl_vacante.vac_publicacion,tbl_seleccionado.id_seleccionado,tbl_seleccionado.selec_nombre,tbl_usuariovacante.usu_cancelado
                FROM  ((tbl_usuario  INNER JOIN tbl_usuariovacante ON tbl_usuario.usu_id=tbl_usuariovacante.usu_id)
                                     INNER JOIN tbl_vacante ON tbl_usuariovacante.id_vacante=tbl_vacante.id_vacante)
                                     INNER JOIN tbl_seleccionado ON tbl_usuariovacante.id_seleccionado=tbl_seleccionado.id_seleccionado
                                     ORDER BY id_vacante DESC";
  $listado=$obj->consult($sql);

  include_once '../view/Admin/Aspirante/estadoAspirantes.php';
}

}
?>