<?php

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }


    function errorJSON(){
        echo 'JSON';
        die();
    }

    function error(){
        echo 'Normal Error';
        die();
    }


?>