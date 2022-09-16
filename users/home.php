<?php

include_once 'includes/header.php';

$pg = "";
        if((isset($_GET['pg'])) && !empty($_GET['pg'])){
            $pg = addslashes($_GET['pg']);
        }
        switch($pg){
            case 'main': require 'main.php'; break;
            case 'perfil': require 'perfil.php'; break;
            case 'report': require 'report.php'; break;
            case 'add_student': require 'add_student.php'; break;
            case 'edit_student': require 'edit_student.php'; break;
            case 'delete_student': require 'delete_student.php'; break;
            default: require 'main.php';
        }

include_once 'includes/footer.php';

?>