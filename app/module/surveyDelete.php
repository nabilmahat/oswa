<?php
include '../connection/connection.php';

$id = $_GET["id"];

$checkSurvey = "SELECT * FROM surveys WHERE id = '".$id."' ";
$execCheckSurvey = mysqli_query($conn, $checkSurvey);

if (mysqli_num_rows($execCheckSurvey) == 1) {

    $deleteSurvey = "DELETE FROM surveys WHERE id = '".$id."'";
    $execDeleteSurvey = mysqli_query($conn, $deleteSurvey);

    echo "<script>";
    echo "alert('Success Delete Survey');";
    echo "location.href = '../surveyList.php';";
    echo "</script>"; 
} else {
    echo "<script>";
    echo "alert('Survey not exist!');";
    echo "location.href = '../surveyList.php';";
    echo "</script>"; 
} 

?>