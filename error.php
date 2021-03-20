<?php

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }



    function errorJSON(){
        //Sets Json Output Header
        header('Content-Type: application/json');
        $output['Error'] = "Invalid Request";
        die(json_encode($output));
    }

    function error(){
        echo 'Normal Error';
        die();
    }


?>