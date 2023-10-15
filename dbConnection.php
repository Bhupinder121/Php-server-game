<?php
    $conn = mysqli_connect("localhost", "root", "Bhupinder@1234");
    $data = mysqli_query($conn, "show databases");
    $databaseName = "accounts";
    if(!$data ) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    $isExist = false;
    while($row = mysqli_fetch_array($data, MYSQLI_ASSOC)) {
        if(in_array($databaseName, $row)){
            $isExist = true;
            break;
        }
    }
    if(!$isExist){
        
        mysqli_query($conn, "CREATE SCHEMA $databaseName");
        mysqli_select_db($conn, "accounts");
        $query = "CREATE TABLE users (
                            userId VARCHAR(255) PRIMARY KEY NOT NULL,
                            password VARCHAR(255) NOT NULL)";
        mysqli_query($conn, $query);
    }
   
?>