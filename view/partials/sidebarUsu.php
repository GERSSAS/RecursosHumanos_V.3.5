
    <div class="col-md-3 left_col menu_fixed">
        <div class="left_col scroll-view">
            

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
                <div class="profile_pic">

                </div>

            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                <div class="menu_section">

                    <ul class="nav side-menu">
                    <!--<li><a id="inicio" class="pruebax" href="indexUsu.php"><i class="fa fa-home"></i>Inicio </a></li>-->
                    <?php
if ($_SESSION['rolId'] == 2) {
?>
                        <li><a id="consult" class="pruebax" href="<?php echo getUrl("Usuario", "Ofertas", "consult"); ?>"><i class="side-menus fa fa-edit"></i>Vacantes</a></li>
                        <li><a id="consulestado" class="pruebax" href="<?php echo getUrl("Usuario", "Ofertas", "consulestado"); ?>"><i class="side-menus fa fa-bell"></i>Mis Postulaciones</a></li>
                        <li><a id="vistaprevia" class="pruebax" href="<?php echo getUrl("Usuario", "ofertas", "vistaprevia"); ?>"><i class="side-menus fa fa-user"></i>Mi Perfil</a></li>
                        <li><a id="consultaregistro" class="pruebax" href="<?php echo getUrl("Usuario", "Ofertas", "consultaregistro"); ?>"><i class="side-menus fa fa-id-card"></i> Mis Datos</a></li>
                        <li><a id="consultusu" class="pruebax" href="<?php echo getUrl("Usuario", "Ofertas", "consultusu"); ?>"><i class=" side-menus fa fa-group"></i> Formación</a></li>
                        <li><a id="experiencia" class="pruebax" href="<?php echo getUrl("Usuario", "Ofertas", "experiencia"); ?>"><i class=" side-menus fa fa-home"></i> Experiencia Laboral</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

<?php
} else {
    session_destroy();
    redirect("login.php");
}
?>