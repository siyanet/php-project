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
                <form method = 'post' action='../model/edit.php' onsubmit='return validate_dob()'>
                <input type = 'hidden'  name = 'id' value = ". $id .">
                 <div class ='row mb-1'>
                 <label for = 'first-name' class = 'col-4 form-label text-right h4'> First Name </label>
                 <div class = 'col-8'>
                 <input id = 'first-name' name = 'first-name' pattern = '[a-zA-Z]+' class ='form-control form-control-lg' value ='" . $row['first_name'] . "' required>
                 </div>
                </div>

                <div class = 'row '>
                <label for = 'middel-name' class = 'col-4 form-label text-right h4'> Middel Name </label>
                <div class = 'col-8'>
                <input id = 'Middel-name' name = 'middel-name' pattern = '[a-zA-Z]+' class ='form-control required form-control-lg' value ='" . $row['middle_name'] . "' required>
               </div>
               </div>

               <div class = 'row'>
                <label for = 'last-name' class = 'col-4 form-label text-right h4'> Last Name </label>
                <div class = 'col-8'>
               <input id = 'last-name' name = 'last-name' pattern = '[a-zA-Z]+' class ='form-control form-control-lg' value ='" . $row['last_name'] . "' required>
               </div>
               </div>

        
                <div class='row'>
                <label for='gender' class = 'col-4 text-right form-label h4'>Gender</label>
                <div class='col'>
        <div class='form-check form-check-inline'>
        <input type='radio' class='form-check-input' id='male' name ='gender' value = 'male' 
        "?>
             <?php echo ($row['gender'] == 'male') ? 'checked' : ''; ?>
            <?php 
            echo "required>
        <label for='male'class = 'form-check-label '> Male</label>
        <div class='form-check form-check-inline'>
            <input type ='radio' id='female' name = 'gender'  class='form-check-input'value = 'female'
            "?>
             <?php echo ($row['gender'] == 'female') ? 'checked' : ''; ?>
            <?php 
            echo "
            
            '>
        <label for='female'>Female</label>
        </div>
        </div>
        </div>
        </div>

                <div class = 'row '>
                <label for = 'grade' class = 'col-4 form-label text-right h4'> Grade </label>
                <div class = 'col-8'>
                <input type = 'number' min = '1' max = '12' id = 'grade' name = 'grade' class ='col-8 form-control form-control-lg' value ='" . $row['grade'] . "' required>
                </div>
                </div>
                <div class = 'row '>
                <label for = 'dob' class = 'col-4 form-label text-right h4'> Date Of Birth </label>
                <div class = 'col-8'>
                <input type = 'date' id = 'date_birth' name = 'dob' class ='col-8 form-control form-control-lg' value =" . $row['date_of_birth'] . ">
                </div>
                </div>

               
 
<!-- ... (Previous HTML code) ... -->
<div class='row'>
    <label for='school-name' class='col-4 form-label text-right h4'>School</label>
    <div class='col-8'>
        <select name='school-name' id='school' class='form-select form-select-lg' required>"
        ?>
            <?php
            $schools = ['bole school', 'lideta', 'menilik', 'Akaki', 'arada'];
            foreach ($schools as $school) {
                $selected = ($row['school_name'] == $school) ? 'selected' : '';
                echo "<option value='$school' $selected>$school</option>";
            }
            ?>
            <?php
            echo "
        </select>
    </div>
</div>

<!-- ... (Remaining HTML code) ... -->


               
                <div class='row mt-3 justify-content-center'>
                <div class='col-auto'>
                <button type='submit' name = 'submit' class = 'btn btn-danger btn-lg ml-5 text-right'>update</button>
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
        <script src="validate.js"></script>
    </body>
</html>