<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
	$username = $_POST['username'];	$name = $_POST['name'];
	$password = md5($_POST['password']);
	$email = $_POST['email'];
	$mysql_host = "MainText1.db.6042894.hostedresource.com";
	$mysql_database = "MainText1";
	$mysql_user = "MainText1";
	$mysql_password = "Ddkkggss98@";
	$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database);
	
	$result = mysql_query("SELECT * FROM `ster_reg`");
	$isFound = False;
	while($row = mysql_fetch_array($result)) {
		if ($row['username']==$username)
		{
			$isFound = True;
		}
		
		else if($row['email']==$email)
		{
			$isFound = True;
		}
	}
	if (!$isFound)
	{
		mysql_query("INSERT INTO `ster_reg` (`username`, `name`, `password`, `email`)
		VALUES ('$username', '$name', '$password', '$email')") or die(mysql_error()); 
		$_SESSION['username'] = $username;
		$_SESSION['alert'] = "Welcome to stereotype.com! you are now register as " . $username . ".";
		echo $_SESSION['alert'];
		header("Location:../index.php");
		exit();
	}
	
	else
	{
		$_SESSION['alert'] = "Username/ email already taken!";
		header("Location:../index.php");
		exit();
	}
	mysql_close($conn);}
	else
	{
	echo "not allowed";
	}
?>