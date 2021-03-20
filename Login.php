<?php


    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }

    function setCookieOnLogin($mail){
        $cookieAuth = createAuth($mail);
        setcookie("AuthCookie", $cookieAuth , time()+60*60*2 , "/" , '' , true , true);
        setcookie("Email", $mail , time()+60*60*2 , "/" , '' , true , true);
    }

    function echoLoginPage(){
        setCookieOnLogin("mail@gmail.com");
        echo "Login";
        die();
    }


?>