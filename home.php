<?php
	include("setting.php");
	session_start();
	if(!isset($_SESSION['sid']))
	{
		header("location:index.php");
	}
	$sid=$_SESSION['sid'];
	$a=mysqli_query($set,"SELECT * FROM students WHERE sid='$sid'");
	$b=mysqli_fetch_array($a);
	$name=$b['name'];
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
			<div id="wrapper" >
				<span class="SubHead">Welcome <?php echo $name;?></span>
				<br />
				<br />
				<div class="table">
					<a href="issueBook.php" class="button">Issue Book</a>
					<a href="request.php" class="button">Request New Books</a>
					<a href="changePassword.php" class="button">Change Password</a>
					<a href="logout.php" class="button">Logout</a>
				</div>
			</div>
		</div>
	</body>
</html>