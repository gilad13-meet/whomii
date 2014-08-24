<?php
session_start();
if(isset($_SESSION['username']))
{
	$string = "";
	$isfirst = true;
	foreach($_POST as $question)
	{
		if (!$first)
		{
			$question.=",";
		}
		$string .= $question;		
	}
	include 'sqlLogin.php';
	mysqli_query($conn,"UPDATE ster_reg SET answers='". $string ."', filled_ask='1'  WHERE username='" . $_SESSION['username'] . "'");
	mysqli_close($conn);
	if(isset($_SESSION['add_answers']))
	{
		unset($_SESSION['add_answers']);
	}
	header("Location:../index.php");
}
?>