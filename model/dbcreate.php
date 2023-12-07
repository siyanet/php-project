<?php
require_once("dbconn.php");
$dbname = "SIMS";
$sql = "SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname";
if(! $conn->query($sql)){
    $sql_create_db = "create database '$dbname'";
}
else{
    echo "database has been created";
}
if($sql_create_db){
    try{
        if(!$conn->query($sql_create_db)){
            throw new Exception("data base not created" . $conn->connect_error);
        }
        echo "database created succesfully";
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
$conn->close();

?>
