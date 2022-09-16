<?php

include '../connect/connect.php';

session_start();

$admin_id = $_SESSION['admin_id'];

if(!isset($admin_id)){
   header('Location: ../index.php');
}

?>
<!DOCTYPE html>
<html lang="pt-pt">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="../fotos/favicon.png" />
  <!-- Fontawesome -->
  <link rel="stylesheet" href="../fontawesome/css/all.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../dist/css/adminlte.css">
  <link rel="stylesheet" href="https://jqueryvalidation.org/files/demo/site-demos.css">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>

   <title>Escola</title>
</head>
<style type="text/css">
  .error{
    color: red;
  }
</style>   
<body class="hold-transition sidebar-mini layout-fixed">

<?php include('body.php');?>
