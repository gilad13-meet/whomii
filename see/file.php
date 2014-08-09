<html>
<body>
<form action="thefile.php" method="POST">

<TEXTAREA name="text" rows="10" cols="50">
<?php
$v=$_POST['page'];
$mysql_host = "MainText1.db.6042894.hostedresource.com";
$mysql_database = "MainText1";
$mysql_user = "MainText1";
$mysql_password = "Ddkkggss98@";
mysql_connect($mysql_host,$mysql_user,$mysql_password);
mysql_select_db($mysql_database);
$query = "SELECT * FROM `text`";
$result = mysql_query($query) or die(mysql_error());
while($w=mysql_fetch_array($result)) {
if ($w['textname'] == $v){
$z=$w['text'];
}}
echo $z;
setcookie("page", $v, time()+36000);
?>
</textarea></p>
<input type="submit" value="Send"><input type="reset" value="Clear">
</form>
</body>
</html>
</html>