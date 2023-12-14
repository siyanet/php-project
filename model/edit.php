<?php
if(isset($_POST['submit'])){
    $efname = $_POST["first_name"];
    $emname = $_POST["middel_name"];
    $elname = $_POST["last_name"];
    $egender = $_POST["gender"];
    $edob = $_POST["dob"];
    $egrade = $_POST["grade"];
    $eschool = $_POST["school_name"];
    $tb_name = "Student";
    $id = $_POST['id'];
    $sql_fetch = "update $tb_name set first_name = ?,middle_name = ?,last_name = ?, gender = ?,date_of_birth =?,grade=?,school_name =? where id = ?";
   

    try{
        $stmt = $conn->prepare($sql_fetch);
        if (!$stmt) {
            throw new Exception("Error in preparing the statement");
        }
        $stmt->bind_Param("sssssisi", $efname,$emname,$elname,$egender,$edob,$egrade,$eschool,$tb_name,$id);
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