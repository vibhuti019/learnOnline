<?php 


    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }

    

    function apiTeacherLogin($cookie){
        echo 'Teacher Login';
        die();
    }


    function apiTeacherSetProblem(){
        echo 'Problem Details';
        die();
    }


    function apiTeacherGetLiveUsers(){
        echo 'Live Users';
        die();
    }

    function apiTeacherGetProgramCode(){
        echo 'Get Student Program Code';
        die();
    }

    function apiStudentLogin(){
        echo 'Student Login';
        die();
    }

    function apiStudentGetProblem(){
        echo 'Student Get Problem';
        die();
    }

    function apiStudentSendProgramCode(){
        echo 'Send Program Program Code';
        die();
    }
?>