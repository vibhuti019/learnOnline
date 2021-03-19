<?php

    if($_SERVER['SCRIPT_NAME'] != "/middleware.php"){
        die('FALSE');
    }
    

    function adminHome(){
        echo 'Home';
    }

    function adminClass(){
        echo 'Students';
    }
    
?>