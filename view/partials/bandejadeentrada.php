<div class="col-md-12 x_content">
    <div class="x_panel">
<table id="bandeja" data-url="<?php echo getUrl("Admin","","bandejaentrada",false,"ajax");?>" id="bandeja" class="table-hover table table-striped " style="width:100%">
  <thead class="thead-dark">
    <tr>
      <th class='text-center' scope="col">#</th> 
      <th class='text-center' scope="col">Fecha</th>
      <th class='text-center' scope="col">Id vacante</th>
      <th class='text-center' scope="col">Vacante</th>
    </tr>
  </thead>
  <tbody>
      <?php
      $cont=0;
    foreach ($bandeja as $key) {
        $cont++;
        $i=$cont;
      echo "<tr>
              <td class='text-center'>
              ".$i."
              </td>
              <td  class='text-center'>
              ".$key['usuvac_fecha']."
              </td>
              <td class='text-center'>
              ".$key['id_vacante']."
              </td>
              <td class='text-center'>
              <a  href=".getUrl("Admin","Aspirante","filtroadicional",array("id_vacante" => $key['id_vacante']))."><i class='fa fa-users'></i>".$key['vac_nombre']."</a>
              </td>
            </tr>";
    }
        ?>
  </tbody>
</table>
</div>
</div>
