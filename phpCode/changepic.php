<?php
	$dir = "../photos/users";
	$dh  = opendir($dir);
	while (false !== ($filename = readdir($dh))) {
	  $files[] = $filename;
	}
	//now, do stuf with files
	$found = false;
	foreach($files as $photo)
	{
		if (!$found)
		{
			$name = explode(".", $photo);
			if ( $name[0] == $_SESSION['username'])
			{
				$picname = $photo;
				$found = true;
			}
		}
	}
	if ($found)
	{	chown($dir . "/" . $picname, 666);
		unlink($dir . "/" . $picname);
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
		  move_uploaded_file($_FILES["photo"]["tmp_name"],"../photos/users/" . $username . "." . $filetype[1]); 
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
	  }
?>