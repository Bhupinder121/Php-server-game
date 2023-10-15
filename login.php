<!DOCTYPE html>
<?php
include("dbConnection.php");
mysqli_select_db($conn, "accounts");
?>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
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
                <input type="password" name="password" id="password" placeholder="Password" class="input-2" require>
                <input type="submit" value="Log In" class="btn" name="button"/>
            </form>
        </div>
        <div class="sub-content">
            <div class="s-part">
                Don't have an account? <a href="signUp.php">Sign Up</a>
            </div>
        </div>
    </div>



</body>

</html>

<?php


    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $query = "SELECT * FROM users WHERE userId = '$username'";
        $data = mysqli_fetch_array(mysqli_query($conn, $query));
        if($data){
            $dbPassword = $data["password"];
            if(password_verify($password, $dbPassword)){
                echo("You Logged in $username");
            }
            else{
                echo("Wrong Password");
            }
        }
        else{
            echo("Wrong Username");
        }
    }




    mysqli_close($conn);
?>