<?php
session_start();
if (!isset($_SESSION['resetEmail']))
{
		header("Location:../login.php");
		exit();
}
else if(isset($_POST['password']))
{
	$email = $_SESSION['resetEmail'];
	include 'sqlLogin.php';
	$password = $_POST['password'];
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
	$password = better_crypt($password);
	mysqli_query($conn,"UPDATE ster_reg SET password='". $password ."' WHERE email='" . $email . "'");
	mysqli_close($conn);
}
?>
<html lang="en">
<head>
	<title>
		Whomii
	</title>
	<link rel="icon" href="../photos/ic.ico">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-filestyle.min.js"> </script>
	
	<script src = "scripts/script.js"></script>


	<!-- bootstraps code-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">	

		<!-- Bootstrap -->
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<script src="../js/bootstrap.min.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!--end of bootstraps code-->
	<link rel="stylesheet" type="text/css" href="../stylesheet.css">
</head>
<body style="background-color:#f8f8f8">
	<!--this div is black weaper to make login page-->
	
	<!-- login menu -->
		<div class="container">
			<div class="row">
			<div class="panel panel-default" style="z-index:1;opacity:0.9;" >
				<div class="col-md-12">
							


					<div class="wrap">
						<p class="form-title">
							Password reset
						</p>
							
						<form class="logreg" action="resetform.php" method="post">
						<input name="password" type="password" placeholder="New safe password" />
						<input type="submit" value="Reset" class="btn btn-success btn-sm" />
						</form>
						
						

						
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- end of login -->
		

		<!--page will be loladed here-->
</body>
</html>
