!DOCTYPE html>
<html>
<head>
    <title>Create Database</title>
</head>
<body>

<?php   

    require("conn.php");

    if(!empty($_POST['quiz_id']))
    {
            addQuizDetails();
    }
    else
    {
        getQuizDetails();
    }

    function getQuizDetails()
    {
        echo("

                <form method="POST" >
                 <table>
                   <tr><td>quiz_id/td><td><input type="text" name="quiz_id"></td></tr>
                   <tr><td>quiz_name</td><td><input type="text" name="quiz_name"></td></tr>
                    <tr><td>quiz_author</td><td><input type="text" name="quiz_author"></td></tr>
                   <tr><td>quiz_available</td><td><input type="TRUE/FALSE" name="quiz_available"></td></tr>
                   <tr><td>quiz_duration</td><td><input type="in mins" name="quiz_duration"></td></tr>
                  </table>
                    <input type="submit" name="Register">
                </form>
            ")

            echo("

                <form method="POST" >
                 <table>
                   <tr><td>question_id/td><td><input type="text" name="question_id"></td></tr>
                   <tr><td>question</td><td><input type="text" name="question"></td></tr>
                    <tr><td>answer_1</td><td><input type="text" name="answer_1"></td></tr>
                   <tr><td>answer_2</td><td><input type="text" name="answer_2"></td></tr>
                   <tr><td>answer_3</td><td><input type="text" name="answer_3"></td></tr>
                   <tr><td>answer_4</td><td><input type="text" name="answer_4"></td></tr>
                   <tr><td>correct_answer/td><td><input type="text" name="correct_answer"></td></tr>
                  </table>
                    <input type="submit" name="Register">
                </form>
            ")
    }

    function addQuizDetails()
    {
        global $conn;

        $qi = $_POST['quiz_id'];
        $qn = $_POST['quiz_name'];
        $qa = $_POST['quiz_author'];
		$qav = $_POST['quiz_available'];
        $qd= $_POST['quiz_duration'];

        $qei = $_POST['question_id'];
        $qen = $_POST['question'];
        $a1 = $_POST['answer_1'];
        $a1 = $_POST['a1'];
        $a2 = $_POST['a2'];
        $a3 = $_POST['a3'];
        $a4 = $_POST['a4'];
        $ca = $_POST['ca'];

        
        $sql = "INSERT INTO Quiz(
                                    quiz_id,
                                    quiz_name,
                                    quiz_author,
                                    quiz_available,
                                    quiz_duration,
        ) VALUES(
                '$qi','$qn', '$qa', '$qav', '$qd'
        )";

        if(mysqli_query($conn, $sql))
        {
            echo("quiz is added");
        }
        else
        {
            echo("something went wrong" . mysqli_error($conn));
        }

        $sql1 = "INSERT INTO Questions (
                                        question_id
                                        question
                                        answer_1
                                        answer_2
                                        answer_3
                                        answer_4
                                        correct_answer)
                VALUES (
                        'qei', 'qen', 'a1', 'a2, 'a3', 'a4', 'ca')";
        if(mysqli_query($conn, $sql1))
        {
            echo("question added");
        }
        else
        {
            echo("error:" . mysqli_error($conn));
        }

        $sqli2 = "INSERT INTO Quiz_Has_Questionss (
            q_id
            quiz_id)

            VALUES ('qi', 'qei')";
            }

            if(mysqli_query($conn, $sql2))
        {
            echo("question connected to quiz");
        }
        else
        {
            echo("error:" . mysqli_error($conn));
        }

        

?>



</body>
</html>