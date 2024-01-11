<?php
 function getListWithSearch(){
    global $conn;
   
    

      
    if(){

    }
    else{
        $data=[
            'status' => 500,
            'message' =>'Internal Server Error',
        ];
        header('HTTP/1.0 500 Internal Server Error');
        echo json_encode($data);
    }
 }
?>