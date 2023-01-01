<?php
include '../connection/connection.php';

$id = $_POST["id"];
$name = $_POST["name"];
$contact_number = $_POST["contact_number"];
$address = $_POST["address"];
$email = $_POST["email"];
$old_email = $_POST["old_email"];

if ($email != $old_email) {

    $checkEmail = "SELECT * FROM users WHERE email = '".$email."' ";
    $execCheckEmail = mysqli_query($conn, $checkEmail);

    if (mysqli_num_rows($execCheckEmail)!=0) {
        echo "<script>";
        echo "alert('Email already exist!');";
        echo "</script>"; 
    } else {
        $updateUser = "UPDATE users 
                        SET name = '".$name."', email = '".$email."', contact_number = '".$contact_number."', address = '".$address."' 
                        WHERE id = '".$id."' ";
        $execUpdateUser = mysqli_query($conn, $updateUser);
    }
} else {
    $updateUser = "UPDATE users 
                    SET name = '".$name."', email = '".$email."', contact_number = '".$contact_number."', address = '".$address."' 
                    WHERE id = '".$id."' ";
    $execUpdateUser = mysqli_query($conn, $updateUser);
}

echo "<script> alert('Success Update User');";
echo "location.href = '../userList.php';";
echo "</script>";
    
?>