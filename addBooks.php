<?php
	include("setting.php");
	session_start();
	if(!isset($_SESSION['aid']))
	{
		header("location:index.php");
	}
	$aid=$_SESSION['aid'];
	$a=mysqli_query($set,"SELECT * FROM admin WHERE aid='$aid'");
	$b=mysqli_fetch_array($a);
	$name=$b['name'];
	$bn=$_POST['name'];
	$au=$_POST['auth'];
	if($bn!=NULL && $au!=NULL)
	{
		$sql=mysqli_query($set,"INSERT INTO books(name,author) VALUES('$bn','$au')");
		if($sql)
		{
			$msg="Successfully Added";
		}
		else
		{
			$msg="Book Already Exists";
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
				<span class="SubHead">Add Books</span>
				<br />
				<br />
				<form method="post" action="">
					<div class="table">	
						<label class="msg" align="center" colspan="2"><?php echo $msg;?></label> 	
						<label class="labels">Book : </label>
						<input type="text" name="name" placeholder="Enter Book Name" size="25" required="required"  />	
						<label class="labels">Author : </label>
						<input type="text" name="auth" placeholder="Enter Author Name" size="25" required="required"  />	
						<input type="submit" value="ADD BOOK" class="button" />
					</div>
				</form>
				<a href="adminhome.php" class="link">Go Back</a>
			</div>
		</div>
	</body>
</html>