<?php

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }


    function studentHome(){
        echo 'Home';
        die();
    }

    function studentClass(){
        echo 'Students';
        die();
    }
    
    function studentChangePassword(){
        return true;
    }

    function studentJoinClass($classId){
        return true;
    }

    function createPassword($text){

        return substr(md5($text),8,-2);

    }
?>