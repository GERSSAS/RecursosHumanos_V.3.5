<?php
    include_once '../lib/helpers.php';
    include_once '../view/partials/header.php'; 
?>

<body class="login">
<?php //include_once '../view/partials/fondoanimado.php';//?>
    <div class="container">
        <div class="login_wrapper">
            <div class="containerLogin">
                <div class="mt-3">
                    <img class="" src="" width="">
                </div>

                <div class="titletoken">
                    <h3 class="">Recuperacion de contraseña
                        <button data-status="0" id="showMore" class=" btn-sm btn-primary fa fa-question-circle" style="border: none; outline: none;">
                        </button>
                    </h3>
                </div>
                <div class="text-dark">
                  <img id="tokenlogo" src="images/Gers.png" alt="Gers S.A.S">  
                </div>
                <div class="text-light"></div>

                <div class=" col-md-10 clearfix"></div>
                <form action="<?php echo getUrl("Mail", "Mail", "postMail", false, "ajax"); ?>" class="form-group m-3" method="post">
                    <div class="form-group has-feedbackmt-4">
                        <label class="text-light">Ingresa tu correo</label>
                        <input class="col-md-12 form-control mb-3" name="usu_correo" type="text" class="form-control" placeholder="Email" />
                    </div>

                    <div class="form-group mt-3">
                        <button id="colorButton" class="btn btn-primary " type="submit">Continuar</button>
                        <a href="<?php echo getUrl("Access", "Access", "login"); ?>">
                            <button type="button" class="btn btn-danger">Regresar</button>
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php include_once '../view/partials/footer.php'; ?>

</body>

