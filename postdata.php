<?php


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        // if(isset($username) && isset($password)){
        //     echo("Runing");
        //     $pass_hash = password_hash($password, PASSWORD_DEFAULT);

        //     $query = "INSERT INTO users(userId, password)
        //                 VALUES('{$username}', '{$password}')";
        //     if(!mysqli_query($conn, $query)){
        //         echo("Error");
        //     }
        // }
        echo ("$username and $password");
    }

    // echo ("running");



    
?>