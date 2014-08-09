<?php
$allowedExts = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["photo"]["name"]);
$extension = end($temp);
if ((($_FILES["photo"]["type"] == "image/gif")
|| ($_FILES["photo"]["type"] == "image/jpeg")
|| ($_FILES["photo"]["type"] == "image/jpg")
|| ($_FILES["photo"]["type"] == "image/pjpeg")
|| ($_FILES["photo"]["type"] == "image/x-png")
|| ($_FILES["photo"]["type"] == "image/png"))
&& ($_FILES["photo"]["size"] < 20000000)
&& in_array($extension, $allowedExts))
  {
  if ($_FILES["photo"]["error"] > 0)
    {
    echo "Return Code: " . $_FILES["photo"]["error"] . "<br>";
    }
  else
    {
    if (file_exists("articles_photos/" . $_FILES["photo"]["name"]))
      {
      echo $_FILES["photo"]["name"] . " already exists. ";
      }
    else
      {
        move_uploaded_file($_FILES["photo"]["tmp_name"], "articles_photos/" . $_FILES["photo"]["name"]);

	$photo_name = $_FILES['photo']['name'];

	$mysql_host = "MainText1.db.6042894.hostedresource.com";
	$mysql_database = "MainText1";
	$mysql_user = "MainText1";
	$mysql_password = "Ddkkggss98@";
	$url = $_POST['url'];
	$lan = $_POST['language'];
	$name = $_POST['name'];

	$conn = mysql_connect($mysql_host,$mysql_user,$mysql_password);
	mysql_select_db($mysql_database);

	if (mysql_query ("INSERT INTO `articles` (`link_name`, `link_url`, `link_lang`, `link_photo_name`) VALUES('$name', '$url', '$lan', '$photo_name')") or die(mysql_error())){
	echo "done!";
	echo '<a href="articles_insert.php"> go back to upload page</a>';
	}
      }
    }
  }
else
  {
  echo "Invalid file";
  }
?>
