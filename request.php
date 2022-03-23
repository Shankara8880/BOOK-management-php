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
	$bn=$_POST['name'];
	$ba=$_POST['author'];
	if($bn!=NULL && $ba!=NULL)
	{
		$sql=mysqli_query($set,"INSERT INTO request(name,author,sid) VALUES('$bn','$ba','$sid')");
		if($sql)
		{
			$msg="Successfully Requested";
		}
		else
		{
			$msg="Request Already Exists";
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
				<span class="SubHead">Book Request</span>
				<br />
				<br />
				<form method="post" action="">
					<div class="table">
							<label class="msg"><?php echo $msg;?></label>
							<label class="labels">Book : </label>
							<input type="text" size="25" required="required" name="name" placeholder="Enter Book Name" />
							<label class="labels">Author Name : </label>
							<input type="text" size="25" required="required" name="author" placeholder="Enter Author Name" />
							<input type="submit" class="button" value="Request" />
					</div>
				</form>
				<a href="home.php" class="link">Go Back</a>
			</div>
		</div>
	</body>
</html>