<!DOCTYPE html>
<?PHP

session_start();
if (!isset($_SESSION['username']))
{
		header("Location:login.php");
		exit();
}
?>
<html lang="en">
<head>
	<title>
		Whomii
	</title>
	<link rel="icon" href="photos/ic.ico">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
	
	<script src = "scripts/script.js"></script>
	<script src = "scripts/changepage.js"></script>


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
	<link rel="stylesheet" type="text/css" href="stylesheet.css">
</head>
<body id="in">
<?php
		
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
			  <a id="whomii" class="navbar-brand">Whomii</a>
			</div>
			<div class="navbar-collapse collapse">
			  <ul class="nav navbar-nav">
				<li class="pages active" name="home" id ="home"><a>Home</a></li>
				<li class="pages" name="about" id="about"><a>About</a></li>
				<li class="pages" name="contact" id="contact"><a> Contact</a></li>

			  </ul>
			  <ul class="nav navbar-nav navbar-right">
			  			  <?php
							$dir = "photos/users";
							$dh  = opendir($dir);
							while (false !== ($filename = readdir($dh))) {
							  $files[] = $filename;
							}
							//now, do stuf with files
							foreach($files as $photo)
							{
								$name = explode(".", $photo);
								if ( $name[0] == $_SESSION['username'])
								{
									echo "<li><img id='headerphoto' src='photos/users/" . $photo . "'></li>";
								}
							}
							echo '							<li class="dropdown">
							
								  <a href="#" class="dropdown-toggle" data-toggle="dropdown">' . $_SESSION['username'] . '<span class="caret"></span></a>';
							
						  ?>

								  <ul class="dropdown-menu" role="menu">
									<li><a href="#">Action</a></li>
									<li><a href="#">Another action</a></li>
									<li><a href="#">Something else here</a></li>
									<li class="divider"></li>
									<li class="dropdown-header"></li>
									<li><a href="#">Settings</a></li>
									<li><a href="phpCode/logout.php">Sign out</a></li>
								  </ul>
								</li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</div>
	<!-- end of bootstraps menu -->
	  
		<!--page will be loladed here-->
		<div id="page">
		</div>
		
</body>
</html>