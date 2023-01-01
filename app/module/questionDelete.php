<?php
include '../connection/connection.php';

$id = $_GET["id"];
$sid = $_GET["sid"];

$checkQuestion = "SELECT * FROM questions WHERE id = '".$id."' ";
$execCheckQuestion = mysqli_query($conn, $checkQuestion);

if (mysqli_num_rows($execCheckQuestion) == 1) {

    $deleteQuestion = "DELETE FROM questions WHERE id = '".$id."'";
    $execDeleteSurvey = mysqli_query($conn, $deleteQuestion);

    $deleteOptions = "DELETE FROM options WHERE question_id = '".$id."'";
    $execDeleteSurvey = mysqli_query($conn, $deleteOptions);

    echo "<script>";
    echo "alert('Success Delete Question');";
    echo "location.href = '../surveyUpdate.php?id=".$sid."';";
    echo "</script>"; 
} else {
    echo "<script>";
    echo "alert('Question not exist!');";
    echo "location.href = '../surveyUpdate.php?id=".$sid."';";
    echo "</script>"; 
} 

?>