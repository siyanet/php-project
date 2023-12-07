<?php
#checking the db and table is created if not create one
require_once("tbcreate.php")
require_once("dbselect.php")
if(isset($_POST["submit"])){
    #getting the form values
    $fname = $_POST["first_name"];
    $mname = $_POST["middel_name"];
    $lname = $_POST["last_name"];
    $gender = $_POST["gender"];
    $dob = $_POST["dob"];
    $grade = $_POST["grade"];
    $school = $_POST["school_name"];
    #sql statment to insert the form data
    $sql = "insert into $tb_name(first_name,middle_name,last_name,gender,date_of_birth,grade,shool_name)values($fname,$mname,$lname,$gender,$dob,$grade,$school) ";
    #executing query in try catch block
    try{
        if(!$conn->query($sql)){
            throw new Exception("infn is not enetered " .$conn->error);
        }
        echo "data entered succesfully";

    }
    catch(exception $e){
        echo $e.getMessage();
    }
}
#closing the connection
$conn->close();

?>