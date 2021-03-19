<?php 

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }



    function adminHome(){
        echo 'Home';
        die();
    }


    function adminUsers(){
        echo 'Users';
        die();
    }


    function adminClass(){
        echo 'Students';
        die();
    }
?>