<?php
include '../connection/connection.php';

$id = $_GET["id"];

$checkSurvey = "SELECT * FROM surveys WHERE id = '".$id."' ";
$execCheckSurvey = mysqli_query($conn, $checkSurvey);

if (mysqli_num_rows($execCheckSurvey) == 1) {

    $deleteSurvey = "DELETE FROM surveys WHERE id = '".$id."'";
    $execDeleteSurvey = mysqli_query($conn, $deleteSurvey);

    if ($execDeleteSurvey) {
        $deleteQuestion = "DELETE FROM questions WHERE survey_id = '".$id."'";
        $execDeleteQuestion = mysqli_query($conn, $deleteQuestion); 

        if ($execDeleteQuestion) {
            $deleteOptions = "DELETE FROM options WHERE survey_id = '".$id."'";
            $execDeleteOptions = mysqli_query($conn, $deleteOptions);
        }
    }

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