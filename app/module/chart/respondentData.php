<?php
include "../../connection/connection.php";

$surveyID = $_POST["survey_id"];

$respondentData = "SELECT email, gender FROM answers
                    WHERE survey_id = '".$surveyID."'
                    GROUP BY email, gender;" ;
$execRespondentData = mysqli_query($conn, $respondentData);

$rows = array();
while($r = mysqli_fetch_assoc($execRespondentData)) {
    $rows[] = $r;
}
echo json_encode($rows);

?>