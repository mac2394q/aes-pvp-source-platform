<?php 
  header("Access-Control-Allow-Origin: *");
  error_reporting(E_ALL);
  ini_set('display_errors', 1);
  require_once($_SERVER['DOCUMENT_ROOT'].'/conf.php');
  require_once(CONTROLLERS_PATH."empresaController.php");
  //echo "<script> alert('dd'+".$_POST['empresaAso']."); </script>";
  empresaController::listadoEmpresaSedes($_POST['empresaAso']);
  
  ?>