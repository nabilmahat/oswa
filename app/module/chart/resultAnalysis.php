<?php
    include "../../connection/connection.php";

    $questionID = $_POST["question_id"];
    $optionID = $_POST["option_id"];
        
    $surveyResult = "SELECT count(answers.id) as count_option
                        FROM answers                                
                        WHERE question_id = '".$questionID."'
                        AND option_id = '".$optionID."'; "; 
    

    $execSurveyResult = mysqli_query($conn, $surveyResult);
    $data = mysqli_fetch_array($execSurveyResult);
    
    echo $data["count_option"];

?>