<?php
include '../connection/connection.php';

$id = $_GET["id"];

$checkEmail = "SELECT * FROM users WHERE id = '".$id."' ";
$execCheckEmail = mysqli_query($conn, $checkEmail);

if (mysqli_num_rows($execCheckEmail) == 1) {

    $deleteUser = "DELETE FROM users WHERE id = '".$id."'";
    $execDeleteUser = mysqli_query($conn, $deleteUser);

    echo "<script>";
    echo "alert('Success Delete User');";
    echo "location.href = '../userList.php';";
    echo "</script>"; 
} else {
    echo "<script>";
    echo "alert('User not exist!');";
    echo "location.href = '../userList.php';";
    echo "</script>"; 
} 

?>