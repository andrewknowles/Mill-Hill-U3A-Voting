<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="UTF-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="Mill Hill U3A Voting" />
	<meta name="keywords" content="U3A, Vote" />
	<meta name="author" content="Andrew Knowles" />
	<!--PAGE TITLE -->
	<title>Mill Hill U3A Vote</title>
	<!--CSS -->
	<link href="./css/mainu3a2.css" rel="stylesheet" type="text/css" media="screen" />
	<!--Other meta tags-->
	<meta http-equiv="cache-control" content="no-cache" />
	<meta http-equiv="Content-Language" content="en" />
	<meta http-equiv="Copyright" content="Copyright Andrew Knowles 2017" />
	<meta name="robots" content="index" />
	<meta content="all/follow" name="robots" />
	<meta content="general" name="rating" />
	<meta content="7days" name="revisit" />
</head>
<body>
	<header>
		<div id="logo">
			<img src="./images/u3alogo.jpg" alt="Smiley face" height="80" width="80">
		</div>
		<div id="title">
			<h1> Mill Hill U3A</h1>
		</div>
	</header>
<?php
//adjust here for voting cut off

$limit = '2018-03-13 23:59:59';
$today = date('Y-m-d H:i:s');
//check that voting is still open - could have been open when they started the process but closed by the time they get here
	if ($limit < $today)
	{ 
		echo "<h2><br><br><br>The time is now:  ".$today = date('Y-m-d H:i:s');
		echo "<br><br>Voting closed at 2018-03-13 23:59:59</h2>";
		unset($_POST);
		exit (
		);
	} else {
//		$con   = mysqli_connect("localhost", "root", "", "mhu3a");
		$con   = mysqli_connect("10.169.0.158", "millhill1_mhv", "Andy2rook", "millhill1_mhv");
		$Mysql1 = mysqli_query($con, "select * from votes where Id = '".$_GET['memid']."'");
		$numRows = mysqli_num_rows($Mysql1);
//if 0 rows returned the member has not 
		if ($numRows == 0) 
		{
			echo"<br><br><br><br><br><br>";	
			echo "<h1>Your vote has been recorded - Thank you for voting</h1><br><br><br><br><br><br><br><br>";
//create a variable with the current time stamp
			$date = date('Y-m-d H:i:s');				
//insert into the votes table
			$Mysql1 = mysqli_query($con, "insert into votes(Id, Voted, Vote1, Vote2, Vote3) values ('".$_GET['memid']."','".$date."', '".$_GET['post1']."', '".$_GET['post2']."', '".$_GET['post3']."')");
//update the members table with voting timestamp
			$Mysql1 = mysqli_query($con, "update members set voted = '".$date."' where id =  '".$_GET['memid']."'");
		} else {
//if mysqli_num_rows <> 0 the member has already voted
			foreach ($Mysql1 as $dataline1) 
			{
				echo "</br></br></br></br></br></br></br></br></br></br>";
				$votedate = substr($dataline1['Voted'],8,2).substr($dataline1['Voted'],4,4).substr($dataline1['Voted'],0,4)." at ".substr($dataline1['Voted'],11,8);
				echo "<h2>You have already voted on ".$votedate." </h2>";
				echo "</br></br></br></br></br></br></br></br></br></br>";
				break;
			}
		}
	} 
	mysqli_close($con);
?>

		<footer>
			<h2>Need help ? - email webmastermhu3a@gmail.com or phone 07704 992268</h2>
			<h3>Mill Hill U3A, Copyright &copy; 2017</h3>
		</footer>

	</body>
</html>


