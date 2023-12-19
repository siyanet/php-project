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
                      require_once("../model/list.php");
                      $sql_total = "select count(*) as total from $tb_name";
            $result_total = $conn->query($sql_total);
            $row_total = $result_total ->fetch_assoc();
            $total = $row_total["total"];
            $total_pages = ceil($total /5);
            for ($i = 1; $i <= $total_pages; $i++){
                echo "<a href = '../model/list.php?page = ". $i."'>".$i."</a>";
            }
                    ?>
                </tbody>
                  
                </tbody>
            </table>
            <?php 
            

            


            ?>
        </div>
        </body>
</html>