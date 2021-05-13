<!DOCTYPE html>
<html>
<head>
    <title>Create Database</title>
</head>
<body>

<?php   

    require("conn.php");

    if(!empty($_POST['userEmail']))
    {
        authenticateUser();
    }
    else
    {
        getUserDetails();
    }

    function getUserDetails()
    {
        echo("

                <form method="POST" >
                 <table>
                   <tr><td>Email</td><td><input type="text" name="userEmail"></td></tr>
                   <tr><td>Password</td><td><input type="text" name="userPassword"></td></tr>
                  </table>
                    <input type="submit" name="Login">
                </form>
            ")

    }

    function authenticateUser()
    {
        global $conn;

		$em = $_POST['userEmail'];
        $pw = $_POST['userPassword'];

        $pw = password_hash($pw, PASSWORD_DEFAULT);
        
        $sql = "SELECT userPassword FROM user WHERE userEmail = '$em'";

        if($result = mysqli_query($conn, $sql))
        {
            echo("SQL OK");

        }
        else
        {
            echo("something went wrong" . mysqli_error($conn));
        }

        while($row = mysqli_fetch_array($result))
        {
           if(password_verify($pw, $row['userPassword']))
           {
               echo("password is good");
           }
           else
           {
               echo("password incorred");
           }

        }

    }

?>



</body>
</html>