<div class="home">

</div>

<!-- url que me lleva a la funcion -->
<input id="timeline" type="hidden" data-url="<?php echo getUrl("Access","Access","timeline",false,"ajax");?>">
<script>
 function load() {
        var url = $("#timeline").attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
        $(".home").html(datos);
            }
        });
         
    
    }
    window.onload = load;
</script>