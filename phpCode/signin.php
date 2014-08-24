<?php
session_start();
if(!isset($_SESSION['username']))
{
	include 'sqlLogin.php';
	$username = $_POST['username'];
	$password = $_POST['password'];
	$result = mysqli_query($conn, "SELECT password, answers, filled_ask FROM ster_reg WHERE username='" . $username . "'");
	if($row = mysqli_fetch_array($result)) {
		if (crypt($password,$row['password']) == $row['password'])
		{
			if ($row['filled_ask'] == "0")
			{
				$_SESSION['add_answers'] = true;
			}
			$_SESSION['username'] = $username;
			header("Location:../index.php");
			exit();
		}
		else
		{
			$_SESSION['alert'] = "Wrong username or password!";
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