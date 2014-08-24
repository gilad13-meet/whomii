<?php
session_start();
// if (isset($_SESSION['add_answers']))
// {
// unset($_SESSION['add_answers']);
// header("Location:../index.php");
// }
?>
<html>
<head>
	<title>
		Whomii
	</title>
	<link rel="icon" href="../photos/ic.ico">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script type="text/javascript" src="../js/bootstrap-filestyle.min.js"> </script>
	
	<script src = "scripts/script.js"></script>
	<script src = "scripts/changepage.js"></script>


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
<body id="in">
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
			  <ul class="nav navbar-nav navbar-right">
			  			  <?php
							$dir = "../photos/users";
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
									echo "<li><img id='headerphoto' src='../photos/users/" . $photo . "'></li>";
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
									<li><a href="../phpCode/logout.php">Sign out</a></li>
								  </ul>
								</li>
			  </ul>
			</div><!--/.nav-collapse -->
		  </div>
		</div>
		  <div class="container">
				
				
					<div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="../phpCode/setAnswer.php" method="post">
          <fieldset>
            <legend class="text-center">Basic questions</legend>
    
    
							<?php 
				 include '../phpCode/sqlLogin.php';
				 $result = mysqli_query($conn, "SELECT question, answer_type FROM whomii_questions WHERE must = '1'");
				 while($row = mysqli_fetch_array($result))
				 {
					$type = explode(", " , $row['answer_type']);
					 if ($type[0] == "String")
					 {
						echo '            <div class="form-group">
              <label class="col-md-3 control-label" for="name">'. $row['question'] .'</label>
              <div class="col-md-9">
                <input name="'. $row['question'] .'" type="text" placeholder="' . $row['question'] . '" class="form-control">
              </div>
            </div>';
					 }
					 else if ($type[0] == "bigTextarea")
					 {
						echo '            <div class="form-group">
              <label class="col-md-3 control-label" for="name">'. $row['question'] .'</label>
              <div class="col-md-9">
                <textarea style="height: 100px;" id="name" name="'. $row['question'] .'" type="text" placeholder="' . $row['question'] . '" class="form-control textarea"></textarea>
              </div>
            </div>';
					 }
					 else if ($type[0] == "textarea")
					 {
						echo '            <div class="form-group">
              <label class="col-md-3 control-label" for="name">'. $row['question'] .'</label>
              <div class="col-md-9">
                <textarea id="name" name="'. $row['question'] .'" type="text" placeholder="' . $row['question'] . '" class="form-control"></textarea>
              </div>
            </div>';
					 }
					 else if ($type[0] == "int")
					 {
						 						echo '            <div class="form-group">
              <label class="col-md-3 control-label" for="name">'. $row['question'] .'</label>
              <div class="col-md-9">
                <input id="name" name="'. $row['question'] .'" type="number" placeholder="' . $row['question'] . '" class="form-control">
              </div>
            </div>';
					 }
					 else if ($type[0] == "option")
					 {
						
						echo '    <div class="form-group">
								  <label class="col-md-3 control-label" for="name">'. $row['question'] .'</label>
								  <div class="col-md-9">
									';
						 echo "<select class='form-control' name='" . $row['question'] ."'>";
						 for ($i=1;$i<sizeof($type);$i++)
						 {
							 echo "<option value='". $type[$i] ."'>" . $type[$i] . "</option>";
						 }
						 echo "</select>";
						 echo '</div></div>';
					 }
				 }
				?>
			<div class="form-group">
              <div class="col-md-12">
                <button type="submit" class="btn btn-primary btn-lg" style="
    margin-right: 60px;
">Submit</button>
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
		</div>
	<script>
	$(document).ready(function () 
{
	alert("hello user!\nbefore you can start stereotyping, you need to fill this form");
});
	</script>
	</body>
</html>