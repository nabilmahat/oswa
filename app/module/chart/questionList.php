<?php
include "../../connection/connection.php";

$surveyID = $_POST["survey_id"];

$questionResult = "SELECT *
                    FROM questions
                    WHERE survey_id = '".$surveyID."';";                    
$execQuestionResult = mysqli_query($conn, $questionResult);

$questionArray = array();

foreach ($execQuestionResult as $qRow) {
    $qData = new stdClass();
    $qData->title = $qRow["title"];
    $qData->description = $qRow["description"];
    $qData->survey_id = $qRow["survey_id"];
    $qData->qID = $qRow["qID"];
    $qData->question_id = $qRow["question_id"];

    $optionResult = "SELECT *
                        FROM options
                        WHERE question_id = '".$qRow["question_id"]."'; ";
    $execOptionResult = mysqli_query($conn, $optionResult);

    $optionArray = array();

    foreach ($execOptionResult as $oRow) {
        $oData = new stdClass();
        $oData->id = $oRow["id"];
        $oData->title = $oRow["title"];
        $oData->description = $oRow["description"];
        $oData->survey_id = $oRow["survey_id"];
        $oData->question_id = $oRow["question_id"];

        array_push($optionArray, $oData);
    }

    $qData->option_data = $optionArray;

    array_push($questionArray, $qData);
}

// $rows = array();
// while($r = mysqli_fetch_assoc($execQuestionResult)) {
//     $rows[] = $r;
// }

echo json_encode($questionArray);

?>