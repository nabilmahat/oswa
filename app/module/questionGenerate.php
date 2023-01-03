<?php
include '../connection/connection.php';
include 'generateRandom.php';
$surveyID = $_POST["survey_id"];

if (isset($_POST["qID"])) {
    $questionIDs = $_POST["qID"];
    
    $deleteQuestion = "DELETE FROM questions WHERE survey_id = '".$surveyID."'";
    $execDeleteQuestion = mysqli_query($conn, $deleteQuestion); 

    if ($execDeleteQuestion) {
        $deleteOptions = "DELETE FROM options WHERE survey_id = '".$surveyID."'";
        $execDeleteOptions = mysqli_query($conn, $deleteOptions);
    }

    foreach ($questionIDs as $qPoolID) {
        $getQuestion = "SELECT * FROM questionpools WHERE qID = '".$qPoolID."'; ";
        $execGetQuestion = mysqli_query($conn, $getQuestion);

        if ($execGetQuestion) {
            $questionData = mysqli_fetch_array($execGetQuestion);

            $questionID = getRandomString();
            
            $insertQuestion = "INSERT INTO questions (title , description, type, survey_id, qID, question_id)
                                VALUES ('".$questionData["title"]."', '".$questionData["description"]."', '".$questionData["type"]."', '".$surveyID."', '".$questionData["qID"]."', '".$questionID."')";
            $execInsertQuestion = mysqli_query($conn, $insertQuestion);

            if ($execInsertQuestion) {

                $getOption = "SELECT * FROM optionpools WHERE qID = '".$questionData["qID"]."'; ";
                $execGetOption = mysqli_query($conn, $getOption);

                foreach ($execGetOption as $oData) {

                    $insertOption = "INSERT INTO options (title , description, question_id, survey_id)
                                        VALUES ('".$oData["title"]."', '".$oData["description"]."', '".$questionID."', '".$surveyID."')";
                    $execInsertQuestion = mysqli_query($conn, $insertOption);

                }
            }

        }
    }
        
    echo "<script>";
    echo "alert('Survey generated successfully!');";
    echo "location.href = '../surveyUpdate.php?id=".$surveyID."';";
    echo "</script>";

} else {    
    echo "<script>";
    echo "alert('Must select at least 1 question.');";
    echo "location.href = '../surveyUpdate.php?id=".$surveyID."';";
    echo "</script>";
}

// // $optionsD = $_POST["optionD"];
// $qCount = 1;
//     echo "<script>";
//     echo "alert('Failed Add questions');";
//     echo "location.href = '../questionList.php';";
//     echo "</script>";
    
?>