<?php

    //echo var_dump($_SERVER);

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }

    header('X-Powered-By: Innovation');
    header('X-Developed-By: Vibhuti Singh, github:@vibhuti019');

    $temp = file_get_contents('php://input');
    $array['JSON'] = json_decode($temp);
    $array['Cookies'] = $_COOKIE;
            
    include('./urls.php');
    
    
    // if(isset($_COOKIE['AuthCookie'])){
    //     $cookie = $_COOKIE['AuthCookie'];
    // } else {
    //     setcookie("AuthCookie", "auth" , time()+60*60*2 , "/" , '' , true , true);
    // }



    // $temp = file_get_contents('php://input');
    // $array['JSON'] = json_decode($temp);
    // $array['Cookies'] = $_COOKIE;
    // $array['link'] = explode('/',$_SERVER['PATH_INFO']); 
    
    

?>