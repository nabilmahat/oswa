<?php
include "../../connection/connection.php";

$surveyID = $_POST["survey_id"];
$questionID = $_POST["question_id"];

$surveyResult = "SELECT count(answers.id) as count_option, answers.option_id, answers.survey_id, options.title FROM oswa.answers
                    INNER JOIN options
                    ON answers.option_id = options.id
                    WHERE answers.survey_id = '".$surveyID."' AND answers.question_id = '".$questionID."' GROUP BY answers.option_id; ";
$execSurveyResult = mysqli_query($conn, $surveyResult);

$rows = array();
while($r = mysqli_fetch_assoc($execSurveyResult)) {
    $rows[] = $r;
}
echo json_encode($rows);

?>