<?php

include '../connect/connect.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    mysqli_query($connect, "DELETE FROM `student` WHERE id = '$id'") or die('query failed');
    header('location:home.php');
 }