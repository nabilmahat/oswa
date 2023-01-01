<?php
include '../connection/connection.php';

$survey_id = $_POST["survey_id"];
$title = $_POST["title"];
$description = $_POST["description"];
$type = $_POST["type"];
$options = $_POST["option"];
// $optionsD = $_POST["optionD"];
$qCount = 1;

$addQuestion = "INSERT INTO questions (title , description, type, survey_id)
                VALUES ('".$title."', '".$description."', '".$type."', '".$survey_id."')";
$execAddQuestion = mysqli_query($conn, $addQuestion);

if ($execAddQuestion) {

    $questionData = "SELECT * FROM questions ORDER BY id DESC LIMIT 1 ";
    $execQuestionData = mysqli_query($conn, $questionData);
    $qRow = mysqli_fetch_array($execQuestionData);
    if ($qRow) {
        $qCount = $qRow['id'];
    }

    foreach($options as $oRow) {
        $addOption = "INSERT INTO options (title , survey_id, question_id)
                VALUES ('".$oRow."', '".$survey_id."', '".$qCount."')";
        $execAddOption = mysqli_query($conn, $addOption);
    }

    echo "<script>";
    echo "alert('Success Add questions');";
    echo "location.href = '../surveyUpdate.php?id=$survey_id';";
    echo "</script>";

} else {
    echo "<script>";
    echo "alert('Failed Add questions');";
    echo "location.href = '../surveyUpdate.php?id=$survey_id';";
    echo "</script>";
}
    
?>