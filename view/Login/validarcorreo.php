<?php
    include_once '../lib/helpers.php';
    include_once '../view/partials/header.php'; 
?> 

<body class="login">
<?php include_once '../view/partials/fondoanimado.php';?>
    <div class="container">
        <div class="login_wrapper">
            <div class="containerLogin">

                <div class="titletoken">
                    <h3 class="">Validar<br> correo electronico 
                    <button class=" btn-sm btn-primary fa fa-question-circle" style="border: none; outline: none;">
                        </button>
                        </h3>
                </div>

                <div class="text-dark">
                  <img id="tokenlogo" src="images/Gers.png" alt="Gers S.A.S">  
                </div>

                <div class=" col-md-12 clearfix"></div>

                <form action="<?php echo getUrl("Access", "Access", "validarcorreo", false, "ajax"); ?>" class="form-group m-3" method="post">
                    <div class="form-group has-feedbackmt-4">
                        <label class="">Correo electronico </label>
                        <input onlyread class=" redonda col-md-12 form-control mb-3" name="usu_correo" type="email"/>
                    </div>

                    <div class="form-group has-feedbackmt-4">
                        <label class="">Ingresa el codigo</label>
                        <input class="redonda col-md-12 form-control mb-3" name="usu_token" type="text"/>
                    </div>

                    <div class="form-group mt-3">
                        <button id="" class="redonda btn btn-primary " type="submit">Verificar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
<?php include_once '../view/partials/footer.php'; ?>
</body>

</html>