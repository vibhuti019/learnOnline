<?php 


    include('./databaseConnect.php');

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
        die('FALSE');
    }

    $errorJSON = 'Location: /apiError';


    function apiTeacherLogin($jsonVariables){
        $fieldsInJson = ['email','classId'];
        if(checkJSON($fieldsInJson,$jsonVariables)){
            $sql = "SELECT * FROM LoginDataTable WHERE email = \"".$jsonVariables->email."\"";
            $result = executeQuery($sql);

            if($result->num_rows > 0){
                $fetchedRow = $result->fetch_assoc();
                    if($fetchedRow['isFaculty'] == "true"){
                        $output['status'] = "0";
                        $output['authKey'] = createAuth($jsonVariables->email);
                        $output['name'] = $fetchedRow['name'];
                        $output['mobile'] = $fetchedRow['mobile'];
                    } else {
                        $output['status'] = $fetchedRow['name']." is not faulty";                        
                    }
            } else {
                $output['status'] = "Not found in database";
            }
            
            die(json_encode($output));
        }
        die(header($GLOBALS['errorJSON']));
    }


    function apiTeacherSetProblem($jsonVariables){
        $fieldsInJson = ['email','classId','authKey','probString','probImage','probTitle'];
        if(checkJSON($fieldsInJson,$jsonVariables)){

            $sql = "INSERT INTO Problems (
                    email,
                    classId,
                    probString,
                    probImage,
                    probTitle
                ) 
                VALUES (
                    \"".$jsonVariables->email."\",
                    \"".$jsonVariables->classId."\",
                    \"".$jsonVariables->probString."\",
                    \"".$jsonVariables->probImage."\",
                    \"".$jsonVariables->probTitle."\"
                )";

                $result = executeQuery($sql);
                if($result === TRUE){
                    $output["status"] = "Success"; 
                } else {

                    $sql = "UPDATE Problems SET 
                    probString=\"".$jsonVariables->probString."\",
                    probImage=\"".$jsonVariables->probImage."\",
                    probTitle=\"".$jsonVariables->probTitle."\"
                    WHERE email=\"".$jsonVariables->email."\" 
                    AND classId=\"".$jsonVariables->classId."\"";
    
                    $result = executeQuery($sql);
    
                    if($result === TRUE){
                        $output["status"] = "Success"; 
                    } else {
                        $output["status"] = "Check Data";
                    }

                }

            die(json_encode($output));
        }
        die(header($GLOBALS['errorJSON']));
    }


    function apiTeacherGetLiveUsers($jsonVariables){
        $fieldsInJson = ['email','classId','authKey'];
        if(checkJSON($fieldsInJson,$jsonVariables)){
            $sql = "SELECT * FROM StudentData WHERE classId = \"".$jsonVariables->classId."\"";
            $result = executeQuery($sql);
            $i=-1;
            $currentTime = time();
            if($result->num_rows > 0){
                $output = [];
                while($fetchedRow = $result->fetch_assoc()){
                    $time = strtotime($fetchedRow['updatedAtDate']);
                    
                    $lastActive = ($currentTime - $time)/60;

                    if($lastActive < 500){
                        $i = $i + 1;
                        $sql = "SELECT * FROM LoginDataTable WHERE email = \"".$fetchedRow["email"]."\"";
                        $resultLoginData = executeQuery($sql);
                
                        if($resultLoginData->num_rows > 0){
                
                            $fetchedStudentDataRow = $resultLoginData->fetch_assoc();

                            
                            $outputTempData['stName'] = $fetchedStudentDataRow['name'];
                            $outputTempData['stEmail'] = $fetchedStudentDataRow['email'];
                            $outputTempData['stMobile'] = $fetchedStudentDataRow['mobile'];
                        
                        }

                        array_push($output,$outputTempData); 

                    }

                }
            } else {
                $output['status'] = "Not found in database";
            }

            die(json_encode($output));
        }
        die(header($GLOBALS['errorJSON']));
    }

    function apiTeacherGetProgramCode($jsonVariables){
        $fieldsInJson = ['email','classId','authKey','stEmail'];
        if(checkJSON($fieldsInJson,$jsonVariables)){

            $sql = "SELECT * FROM StudentData WHERE email = \"".$jsonVariables->email."\" AND classId = \"".$jsonVariables->classId."\"";
            $result = executeQuery($sql);

            if($result->num_rows > 0){
                $fetchedRow = $result->fetch_assoc();
                $output['updateTime'] = $fetchedRow["updatedAtDate"];
                $output['programCode'] = $fetchedRow['probCode'];
            } else {
                $output['status'] = "Not found in database";
            }
            die(json_encode($output));

        }
        die(header($GLOBALS['errorJSON']));
    }

    function apiStudentLogin($jsonVariables){
        $fieldsInJson = ['stEmail','classId'];

        if(checkJSON($fieldsInJson,$jsonVariables)){
            $sql = "SELECT * FROM LoginDataTable WHERE email = \"".$jsonVariables->stEmail."\"";
            $result = executeQuery($sql);

            if($result->num_rows > 0){
                $fetchedRow = $result->fetch_assoc();
                    if($fetchedRow['isFaculty'] == "false"){
                        $output['status'] = "0";
                        $output['authKey'] = createAuth($jsonVariables->stEmail);
                        $output['stName'] = $fetchedRow['name'];
                        $output['stMobile'] = $fetchedRow['mobile'];
                    } else {
                        $output['status'] = $fetchedRow['name']." is not student";                        
                    }
            } else {
                $output['status'] = "Not found in database";
            }
            die(json_encode($output));
        }

        die(header($GLOBALS['errorJSON']));
    }

    function apiStudentGetProblem($jsonVariables){
        $fieldsInJson = ['stEmail','authKey','classId'];
        if(checkJSON($fieldsInJson,$jsonVariables)){
            $sql = "SELECT * FROM Problems WHERE classId = \"".$jsonVariables->classId."\"";
            $result = executeQuery($sql);

            if($result->num_rows > 0){
                $fetchedRow = $result->fetch_assoc();
                $output['probString'] = $fetchedRow['probString'];
                $output['probImage'] = $fetchedRow['probImage'];
                $output['probTitle'] = $fetchedRow['probTitle'];
            } else {
                $output['status'] = "Not found in database";
            }
            die(json_encode($output));
        }
        die(header($GLOBALS['errorJSON']));
    }

    function apiStudentSendProgramCode($jsonVariables){
        $fieldsInJson = ['stEmail','classId','programCode','authKey'];
        if(checkJSON($fieldsInJson,$jsonVariables)){
            
            $sql = "INSERT INTO StudentData (
                email,
                classId,
                probCode
            ) 
            VALUES (
                \"".$jsonVariables->stEmail."\",
                \"".$jsonVariables->classId."\",
                \"".$jsonVariables->programCode."\"
            )";

            $result = executeQuery($sql);
            if($result === TRUE){
                $output["status"] = "Success"; 
            } else {

                $sql = "UPDATE StudentData SET probCode =\"".$jsonVariables->programCode."\" 
                WHERE email=\"".$jsonVariables->stEmail."\" AND
                classId=\"".$jsonVariables->classId;
    
                $result = executeQuery($sql);
 
                if($result === TRUE){
                    $output["status"] = "Success"; 
                } else {
                    $output["status"] = "Check Data";
                }
            }

        die(json_encode($output));
    
        }
        die(header($GLOBALS['errorJSON']));
    }
?>