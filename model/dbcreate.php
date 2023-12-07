<?php
require_once("dbconn.php");
#creating database if not created
$dbname = "SIMS";
$result_db = $conn->query("SELECT SCHEMA_NAME FROM INFORMATION_SCHEMA.SCHEMATA WHERE SCHEMA_NAME = '$dbname");
if(! $result_db){
    $sql_create_db = "create database '$dbname'";
}
else{
    echo "database has been created";
}
if($sql_create_db){
    try{
        #throw exception if there is error in executing query
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
