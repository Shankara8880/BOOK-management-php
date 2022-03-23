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
				<br />
				<br />

				<span class="SubHead">Students</span>
				<br />
				<br />

				<table>
					<tr>
						<th>Sid</th>
						<th>Name</th>
						<th>Branch</th>
						<th>Sem</th>
						<th>Email</th>
						<th>Edit</th>
					</tr>
					<?php
						$x=mysqli_query($set,"SELECT * FROM students");
						while($y=mysqli_fetch_array($x))
						{
                    ?>
                            <tr>
                                <td><?php echo $y['sid'];?></td>
                                <td><?php echo $y['name'];?></td>
                                <td><?php echo $y['branch'];?></td>
                                <td><?php echo $y['sem'];?></td>
                                <td><?php echo $y['email'];?></td>
                                <td><a href="deleteStud.php?stud=<?php echo $y['id'];?>" class="btn">Delete</a></td>
                            </tr>
					<?php
						}
					?>
				</table><br />
				<br />
				<a href="adminhome.php" class="link">Go Back</a>
				<br />
				<br />

			</div>
		</div>
	</body>
</html>