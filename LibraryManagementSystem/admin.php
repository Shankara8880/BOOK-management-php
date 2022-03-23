<?php
include("setting.php");
session_start();
$msg = $_GET['msg'];
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
				<span class="SubHead">Admin Sign In</span>
				<br />
				<br />
				<form method="post" action="check_login.php">
					<div border="0" class="table">
						<label class="msg"><?php echo $msg;?></label>
						<label class="labels">Admin ID :</label><input type="text" name="aid" size="25" placeholder="Enter Admin ID" required="required" />
						<label class="labels">Password :</label><input type="password" name="pass" size="25" placeholder="Enter Password" required="required" />
						<label></label><input type="submit" value="Sign In" class="button" />
					</div>
				</form>
				<a href="index.php" class="link">Main Page</a>
			</div>
		</div>
	</body>
</html>