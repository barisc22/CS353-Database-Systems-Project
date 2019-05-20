<?php
include "config.php";

if(isset($_GET['question_id'])){
    $question_id = $_GET['question_id'];

    $sql = "SELECT question FROM noncoding_question WHERE question_id = '$question_id'";
    $result = mysqli_query($con, $sql);
    while($row = $result->fetch_assoc()) {
        $question = $row["question"];
    }
}
else{
    echo "Failed";
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/w3.css">
    <title>CodeInt - Evaluation</title>
    <style>
        /* width */
        ::-webkit-scrollbar {
            width: 20px;
        }

        /* Track */
        ::-webkit-scrollbar-track {
            box-shadow: inset 0 0 5px grey;
            border-radius: 10px;
        }

        /* Handle */
        ::-webkit-scrollbar-thumb {
            background: purple;
            border-radius: 10px;
        }

        /* Handle on hover */
        ::-webkit-scrollbar-thumb:hover {
            background: #000;
        }

        p.round2 {
            border: 2px solid grey;
            border-radius: 10px;
        }

    </style>
</head>
<body>
<div class="w3-container">
    <img src="images/codeint.png" class="w3" style="padding:10px; width:15%; margin: auto;">
</div>

<div class="w3-container w3-center" style="margin-top: 50px; width: 100%; margin: auto; ">

    <h2 style="font-weight: bold;">Answers</h2>

    <p class="round2">Question: <?php echo $question ?></p>

    <table align="center" cellspacing="50">

        <?php
        $sql = "SELECT U.id, U.username, S.submission, S.votes FROM nc_submit S NATURAL JOIN general_user U WHERE S.user_id = U.id AND S.question_id = '$question_id'";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<tr><th>User</th><th>Answer</th><th>Votes</th></tr>";
            while($row = mysqli_fetch_assoc($result)) {
                $user_id = $row["id"];
                echo "<tr>
                    <td>".$row["username"]."</td>
                    <td>".$row["submission"]."</td>
                    <td>".$row["votes"]."</td>
                    <td><a href='vote.php?vote=1&question_id=".$question_id."&user_id=".$user_id."'>Upvote</a></td>
                    <td><a href='vote.php?vote=-1&question_id=".$question_id."&user_id=".$user_id."'>Downvote</a></td>
                  </tr>";
            }
        }
        else {
            echo "0 results";
        }
        ?>
    </table>

</div>

</body>
</html>
