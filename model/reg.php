<?php
#checking the db and table is created if not create one
require_once("tbcreate.php");

if(isset($_POST["submit"])){
    #getting the form values
    $fname = mysqli_real_escape_string($conn,$_POST["first_name"]);
    $mname = mysqli_real_escape_string($conn,$_POST["middel_name"]);
    $lname = mysqli_real_escape_string($conn,$_POST["last_name"]);
    $gender = mysqli_real_escape_string($conn,$_POST["gender"]);
    $dob = mysqli_real_escape_string($conn,$_POST["dob"]);
    $grade = mysqli_real_escape_string($conn,$_POST["grade"]);
    $school = mysqli_real_escape_string($conn,$_POST["school_name"]);
    #sql statment to insert the form data
    #$sql = "insert into $tb_name (first_name,middle_name,last_name,gender,date_of_birth,grade,school_name)values('$fname','$mname','$lname','$gender','$dob',$grade,'$school') ";
    #executing query in try catch block
    $sql = $conn->prepare("insert into $tb_name (first_name,middle_name,last_name,gender,date_of_birth,grade,school_name) values (?,?,?,?,?,?,?) ");
    $sql->bind_param("sssssis",$fname,$mname,$lname,$gender,$dob,$grade,$school);

    try{
        if(!$sql->execute()){
            throw new Exception("infn is not entered " .$sql->errno) ;
        }
        #echo "data entered succesfully";
        header ("Location: ../view/list_view.php");
        exit();
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
#closing the connection
$conn->close();

?>