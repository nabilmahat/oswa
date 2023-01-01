<?php
include '../connection/connection.php';

$name = $_POST["name"];
$contact_number = $_POST["contact_number"];
$address = $_POST["address"];
$email = $_POST["email"];
$role = $_POST["role"];
$password = $_POST["password"];
$confirm_password = $_POST["confirm_password"];

$checkEmail = "SELECT * FROM users WHERE email = '".$email."' ";
$execCheckEmail = mysqli_query($conn, $checkEmail);

if ($password == $confirm_password) {
    if (mysqli_num_rows($execCheckEmail)!=0) {
        echo "<script>";
        echo "alert('Email already exist!');";
        echo "location.href = '../userAdd.php';";
        echo "</script>"; 
    } else {
        $addUser = "INSERT INTO users (name , email, contact_number, address, password, role)
                        VALUES ('".$name."', '".$email."', '".$contact_number."', '".$address."', '".$password."', '".$role."')";
        $execAddUser = mysqli_query($conn, $addUser);

        echo "<script> alert('Success Add User');";
        echo "location.href = '../userList.php';";
        echo "</script>";
    } 
} else {
    echo "<script> alert('Password do not match');";
    echo "location.href = '../userAdd.php';";
    echo "</script>";
}
    
?>