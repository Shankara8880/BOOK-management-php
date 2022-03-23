<?php
session_start();
include("setting.php");

$uname = mysqli_real_escape_string($set,$_POST['aid']);
$pass=mysqli_real_escape_string($set,$_POST['pass']);

$sql=mysqli_query($set,"SELECT * FROM admin WHERE name='$uname' AND password='$pass'");
	if(mysqli_num_rows($sql)==1)
	{
        $row = mysqli_fetch_array($sql);

        $_SESSION['aid']=$row['aid'];
        header("location:adminhome.php");

	}
	else
	{
        $msg="Incorrect Details";
        header("location:admin.php?msg=".$msg);
	}
?>