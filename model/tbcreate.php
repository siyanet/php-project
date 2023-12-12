<?php
require_once("dbcreate.php");

$tb_name = "Student";
$result = $conn->query("show tables from $dbname Like '$tb_name'");
if($result->num_rows ==0){
    $sql_tb = "create table $tb_name(id int Auto_Increment PRIMARY KEY,
    first_name varchar(20) not null,
    middle_name varchar(20) not null,
    last_name varchar(20) not null,
    gender varchar(10) not null,
    date_of_birth date not null,
    grade int not null check(grade between 1 and 12), 
    school_name varchar(20) not null,
    reg_date timestamp default current_timestamp)
    ";
    try{
        if(!$conn->query($sql_tb)){
            throw new Exception("table not create" . $conn->error);
        }
        echo "table created succesfully";
    }
    catch(Exception $e){
        echo $e->getMessage();
    }
}
else{
    echo "table has been created";
}

#conn->close();
?>