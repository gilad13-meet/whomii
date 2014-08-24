<?php
session_start();
if(isset($_SESSION['username']))
	{
		$username = $_SESSION['username'];
		include 'sqlLogin.php';
		$result = mysqli_query($conn, "SELECT password FROM ster_reg WHERE username='" . $username . "'");
		//echo mysqli_fetch_array($result);
		
		if($row = mysqli_fetch_array($result)) {
			echo crypt($_POST['oldpass'],$row['password']) . "<BR><BR>";
			echo $row['password'];
			if (crypt($_POST['oldpass'],$row['password']) == $row['password'])
			{
				function better_crypt($input, $rounds = 10)
				{
					$salt = "";
					$salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
					for($i=0; $i < 22; $i++) 
					{
					  $salt .= $salt_chars[array_rand($salt_chars)];
					}
					return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
				}
				$password = better_crypt($_POST['password']);
				
				mysqli_query($conn,"UPDATE ster_reg SET password='". $password ."' WHERE username='" . $username . "'");
				mysqli_close($conn);
				$_SESSION['alert'] = "password changed!";
				header("Location:../index.php");
				exit();
			}
			else
			{
				$_SESSION['alert'] = "Wrong password!";
				header("Location:../index.php");
				exit();
			}
		}
		else
		{
			$_SESSION['alert'] = "Wrong password!";
			header("Location:../index.php");
			exit();
		}
	}
else{
		header("Location:../login.php");
		exit();
}
?>