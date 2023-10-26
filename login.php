<?php
include("dbConnection.php");
mysqli_select_db($conn, "accounts");
session_start();

?>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>
    <style>
        body{
            --s: 50px;
            --c: #191b22;
            --_s: calc(2*var(--s)) calc(2*var(--s));
            --_g: 35.36% 35.36% at;
            --_c: #0000 66%,#20222a 68% 70%,#0000 72%;
            background: 
                radial-gradient(var(--_g) 100% 25%,var(--_c)) var(--s) var(--s)/var(--_s), 
                radial-gradient(var(--_g) 0 75%,var(--_c)) var(--s) var(--s)/var(--_s), 
                radial-gradient(var(--_g) 100% 25%,var(--_c)) 0 0/var(--_s), 
                radial-gradient(var(--_g) 0 75%,var(--_c)) 0 0/var(--_s), 
                repeating-conic-gradient(var(--c) 0 25%,#0000 0 50%) 0 0/var(--_s), 
                radial-gradient(var(--_c)) 0 calc(var(--s)/2)/var(--s) var(--s) var(--c);
            background-attachment: fixed;
            overflow: hidden;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="index.css">
</head>

<body>
    <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Overpass+Mono" rel="stylesheet">

    <div id="wrapper">
        <div class="main-content">
            <div class="header">
                <h1>Typing Game</h1>
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
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                $file = "./thml/game/game.php";
                header("Location: ".$file);
            }
            else{
                echo('<script type="text/JavaScript">  
                    alert("Wrong password"); 
                    </script>');
            }
        }
        else{
            echo('<script type="text/JavaScript">  
                    alert("Wrong username"); 
                    </script>');
        }
    }




    mysqli_close($conn);
?>