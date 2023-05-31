<div class="col-md-3 left_col menu_fixed">
    <div class="left_col scroll-view">
    
    <div class="clearfix"></div>

    <!-- menu profile quick info -->
    <div class="profile clearfix">
        <div class="profile_pic">
        
        </div >
        <br>
        <div class="profile">
      
        <h2></h2>
        </div>
    </div>
    <!-- /menu profile quick info -->

    <br />

    <!-- sidebar menu -->
    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
        <div class="menu_section">
        
        <ul class="nav side-menu">
            <!--<li><a href="indexAdmin.php"><i class="fa fa-home"></i>Inicio </a>-->
            <li> <a id="graficos" class="pruebax" data-url="<?php echo getUrl("Admin","Aspirante","graficos",false,"ajax");?>" href="<?php echo getUrl("Admin","Aspirante","listado");?>"><i class="fa fa-home"></i>Inicio </a>

            <?php
            if($_SESSION['rolId']==1){

            ?>


             <li><a id="entrada" class="pruebax" href="<?php echo getUrl("Admin","Aspirante","bandejaentrada");?>"><i class="fa fa-bell"></i>Actividad</a></li>
            <li><a><i class="fa fa-group"></i>Vacantes<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a id="create" class="pruebax" href="<?php echo getUrl("Admin","Formulario","create");?>">Generar vacantes</a></li>
                <li><a id="consult" class="pruebax" href="<?php echo getUrl("Admin","Formulario","consult");?>">Vacantes Generadas</a></li>   
            </ul>
            </li>


            <!--<li><a><i class="fa fa-search"></i>Gestión de aspirantes<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">

            <li>
            <li><a data-url="<?php echo getUrl("Admin","Aspirante","graficos",false,"ajax");?>" href="<?php echo getUrl("Admin","Aspirante","listado");?>">Listado</a></li>
            </ul>
            </li>-->

            <li><a><i class="fa fa-user"></i>Seleccionados<span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
                <li><a id="entrevistas" class="pruebax" href="<?php echo getUrl("Admin","Aspirante","entrevistas");?>">Seleccionados</a></li>
                <!-- <li><a href="<?php echo getUrl("Admin","Aspirante","seleccionados");?>">Seleccionados</a></li>     -->
            </ul>
            </li>

            <!--Usuarios registrados-->
            <!--<li><a href="<?php echo getUrl("Admin","Aspirante","bandejaentrada");?>"><i class="fa fa-group"></i>Usuarios registrados</a></li>-->

                 <!--Ver usuarios registrados-->
            <li> <a id="todosUsuarios" class="pruebax" href="<?php echo getUrl("Admin","Aspirante","todosUsuarios");?>"><i class="fa fa-group"></i>Usuarios registrados </a>
            <li> <a id="estadoAspirante" class="pruebax" href="<?php echo getUrl("Admin","Aspirante","estadoAspirantes");?>"><i class="fa fa-id-card"></i>Estado aspirantes</a>

        </ul>


        <?php
            }else{
                redirect("indexUsu.php");
            }
        ?>
        </div>
       </div>
    </div>
   
</div>