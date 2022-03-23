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
				<span class="SubHead">Books Request From Students</span>
				<br />
				<br />
				<table>
					<tr class="labels">
						<th>Book Name</th>
						<th>Author</th>
						<th>Requested by(Student ID) </th>
					</tr>
					<?php
						$x=mysqli_query($set,"SELECT * FROM request");
						while($y=mysqli_fetch_array($x))
						{
					?>
					<tr class="labels">
						<td><?php echo $y['name'];?></td>
						<td><?php echo $y['author'];?></td>
						<td><?php echo $y['sid'];?></td>
					</tr>
					<?php
						}
					?>
				</table><br />
				<br />
				<a href="adminhome.php" class="link">Go Back</a>
			</div>
		</div>
	</body>
</html>