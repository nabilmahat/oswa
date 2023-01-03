<?php
include '../connection/connection.php';

$title = $_POST["title"];
$description = $_POST["description"];
$userEmail = $_SESSION["email"];

$rawStart=date_create($_POST["start_date"]);
$start_date = date_format($rawStart,"Y-m-d");

$rawEnd=date_create($_POST["end_date"]);
$end_date = date_format($rawEnd,"Y-m-d");

$addSurvey = "INSERT INTO surveys (title , description, start_date, end_date, user_email)
                VALUES ('".$title."', '".$description."', '".$start_date."', '".$end_date."', '".$userEmail."')";
$execAddSurvey = mysqli_query($conn, $addSurvey);

echo "<script>";
echo "alert('Success Add Survey');";
echo "console.log(".$start_date.");";
echo "console.log(".$end_date.");";
echo "location.href = '../surveyList.php';";
echo "</script>";
    
?>