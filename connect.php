<?php

    //Page Can't Be Requested Directly

    if($_SERVER['SCRIPT_NAME'] != "/index.php"){
      die('FALSE');
    }




    /*

      Connects To Mysql
      Initializes The Database If The Db Doesn't Exist

    */




  function connect(){

      //Environment Values
      $servername = "localhost";
      $username = "root";
      $password = "root";
      $dbName = "api_classroom";


      //Sets Json Output Header
      header('Content-Type: application/json');


      // Create connection
      $conn = new mysqli($servername, $username, $password);

      // Check connection
      if ($conn->connect_error) {
        die(json_encode(['Error Connection' => $conn->connect_error]));
      }

      //Create a DataBase If It Doesn't Exist
      $sql = "CREATE DATABASE IF NOT EXISTS ".$dbName;


      //Executes QUERY
      if ($conn->query($sql) === TRUE) {
        $status = ['Database'=>'Created'];
      } else {
        die(json_encode([ 'Error Creating Database' => $conn->error ]));
      }

      $conn->close();






      //Connect To DataBase
      $conn = new mysqli($servername, $username, $password,$dbName);
      if ($conn->connect_error) {
        die(json_encode( ['Error Connection' =>   $conn->connect_error ]));
      }


      //Create Table StudentLogin
      $sql= "CREATE TABLE IF NOT EXISTS LoginDataTable ( 
        email TEXT NOT NULL ,  
        mobile TEXT NOT NULL ,   
        name TEXT NOT NULL , 
        classGroup TEXT NOT NULL ,
        isFaculty TEXT NOT NULL,
        isAdmin TEXT NOT NULL DEFAULT 'false',
        password TEXT NOT NULL DEFAULT '5aa765d61d8327deb882cf', 
        CONSTRAINT UC_Data UNIQUE (email,mobile)
        )";


      //Execute Query
      if ($conn->query($sql) === TRUE) {
        $status['Table 1']="Created";
      } else {
        $error = ['Error Creating Table 1'=>$conn->error];
      }

      //Create Table Problems
      $sql= "CREATE TABLE IF NOT EXISTS Problems ( 
        email TEXT NOT NULL , 
        classId TEXT NOT NULL , 
        probString TEXT NOT NULL , 
        probImage TEXT NOT NULL , 
        probTitle TEXT NOT NULL , 
        updatedAtDate TIMESTAMP ON UPDATE CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT Problem_Data UNIQUE(email,classId)
        )";


      //Execute Query
      if ($conn->query($sql) === TRUE) {
        $status['Table 2'] = 'Created';
      } else {
        $error['Error Creating Table 2'] = $conn->error;
      }

      //Create Table StudentData
      $sql= "CREATE TABLE IF NOT EXISTS StudentData ( 
        email TEXT NOT NULL , 
        classId TEXT NOT NULL , 
        probCode TEXT NOT NULL , 
        updatedAtDate TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
        CONSTRAINT Student_Data UNIQUE (email, classId)
        )";



      //Execute Query
      if ($conn->query($sql) === TRUE) {
        $status['Table 3'] = 'Created'; 
      } else {
        $error['Error Creating Table 3'] = $conn->error; 
      }

      //Create Table StudentData
      $sql= "CREATE TABLE IF NOT EXISTS ClassDetails ( 
          className TEXT NOT NULL,
          faculty TEXT NOT NULL,
          studentGroup TEXT NOT NULL,
          startTime TEXT NOT NULL,
          date TIMESTAMP NOT NULL,
          duration TEXT NOT NULL,
          classId TEXT NOT NULL,
          CONSTRAINT Class_Data UNIQUE (classId)  
        )";



      //Execute Query
      if ($conn->query($sql) === TRUE) {
        $status['Table 4'] = 'Created'; 
      } else {
        $error['Error Creating Table 4'] = $conn->error; 
      }


      $conn->close();


      $output["Errors"] = $error;
      $output["Status"] = $status;

      echo json_encode($output);

      die();
      
    }


?>

