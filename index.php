<?php

header("Content-Type: application/json");


$array['hello'] = "World";
$array['Request'] = $_REQUEST;
$array['Headers'] = $_SERVER;
$array['Cookies'] = $_COOKIE;
$array['link'] = explode('/',$_SERVER['PATH_INFO']); 
 
echo json_encode($array);
?>