<?php
    include_once '../lib/helpers.php';
    include_once '../view/partials/header.php'; 
?> 

<body class="login">
    <div class="container">
        <div class="login_wrapper">
            <div class="containerLogin">

                <div class="titletoken">
                    <h3 class="">Recuperación de contraseña 
                    <button class=" btn-sm btn-primary fa fa-question-circle" style="border: none; outline: none;">
                        </button>
                        </h3>
                </div>

                <div class="text-dark">
                  <img id="tokenlogo" src="images/Gers.png" alt="Gers S.A.S">  
                </div>

                <div class=" col-md-12 clearfix"></div>

                <form action="<?php echo getUrl("Mail", "Mail", "postToken", false, "ajax"); ?>" class="form-group m-3" method="post">
                    <div class="form-group has-feedbackmt-4">
                        <label class="">Ingresa tu número de identificación</label>
                        <input class=" redonda col-md-12 form-control mb-3" name="usu_documento" type="text"/>
                    </div>

                    <div class="form-group has-feedbackmt-4">
                        <label class="">Ingresa el código</label>
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