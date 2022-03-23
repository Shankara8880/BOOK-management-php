<?php
	include("setting.php");
	session_start();
	if(!isset($_SESSION['aid']))
	{
		header("location:index.php");
	}
	$aid=$_SESSION['aid'];

	$stud=$_GET['stud'];
	mysqli_query($set,"DELETE FROM students WHERE id='$stud'");
	header("location:manageStud.php");
?>