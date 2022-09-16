<?php

include_once 'includes/header.php';

$pg = "";
        if((isset($_GET['pg'])) && !empty($_GET['pg'])){
            $pg = addslashes($_GET['pg']);
        }
        switch($pg){
            case 'main': require 'main.php'; break;
            case 'report': require 'report.php'; break;
            default: require 'main.php';
        }

include_once 'includes/footer.php';

?>