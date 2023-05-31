<?php 
if ($row==0){ 
    echo "<h3 class='from-control'>No se encontraron resultados de '".$buscar."'</h3>";
}else{
    foreach($nombre as $nom){    
    echo  "<div class='container_desc_tarjeta card w-40'>";
    echo  "<img id='imagen_oferta' src='images/Gers.png' style='background:#181864;' class='card-img-top' alt=''>";
    echo  "<div class='card-body'>";
    echo  "<h5 class='card-title text-center'>VAC_".$nom['id_vacante'].":<b> ".$nom['vac_nombre']."</b></h5>";
    echo  "<p class='card-text '>"."<b>Descripcion: </b>".$nom['vac_descripcion']."</p>";
    echo  "<div class='desc_tarjetas'>";
    echo  "<p class='card-text'>"."<b>Jornada laboral: </b>".$nom['vac_jornada_laboral']."</p>";
    echo  "<p class='card-text'>"."<b>Tipo de contrato: </b>".$nom['vac_tipo_contrato']."</p>";
    echo  "<p class='card-text'>"."<b>Nivel de educacion: </b>".$nom['vac_educacion']."</p>";
    echo  "<p class='card-text'>"."<b>Fecha de contrataciòn: </b>".$nom['vac_fecha']."</p>";
    echo  "<p class='card-text'>"."<b>Salario: </b>".$nom['vac_salario']."</p>";
    echo  "<p class='card-text'>"."<b>Años de experiencia: </b>".$nom['vac_años_xp']." años de experiencia"."</p>";
    echo  "<p class='card-text'>"."<b>Cargo: </b>".$nom['vac_cargo']."</p>";
    echo  "<p class='card-text'>"."<b>Funciones generales: </b>".$nom['vac_funciones_generales']."</p>";
    echo  "<p class='card-text'>"."<b>Funciones especificas: </b>".$nom['vac_funciones_especificas']."</p>";
    echo  "<p class='card-text'>Telefono:1223212</p>";
    echo  "<p class='card-text'>Direccion:Cl. 3a #65 118, Cali, Valle del Cauca</p>";
    echo  "</div><br>";
    echo  "<a id='botonverdetalle' class='btn' value='".$nom['id_vacante']."'>Ver detalle</a>";
    echo  "<a class='botonaplicar btn btn-primary' href=".getUrl("Usuario","Ofertas","postinsert").">Aplicar</a>";
    echo  "</div>";
    echo  "</div>";


}
   
}

?>