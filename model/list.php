<?php 
require_once('dbselect.php');

$tb_name = "Student";
$results_per_page= 1;

if(isset($_GET['page'])){
    $page = $_GET['page'];
   
    
    
}
else{
    $page = 1;
  
}




$start_from = ($page -1) * $results_per_page;

if(isset($_GET['search_text'])){
    $search = $_GET['search_text'];
    $sql_fetch = "select * from $tb_name where deleted_at IS NULL AND first_name = '$search'LIMIT $start_from,$results_per_page";

}
elseif(isset($_GET['school_filter'])){
    $school_name = $_GET['school_filter'];
    $sql_fetch = "select * from $tb_name where deleted_at IS NULL AND school_name = '$school_name'LIMIT $start_from,$results_per_page";
    
}
else{
    $sql_fetch = "select * from $tb_name where deleted_at IS NULL LIMIT $start_from,$results_per_page"; 
}

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
        echo "<td>" .$row["reg_date"]."</td>";
        
        echo "<td>";
        

            echo " <a href='../view/detail_view.php?id= " . $row['id'] ."'><i class='fas fa-info-circle ' ></i> </a>";
            echo"
            <a href='../view/edit_view.php?id=".$row["id"]."'><i class='fa fa-edit'></i> </a>";
            echo"
            <span>
            <form method = 'POST' action = '../model/delete_recorde.php'>
            <input type = 'hidden' value = '". $row['id'] ."' name ='student-id'>
            
            <a href='#' ><button type = 'submit' name = 'delete_button' class = 'btn-sm  button-danger custom-inline-button'><i class='fas fa-trash-alt '></i></button></a>
            </span>";
        echo "</td>";
    echo "</tr>";
    }

}
else {
    throw new Exception(" no available recordes" . $conn->error);
}
}
catch  (Exception $e) {
echo "<tr><td colspan = '9' style = 'text-align: center;'>".$e->getMessage()."</td></tr>";
}




?>