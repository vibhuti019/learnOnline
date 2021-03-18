<?php

    $cookie = "";

    if(isset($_COOKIE['AuthCookie'])){
        $cookie = $_COOKIE['AuthCookie'];
        echo $cookie;
    } else {
        setcookie("AuthCookie", "auth" , time()+60*60*2 , "/admin" , "" , true , true);
    }

?>