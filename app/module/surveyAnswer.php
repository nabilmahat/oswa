<?php
include '../connection/connection.php';
if (isset($_POST["survey_id"])) {   

    $survey_id = $_POST["survey_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    $querySurvey = "SELECT * FROM surveys WHERE id = '".$survey_id."'";
    $execQuerySurvey = mysqli_query($conn, $querySurvey);
    $surveyRow = mysqli_num_rows($execQuerySurvey);

    if ($surveyRow == 1) {

        $queryQuestion = "SELECT * FROM questions WHERE survey_id = '".$survey_id."' ";
        $execQueryQuestion = mysqli_query($conn, $queryQuestion);

        foreach ($execQueryQuestion as $qRow) {

            $answerData = $_POST[$qRow['id']];

            if ($qRow['type'] == 1) {
                $insertAnswer = "INSERT INTO answers (survey_id, question_id, option_id, name, email, gender)
                                    VALUES ('".$survey_id."', '".$qRow['id']."', '".$answerData."', '".$name."', '".$email."', '".$gender."'); ";
                $exectInsertAnswer = mysqli_query($conn, $insertAnswer);
            } else {

                foreach ($answerData as $aRow) {

                    $insertAnswer = "INSERT INTO answers (survey_id, question_id, option_id, name, email, gender)
                                        VALUES ('".$survey_id."', '".$qRow['id']."', '".$aRow."', '".$name."', '".$email."', '".$gender."'); ";
                    $exectInsertAnswer = mysqli_query($conn, $insertAnswer);
                
                }
            }

        }

        echo "<script>";
        // echo "console.log('".$survey_id."');";
        // echo "console.log('".count($surveyRow)."');";
        echo "alert('Success Respond to Survey');";
        echo "location.href = '../../index.php';";
        echo "</script>";

    } else {
        echo "<script>";
        echo "console.log('".$survey_id."');";
        echo "console.log('".count($surveyRow)."');";
        echo "console.log('Invalid Survey');";
        echo "location.href = '../../index.php';";
        echo "</script>";
    }

//     echo "<script>";
//     echo "alert('Failed Add questions');";
//     echo "location.href = '../surveyUpdate.php?id=$survey_id';";
//     echo "</script>";
} else {
    echo "<script>";
    echo "console.log('Please provide survey id');";
    echo "location.href = '../../index.php';";
    echo "</script>";
}
    
?>