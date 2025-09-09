<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Empanadas Chilenas</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="/favicon.ico">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="<?php echo base_url('css/app.css'); ?>" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <link rel="stylesheet" href="<?php echo base_url('css/sweetalert2.css'); ?>" />

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="<?php echo url_to('home') ?>">
                    <span class="align-middle">
                        <img src="<?php echo base_url('img/logo-empanada.png'); ?>" style="height:150px" />
                    </span>
                </a>

                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Administración
                    </li>

                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="<?php echo url_to('home') ?>">
                            <i class="align-middle fas fa-home"></i><span class="align-middle">Home</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="<?php echo url_to('empanadas') ?>" title="Productos">
                            <i class="align-middle fas fa-list"></i> <span class="align-middle">Empanadas</span>
                        </a>
                    </li>
                    <li class="sidebar-item ">
                        <a class="sidebar-link" href="javascript:void(0);" title="Cerrar sesión">
                            <i class="align-middle fas fa-sign-out-alt"></i><span class="align-middle">Cerrar
                                sesión</span>
                        </a>
                    </li>

                </ul>


        </nav>
        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>
                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#"
                                data-bs-toggle="dropdown">
                                <i class="fas fa-long-arrow-alt-down align-middle"></i>
                            </a>
                            <a class="nav-link d-none d-sm-inline-block" id="spanreloj"></a>
                            <a class="nav-link d-none d-sm-inline-block">
                                <span class="text-dark">|</span>
                            </a>
                            <a class="nav-link d-none d-sm-inline-block">
                                {{ Auth::user()->name }}
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--contenido-->
            <?= $this->renderSection('content') ?>
            <!--/contenido-->
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-12 text-start">
                            <p class="mb-0">
                                &copy; Todos los derechos reservados
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url('js/app.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/sweetalert2.js'); ?>"></script>
    <script src="<?php echo base_url('js/funciones.js'); ?>"></script>
    <?= $this->renderSection('scripts') ?>
</body>

</html>