<?php 


    if($_SERVER['SCRIPT_NAME'] != "/middleware.php"){
        die('FALSE');
    }
    

    function teacherLogin($cookie){
        echo 'Teacher Login';
    }


    function teacherSetProblem(){
        echo 'Problem Details';
    }


    function teacherGetLiveUsers(){
        echo 'Live Users';
    }

    function teacherGetProgramCode(){
        echo 'Get Student Program Code';
    }

    function studentLogin(){
        echo 'Student Login';
    }

    function studentGetProblem(){
        echo 'Student Get Problem';
    }

    function studentSendProgramCode(){
        echo 'Send Program Program Code';
    }
?>