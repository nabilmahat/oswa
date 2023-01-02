<?php
include '../connection/connection.php';
include 'generateRandom.php';
$title = $_POST["title"];
$description = $_POST["description"];
$type = $_POST["type"];
$options = $_POST["option"];
// $optionsD = $_POST["optionD"];
$qCount = 1;

$qID = getRandomString();

$addQuestion = "INSERT INTO questionpools (title , description, type, qID)
                VALUES ('".$title."', '".$description."', '".$type."', '".$qID."')";
$execAddQuestion = mysqli_query($conn, $addQuestion);

if ($execAddQuestion) {

    $questionData = "SELECT * FROM questionpools ORDER BY id DESC LIMIT 1 ";
    $execQuestionData = mysqli_query($conn, $questionData);
    $qRow = mysqli_fetch_array($execQuestionData);
    if ($qRow) {
        $qCount = $qRow['id'];
    }

    foreach($options as $oRow) {
        $addOption = "INSERT INTO optionpools (title , qID)
                VALUES ('".$oRow."', '".$qID."')";
        $execAddOption = mysqli_query($conn, $addOption);
    }

    echo "<script>";
    echo "alert('Success Add questions');";
    echo "location.href = '../questionList.php';";
    echo "</script>";

} else {
    echo "<script>";
    echo "alert('Failed Add questions');";
    echo "location.href = '../questionList.php';";
    echo "</script>";
}
    
?>