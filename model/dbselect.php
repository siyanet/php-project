<?php
require_once("dbcreate.php");
#adding connection because it is close on db create
require_once("dbconn.php";)
$db_name="SIMS";
$sql="use '$db_name'";
#selecting db
try{
    if(!conn->query($sql)){
        throw new Exception("db select failed" .$conn->error);

    }
    echo "db selected succesfully";
}
catch (exception $e){
    echo $e->getMessage();
}
?>