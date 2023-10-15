<html>
    <body>
        <?php
        $conn = mysqli_connect("localhost", "root", "Bhupinder@1234");
        if($conn){
            echo "correct<br>";
        }
        else{
            echo(mysqli_connect_error());
        }
        $query = "CREATE DATABASE assignment;";

        if(mysqli_query($conn, $query)){
            echo("Database Created!!!<br>");
        }
        else{
            echo("Database not created<br>");
        }
        mysqli_select_db($conn, "assignment");
        $query = "CREATE TABLE employee (
            EmployeeID INT PRIMARY KEY,
            EmployeeName VARCHAR(255),
            Address VARCHAR(255),
            Salary INT
        )";

        if(mysqli_query($conn, $query)){
            echo("Table Created!!!<br>");
        }
        else{
            echo("Table not created<br>");
        }
        mysqli_close($conn);
        ?>
    </body>
</html>