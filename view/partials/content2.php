<div class="justify-content-start home" style="padding-bottom:50px;">


  <div class="container">
    <div class="row">
      <div class="col-md-10">
      <div class="card">
          <div class="card-body">
            <div style="text-align:center;" class="x_title">
            <h3 class="font-weight: bolder;">LINEA DE TIEMPO</h3>
            <div id="content">
              <ul id="timeline" class="timeline">
  
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <input type="hidden" id="timin" data-url="<?php echo getUrl("Usuario", "Ofertas", "timeline", false, "ajax"); ?>">

  </div>
</div>
<script>
  function load() {

    var url = $("#timin").attr("data-url");
    console.log(url);
    $.ajax({
      url: url,
      type: "POST",
      success: function(datos) {
        $("#timeline").html(datos);

      }
    });
  }

  window.onload = load;







</script>