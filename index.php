<?php
	include("setting.php");
	session_start();
	if(isset($_SESSION['sid']))
	{
		header("location:home.php");
	}
	$sid=mysqli_real_escape_string($set,$_POST['sid']);
	$pass=mysqli_real_escape_string($set,$_POST['pass']);

	if($sid==NULL || $_POST['pass']==NULL)
	{
		//
	}
	else
	{
		$p=sha1($pass);
		$sql=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid' AND password='$p'");
		if(mysqli_num_rows($sql)==1)
		{
			$_SESSION['sid']=$_POST['sid'];
			header("location:home.php");
		}
		else
		{
			$msg="Incorrect Details";
		}
	}
?>
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title>Library Management System</title>
		<link href="stylesheet.css" rel="stylesheet" type="text/css" />
	</head>

	<body>
		<div id="banner">
			<span class="head">Library Management System</span><br />
		</div>
		<br />

		<div align="center">
			<div id="wrapper">
				<span class="SubHead">Student Sign In</span>
				<br />
				<br />
				<form method="post" action="">
					<div class="table">
							<label class="alert"><?php echo $msg;?></label>
							<label class="labels">Student ID : </label>
							<input type="text" name="sid" class="fields" size="25" placeholder="Enter Student ID" required="required" />
							<label class="labels">Password : </label><input type="password" name="pass" class="fields" size="25" placeholder="Enter Password" required="required" />
							<input type="submit" value="Sign In" class="button" />
					</div>
				</form>
				<a href="register.php" class="link">Sign Up</a>
				<br />
				<a href="admin.php" class="link">Admin Sign In</a>
			</div>
		</div>
	</body>
</html>