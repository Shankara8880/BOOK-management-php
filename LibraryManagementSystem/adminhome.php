<?php
	session_start();
	include("setting.php");
	$aid=$_SESSION['aid'];

	if(!empty($_SESSION['aid']))
	{	
		$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
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
			<div id="wrapper" style="width: 300px;">
				<span class="SubHead">Welcome <?php echo $name;?></span>
				<br />
				<br />
				<div class="table">
					<a href="addBooks.php" class="button">Add Books</a>
					<a href="manageStud.php" class="button">Manage Students</a>
					<a href="bookRequests.php" class="button">Books Requests</a>
					<a href="issue.php" class="button">Book Issue</a>
					<a href="changePasswordAdmin.php" class="button">Change Password</a>
					<a href="logout.php" class="button">Logout</a>
				</div>
			</div>
		</div>
	</body>
</html>

<?php 
	}
	else
	{
		header("location:index.php");
	}
?>