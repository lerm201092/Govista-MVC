</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <!-- Lienzo de la pagina -->
  <div class="wrapper">

    <!-- Navbar --> 
    <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="background: #9c27b0;">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" class="text-light"><i class="fas fa-bars text-light"></i></a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-light font-weight-bold"><span>GOVISTA S.A.S</span></a>
            </li>
        </ul>
        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto  mr-3">
            <li class="nav-item d-none d-sm-inline-block" onclick="submenu();";>
                <a href="#" class="nav-link text-light font-weight-bold">
                    <span class="fa fa-user mr-3"></span>
                    <?=(NOMBRE_USER)?>
                    <span class="fas fa-caret-down ml-3 mr-3"></span>
                </a>
            </li>
            <div id="sub-menu-user-right" class="d-none">
                <table style="width:100%;">
                    <tr class="tr-menu-user" ><td class="td-menu-user"><span class="fa fa-user mr-3"></span>Mi Perfil</td></tr>
                    <tr class="tr-menu-user" ><td class="td-menu-user"><a href="{{ route('changePassword') }}"><span class="fas fa-key mr-3"></span> Cambiar Contraseña</a></td></tr>
                    <tr class="tr-menu-user" ><td class="td-menu-user"><a href="#" onclick="comprar()"><span class="fas fa-shopping-cart mr-3"></span> Comprar</a></td></tr>
                    <tr class="tr-menu-user" style="border-top:1px solid #d2d2d2">
                        <td class="td-menu-user" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="fas fa-power-off mr-3"></span> Cerrar Sesión
                            <form id="logout-form" action="" method="POST" style="display: none;">
                                    
                            </form>
                        </td>
                    </tr>
                </table>
            </div>
        </ul>
    </nav>
    
    <!-- Menu -->
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
        <div class="image">
            <img src="/apps/img/logo200x53.png" class="p-1 mt-3" style="width:80%; margin-left:10%;">
        </div>
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel pb-3 mb-3 d-flex">
            <div class="info col-12 text-center">
                <a href="#" class="d-block"><b>Clinica</b></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->         
            <li class="nav-item" id="li-resumen">
                <a href="/apps/rol-clinica/estadisticas/resumen" class="nav-link">
                <span class="nav-icon fab fa-microsoft"></span>
                <p>
                    Resumen
                </p>
                </a>
            </li>  
            <li class="nav-item" id="li-usuarios">
                <a href="/apps/rol-clinica/usuarios/listado" class="nav-link">
                <span class="nav-icon fas fa-users-cog"></span>
                <p>
                    Usuarios
                </p>
                </a>
            </li> 
            <li class="nav-item" id="li-historias">
            <a href="<?=(CERRAR_SESION)?>" class="nav-link">
                <span class="nav-icon fas fa-sign-out-alt"></span>
                <p>
                    Cerrar Sesion
                </p>
                </a>
            </li>  
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>


    <!-- Contenedor principal -->
    <div class="content-wrapper">
      <!-- Contenido de la pagina -->
      <section class="content" style="padding-top: 20px;">