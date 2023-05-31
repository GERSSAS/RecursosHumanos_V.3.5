<!-- top navigation -->
<div class="top_nav">
    <div class="nav_menu">
        <!-- <div class="nav toggle">
            <a id="menu_toggle" class="menu"><i class="fa fa-bars text-white" class="menu"></i></a>
        </div> -->
        <nav class="nav navbar-nav">
        <ul class=" navbar-right">
        
        
       

            <li class="nav-item dropdown open " style="padding-left: 15px;">
            <a href="javascript:;" class="user-profile dropdown-toggle " aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                <img src="images/administrador.png" id="imagenCircular" class="img-circle bg-white" alt=""><span class="text-white">BIENVENIDOS</span>
            </a>
            <div class="dropdown-menu dropdown-usermenu pull-right" style="color:white" aria-labelledby="navbarDropdown">
               
                <!-- <a class="dropdown-item"  href="javascript:;">
                    <span class="badge bg-red pull-right">50%</span>
                    <span>Settings</span>
                </a> -->
            <!-- <a class="dropdown-item"  href="javascript:;">Help</a> -->
            <div class="profile_info">
        <span class="">Recursos Humanos APP</span><br>
        <span><?php echo $_SESSION['nameUser'];?></span>
        <h2></h2>
        </div>
                <a class="dropdown-item"  href="<?php echo getUrl("Access","Access","logOut")?>"><i class="fa fa-sign-out pull-right"></i>Cerrar Sesion</a>
            </div>
            </li>

        </ul>
        </nav>
    </div>
</div>
