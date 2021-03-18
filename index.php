<?php

header("Content-Type: application/json");


$array['hello'] = "World";
$array['$_REQUEST'] = $_REQUEST;
$array['$_SERVER'] = $_SERVER;
$array['Cookies'] = $_COOKIE;
$array['link'] = explode('/',$_SERVER['PATH_INFO']); 
 
echo json_encode($array);
?>