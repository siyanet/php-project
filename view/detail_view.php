<!DOCTYPE html>
<html>
    <head>
        <title>student detail</title>
        <link rel="stylesheet" href="ph.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
    </head>
    <body>
        <div class="container">
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
                    echo "<div class = 'container'>
                    <div class='row justify-content-center'>
                    <div class='col-auto'>
                    <h1>". $row["first_name"] ." ". $row["middle_name"] ."</h1>
                    </div>
                    </div>
                    </div>";
                    
                    
                    
    
                #echo "<h1>". $row["first_name"] ." ". $row["middle_name"] ."</h1>";
                echo"<div class = 'container'>
                <form>
                 <div class ='row'>
                 <label for = 'first-name' class = 'col-4 form-label text-right h4'> First Name </label>
                 <div class = 'col-8'>
                 <input id = 'first-name' class ='form-control form-control-lg' value =" . $row['first_name'] . ">
                 </div>
                </div>

                <div class = 'row'>
                <label for = 'middel-name' class = 'col-4 form-label text-right h4'> Middel Name </label>
                <div class = 'col-8'>
                <input id = 'Middel-name' class ='form-control form-control-lg' value =" . $row['middle_name'] . ">
               </div>
               </div>

               <div class = 'row'>
                <label for = 'last-name' class = 'col-4 form-label text-right h4'> Last Name </label>
                <div class = 'col-8'>
               <input id = 'last-name' class ='form-control form-control-lg' value =" . $row['last_name'] . ">
               </div>
               </div>

               <div class = 'row'>
               <label for = 'gender' class = 'col-4 form-label text-right h4'> Gender </label>
               <div class = 'col-8'>
                <input id = 'gender' class ='form-control form-control-lg' value =" . $row['gender'] . ">
                </div>
                </div>

                <div class = 'row'>
                <label for = 'grade' class = 'col-4 form-label text-right h4'> Grade </label>
                <div class = 'col-8'>
                <input id = 'grade' class ='col-8 form-control form-control-lg' value =" . $row['grade'] . ">
                </div>
                </div>

                <div class = 'row'>
                <label for = 'reg-date' class = 'col-4 form-label text-right h4'> Registeration Date </label>
                <div class = 'col-8'>
                <input id = 'reg-date' class ='col-8 form-control form-control-lg' value =" . $row['reg_date'] . "
                </div>
                </div>

                <div class = 'row'>
                <label for = 'school-name' class = 'col-4 form-label text-right h4'> School Name </label>
                <div class = 'col-8'>
                <input id = 'school-name' class ='form-control form-control-lg' value =" . $row['school_name'] . ">
                </div>
                </div>
               
                </form>
                </div>";




        }}}
        catch(Exception $e){
            echo $e->getMessage();
        }
    }
        ?>
        </div>
    </body>
</html>