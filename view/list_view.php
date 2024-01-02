<!DOCTYPE html>
<html>
    <!--this is a template page for student listing-->
    <head>
        <title>student List</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
      
            <!-- Add this line to include Font Awesome CSS -->
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        
          
        </head>
        <body>
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <h1>Student List</h1>
                        </div>
                </div>
        

            </div>
<div class = "container">
<div class = "row">
<div class = "col">
                        <form method = 'POST' >
                            <label >search</label>
                            <input  name = 'search_text' type ='text'>
                            <input name = "search_submit" class = 'btn-primary'type = 'submit' value = 'submit'>
                        </form>
</div>
<div class = 'col-3'>
                        <form  method='POST'>
                           
                            <label for="school" class=" text-left form-label h4">School</label>
            <select name = "school_filter" id="school">
                <option value = "bole school">Bole School</option>
                <option value = "lideta">Lideta School</option>
                <option value = "menilik">Menilik School</option>
                <option value = "akaki">Akaki School</option>
                <option value = "arada">Arada School</option>
            </select>
            <input name = "school_submit" class = 'btn-primary'type = 'submit' value = 'submit'>

</form>
</div>
</div>
</div>
                        
                 
            
            <div class="container ">
            <table class="table table-strip table-hover table-bordered table-responsive">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>first-name</th>
                        <th>middel-name</th>
                        <th>last-name</th>
                        
                        <th>Gender</th>
                        <th>Grade</th>
                        <th>School</th>
                        <th>Registeration Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                      include '../model/list.php' ;

$sql_total = "select count(*) as total from $tb_name where deleted_at IS NULL";                   
if(isset($_POST["search_submit"])){
    $search = $_POST['search_text'];
    $sql_total = "select count(*) as total from $tb_name where deleted_at IS NULL AND first_name = '$search'";
}
if(isset($_POST["school_submit"])){
    $school_name = $_POST['school_filter'];
    $sql_total = "select count(*) as total from $tb_name where deleted_at IS NULL AND school_name = '$school_name'";
}


            try{  
            $result_total = $conn->query($sql_total);
            $row_total = $result_total ->fetch_assoc();
            $total = $row_total["total"];
            $total_pages = ceil($total /1);
        }
          
            catch  (Exception $e) {
            echo "<tr><td colspan = '9' style = 'text-align: center;'>".$e->getMessage()."</td></tr>";
            }
            echo "
            </tbody>
            </table>
            <div class = 'container'>
            <nav aria-label='Page navigation'>
      <ul class='pagination'>";
            if(isset($_GET['page']) && $_GET['page'] > 1){
                echo "<li class = 'page-item'><a class = 'page-link' href='?page =". $_GET['page'] - 1 ."'>previsous </a></li>";
            }
            else{
                echo "<li class = 'page-item'><a class='page-link' href = ''>previsous</a></li>";
            }
           
           
        
            for ($i = 1; $i <= $total_pages; $i++){
                
                echo "<li class = 'page-item'><a class = 'page-link' href='?page=" . $i . "'>" . $i . "</a> </li>";

            }
            if(!isset($_GET['page'])){
                echo "<li class = 'page-item'><a class = 'page-link' href ='?page=2'>Next</a></li>";
            }
            else{
                if($_GET['page'] >= $total_pages){
                    echo "<li class = 'page-item'><a class = 'page-link'>Next</a></li>";

                }
                else{
                    echo "<li class = 'page-item'><a class= 'page-link' href='?page=".$_GET['page'] + 1 ."'>Next</a></li>";
                }
            }
           
                    echo "
                    </ul>
                    </nav>
                    </div>" ?>
           
                  
                
            <?php 
            

            


            ?>
        </div>
        </body>
</html>