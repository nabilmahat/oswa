<?php
include '../connection/connection.php';

$surveyID = $_POST["survey_id"];
$title = $_POST["title"];
$description = $_POST["description"];

$rawStart=date_create($_POST["start_date"]);
$start_date = date_format($rawStart,"Y-m-d");

$rawEnd=date_create($_POST["end_date"]);
$end_date = date_format($rawEnd,"Y-m-d");

$surveyData = "SELECT * FROM surveys WHERE id = '".$surveyID."' ";
$execSurveyData = mysqli_query($conn, $surveyData);
$surveyRow = mysqli_num_rows($execSurveyData);

if ($surveyRow < 1) {
    echo "<script>";
    echo "alert('Survey not exist');";
    echo "location.href = '../surveyList.php';";
    echo "</script>";
} else {

    $updateSurvey = "UPDATE surveys 
                        SET title = '".$title."', description = '".$description."', start_date = '".$start_date."', end_date = '".$end_date."' 
                        WHERE id = '".$surveyID."' ";
    $execUpdateSurvey = mysqli_query($conn, $updateSurvey);

    echo "<script>";
    echo "alert('Success Update Survey');";
    echo "console.log(".$start_date.");";
    echo "console.log(".$end_date.");";
    echo "location.href = '../surveyUpdate.php?id=$surveyID';";
    echo "</script>";
}
    
?>