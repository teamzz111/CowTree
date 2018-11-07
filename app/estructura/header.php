<!-- Preloader - style you can find in spinners.css -->
<div class="preloader">
    <svg class="circular" viewBox="25 25 50 50">
        <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10" /> </svg>
</div>
<!-- Main wrapper  -->
<div id="main-wrapper">
    <!-- header header  -->
    <div class="header">
        <nav class="navbar top-navbar navbar-expand-md navbar-light">
            <!-- Logo -->
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">
                    <!-- Logo icon -->
                    <b><img style="max-width: 50px" src="../assets/logo2.png" alt="homepage" class="dark-logo" /></b>
                    <!--End Logo icon -->
                    <!-- Logo text -->

                </a>
            </div>
            <!-- End Logo -->
            <div class="navbar-collapse">
                <!-- toggle and nav items -->
                <ul class="navbar-nav mr-auto mt-md-0">
                    <!-- This is  -->
                    <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i
                                class="mdi mdi-menu"></i></a> </li>
                    <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  menutoggle"
                            href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                    <!-- Messages -->
                    <li class="nav-item dropdown mega-dropdown"> <a class="nav-link dropdown-toggle text-muted  " href="#"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-th-large"></i></a>
                        <div class="dropdown-menu animated zoomIn">
                            <ul class="mega-dropdown-menu row">
                                <li class="col-lg-3  m-b-30 text-center" style="margin: auto">
                                    <h4 class="m-b-20">CONTÁCTANOS</h4>
                                    <!-- Contact -->
                                    <form style="margin: auto">
                                        <div class="form-group" class="text-center">
                                            <input type="text" class="form-control" id="exampleInputname1" placeholder="Enter Name">
                                        </div>
                                        <div class="form-group" class="text-center">
                                            <input type="email" class="form-control" placeholder="Enter email"> </div>
                                        <div class="form-group" class="text-center">
                                            <textarea class="form-control" id="exampleTextarea" rows="3" placeholder="Message"></textarea>
                                        </div>
                                        <button type="submit" class="btn btn-info">Enviar</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Messages -->
                </ul>
                <!-- User profile and search -->
                <ul class="navbar-nav my-lg-0">
                    <!-- Search -->
                    <li class="nav-item hidden-sm-down search-box"> <a class="nav-link hidden-sm-down text-muted  "
                            href="javascript:void(0)"><i class="ti-search"></i></a>
                        <form class="app-search">
                            <input type="text" class="form-control" placeholder="Search here"> <a class="srh-btn"><i
                                    class="ti-close"></i></a> </form>
                    </li>
                    <!-- Comment -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted text-muted  " href="#" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bell"></i>
                            <div class="notify"> <span class="heartbit"></span> <span class="point"></span> </div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right mailbox animated zoomIn">
                            <ul>
                                <li>
                                    <div class="drop-title">Notificaciones</div>
                                </li>
                                <li>
                                    <a class="nav-link text-center" href="javascript:void(0);"> <strong>Revisar
                                            mensajes
                                            Notificaciones</strong> <i class="fa fa-angle-right"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <!-- End Comment -->
                    <!-- Profile -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"><img src="images/users/largo.png" alt="user" class="profile-pic" /></a>
                        <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                            <ul class="dropdown-user">
                                <li><a href="#"><i class="ti-user"></i> Perfil</a></li>
                                <li><a href="../backend/cerrarSesion.php"><i class="fa fa-power-off"></i> Cerrar sesión</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End header header -->
    <!-- Left Sidebar  -->
    <div class="left-sidebar" style = "overflow-y: auto;">
        <!-- Sidebar scroll-->
        <div class="scroll-sidebar">
            <!-- Sidebar navigation-->
            <nav class="sidebar-nav">
                <ul id="sidebarnav">

                    <li class="nav-devider"></li>
                    <li class="nav-label">Inicio</li>
                    <li> <a href="index.php" aria-expanded="true"><i class="fa fa-tachometer"></i><span class="hide-menu">Panel
                                de control <span class="label label-rouded label-primary pull-right">1</span></span></a>
                    </li>
                    <li class="nav-label">REGISTROS</li>

                    <li> <a href="form-vaca.php" aria-expanded="true"><i class="fas fa-horse"></i><span class="hide-menu">Registrar
                                ganado</span></a> </li>
                    <?php if($_SESSION['cargo'] == "administrador"): ?>
                        <li> <a href="form-basic.php" aria-expanded="true"><i class="fas fa-user"></i><span class="hide-menu">Registrar
                                    ganadero</span></a></li>
                        <li> <a href="form-ganaderia.php" aria-expanded="true"><i class="fas fa-place-of-worship"></i><span
                                    class="hide-menu">Registrar ganaderia</span></a></li>
                    <?php endif; ?>
                    <!-- hola mundo -->
                    <li class="nav-label">MODIFICAR</li>
                    <li> <a href="form-evaca.php" aria-expanded="true"><i class="fas fa-pen"></i><span class="hide-menu">Modificar
                                ganado</span></a> </li>
                    <?php if($_SESSION['cargo'] == "administrador"): ?>
                        <li> <a href="form-eganaderia.php" aria-expanded="true"><i class="fas fa-pen"></i><span class="hide-menu">Modificar
                                    ganadería</span></a></li>
                        <li> <a href="form-ebasic.php" aria-expanded="true"><i class="fas fa-pen"></i><span
                                    class="hide-menu">Modificar ganadero</span></a></li>
                    <?php endif; ?>
                    <li class="nav-label">REPORTES</li>
                       <li> <a href="form-reporte.php" aria-expanded="true"><i class="fas fa-chart-pie"></i><span class="hide-menu">
                                    Ganado</span></a></li>
                        <li> <a href="form-arbol.php" aria-expanded="true"><i class="fas fa-tree"></i><span class="hide-menu">
                                    Árbol</span></a></li>
                                    
                    

        </div>
        <!-- End Sidebar scroll-->
    </div>
    <!-- End Left Sidebar  -->

    <!-- Page wrapper  -->
    <div class="page-wrapper">
        <!-- Bread crumb -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h3 class="text-primary">Panel de control</h3>
            </div>
            <div class="col-md-7 align-self-center">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.php">Inicio</a></li>
                    <li class="breadcrumb-item active">Panel de control</li>
                </ol>
            </div>
        </div>