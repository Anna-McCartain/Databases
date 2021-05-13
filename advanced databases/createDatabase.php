<!DOCTYPE html>
<html>
<head>
    <title>Create Database</title>
</head>
<body>

<?php   

        $host = "localhost";
        $un = "root";
        $pw = "root";
        $db = "db";

        $conn = mysqli_connect($host, $un, $pw, $db);

        if(!$conn)
        {
            die("could not connect to MySQL" . mysqli_connect_error($conn));
        }
        else
        {
            echo("connected to database server");
        }

        $sql = "CREATE TABLE user (
            userID int auto_increment primary key,
            userForename varchar(100) not null,
            userSurname varchar(100) not null,
            isStaff BOOLEAN not null,
            userEmail varchar(100) not null unique,
            userPassword varchar(255) not null
            )";

        if(mysqli_query($conn, $sql))
        {
            echo ("Table created");
        }

        else
        {
            echo(mysqli_error($sql));
        }

?>

</body>
</html>
