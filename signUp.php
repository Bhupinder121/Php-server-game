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
    
    <link rel="stylesheet" href="index.css">
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
            echo('<script type="text/JavaScript">  
                    alert("Username already taken!"); 
                    </script>');
        }
        else{
            if($password != $conpass){
                echo('<script type="text/JavaScript">  
                    alert("Please check your password"); 
                    </script>');
            }
            else{
                if(isset($username) && isset($password)){

                    $pass_hash = password_hash($password, PASSWORD_DEFAULT);
        
                    $query = "INSERT INTO users(userId, password)
                                VALUES('{$username}', '{$pass_hash}')";
                    if(!mysqli_query($conn, $query)){
                        echo("Error");
                    }
                    $query = "INSERT INTO leaders(userId, score)
                                VALUES('{$username}', 0)";
                    if(!mysqli_query($conn, $query)){
                        echo("Error");
                    }
                    echo('<script type="text/JavaScript">  
                    alert("Account Created!!"); 
                    </script>');
                    header("Location: login.php");
                }
            }
        }
    }


    mysqli_close($conn);
?>