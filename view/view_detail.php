<!DOCTYPE html>
<html>
    <head>
        <title>student detail</title>
        <link rel="stylesheet" href="ph.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    </head>
    <body>
        <?php
        require_once('../model/dbselect.php');
        if (isset($_GET['id'])){
            $id = $_GET['id'];
            $tb_name = 'Student';
            $sql_detail = "select * from $tb_name where id = $id";
            try{
            $result_detail = $conn->query($sql_detail);
            if ($result_detail->num_rows > 0) {
                
                while ($row = $result_detail->fetch_assoc()) {
                echo "<h1>". $row["first_name"] ." ". $row["middel_name"] ."</h1>";
                echo "<form>";
                echo "<label for = 'first-name' class = 'form-label'> First Name </label>";
                echo "<input id = 'first-name' class ='form-control' value =" . $row['first_name'] . "/>"; 
                echo "<label for = 'middel-name' class = 'form-label'> Middel Name </label>";
                echo "<input id = 'Middel-name' class ='form-control' value =" . $row['middle_name'] . "/>"; 
                echo "<label for = 'last-name' class = 'form-label'> Last Name </label>";
                echo "<input id = 'last-name' class ='form-control' value =" . $row['last_name'] . "/>"; 
                echo "<label for = 'gender' class = 'form-label'> Gender </label>";
                echo "<input id = 'gender' class ='form-control' value =" . $row['gender'] . "/>"; 
                echo "<label for = 'grade' class = 'form-label'> Grade </label>";
                echo "<input id = 'grade' class ='form-control' value =" . $row['grade'] . "/>"; 
                echo "<label for = 'reg-date' class = 'form-label'> Registeration Date </label>";
                echo "<input id = 'reg-date' class ='form-control' value =" . $row['reg_date'] . "/>"; 
                echo "<label for = 'school-name' class = 'form-label'> School Name </label>";
                echo "<input id = 'school-name' class ='form-control' value =" . $row['school_name'] . "/>"; 
                echo "</form>";




        }}}
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
        ?>
        
    </body>
</html>