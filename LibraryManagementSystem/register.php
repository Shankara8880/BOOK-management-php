<?php
	include("setting.php");
	$name=$_POST['name'];
	$email=$_POST['email'];
	$sem=$_POST['sem'];
	$branch=$_POST['branch'];
	$sid=$_POST['sid'];
	$pas=sha1($_POST['pass']);
	if($name==NULL || $email==NULL || $sem==NULL || $branch==NULL || $sid==NULL || $_POST['pass']==NULL)
	{
		//
	}
	else
	{
		$sql=mysqli_query($set,"INSERT INTO students(sid,name,branch,sem,password,email) VALUES('$sid','$name','$branch','$sem','$pas','$email')");
		if($sql)
		{
			$msg="Successfully Registered";
		}
		else
		{
			$msg="User Already Exists";
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
				<span class="SubHead">Student Registration</span>
				<br />
				<br />
				<form method="post" action="">
					<div  class="table">
						<label class="msg"><?php echo $msg;?></label>
						<label>Name : </label>
						<input type="text" name="name" placeholder="Enter Full name" required="required" size="25" />
						<label>Email ID : </label>
						<input type="email" name="email" placeholder="Enter Email ID" required="required" size="25" />
						<label>Sem : </label>
						<select name="sem" class="field" required>
							<option value="" disabled="disabled" selected="selected">- - Select Sem - -</option>
							<option value="1">First Sem</option>
							<option value="2">Second Sem</option>
							<option value="3">Third Sem</option>
							<option value="4">Fourth Sem</option>
							<option value="5">Fifth Sem</option>
							<option value="6">Sixth Sem</option>
							<option value="7">Seventh Sem</option>
							<option value="8">Eighth Sem</option>
						</select>

						<label class="labels">Branch : </label>
						<select name="branch" class="field" required>
							<option value="" disabled="disabled" selected="selected">- - Select Branch - -</option>
							<option value="Computer Engineering">Computer Engineering</option>
							<option value="Electronics Engineering">Electronics Engineering</option>
							<option value="Mechanical Engineering">Mechanical Engineering</option>
							<option value="Civil Engineering">Civil Engineering</option>
							<option value="Information Technology">Information Technology</option>
						</select>
						<label class="labels">Student ID : </label>
						<input type="text" name="sid" placeholder="Enter Student ID" required="required" size="25" />
						<label class="labels">Password : </label>
						<input type="password" name="pass" placeholder="Enter Password" required="required" size="25" />
						<input type="submit" value="Register" class="button" />
					</div>
				</form>
				<a href="index.php" class="link">Go Back</a>
		</div>
	</body>
</html>