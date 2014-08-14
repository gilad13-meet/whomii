<?php
session_start();
if(!isset($_SESSION['username']))
{
	include 'sqlLogin.php';
	echo crypt($password, $_POST['password']);
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysqli_query($conn, "SELECT password FROM ster_reg WHERE username='" . $username . "'");
	if($row = mysqli_fetch_array($result)) {
		if (crypt($password,$row['password']) == $row['password'])
		{
			//$_SESSION['alert'] = "Wrong username or password!";
			$_SESSION['username'] = $username;
			header("Location:../index.php");
			exit();
		}
		
	}
	else 
	{
		$_SESSION['alert'] = "Wrong username or password!";
		header("Location:../index.php");
		exit();
	}
	
}

?>