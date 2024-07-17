<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema I.E "Juan Mejia Bacca"</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/Plantilla/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url; ?>Assets/Plantilla/dist/css/adminlte.min.css">
    <!-- <link href="<c?php echo base_url; ?>Assets/Plantilla/dist/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous"> -->
    <script href="<?php echo base_url; ?>Assets/js/all.min.js" crossorigin="anonymous"></script>
    <link rel="icon" href="<?php echo base_url; ?>Assets/img/favicon.ico" rel="stylesheet" />
    <!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->
    <!-- <link href="< ?php echo base_url; ?>Assets/DataTables/datatables.min.css" rel="stylesheet">  -->
    <link href="<?php echo base_url; ?>Assets/css/main.css" rel="stylesheet" />
    <link href="<?php echo base_url; ?>Assets/css/datatables.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="<?php echo base_url; ?>Assets/css/select2.min.css" rel="stylesheet" />


</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <!-- <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="< ?php echo base_url; ?>Assets/img/colegio.png" alt="" height="200" width="200">
        </div> -->
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link dropdown-toggle d-flex align-items-center" id="userDropdown" href="#" role="button" data-toggle="dropdown">
                        <?php if (isset($_SESSION['imagen'])) : ?>
                            <?php
                            $rutaCompleta = base_url . 'Assets/imagenes/' . $_SESSION['imagen'];
                            ?>
                            <img src="<?php echo $rutaCompleta; ?>" style="width: 20px; height: 20px; margin-right: 5px;" alt="Imagen de perfil">
                        <?php endif; ?>
                        <span><?php echo $_SESSION['nombre']; ?></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="#" id="modalPass"><i class="fa fa-user"></i> Perfil</a>
                        <a class="dropdown-item btn-logaut" href="<?php echo base_url; ?>Usuarios/salir">
                            <i class="fas fa-sign-out-alt"></i> Cerrar Sesión
                        </a>
                    </div>
                </li>
            </ul>

        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-blue elevation-4">
            <!-- Brand Logo -->
            <a href="<?php echo base_url; ?>Dashboard" class="brand-link text-center">
                <img src="<?php echo base_url; ?>Assets/img/colegio.png" class="brand-image elevation-3">
                <span class="brand-text font-weight-light" style="font-size: 90%;"><b>I.E "Juan Mejia Bacca"</b></span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">

                    <div class="info">
                        <span class="badge badge-success">Conectado</span>
                        <a href="#" class="d-block">
                            <?php

                            if (isset($_SESSION['imagen'])) {
                                $rutaCompleta = base_url . 'Assets/imagenes/' . $_SESSION['imagen'];
                                echo '<img src="' . $rutaCompleta . '" class="img-circle elevation-2" alt="Imagen de perfil" style="width: 30px; height: 30px; margin-right: 5px;">';
                            }
                            echo $_SESSION['nombre'];
                            ?>
                        </a>
                    </div>
                </div>

                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent" data-widget="treeview" role="menu" data-accordion="false">

                        <p style="color: white; font-weight: bold; font-family: Arial, sans-serif;">Panel Administrativo</p>

                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>Dashboard" class="nav-link desactive">
                                <i class="fas fa-chart-bar nav-icon"></i> <!-- Cambiado a un icono de gráfico de barras -->
                                <p>Dashboard</p>
                            </a>
                        </li>

                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>Usuarios" class="nav-link desactive">
                                <i class="fas fa-user nav-icon"></i> <!-- Reemplazado con la clase del ícono de usuario -->
                                <p>Usuarios</p>
                            </a>
                        </li>

                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>Tipos" class="nav-link desactive">
                                <i class="fas fa-id-card nav-icon"></i> <!-- Reemplazado con la clase del ícono de tipo de documento de identidad -->
                                <p>Tipo Documento Identidad</p>
                            </a>
                        </li>

                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>Personas" class="nav-link desactive">
                                <i class="fas fa-users nav-icon"></i> <!-- Ícono de usuarios -->
                                <p>Personas</p>
                            </a>
                        </li>


                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>Estanterias" class="nav-link desactive">
                                <i class="fas fa-book nav-icon"></i> <!-- Reemplazado con la clase del ícono de libro -->
                                <p>Estanterias</p>
                            </a>
                        </li>

                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>Archivadores" class="nav-link desactive">
                                <i class="fas fa-archive nav-icon"></i> <!-- Ícono de archivo/archivadores -->
                                <p>Archivadores</p>
                            </a>
                        </li>


                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>Expedientes" class="nav-link desactive">
                                <i class="fas fa-id-card nav-icon"></i> <!-- Reemplazado con la clase del ícono de tipo de documento de identidad -->
                                <p>Expedientes</p>
                            </a>
                        </li>

                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>Documentos" class="nav-link desactive">
                                <i class="far fa-file-alt nav-icon"></i> <!-- Cambiado a un icono de documentos -->
                                <p>Documentos</p>
                            </a>
                        </li>


                        <li class="nav-item current">
                            <a href="<?php echo base_url; ?>DetalleExpedientes" class="nav-link desactive">
                                <i class="fas fa-folder-plus"></i> <!-- Reemplazado con la clase del ícono de tipo de documento de identidad -->
                                <p>Detalle Expedientes</p>
                            </a>
                        </li>

                    </ul>
                </nav>
            </div>
        </aside>