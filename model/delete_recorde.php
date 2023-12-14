<?php
require_once("dbselect.php");

$tb_name = "Student";
$student_id = $_POST['student-id'];
echo 'hello';
if(isset($_POST["delete_button"])){
    $sql_recorde_delete = "delete from $tb_name where id = ?";
    try{
        $stmt = $conn->prepare($sql_recorde_delete);
        $stmt->bind_param("i", $student_id);
        $stmt->execute();
    if($stmt->affected_rows > 0){
        echo "recored is deleted successfully";
        header("Location: ../view/list_view.php");
        exit();
    }
    else{
        echo "recored is not deleted";

}}
    catch(Exception $e) {
        echo $e->getMessage();
    }
}
?>