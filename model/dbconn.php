<?php
$server = "localhost";
$user_name = "root";
$password = "";
try{
    $conn = new mysqli($server,$user_name,$password);
    if ($conn->connect_error){
        throw new Exception("Connection failed" .$conn->connect_error);
    }
    echo "connected succesfully";
}
catch(exception $e){
    echo $e->getMessage();
}

?>