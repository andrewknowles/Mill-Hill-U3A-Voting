
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
		<br><br>
		<h2>You are about to vote as follows</h2>
		<br>
		<table>
			<tr>
				<td><h2>Resolution 1:</h2></td>
				<td><?php echo "   <h2>".$_GET['post1']?></h2></td>
			</tr>
			<tr>
				<td><h2>Resolution 2:</h2></td>
				<td><?php echo "   <h2>".$_GET['post2']?></h2></td>
			</tr>
			<tr>
				<td><h2>Resolution 3:</h2></td>
				<td><?php echo "   <h2>".$_GET['post3']?></h2></td>
			</tr>
		</table>
		
		<form method="get" action="update_vote.php" name="update_vote">
			<table>
			<tr>
				<td></td>
				<td><input type="hidden" name="post1" id="p1" value="<?php echo $_GET['post1'] ?>" /></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="post2" id="p2" value="<?php echo $_GET['post2'] ?>" /></td>
				<td></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="post3" id="p3" value="<?php echo $_GET['post3'] ?>" /></td>
				<td></td>
			</tr>
			<tr>
			<tr>
				<td></td>
				<td><input type="hidden" name="memid" id="memid" value="<?php echo $_GET['memberid'] ?>" /></td>
				<td></td>
			</tr>
			<tr>

				<td><input type="image" alt="submit" src="./images/button_vote-now.png" /></td>
				<td><h2>OR</h2></td>
				<td><a href="vote_validation.php"><img src="./images/button_start-again.png" alt="Start Again">
				</a></td>

			</tr>
			</table>					
		</form>
		<br><br><br><br>
			
			
		<footer>
			<h2>Need help ? - email webmastermhu3a@gmail.com or phone 07704 992268</h2>
			<h3>Mill Hill U3A, Copyright &copy; 2017</h3>
		</footer>
		
	</body>
	
</html>