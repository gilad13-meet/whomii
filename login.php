<!DOCTYPE html>
<?PHP

session_start();
if (isset($_SESSION['username']))
{
		header("Location:../index.php");
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
<body>
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
				
			  </ul>
			  <ul class="nav navbar-nav navbar-right">
<li id="login"><a id=login" href="#">Login</a></li>
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
							
						<form class="logreg" action="phpCode/signin.php" method="post">
						<input name="username" type="text" placeholder="Username" />
						<input name="password" type="password" placeholder="Password" />
						<input type="submit" value="Sign In" class="btn btn-success btn-sm" />
						<div class="remember-forgot">
							<div class="row">
								<div class="col-md-6">
									<div class="checkbox">
											<a class="forgot-pass register"> Register</a>
									</div>
								</div>
								<div class="col-md-6 forgot-pass-content">
									<a class="forgot-pass" id="forgot">Forgot Password</a>
								</div>
							</div>
						</div>
						</form>
						
						
						<form class="logreg forgot" action="phpCode/reset.php" method="post">
						<input name="email" type="email" placeholder="Your account email address" style="margin-top:10px;"/>
						<input type="submit" value="Reset" class="btn btn-success btn-sm" />
						<div class="remember-forgot">
						</div>
						</form>
						
						<form id="reg" class="logreg back" action="phpCode/register.php" method="post" enctype="multipart/form-data">
						<input name="name" type="text" placeholder="Name" />
						<input name="username" type="text" placeholder="Username" />
						<input name="password" type="password" placeholder="Password" /><br>
						<input name="email" id="email" type="email" placeholder="Email" /><br>

<!--<input value="upload image" type="file" id="files" name="files" />-->
<div id="fileupload" style="height:50px;">
<input name ="photo" type="file" class="filestyle" data-classButton="btn btn-primary" data-input="false" data-classIcon="icon-plus" data-buttonText="Upload image" id = "photo">
<output id="list"></output>
</div>

<script>
// The following script makes the photo that was chosen from form load next to it
  function handleFileSelect(evt) {
	$("#list").html("");
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img class="thumb" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('photo').addEventListener('change', handleFileSelect, false);
</script>
						
						
						
						<input type="submit" value="Register" class="btn btn-success btn-sm" />
						</form>
						
						</div>
					</div>
				</div>
			</div>
		</div>
	<!-- end of login -->
		
		<div id="page" style = "background-color:#E6E6E6 ;width:100%;height:500px;text-align:center;position:absolute;opacity:1;">
		<h1 style="width:750px;font-size:60px;color:#000099 ;margin:auto;margin-top:70px;"><em><b>Welcome to whomii.com!</em></b></h1>
		<br>
		<table style="width:900px;margin:auto;">
		<tr><td>
		<p style="margin-top:50px;font-size:20px;text-align:left;width:500px;">Whomii helps you understand what people think<br> about you at first sight</p>
		
		</td>
		<td>
		<img style=""src="photos/stereotypes.jpg"/>
		</td>
		</tr>
		</table>
		<div>
		<a href="#" class="btn btn-success btn-large register" style="margin-top:50px;height:50px;width:200px;font-size:25px;"><i class="icon-white icon-heart"></i> Register</a>
</div>
<div style="
position:absolute;
	width: 0; 
	height: 0; 
	border-left: 40px solid transparent;
	border-right: 40px solid transparent;
	left:50%;
	margin-left:-400px;
	border-bottom: 40px solid white;
	bottom:0;
">
</div>
		<table style="float:right;margin-right:50%;margin-top:150px;">
		<tr style="text-align:left">
		
		<?php
		include 'phpCode/sqlLogin.php';
		$result = mysqli_query($conn, "SELECT COUNT(id) FROM ster_reg");
		$row = mysqli_fetch_array($result);
		$arr = array();
		while (sizeof($arr)<15)
		{
			$num = rand(0, $row['0'] - 1);
			$found = false;
			foreach ($arr as $picNum)
			{
				if ($picNum==$num)
				{
					$found = true;
				}
			}
			
			if (!$found)
			{
				$arr[sizeof($arr)] = $num;
				$result = mysqli_query($conn, "SELECT picture FROM ster_reg WHERE id='" . $num . "'");
				$row = mysqli_fetch_array($result);
				echo "<td style='display:inline-block;'><div style='margin-left:0px;width:50px;height:50px;background-image:url(photos/users/" . $row['picture'] . "); background-size: cover; background-position: 50%'/></td>";

				
			}
		}
		?>
		
		
		</tr></table>
		</div>

		<!--page will be loladed here-->
</body>
</html>