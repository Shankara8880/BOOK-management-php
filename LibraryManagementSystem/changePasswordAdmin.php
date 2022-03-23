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
	$pass=$b['password'];
	$old=sha1($_POST['old']);
	$p1=sha1($_POST['p1']);
	$p2=sha1($_POST['p2']);
	if($_POST['old']==NULL || $_POST['p1']==NULL || $_POST['p2']==NULL)
	{
		//ASL Do Nothing
	}
	else
	{
	if($old!=$pass)
	{
		$msg="Incorrect Old Password";
	}
	elseif($p1!=$p2)
		{
			$msg="New Password Didn't Matched";
		}
		else
		{
			mysqli_query($set,"UPDATE admin SET password='$p2' WHERE aid='$aid'");
			$msg="Successfully Changed your Password";
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
				<span class="SubHead">Change Password</span>
				<br />
				<br />
				<form method="post" action="">
					<div class="table">
							<label class="msg"><?php echo $msg;?></label>
							<label>Old Password :</label>
							<input type="password" name="old" size="25" placeholder="Enter Old Password" required="required" />
							<label>New Password :</label>
							<input type="password" name="p1" size="25" placeholder="Enter New Password" required="required"  />
							<label>Confirm New Password :</label>
							<input type="password" name="p2" size="25"placeholder="Confirm New Password" required="required" />
							<input type="submit" value="Change Password" class="button" />
					</div>
				</form>
				<a href="adminhome.php" class="link">Go Back</a>
			</div>
		</div>
	</body>
</html>