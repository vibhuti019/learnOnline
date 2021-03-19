<?php

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }


    
    function checkApiAuth(){
        return true;
    }

    function checkCookieAuth(){
        echo 'Teacher/Student';
        return true;
    }



    // if(isset($_COOKIE['AuthCookie'])){
    //     $cookie = $_COOKIE['AuthCookie'];
    // } else {
    //     setcookie("AuthCookie", "auth" , time()+60*60*2 , "/" , '' , true , true);
    // }

    // include_once('./index.php');

        
?>