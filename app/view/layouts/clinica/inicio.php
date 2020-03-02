

<?php

if (@!$_SESSION['gv_iduser']) {
  header('Location:'.SERVER_FOLDER.'apps/login');
}else{
  if($_SESSION["gv_rol"] != 5){
    header('Location:'.SERVER_FOLDER.'apps/login');
  }
}


?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GoVista</title>
  <style>
 
  </style>
  <!-- Styles - Bootstrap 4 -->
  <link rel="icon" href="/apps/img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1"         />
  <link rel="stylesheet" href="/apps/node/fontawesome/css/all.min.css"/>
  <link rel="stylesheet" href="/apps/node/adminLTE/css/adminlte.min.css"/>
  <link rel="stylesheet" href="/apps/node/adminLTE/css/fonts.css"/>
  <link rel="stylesheet" href="/apps/node/bootstrap/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="/apps/css/medico.css">
  <!-- Scripts - jquery 3.4.1-->
  <script src="/apps/node/jquery/dist/jquery.min.js"></script>
  <script src="/apps/node/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="/apps/node/popper.js/dist/umd/popper.min.js"></script>
  <script src="/apps/node/adminLTE/js/adminlte.min.js"></script>
  <script src="/apps/node/sweetalert/dist/sweetalert.min.js"></script>
