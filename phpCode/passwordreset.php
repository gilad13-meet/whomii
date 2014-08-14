<?php
session_start();
if (!isset($_SESSION['username']))
{
	$code = $_GET['code'];
	$email = $_GET['email'];
	include 'sqlLogin.php';
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$result = mysqli_query($conn, "SELECT new_password FROM ster_reg WHERE email='".$email. "'");
	$row = mysqli_fetch_array($result);
	if (crypt($code,$row['new_password']) == $row['new_password'])
	{
		$_SESSION['resetEmail'] = $email;
		header("Location:resetform.php");
		exit();
	}
	else
	{
		echo "cool1";
		$_SESSION['alert'] = "Don't try me buddy!";
		header("Location:../login.php");
		exit();
	}
}

else
{
	echo "cool";
	$_SESSION['alert'] = "You are not allowed to enter here!";
	header("Location:../login.php");
	exit();
}
?>