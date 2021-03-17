<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbName = "api_classroom";

//header('Content-Type: application/json');


// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("{ Connection failed: " . $conn->connect_error." }");
}

 //Create a DataBase If It Doesn't Exist
$sql = "CREATE DATABASE IF NOT EXISTS api_classroom;";


//execute query
if ($conn->query($sql) === TRUE) {
  $staus = ['Status'=>'Database Created'];
} else {
   die(json_encode([ 'Error' => 'Database Could Not Be Created'.$conn->error ]));
}

$conn->close();






//Connect To DataBase
$conn = new mysqli($servername, $username, $password,$dbName);
if ($conn->connect_error) {
  die(json_encode( ['Connection failed' =>   "Table Could Not Be Created ".$conn->connect_error ]));
}


//Create Table Login
$sql= "CREATE TABLE LoginTable ( email TEXT NOT NULL ,  mobile VARCHAR NOT NULL ,   verifedClassIds JSON NOT NULL ,   nameOfUser TEXT NOT NULL , accountType TEXT NOT NULL , )";


//Execute Query
if ($conn->query($sql) === TRUE) {
  $status = array_push($status , ['Status'=>'Table Login Created']);
} else {
  $error = ['Error'=>'Creating Table Login '.$conn->error];
  echo json_encode($error);
}

//Create Table Problems
$sql= "CREATE TABLE Problems ( 
  email VARCHAR NOT NULL , 
  classId VARCHAR NOT NULL , 
  probString TEXT NOT NULL , 
  probImage TEXT NOT NULL , 
  probTitle TEXT NOT NULL , 
  createdAtDate DATE NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  )";


//Execute Query
if ($conn->query($sql) === TRUE) {
  array_push($status , ['Status' => 'Table Problems Created']);
} else {
  array_push($error , ['Error' => 'Creating Table Problems'.$conn->error]);
}

//Create Table StudentData
$sql= "CREATE TABLE StudentData ( 
  email VARCHAR NOT NULL , 
  classId VARCHAR NOT NULL , 
  probCode TEXT NOT NULL , 
  createdAtDate DATE NOT NULL DEFAULT CURRENT_TIMESTAMP, 
  )";



//Execute Query
if ($conn->query($sql) === TRUE) {
  $tempStatus['Status'] = 'Table Problems Created'; 
  array_push($status , $tempStatus);
} else {
  $tempError['Error'] = 'Creating Table Problems '.$conn->error; 
  array_push($error , $tempError);
}

echo "$error"."$status";

echo json_encode(array_push($error,$status));

// echo "Connected successfully";

?>

