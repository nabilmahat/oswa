<?php
include "../../connection/connection.php";

$surveyID = $_POST["survey_id"];

$questionResult = "SELECT * FROM questions WHERE survey_id = '".$surveyID."'; ";
$execQuestionResult = mysqli_query($conn, $questionResult);

$rows = array();
while($r = mysqli_fetch_assoc($execQuestionResult)) {
    $rows[] = $r;
}
echo json_encode($rows);

?>