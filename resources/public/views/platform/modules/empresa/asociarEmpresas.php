<?php session_start(); ?>
<!DOCTYPE html>
<html class="loading" lang="es-ES" data-textdirection="ltr">

<head>
    <?php
       include_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
       require_once (PLATFORM_PATH."global/inc/platform/head.php");
       require_once (LIB_PATH."session.php");
       require_once (CONTROLLERS_PATH."empresaController.php");
       require_once (CONTROLLERS_PATH."areaController.php");
       session::verificarSesion($_SESSION['idsesion']);
       date_default_timezone_set('America/Bogota');
       setlocale(LC_ALL,"es_CO");
       $idempresa = $_GET['id'];
      //  echo "id".$_SESSION['idusuario'];
      //print_r($_SESSION);
    ?>
    <style>
        .user-profile {
            background: url(https://pixinvent.com/modern-admin-clean-bootstrap-4-dashboard-html-template/app-assets/images/gallery/dark-menu.jpg) center center no-repeat;
        }

        .user-profile .user-info {
            background-color: rgba(0, 0, 0, 0.35);
        }
    </style>
</head>

<body class="vertical-layout vertical-menu-modern material-vertical-layout material-layout 2-columns   fixed-navbar"
    data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" style="zoom:75%;">
    <input type="hidden" value="<?php echo $idempresa;?>" name="idempresa" />
    <!-- fixed-top-->
    <?php
    /* top bar  */
    require_once (PLATFORM_PATH."global/inc/component/fixed_top.php");
    /* Menu  */
    require_once (PLATFORM_PATH."global/inc/component/main_menu.php");
  ?>
    <div class="app-content content">
        <div class="content-header row">
            <div class="content-header-dark bg-img col-12">
                <div class="row">
                    <div class="content-header-left col-md-9 col-12 mb-2">
                        <h3 class="content-header-title white titulo ">Módulo Empresa</h3>
                        <div class="row breadcrumbs-top">
                            <div class="breadcrumb-wrapper col-12">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item parrafo"><a href="index.php"
                                            class="text-white">Empresas</a>
                                    </li>
                                    <li class="breadcrumb-item parrafo"><a class="text-white"
                                            href="<?php echo "verFicha.php?id=".$idempresa; ?>">Ver Ficha Empresa</a>
                                    </li>
                                    <li class="breadcrumb-item active parrafo ">Listado de Empresas Activas para
                                        Asociar.
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-wrapper">

            <div class="content-body">
                <div class="content-body">
                        <div class="row">
                            <div class="">
                                <div class="card">
                                    <div class="card-content collapse show">
                                        <div class="card-body card-dashboard ">
                                            <div class="table-responsive">
                                                <div id="project-task-list_wrapper"
                                                    class="dataTables_wrapper dt-bootstrap4">
                                                    <div class="row">
                                                        <?php if($_SESSION['rol'] != "EMPRESA" ){ ?>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <?php empresaController::listadoEmpresas($idempresa); ?>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <br>
                                                                <button id="asociarEmpresa"
                                                                    class="btn capa round text-white waves-effect waves-light">
                                                                    <i class="fa fa-exchange-alt fa-2x"></i>&nbsp;
                                                                    Asociar Empresa
                                                                </button>
                                                                <br>
                                                            </div>

                                                        </div>
                                                        <?php } ?>
                                                        <div class="col-md-4">
                                                            <div id="tablaDinamica_panelAsociacion">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div>
                                                                    <?php empresaController::listadoSimpleEmpresasAsociar($idempresa,$_SESSION['rol']); ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <?php
    //require_once (PLATFORM_PATH."global/inc/component/customizer.php");
    //require_once (PLATFORM_PATH."global/inc/component/buy.php");
    require_once (PLATFORM_PATH."global/inc/component/footer.php");
    require_once (PLATFORM_PATH."global/inc/platform/lib.php");
    
  ?>
    <script src="<?php echo CORE_JS_SERVER."directory.js"; ?>"></script>
    <script src="<?php echo CORE_JS_SERVER."app.js"; ?>"></script>
    <script src="<?php echo PLATFORM_SERVER."modules/empresa/triggers/module.js"; ?>"></script>
</body>

</html>