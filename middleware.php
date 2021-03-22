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

            return true; //type Of User (Admin/Student)
        
        }

        die(header($GLOBALS['errorJSON']));
    }

    function checkCookieAuth(){

        if(isset($_COOKIE['AuthCookie']) && isset($_COOKIE['Email'])){
            $cookie = $_COOKIE['AuthCookie'];
            $newCookieAuth = createAuth($_COOKIE['Email']);
            if($cookie == $newCookieAuth){
                
                if(checkAuthType($_COOKIE['Email'])){
                    return true;
                }

            }
            return false;
        }   
        return false;
        
    
    }



    function createAuth($email){
        $salt = "$$"."a"."$$"."email"."$$"."a"."$$"."auth"."$$"."a"."$$";
        $authCreated =  md5($salt.$email.$salt);
        $authToSend = substr($authCreated,7,-7);
        return $authToSend;
    }

    function checkAuthType($cookieEmail){

        $sql = "SELECT * FROM LoginDataTable WHERE email=\"".$cookieEmail."\"";
        $result = executeQuery($sql);

        if($result->num_rows > 0){
            $fetchedRow = $result->fetch_assoc();
            if($fetchedRow['isAdmin'] == "true"){
                return 2;
            }
            else if($fetchedRow['isFaculty'] == "false"){
                return 1;
            }
        } else {
            return 0;
        }
         
        return 0;

    }

        
?>