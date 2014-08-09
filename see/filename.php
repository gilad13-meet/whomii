<html>
<body align="center">
<?php
if (isset($_COOKIE["isthereapass"])){
echo'
<form action="textarea.php" method="POST">
  <input type="radio" name="page" value="Academia"> Academia<br>
  <input type="radio" name="page" value="CityCouncil"> City Council<br>
  <input type="radio" name="page" value="Family"> Family<br>
<input type="submit" value="Submit">
</form>
';
}
else{
echo 'you cant enter this page!';
}
?>
</body>
</html>