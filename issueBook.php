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
	$date=date('d/m/Y');
	$bn=$_POST['name'];
	if($bn!=NULL)
	{
		$p=mysqli_query($set,"SELECT * FROM books WHERE id='$bn'");
		$q=mysqli_fetch_array($p);
		$bk=$q['name'];
		$ba=$q['author'];
		$sql=mysqli_query($set,"INSERT INTO issue(sid,name,author,date) VALUES('$sid','$bk','$ba','$date')");
		if($sql)
		{
			$msg="Successfully Issued";
		}
		else
		{
			$msg="Error Please Try Later";
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
				<span class="SubHead">Issue Book</span>
				<br />
				<br />
				<form method="post" action="">
					<div class="table">
							<label class="msg"><?php echo $msg;?></label>
							<label>Book :</label> 
							<select name="name" required >
							<option value="" disabled="disabled" selected="selected"> - - Select Book - - </option>
						<?php
							$x=mysqli_query($set,"SELECT * FROM books");
							while($y=mysqli_fetch_array($x))
							{
								?>
							<option value="<?php echo $y['id'];?>"><?php echo $y['name']." ".$y['author'];?></option>
						<?php
							}
						?>
							</select>
							<input type="submit" value="ISSUE" class="button" />
					</div>
				</form>
				<a href="home.php" class="link">Go Back</a>
			</div>
		</div>
	</body>
</html>