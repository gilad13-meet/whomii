<?php

session_start();
if(!isset($_SESSION['username']))
{
	$username = $_POST['username'];
	$password = md5($_POST['password']);
	$mysql_host = "MainText1.db.6042894.hostedresource.com";
	$mysql_database = "MainText1";
	$mysql_user = "MainText1";
	$mysql_password = "Ddkkggss98@";
	$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database);
	
	$result = mysql_query("SELECT * FROM `ster_reg`");
	$isFound = False;
	while($isFound == False and $row = mysql_fetch_array($result)) {
		if ($row['username']==$username && $row['password'] == $password)
		{
			$isFound = True;
			$_SESSION['username'] = $username;
			header("Location:../index.php");
			echo $_SESSION['username'] ;
			exit();
		}
		
	}
	
}

?>