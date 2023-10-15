<!DOCTYPE html>
<?php
include("dbConnection.php");
mysqli_select_db($conn, "accounts");
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignUp page</title>
    <link rel="stylesheet" href="thml/index.css">
</head>

<body>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Overpass+Mono" rel="stylesheet">

    <div id="wrapper">
        <div class="main-content">
            <div class="header">
                <h1>hello there</h1>
            </div>
            <form class="l-part" action="<?php $_SERVER['PHP_SELF']?>" method="post">
                <input type="text" placeholder="Username" name="username" class="input-1" require/>
                <input type="password" name="password" id="password" placeholder="Password" class="input-2" require/>
                <input type="password" name="conpassword" id="conpassword" placeholder="Confirm Password" class="input-2" require/>
                <input type="submit" value="Sign Up" class="btn" name="button"/>
            </form>
        </div>
        <div class="sub-content">
            <div class="s-part">
                have an account? <a href="login.php">Log In</a>
            </div>
        </div>
    </div>



</body>

</html>

<?php


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $conpass = $_POST["conpassword"];
        $query = "SELECT * FROM users WHERE userId = '$username'";
        $data = mysqli_fetch_array(mysqli_query($conn, $query));
        if($data){
            echo("Username already taken!");
        }
        else{
            if($password != $conpass){
                echo("Please check your password");
            }
            else{
                if(isset($username) && isset($password)){

                    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        
                    $query = "INSERT INTO users(userId, password)
                                VALUES('{$username}', '{$pass_hash}')";
                    if(!mysqli_query($conn, $query)){
                        echo("Error");
                    }
                }
            }
        }
    }

    // echo ("running");



    mysqli_close($conn);
?>