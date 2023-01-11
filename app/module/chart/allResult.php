<?php
    include "../../connection/connection.php";
    
    $surveyID = $_POST["survey_id"];
    $questionID = $_POST["question_id"];
    $optionID = $_POST["option_id"];
    $gender = $_POST["gender"];

    if ($gender == 'all') {
        
    $surveyResult = "SELECT count(answers.id) as count_option
                        FROM answers                                
                        WHERE survey_id = '".$surveyID."'
                        AND question_id = '".$questionID."'
                        AND option_id = '".$optionID."'; "; 
    } else {

        ($gender == 'male') ? $gValue = 1 : $gValue = 2 ;

        $surveyResult = "SELECT count(answers.id) as count_option
                            FROM answers                                
                            WHERE survey_id = '".$surveyID."'
                            AND question_id = '".$questionID."'
                            AND option_id = '".$optionID."'
                            AND gender = '".$gValue."' "; 
    }

    $execSurveyResult = mysqli_query($conn, $surveyResult);
    $data = mysqli_fetch_array($execSurveyResult);
    
    echo $data["count_option"];

?>