<?php
include "config.php";


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/w3.css">
    <title>CodeInt - Challenges</title>
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
    </style>
</head>
<body>
<div class="w3-container">
    <img src="images/codeint.png" class="w3" style="padding:10px; width:15%; margin: auto;">
</div>

<div class="w3-container w3-center" style="margin-top: 50px; width: 100%; margin: auto; ">

    <h2 style="font-weight: bold;">Challenges</h2>

    <input class="w3-input w3-border w3-padding w3-round-xxlarge" type="text" placeholder="Search for challenges..." id="challengeInput" onkeyup="searchChallenge()" style="width: 45%; margin: auto; ">

    <table id="challengeTable" align="center" cellspacing="20">
        <tr><th>Title</th><th>Category</th><th>Difficulty</th><th>Percentage</th></tr>
        <?php
            $sql = "SELECT challenge_id, title, category, difficulty, percentage FROM coding_challenge";
            $result = mysqli_query($con, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                    <td>".$row["title"]."</td>
                    <td>".$row["category"]."</td>
                    <td>".$row["difficulty"]."</td>
                    <td>".$row["percentage"]."</td>
                    <td><a href='cvPool.php?challenge_id=".$row["challenge_id"]."'>Solve</a></td>
                  </tr>";
                }
            }
            else {
                echo "0 results";
            }
        ?>
    </table>

</div>

<div class="w3-container w3-center" style="margin-top: 50px; width: 100%; margin: auto; ">

    <h2 style="font-weight: bold;">Noncoding Questions</h2>

    <input class="w3-input w3-border w3-padding w3-round-xxlarge" type="text" placeholder="Search for questions..." id="questionInput" onkeyup="searchQuestion()" style="width: 45%; margin: auto; ">

    <table id="questionTable" align="center" cellspacing="20">
        <tr><th>Title</th><th>Category</th><th>Reward</th><th>Percentage</th></tr>
        <?php
        $sql = "SELECT question_id, title, category, reward, percentage FROM noncoding_question";
        $result = mysqli_query($con, $sql);

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>".$row["title"]."</td>
                    <td>".$row["category"]."</td>
                    <td>".$row["reward"]."</td>
                    <td>".$row["percentage"]."</td>
                    <td><a href='cvPool.php?question_id=".$row["question_id"]."'>Solve</a></td>
                    <td><a href='EvaluateNoncoding.php?question_id=".$row["question_id"]."'>Show Answers</a></td>
                  </tr>";
            }
        }
        else {
            echo "0 results";
        }
        ?>
    </table>

</div>

<script>
    function searchChallenge() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("challengeInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("challengeTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
            // Hide the row initially.
            tr[i].style.display = "none";

            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                cell = tr[i].getElementsByTagName("td")[j];
                if (cell) {
                    if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }

    function searchQuestion() {
        // Declare variables
        var input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("questionInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("questionTable");
        tr = table.getElementsByTagName("tr");

        // Loop through all table rows, and hide those who don't match the search query
        for (i = 1; i < tr.length; i++) {
            // Hide the row initially.
            tr[i].style.display = "none";

            td = tr[i].getElementsByTagName("td");
            for (var j = 0; j < td.length; j++) {
                cell = tr[i].getElementsByTagName("td")[j];
                if (cell) {
                    if (cell.innerHTML.toUpperCase().indexOf(filter) > -1) {
                        tr[i].style.display = "";
                        break;
                    }
                }
            }
        }
    }
</script>

</body>
</html>
