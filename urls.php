<?php

    $errorJSON = 'Location: ./apiError';
    $error = 'Location: ./error';


    //Checks if no other location is requested other than the main page
    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die(header('Location: www.google.co.in'));
    }


    //creates an array pf path
    $path = explode('/',$_SERVER['PATH_INFO']);


    //The 0th index is always empty
    if($path[1] == "api"){

        if($path[2] == "v1"){
    
            if($path[3] == "teacher"){

                if($path[4] == "login"){


                } else if($path[4] == "setProblem")  {


                } else if($path[4] == "getLiveUsers")  {



                } else if($path[4] == "getProgramCode")  {


                }

            } else if($path[3] == "student") {

                if($path[4] == "login"){


                } else if($path[4] == "getProblem"){


                } else if($path[4] == "sendProgramCode"){


                }

            }
            

        }
        
        die($errorJSON);

    } else if($path[1] == 'admin') {



    } else if($path[1] == 'student') {



    } else if($path[1] == 'error') {
     
        

    } else if($path[1] == 'apiError') {



    }
    
    
    die($error);


?>