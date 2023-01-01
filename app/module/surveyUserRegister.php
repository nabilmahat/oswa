<?php
include '../connection/connection.php';

$survey_id = $_POST["survey_id"];
$name = $_POST["name"];
$email = $_POST["email"];
$gender = $_POST["gender"];

echo "<script>";
echo "location.href = '../../survey.php?id=".$survey_id."&&name=".$name."&&email=".$email."&&gender=".$gender."';";
echo "</script>";
    
?>