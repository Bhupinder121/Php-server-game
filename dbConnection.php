<?php
    $conn = mysqli_connect("localhost", "root", "Bhupinder@1234", "INFORMATION_SCHEMA");
    $databaseName = "accounts";
    $find = "SELECT `SCHEMA_NAME` from `SCHEMATA` WHERE `SCHEMA_NAME` LIKE '$databaseName'";
    $data = mysqli_query($conn, $find);
    
    if(!$data ) {
        die('Could not get data: ' . mysqli_error($conn));
    }
    
    if($data->num_rows == 0){
        mysqli_query($conn, "CREATE SCHEMA $databaseName");
        mysqli_select_db($conn, "accounts");
        $query = "CREATE TABLE users (
                            userId VARCHAR(255) PRIMARY KEY NOT NULL,
                            password VARCHAR(255) NOT NULL)";
        mysqli_query($conn, $query);
        $query = "CREATE TABLE leaders (
            userId VARCHAR(255) PRIMARY KEY NOT NULL,
            score int NOT NULL)";
        mysqli_query($conn, $query);
    }
    
    
?>