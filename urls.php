<?php

    include('./connect.php');
    include('./middleware.php');
    include('./api.php');
    include('./student.php');
    include('./admin.php');
    include('./Login.php');
    include('./error.php');

    //Get The JSON Request Values
    $jsonVariables = $array['JSON'];

    //Get The Cookies Passed
    $cookieVariables = $array['Cookies']; 

    $errorJSON = 'Location: ./apiError';
    $error = 'Location: ./error';

    // echo json_encode($jsonVariables);
    // echo json_encode($cookieVariables);

    //Checks if no other location is requested other than the main page
    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }

    
    
    //creates an array pf path
    $path = explode('/',$_SERVER['PATH_INFO']);
    

    //The 0th index is always empty
    if($path[1] == "api"){
        
        if($path[2] == "v1"){
        
            
            if($path[3] == "teacher"){
                
                if($path[4] == "login"){
                    
                    apiTeacherLogin($cookieVariables);

                }else if($path[4] == "setProblem")  {

                    if(checkApiAuth($jsonVariables)){

                        apiTeacherSetProblem($jsonVariables);

                    } else {

                        die($errorJSON);

                    }


                } else if($path[4] == "getLiveUsers")  {

                    if(checkApiAuth($jsonVariables)){

                        apiTeacherGetLiveUsers($jsonVariables);

                    } else {

                        die($errorJSON);

                    }

                } else if($path[4] == "getProgramCode")  {

                    if(checkApiAuth($jsonVariables)){

                        apiTeacherGetProgramCode($jsonVariables);

                    } else {

                        die($errorJSON);

                    }

                }

            } else if($path[3] == "student") {

                if($path[4] == "login"){

                    apiStudentLogin($jsonVariables);

                } else if($path[4] == "getProblem"){

                    if(checkApiAuth($jsonVariables)){

                        apiStudentGetProblem($jsonVariables);

                    } else {

                        die($errorJSON);

                    }

                } else if($path[4] == "sendProgramCode"){

                    if(checkApiAuth($jsonVariables)){

                        apiStudentSendProgramCode($jsonVariables);

                    } else {

                        die($errorJSON);

                    }

                }

            }
            

        }
        
        die($errorJSON);

    } else if($path[1] == 'admin') {

        if($path[2] == 'Home'){

            adminHome();

        } else if($path[2] == 'Users'){

            adminUsers();

        } else if($path[2] == 'Class'){

            adminClass();

        }


    } else if($path[1] == 'student') {

        if($path[2] == 'Home'){

            studentHome();

        } else if($path[2] == 'Class'){

            studentClass();

        }

    } else if($path[1] == 'connect') {

        connect();

    } else if($path[1] == 'error') {
     
        error();

    } else if($path[1] == 'apiError') {

        errorJSON();

    }
    
    
    die($error);


?>