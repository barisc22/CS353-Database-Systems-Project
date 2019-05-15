<?php
include "config.php";
$sql = "INSERT INTO contest_user VALUES (7, 27, '10-05-2005', 'Hop', 'Hop2', 100, 1)";
$result = mysqli_query($con, $sql);
echo $result;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="styles/w3.css">
    <title>CodeInt - Leaderboard</title>
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
    <div class="w3-container" style="padding-top: 10px;">
        <div class="w3-container" style="position: fixed; width:78.3%; max-height: 23%; margin: auto; display: inline-block; height: 15%; background-color: rgb(255,255,255);"">
            <div style="display: inline-block; ">
                <img src="images/codeint.png" style="padding-bottom:28%; width:50%; margin: auto;">
            </div>
        </div>
        <div style="display: inline-block; width:80%; margin-top: 8%;">
            <h2 style="padding-left: 10%;">Contest Name</h2>
            <h2 style="padding-left: 10%;">Contest Date</h2>            
            <div style="width: 50%; height: 20px; border: 1px solid grey; margin-left: 25%; font-weight: bold;">LEADERBOARD</div>
            <ul class="w3-ul w3-margin-top" style="height: 250px; margin: auto; overflow: auto; width: 50%;">
                <table class="w3-table-all w3-hoverable">
                    <thead>
                      <tr class="w3-light-grey ">
                        <th style="text-align: center;">Rank</th>
                        <th style="text-align: center;">Username</th>
                        <th style="text-align: center;">Score</th>
                      </tr>
                    </thead>
                    <?php
                        $sql = "update contest_user set rank as (row_number() over (order by contest_score desc))";
                        $result = mysqli_query($con, $sql);
                        echo "Hop: ";
                        echo $result;

                        $sql = "select GU.username, CU.contest_score, CU.rank from contest_user CU natural join general_user GU where CU.id = GU.id and CU.contest_id = '27'";
                        $result = mysqli_query($con, $sql);
                        echo mysqli_num_rows($result);

                        if (mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                <td>".$row["rank"]."</td>
                                <td>".$row["username"]."</td>
                                <td>".$row["contest_score"]."</td>
                              </tr>";
                            }
                        }
                        else {
                            echo "0 results";
                        }
                    ?>
              </table>
            </ul>
        </div>
        <div class="w3-container" style="position:fixed; width: 20%; min-height: 10px; text-align: center; padding:10px; margin: auto; display: inline-block;">
            <img src="images/trophy.png" style="width: 50%; height: 100%; padding-top: 50px;">
            <p><label>Reward</label>
            <p><label>Points:</label>
            <div style="width: 25%; height: 20px; border: 1px solid grey; margin-left: 37.5%;">250</div>

            <br><br><br><br><br><br><br><br><br><br>
            <h2>Next Contest:</h2>
            <div style="width: 60%; height: 20px; border: 1px solid grey; margin-left: 20%;">date</div>
            <br><br><br>
        </div>
    </div>
</body>
</html>
