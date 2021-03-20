<?php

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }

    $errorJSON = 'Location: /apiError';
    $login = 'Location: /login';
    
    function checkApiAuth($json){

        $email = $json->email;
            
        if(strlen($email) == 0){
            $email = $json->stEmail;
        }

        //Creates Auth To Verify
        $newAuth = createAuth($email); 

        if($json->authKey == $newAuth){
            return true;
        }

        die(header($GLOBALS['errorJSON']));
    }

    function checkCookieAuth(){
        echo "Cookie Check";

        if(isset($_COOKIE['AuthCookie']) && isset($_COOKIE['Email'])){
            $cookie = $_COOKIE['AuthCookie'];
            $newCookieAuth = createAuth($_COOKIE['Email']);
            if($cookie == $newCookieAuth){
                return true;
            }
            return false;
        }   
        return false;
        
    


        echo 'Teacher/Student';
        return true;
    }



    function createAuth($email){
        $salt = "$$"."a"."$$"."email"."$$"."a"."$$"."auth"."$$"."a"."$$";
        $authCreated =  md5($salt.$email.$salt);
        $authToSend = substr($authCreated,7,-7);
        return $authToSend;
    }

    
    // include_once('./index.php');

        
?>