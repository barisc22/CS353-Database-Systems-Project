<?php
include "config.php";

if(isset($_GET['question_id'])){
    $vote = $_GET['vote'];
    $question_id = $_GET['question_id'];
    $user_id = $_GET['user_id'];

    $sql = "UPDATE nc_submit SET votes = votes + '$vote' WHERE question_id = '$question_id' and user_id = '$user_id'";
    $result = mysqli_query($con, $sql);
    header( "Location: EvaluateNoncoding.php?question_id=".$question_id."");
}
else{
    echo "Failed";
}