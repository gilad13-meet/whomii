<!DOCTYPE html>
<html lang="en">
<head>
	<title>
		Stereotype
	</title>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
	<script src = "scripts/script.js"></script>
		

	<!-- bootstraps code-->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">	

		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<script src="js/bootstrap.min.js"></script>

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	<!--end of bootstraps code-->
</head>
<body>
<?php
		session_start();
		if (isset( $_SESSION['alert']))
		{
			echo 
			"<script>
			$(document).ready(function () 
			{
				alert('" . $_SESSION['alert'] . "');";
			 echo "});</script>";
			 unset($_SESSION['alert']);
		}
	?>
	<!--this div is black weaper to make login page-->
	<div id="wrw"></div>
	
	<!-- bootstraps menu -->
		<!-- Fixed navbar -->
		<div class="navbar-default navbar-fixed-top navbar" role="navigation">
		  <div class="container">
			<div class="navbar-header">
			  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			  </button>
			  <a class="navbar-brand">Stereotype</a>
			</div>
			<div class="navbar-collapse collapse">
			  <ul class="nav navbar-nav">
				<li class="active"><a href="#">Home</a></li>
				<li><a href="#about">About</a></li>
				<li><a href="#contact">Contact</a></li>

			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			  			  <?php
							if (isset($_SESSION['username']))
							{
								echo '
									<li class="dropdown">
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $_SESSION['username'] . '<span class="caret"></span></a>
								  <ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="dropdown-header">Nav header</li>
									<li><a href="#">Separated link</a></li>
									<li><a href="phpCode/logout.php">Sign out</a></li>
								  </ul>
								</li>
								';
							}
							else
							{
								echo '<li id="login"><a id=login" href="#">Login</a></li>';
							}
						  ?>

			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</div>
	<!-- end of bootstraps menu -->
	  
	<!-- login menu -->
		<div class="container">
			<div class="row">
			<div class="panel panel-default">
				<div class="col-md-12">
							


					<div class="wrap">
						<p class="form-title">
							Sign In
						</p>
							
						<form class="logreg" id="login" action="phpCode/signin.php" method="post">
						<input name="username" type="text" placeholder="Username" />
						<input name="password" type="password" placeholder="Password" />
						<input type="submit" value="Sign In" class="btn btn-success btn-sm" />
						<div class="remember-forgot">
							<div class="row">
								<div class="col-md-6">
									<div class="checkbox">
											<a class="forgot-pass" id="register"> Register</a>
									</div>
								</div>
								<div class="col-md-6 forgot-pass-content">
									<a class="forgot-pass" id="forgot">Forgot Password</a>
								</div>
							</div>
						</div>
						</form>
						
						<form id="reg" class="logreg back" action="phpCode/register.php" method="post">
						<input name="name" type="text" placeholder="name" />
						<input name="username" type="text" placeholder="Username" />
						<input name="password" type="password" placeholder="Password" /><br>
						<input name="email" id="email" type="email" placeholder="Email" /><br>
						
						
						
						<input type="submit" value="Register" class="btn btn-success btn-sm" />
						</form>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- end of login -->
	
		<div id = "mainPage">
			 <h1>Main Page</h1>	
		</div>	
</body>
</html>