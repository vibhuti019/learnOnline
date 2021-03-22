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

    $errorJSON = 'Location: /apiError';
    $error = 'Location: /error';
    $login = 'Location: /login';

    //Checks if no other location is requested other than the main page
    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }



    //creates an array pf path
    $path = explode('/',$_SERVER['PATH_INFO']);


    //The 0th index is always empty
    if($path[1] == "api"){
        
        //Sets Json Output Header
        header('Content-Type: application/json');

        if($path[2] == "v1"){
        
            
            if($path[3] == "teacher"){
                
                if($path[4] == "login"){
                    
                    apiTeacherLogin($jsonVariables);

                }else if($path[4] == "setProblem")  {

                    if(checkApiAuth($jsonVariables)){

                        apiTeacherSetProblem($jsonVariables);

                    } else {

                        die(header($errorJSON));

                    }


                } else if($path[4] == "getLiveUsers")  {

                    if(checkApiAuth($jsonVariables)){

                        apiTeacherGetLiveUsers($jsonVariables);

                    } else {

                        die(header($errorJSON));

                    }

                } else if($path[4] == "getProgramCode")  {

                    if(checkApiAuth($jsonVariables)){

                        apiTeacherGetProgramCode($jsonVariables);

                    } else {

                        die(header($errorJSON));

                    }

                }

            } else if($path[3] == "student") {

                if($path[4] == "login"){

                    apiStudentLogin($jsonVariables);

                } else if($path[4] == "getProblem"){

                    if(checkApiAuth($jsonVariables)){

                        apiStudentGetProblem($jsonVariables);

                    } else {

                        die(header($errorJSON));

                    }

                } else if($path[4] == "sendProgramCode"){

                    if(checkApiAuth($jsonVariables)){

                        apiStudentSendProgramCode($jsonVariables);

                    } else {

                        die(header($errorJSON));

                    }

                }

            }
            

        }
        
        die(header($errorJSON));

    } else if($path[1] == "admin") {


        if(checkCookieAuth()){
            
            if($path[2] == "home"){

                adminHome();

            } else if($path[2] == "users"){

                adminUsers();

            } else if($path[2] == "class"){

                adminClass();

            } else if($path[2] == "addUsers") {

                adminAddUsers();

            } else if($path[2] == "addClass") {

                adminAddClass();

            } else if($path[2] == "addAdminUser") {

                adminAddAdminUser();

            } else if($path[2] == "changePassword") {

                adminChangePassword();

            }

            die(header('Location: /admin/home'));       

        } else {

            die(header($login));
        }

    } else if($path[1] == "student") {

        if(checkCookieAuth()){
            
            if($path[2] == "home"){

                studentHome();

            } else if($path[2] == "class"){

                studentClass();

            } else if($path[2] == "changePassword") {

                studentChangePassword();

            } else if($path[2] == "joinClass") {

                studentJoinClass($path[3]);

            }

            die(header('Location: /student/home'));

        } else {

            die(header($login));

        }
        
    } else if($path[1] == "connect") {

        connect();

    } else if($path[1] == "error") {
     
        error();

    } else if($path[1] == "apiError") {

        errorJSON();

    } else if($path[1] == "login") {

        echoLoginPage();

    } else if(checkCookieAuth()){

        $user = checkAuthType($_COOKIE['Email']);

        if($user==1){
            die(header('Location: /admin/home'));
        }
        else if($user == 2){
            die(header('Location: /student/home'));
        }


        die(header($login));
    }
    
    
    die(header($login));


?>