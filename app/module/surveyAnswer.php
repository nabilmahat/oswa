<?php
include '../connection/connection.php';
if (isset($_POST["survey_id"])) {   

    $survey_id = $_POST["survey_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $gender = $_POST["gender"];

    $checkUser = "SELECT * FROM answers WHERE survey_id = '".$survey_id."' AND email = '".$email."'; ";
    $execCheckUser = mysqli_query($conn, $checkUser);
    $userCount = mysqli_num_rows($execCheckUser);
    
    if ($userCount>0) {
        echo "<script>";
        // echo "console.log('".$survey_id."');";
        // echo "console.log('".count($surveyRow)."');";
        echo "alert('You already respond to this survey');";
        echo "location.href = '../../index.php';";
        echo "</script>";
    } else {

        $querySurvey = "SELECT * FROM surveys WHERE id = '".$survey_id."'";
        $execQuerySurvey = mysqli_query($conn, $querySurvey);
        $surveyRow = mysqli_num_rows($execQuerySurvey);

        if ($surveyRow == 1) {

            $queryQuestion = "SELECT * FROM questions WHERE survey_id = '".$survey_id."' ";
            $execQueryQuestion = mysqli_query($conn, $queryQuestion);

            foreach ($execQueryQuestion as $qRow) {

                $answerData = $_POST[$qRow['question_id']];

                if ($qRow['type'] == 1) {
                    $insertAnswer = "INSERT INTO answers (survey_id, question_id, option_id, name, email, gender)
                                        VALUES ('".$survey_id."', '".$qRow['question_id']."', '".$answerData."', '".$name."', '".$email."', '".$gender."'); ";
                    $exectInsertAnswer = mysqli_query($conn, $insertAnswer);
                } else {

                    foreach ($answerData as $aRow) {

                        $insertAnswer = "INSERT INTO answers (survey_id, question_id, option_id, name, email, gender)
                                            VALUES ('".$survey_id."', '".$qRow['question_id']."', '".$aRow."', '".$name."', '".$email."', '".$gender."'); ";
                        $exectInsertAnswer = mysqli_query($conn, $insertAnswer);
                    
                    }
                }

            }            

            $updateRespond = "UPDATE surveys SET respond = respond + 1 WHERE id = '".$survey_id."'";
            $execUpdateRespond = mysqli_query($conn, $updateRespond);

            echo "<script>";
            // echo "console.log('".$survey_id."');";
            // echo "console.log('".count($surveyRow)."');";
            echo "alert('Success Respond to Survey');";
            echo "location.href = '../../survey-result.php?id=".$survey_id."';";
            echo "</script>";

        } else {
            echo "<script>";
            echo "console.log('".$survey_id."');";
            echo "console.log('".count($surveyRow)."');";
            echo "console.log('Invalid Survey');";
            echo "location.href = '../../index.php';";
            echo "</script>";
        }
    }
} else {
    echo "<script>";
    echo "console.log('Please provide survey id');";
    echo "location.href = '../../index.php';";
    echo "</script>";
}
    
?>