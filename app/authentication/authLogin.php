<?php
include "../connection/connection.php";

date_default_timezone_set('Asia/Kuala_Lumpur');

$date = date("Y-m-d H:i:s");
$dateString = date("YmdHis");

$id = mysqli_escape_string($conn,$_POST['email']);
$password = mysqli_escape_string($conn,$_POST['password']);

$queryUser = "SELECT * FROM users WHERE email = '".$id."' and password = '".$password."' ";

$result = mysqli_query($conn,$queryUser);
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);

$count = mysqli_num_rows($result);

if($count==1){

    $user_email = $row['email'];
    $username = $row['name'];
    $user_role = $row['role'];
    $user_id = $row['id'];

	// set username session
	$_SESSION['email'] = $user_email;
	$_SESSION['name'] = $username;
	$_SESSION['user_id'] = $user_id;

  	if($user_role=='1'){
    	
        // set user_role session
    	$_SESSION['role'] = $user_role;
    	// echo "success";
        echo "<script> alert('Successfully Login');";
		echo "location.href = '../index.php';";
		echo "</script>"; 
    } else if($user_role=='2'){
    	
        // set user_role session
    	$_SESSION['role'] = $user_role;
    	// echo "success";
        echo "<script> alert('Successfully Login');";
		echo "location.href = '../index.php';";
		echo "</script>"; 
    }
}
else
{
	// echo "failed";
    echo "<script> alert('Failed to Login');";
    echo "location.href = '../../login.php';";
    echo "</script>"; 
}

?>