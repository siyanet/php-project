<?php
require_once("tbcreate.php")
require_once("dbselect.php")
if(isset($_POST["submit"])){
    $fname = $_POST["first_name"];
    $mname = $_POST["middel_name"];
    $lname = $_POST["last_name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $grade = $_POST["grade"];
    $school = $_POST["school_name"];
    $sql = "insert into $tb_name()values($fname,$mname,$lname,$gender,$dob,$grade,$school) ";
    try{
        if(!$conn->query($sql)){
            throw new Exception("infn is not enetered " .$conn->error);
        }
        echo "data entred succesfully";

    }
    catch(exception $e){
        echo $e.getMessage();
    }
}
$conn->close();

?>