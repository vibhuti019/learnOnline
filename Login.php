<?php


    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }



    function echoLoginPage(){
        return 'Login';
    }

?>