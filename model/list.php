<?php 
require_once('dbselect.php');
$tb_name = "Student";
$sql_fetch = "select * from $tb_name";
try{
$result = $conn->query($sql_fetch);
if ($result->num_rows > 0){
    while ($row = $result->fetch_assoc()){
        echo "<tr>";
        echo "<td>". $row['id'] ."</td>";
        echo "<td>" .$row['first_name']. "</td>";
        echo "<td>" .$row['middle_name'] . "</td>";
        echo "<td>" .$row['last_name'] . "</td>";
        echo "<td>" .$row['gender'] . "</td>";
        echo "<td>" .$row["grade"] . "</td>";
        echo "<td>" .$row['school_name'] . "</td>";
        echo "<td>" .$row['reg_date'] . "</td>";
        echo "<td>";
            echo "<i class='fas fa-info-circle ' ></i>";
            echo "<i class='fa fa-edit'></i>";
            echo "<i class='fas fa-trash-alt'></i>";
        echo "</td>";
    echo "</tr>";
    }

}
else {
    throw new Exception(" no available recordes" . $conn->error);
}
}
catch  (Exception $e) {
echo $e->getMessage();
}




?>