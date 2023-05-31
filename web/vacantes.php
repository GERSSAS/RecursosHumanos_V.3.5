<?php
include_once '../lib/helpers.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>VACANTES GERS</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="shorcut icon" href="images/iconoGers.png">
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="index.html"></a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href='./login.php'>Iniciar Sesion </a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page Header-->
        <header class="masthead" style='background-image:url(images/va1.png)'>
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <!--<h1> GERS</h1>
                            <span class="subheading">Encontraras todas las vacantes disponisbles en la empresa</span>-->
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                    <!-- Post preview-->
                    <div class="post-preview">
                    <div id="vacantes" >
                </div>
                    <input type="hidden" id="vac" name="" data-url="<?php echo geturl("Access","Access","vacantes",false,"ajax"); ?>">
               
        </div>
                    <!-- Pager-->

                </div>
            </div>
        </div>
        

        <!-- Footer-->
        <footer class="masthead" style='background-image:url(images/vacantes.jpg)'>
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">
                            <li class="list-inline-item">
                                
                                <a href="https://web.facebook.com/gerscolombia?_rdc=1&_rdr" target="_blank">
                                <img src="images/FACEBOOK_GERS.png" alt="instagram" width="50" height="50">
                                </a>
                                
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.instagram.com/gerscolombia/?hl=es" target="_blank">
                                <img src="images/INSTAGRAM_GERS.png" alt="instagram" width="50" height="50">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://twitter.com/gers_sa" target="_blank">
                                <img src="images/TIWITTER_GERS.png" alt="instagram" width="50" height="50">
                                </a>
                            </li>
                            <li class="list-inline-item">
                                <a href="https://www.linkedin.com/company/gers-s-a/" target="_blank" >
                                <img src="images/LINKEDI_GERS.png" alt="instagram" width="50" height="50">
                                </a>
                            </li>
                           
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; GERS S.A.S 2023</div>
                    </div>
                </div>
            </div>
        </footer>

    <!-- jQuery -->
    <script src="vendors/jquery/dist/jquery.min.js"></script>
    <script src="vendors/jquery/dist/global.js"></script>
    <script src="vendors/jquery/dist/moment.min.js"></script>
    <!--sweet-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <!-- Bootstrap -->
    <script src="vendors/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="build/js/custom.min.js"></script>
    <!--datatables-->
    <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.11.3/datatables.min.js"></script>
    <!-- FastClick -->
    <script src="vendors/fastclick/lib/fastclick.js"></script>
    <script src="//cdn.jsdelivr.net/chartist.js/latest/chartist.min.js"></script>
    <!-- NProgress 
<script src="vendors/nprogress/nprogress.js"></script>-->
    <!-- Custom Theme Scripts -->
    <!-----
<script src="build/js/validacioncontraseña.js"></script>
<script src="build/js/ValidacionFormacion.js"></script>
<script src="build/js/ValidacionExperienciaLaboral.js"></script>-->
    <br>
    <br>
    <div class="modal" id="modalUsu" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content" class="modal-dialog modal-dialog-centered">
                <div class="modal-close">
                    
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>

                </div>
                <div style="padding:5px;" id="contenedor">
                </div>
            </div>
        </div>
    </div>

    <div id="modalAdminLarge" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
        aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            </div>
        </div>
    </div>

</body>

<script>
    function load() {
        var url = $("#vac").attr("data-url");
        $.ajax({
            url: url,
            type: "POST",
            success: function(datos) {
                  
                $("#vacantes").html(datos);

            }
        });
    }
    window.onload = load;
</script>

</html>
<?php
session_destroy();
?>