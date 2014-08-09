<?php
if($_POST['uname']=="laura.wharton@mail.huji.ac.il"){
if($_POST['p']=="Laura1984"){
setcookie("isthereapass", "yes", time()+36000);
}
}
header('Location: login.php');
?>