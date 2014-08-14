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
									<li id="changepass"><a>Change password</a></li>
									<li id="changepic"><a href="#">Change profile picture</a></li>
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
	  		<div class="container">
			<div class="row">
			<div class="panel panel-default">
				<div class="col-md-12">
							


					<div class="wrap">
						<p class="form-title">
							Sign In
						</p>
							
						<form class="logreg" action="phpCode/signin.php" method="post">
						<input name="password" type="password" placeholder="Password" />
						<input type="submit" value="Sign In" class="btn btn-success btn-sm" />
						</form>
						
						
						<form id="reg" class="logreg back" action="phpCode/register.php" method="post" enctype="multipart/form-data">
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
						
						
						
						<input type="submit" value="change" class="btn btn-success btn-sm" />
						</form>
						
						</div>
					</div>
				</div>
			</div>
		</div>
		<!--page will be loladed here-->
		<div id="page">
		</div>
		
</body>
</html>