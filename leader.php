<?php 
    session_start();
    include('dbConnection.php');
    mysqli_select_db($conn, "accounts");
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
        h1{
            color: white;
            text-align: center;
            margin: 10px;
        }
        table{
            margin: auto;
            width: 50%;
            border: 3px solid white;
            border-radius: 10px;
            text-align: center;
            color: white;
            border-collapse: collapse;
            background-color: #191b22;
            
        }
        td{
            border-right: 2px dashed white;
        }
        a{
            position: absolute;
            right: 10px;
            top: 10px;
            background-color: rgb(52,58,64);
            color: #ffffff;
            border: none;
            border-radius: 5px;
            overflow: hidden;
            transition: 0.1s;
            cursor: pointer;
            text-decoration: none;
            padding: 10px;
        }

        a:hover {
        background: #03e9f4;
        color: #050801;
        box-shadow: 0 0 5px #03e9f4,
                    0 0 25px #03e9f4,
                    0 0 50px #03e9f4,
                    0 0 200px #03e9f4;
            
        }
    </style>
</head>
<body>
    <h1>Leader Board</h1>
    <?php
        echo('<div class="table-container">
            <table>
                <tr style="border-bottom:2px solid white;">
                    <td>
                        Username
                    </td>
                    <td>
                        💥Score
                    </td>
                </tr>
            ');
        $query = "SELECT * FROM leaders";
        $data = mysqli_query($conn, $query);
        while($row = $data->fetch_assoc()){
            $username = $row["userId"];
            $score = $row["score"];
            echo ('<tr> 
                  <td>'.$username.'</td> 
                  <td>'.$score.'</td> 
                  </tr>');
        }
        $data->free();
        echo("</table></div>")
    ?>
    <a href="game.php">Back to game</a>
</body>
</html>
<?php 