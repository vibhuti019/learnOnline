<?php 

    if($_SERVER['SCRIPT_NAME'] != "/middleware.php"){
        die('FALSE');
    }


    function adminHome(){
        echo 'Home';
    }


    function adminUsers(){
        echo 'Users';
    }


    function adminClass(){
        echo 'Students';
    }
?>