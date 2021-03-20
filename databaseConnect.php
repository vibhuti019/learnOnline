<?php


    //Execute query
    function executeQuery($query){

        //Environment Values
        $servername = "localhost";
        $username = "root";
        $password = "root";
        $dbName = "api_classroom";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbName);

        // Check connection
        if ($conn->connect_error) {
            die(json_encode(['Error Connection' => $conn->connect_error]));
        }

        $result = $conn->query($query);

        return $result;
     
    }



    //Check if the json has all the fields 
    function checkJSON($fields , $jsonToCheck){
        $i=0;
        foreach($jsonToCheck as $key => $value){
          if($key != $fields[$i]){
            return false;
          } 
          $i = $i + 1;
        }
        return true;
    }

    
?>