<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
	$username = $_POST['username'];	$name = $_POST['name'];
	$password = $_POST['password'];
	function better_crypt($input, $rounds = 10)
	  {
		$salt = "";
		$salt_chars = array_merge(range('A','Z'), range('a','z'), range(0,9));
		for($i=0; $i < 22; $i++) {
		  $salt .= $salt_chars[array_rand($salt_chars)];
		}
		return crypt($input, sprintf('$2a$%02d$', $rounds) . $salt);
	  }
	$password = better_crypt($password);
	$email = $_POST['email'];
	include 'sqlLogin.php';
	$result = mysqli_query($conn, "SELECT COUNT(username) FROM ster_reg WHERE username='".$username. "'");
	$isFound = False;
	while($row = mysqli_fetch_array($result)) {
		if ($row[0]!=0)
		{
			$isFound = True;
		}
		
	}
	

	if (!$isFound)
	{
		function generateRandomString($length = 10) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, strlen($characters) - 1)];
			}
			return $randomString;
		}
		$notfoundpic = true;
		while ($notfoundpic)
		{
			$picture = generateRandomString(20);
			$result = mysqli_query($conn, "SELECT COUNT(picture) FROM ster_reg WHERE picture='".$picture. "'");
			$notfoundpic = False;
			while($row = mysqli_fetch_array($result)) {
				if ($row[0]!=0)
				{
					$notfoundpic = True;
				}
				
			}
		}

		$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["photo"]["name"]);
$extension = end($temp);
if ((($_FILES["photo"]["type"] == "image/gif")
|| ($_FILES["photo"]["type"] == "image/jpeg")
|| ($_FILES["photo"]["type"] == "image/jpg")
|| ($_FILES["photo"]["type"] == "image/pjpeg")
|| ($_FILES["photo"]["type"] == "image/x-png")
|| ($_FILES["photo"]["type"] == "image/png"))
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["photo"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["photo"]["error"] . "<br>";
    }
  else
    {
    echo "Upload: " . $_FILES["photo"]["name"] . "<br>";
    echo "Type: " . $_FILES["photo"]["type"] . "<br>";
    echo "Size: " . ($_FILES["photo"]["size"] / 1024) . " kB<br>";
    echo "Temp file: " . $_FILES["photo"]["tmp_name"] . "<br>";
	$filetype = explode("/",$_FILES["photo"]["type"]);
	$picture .= "." . $filetype[1];
	mysqli_query($conn ,"INSERT INTO `ster_reg` (`username`, `name`, `password`, `email`, `picture`)
		VALUES ('$username', '$name', '$password', '$email', '$picture')") or die(mysqli_error($conn)); 
      move_uploaded_file($_FILES["photo"]["tmp_name"],"../photos/users/" . $picture);
	  }
	  }
	  else{
	  if (in_array($extension, $allowedExts))
	  {
		echo $_FILES["photo"]["name"] . "<br>";
	  }
	  else
	  {
		echo $_FILES["photo"]["name"] .  "<br>";
	  }
	  }
	  if (!isset($_FILES["photo"]))
	  {
	  echo "set";
	  }
			 
		    
		$_SESSION['username'] = $username;
		$_SESSION['add_answers'] = true;
		$_SESSION['alert'] = "Welcome to stereotype.com! you are now register as " . $username . ".";
		//print_r(explode("/",$_FILES["photo"]["type"]));
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