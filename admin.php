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

    function adminAddUsers(){
        echo 'Admin Add Users';
        die();
    }

    function adminAddClass(){
        echo 'Admin Add Class';
        die();
    }

    function adminAddAdminUser(){
        echo 'Add Admin User';
        die();
    }

    function adminChangePassword(){
        echo 'Admin Change Password';
        die();
    }
?>