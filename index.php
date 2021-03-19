<?php

    header("Content-Type: application/json");


    $temp = file_get_contents('php://input');
    $array['JSON'] = json_decode($temp);
    $array['Cookies'] = $_COOKIE;
    $array['link'] = explode('/',$_SERVER['PATH_INFO']); 
    
    // $json = file_get_contents('php://input');
    // $json = json_decode($json);
    echo json_encode($array);



?>