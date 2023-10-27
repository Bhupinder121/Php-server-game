<?php
    session_start();
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        include('dbConnection.php');
        mysqli_select_db($conn, "accounts");
        // echo($_SESSION["username"]);
        $query = "SELECT score from leaders where userId = '".$_SESSION["username"]."'";
        $data = mysqli_query($conn, $query);
        if($data->num_rows == 0){
            echo("error");
        }
        $maxi = max($data->fetch_assoc()["score"], $_POST["score"]);
        
        $query = "UPDATE leaders set score = $maxi where userId = '".$_SESSION["username"]."'";    
        $data = mysqli_query($conn, $query);
        echo("updated!!!");
    }
?>