<?php
session_start();
	if (!isset($_SESSION['username']))
	{
	$email = $_POST['email'];
	include 'sqlLogin.php';
	if (mysqli_connect_errno()) {
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	$result = mysqli_query($conn, "SELECT COUNT(email) FROM ster_reg WHERE email='".$email. "'");
	$row = mysqli_fetch_array($result);
	if ($row[0]!=0)
	{
		// Check connection

		function getRandomString($length) {
			$validCharacters = "abcdefghijklmnopqrstuxyvwzABCDEFGHIJKLMNOPQRSTUXYVWZ+-*#&@!?";
			$validCharNumber = strlen($validCharacters);
		 
			$result = "";
		 
			for ($i = 0; $i < $length; $i++) {
				$index = mt_rand(0, $validCharNumber - 1);
				$result .= $validCharacters[$index];
			}
		 
			return $result;
		}
		
		function better_crypt($input, $rounds = 10)
		  {
			$salt = "";
			$salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
			for($i=0; $i < 22; $i++) {
			  $salt .= $salt_chars[array_rand($salt_chars)];
			}
			return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
		  }
		$str = getRandomString(25);
		$strHashed = better_crypt();
		
		mysqli_query($conn,"UPDATE ster_reg SET new_password='". $strHashed ."' WHERE email='" . $email . "'");
		mysqli_close($conn);

		$to      =  $email;
		$subject = 'Reset your password';
		$message = 'hello, to reset your password, please enter the following link:
' . $str;
		$headers = 'From: noreply@whomii.com';

		mail($to, $subject, $message, $headers);
		
		$_SESSION['alert'] = "An confirmation email was sent";
		header("Location:../login.php");
		exit();
	}
		
	else
	{
				mysqli_close($conn);
				$_SESSION['alert'] = "Email not registered";
				header("Location:../login.php");
				exit();
	}
	}
?>