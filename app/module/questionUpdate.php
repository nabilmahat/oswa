<?php
include '../connection/connection.php';
$questionID = $_POST["question_id"];
$title = $_POST["title"];
$description = $_POST["description"];
$type = $_POST["type"];
$options = $_POST["option"];

// update questionpools
// delete optionpools by questionpools_id
// insert new optionpools

$updateQuestion = "UPDATE questionpools
                    SET title = '".$title."', description = '".$description."', type = '".$type."'
                    WHERE qID = '".$questionID."'; ";
$execUpdateQuestion = mysqli_query($conn, $updateQuestion);

if ($execUpdateQuestion) {

    $deleteOption = "DELETE FROM optionpools WHERE qID = '".$questionID."'; ";
    $execDeleteOption = mysqli_query($conn, $deleteOption);

    if ($execDeleteOption) {

        foreach($options as $oRow) {
            $addOption = "INSERT INTO optionpools (title , qID)
                    VALUES ('".$oRow."', '".$questionID."')";
            $execAddOption = mysqli_query($conn, $addOption);
        }
    }

    echo "<script>";
    echo "alert('Success Update questions');";
    echo "location.href = '../questionView.php?id=".$questionID."';";
    echo "</script>";

} else {
    echo "<script>";
    echo "alert('Failed Update questions');";
    echo "location.href = '../questionView.php?id=".$questionID."';";
    echo "</script>";
}
    
?>