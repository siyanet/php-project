<?php
require_once('dbselect.php');
$tb_name = "Student";
if(isset($_POST['submit'])){
    echo "post is working";
    $efname =mysqli_real_escape_string($conn, $_POST["first-name"]);
    $emname =mysqli_real_escape_string($conn,$_POST["middel-name"]);
    $elname = mysqli_real_escape_string($conn,$_POST["last-name"]);
    $egender = mysqli_real_escape_string($conn,$_POST["gender"]);
    $edob = mysqli_real_escape_string($conn,$_POST["dob"]);
    $egrade = mysqli_real_escape_string($conn,$_POST["grade"]);
    $eschool = mysqli_real_escape_string($conn,$_POST["school-name"]);
    $tb_name = "Student";
    $id = mysqli_real_escape_string($conn,$_POST['id']);
    $sql_fetch = "UPDATE $tb_name 
                  SET first_name = ?, middle_name = ?, last_name = ?, gender = ?, date_of_birth = ?, grade = ?, school_name = ? ,updated_at = NOW()
                  WHERE id = ?";

    try{
        $stmt = $conn->prepare($sql_fetch);
        if (!$stmt) {
            throw new Exception("Error in preparing the statement");
        }
        $stmt->bind_Param("sssssisi", $efname,$emname,$elname,$egender,$edob,$egrade,$eschool,$id);
       if(!$stmt->execute()){
        throw new Exception("information is not updated");
       }
       
       header("Location: ../view/list_view.php");
       exit();
       
}

catch(Exception $e){
    echo "".$e->getMessage();
}}
?>