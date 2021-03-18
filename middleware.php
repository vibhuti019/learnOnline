<?php

    $cookie = "";


    if($_SERVER['SCRIPT_NAME'] != "/middleware.php"){
        die('FALSE');
    }

    
    if(isset($_COOKIE['AuthCookie'])){
        $cookie = $_COOKIE['AuthCookie'];
    } else {
        setcookie("AuthCookie", "auth" , time()+60*60*2 , "/" , '' , true , true);
    }

    include_once('./index.php');

?>