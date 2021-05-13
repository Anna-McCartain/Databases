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
            addUserDetails();
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
                   <tr><td>Forename</td><td><input type="text" name="userForname"></td></tr>
                   <tr><td>Surname</td><td><input type="text" name="userSurname"></td></tr>
                   <tr><td>isStaff</td><td><input type="TRUE/FALSE" name="isStaff"></td></tr>
                   <tr><td>Email</td><td><input type="text" name="userEmail"></td></tr>
                   <tr><td>Password</td><td><input type="text" name="userPassword"></td></tr>
                  </table>
                    <input type="submit" name="Register">
                </form>
            ")

    }

    function addUserDetails()
    {
        global $conn;

        $fn = $_POST['userForename'];
        $sn = $_POST['userSurname'];
        $is = $_POST['isStaff'];
		$em = $_POST['userEmail'];
        $pw = $_POST['userPassword'];

        $pw = password_hash($pw, PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO user(
                                    userForename,
                                    userSurname,
                                    isStaff,
                                    userEmail,
                                    userPassword
        ) VALUES(
                '$fn','$sn', '$is', '$em', '$pw'
        )";

        if(mysqli_query($conn, $sql))
        {
            echo("User has registered");
        }
        else
        {
            echo("something went wrong" . mysqli_error($conn));
        }

    }

?>



</body>
</html>