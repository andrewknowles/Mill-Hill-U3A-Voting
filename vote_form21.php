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
		<link href="./css/mainu3a2a.css" rel="stylesheet" type="text/css" media="screen" />
		<link href="./css/mainu3a3.css" rel="stylesheet" type="text/css" media="screen" />
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

			$con   = mysqli_connect("localhost", "root", "", "mhu3a");
//			$con   = mysqli_connect("10.169.0.158", "millhill1_mhv", "Andy2rook", "millhill1_mhv");

			if (isset($_POST['member_key']) && strlen($_POST['member_key'])==8)
			{
				$Mysql1 = mysqli_query($con, "select * from members where Id = '".$_POST['member_key']."'");
				$numRows = mysqli_num_rows($Mysql1);

				if ($numRows == 1)
				{
					foreach ($Mysql1 as $dataline1)
					{
						$_SESSION['member_key'] = $_POST['member_key'];
						echo "<h2>Welcome ".$dataline1['FName']." ".$dataline1['LName']."</h2>";
						
						if (is_null($dataline1['Voted']))
						{
														?>
							<h3>Please scroll down the page to cast your votes for the following three resolutions.</h3>
							<hr>
							<h2>Resolution 1</h2>
							<div class="Resolution">
							<p>The current constitution of Mill Hill U3A states:<br> 16. NOTICES, COMMUNICATIONS AND PROCEDURE AT GENERAL MEETINGS  <br> (iv) There shall be a quorum when at least 20% of the number of members of The U3A are present at any General Meeting.<br>
We agree to change the wording to:<br> 16. NOTICES, COMMUNICATIONS AND PROCEDURE AT GENERAL MEETINGS <br>(iv) There shall be a quorum when at least 10% of the number of members of The U3A are present at any General Meeting.</p><hr>
<h2>Resolution 2</h2>
<p>We agree to abolish the class of ‘Associate Member’ and with it the slightly reduced subscription fee. We would, therefore, for ALL members of MHU3A, pay the Capitation Fee to the TAT, thus ensuring that ALL member have the blanket insurance cover provided by TAT for our activities.</p><hr>
<h2>Resolution 3</h2>
<p>We agree to adopt the new ‘single object clause’ defining the ethos of the Third Age Movement as:<br>
<i>“The advancement of education and the education of older people and those who are retired from full time work, including associated activities conducive to learning and personal development.”</i></p><hr>
</div>
							<h2>Please cast your vote on the form below</h2>
							<h2>Click on the white circle to record your vote for each resolution</h2>
							<h2>You need to vote for ALL 3 resolutions</h2>
							<h2>You MUST click the CLICK HERE TO VOTE button below to validate your vote</h2>

							
							<h3><form method="get" action="vote_confirmx.php" name="vote_choice" onsubmit="return isChecked();"> 

								<table>
			<tr>
				<th style="width:30%"><h3>Resolution 1</h3></th>
				<th style="width:30%"><h3>Resolution 2</h3></th>
				<th style="width:30%"><h3>Resolution 3</h3></th>
			</tr>
		<tr>
			<td id="row1">
				<label class="container">For
				<input type="radio" name="post1" value='For' id="p1c1">
				<span class="checkmark"></span>
				</label>
			</td>
			<td>
				<label class="container">For
				<input type="radio" name="post2" value='For' id="p2c1">
				<span class="checkmark"></span>
				</label>
			</td>
			<td>
				<label class="container">For
				<input type="radio" name="post3" value='For' id="p3c1">
				<span class="checkmark"></span>
				</label>
			</td>
		</tr>
		
		<tr>
			<td>
				<label class="container">Against
				<input type="radio" name="post1" value='Against' id="p1c2">
				<span class="checkmark"></span>
				</label>
			</td>
			<td>
				<label class="container">Against
				<input type="radio" name="post2" value='Against' id="p2c2">
				<span class="checkmark"></span>
				</label>
			</td>
			<td>
				<label class="container">Against
				<input type="radio" name="post3" value='Against' id="p3c2">
				<span class="checkmark"></span>
				</label>
			</td>
		</tr>
		
<!--		<tr>
			<td>
			</td>
			<td>
				<label class="container">Candidate G
				<input type="radio" name="post2" value='Candidate G' id="p2c3">
				<span class="checkmark"></span>
				</label>
			</td>
			<td>
			</td>
		</tr>
		
		<tr>
			<td>
				<label class="container">No Preference
				<input type="radio" name="post1" value='No Preference' id="p1np">
				<span class="checkmark"></span>
				</label>
			</td>
			<td>
				<label class="container">No Preference
				<input type="radio" name="post2" value='No Preference' id="p2np">
				<span class="checkmark"></span>
				</label>
			</td>
			<td>
				<label class="container">No Preference
				<input type="radio" name="post3" value='No Preference' id="p3np">
				<span class="checkmark"></span>
				</label>
			</td>
		</tr>-->
		<tr>
			<td>
			</td>
			<td>
				<?php echo "<input type='hidden' name='memberid' value=".$_POST['member_key'].">";?>
			</td>
			<td>
			</td>
		</tr>
		</table>
<!--		<input type="image" alt="submit" src="./images/button_click-here-to-vote.png" />-->
		<h2><input type="submit" name="submit" id="submit" value="CLICK HERE TO VOTE"/></h2>
							</form></h3>
							
		<?php	
						} else 
							{
								$votedate = substr($dataline1['Voted'],8,2).substr($dataline1['Voted'],4,4).substr($dataline1['Voted'],0,4)." at ".substr($dataline1['Voted'],11,8);
								echo "</br></br></br></br></br></br></br></br></br></br>";
								echo "<h2>You have already voted on ".$votedate." </h2>";
								echo "</br></br></br>";
								break;
							}							
					}
				} else 
					{
						echo "<h1>Sorry your Unique Member Key has not been recognised</h1>";
						echo "<h1>Please click the button below to return to the previous page</h1>";
						echo "<h1>If you continue to have problems please request assistance</h1>";
						echo "<h1>Using the details at the bottom of the page</h1></br>";
						 ?>
						<form action="vote_validation.php" method="post">
							<table>
							<tr><td>
							<input type ="submit" value="Start Again" id="submit">
						</td></tr></table>
						</form>
						</br></br>
		<?php
					}
			} else
				{	
					echo "<h1>Your member key has too many/too few characters or is blank</h1>";
				}
		mysqli_close($con);
		?>
		</br></br></br></br></br></br></br>
		<footer>
			<h2>Need help ? - email webmastermhu3a@gmail.com or phone 07704 992268</h2>
			<h3>Mill Hill U3A, Copyright &copy; 2017</h3>

		</footer>

	<script>
		function isChecked() {

			var checkedp1c1 = document.getElementById('p1c1').checked;
			var checkedp2c1 = document.getElementById('p2c1').checked;
			var checkedp3c1 = document.getElementById('p3c1').checked;

			var checkedp1c2 = document.getElementById('p1c2').checked;
			var checkedp2c2 = document.getElementById('p2c2').checked;
			var checkedp3c2 = document.getElementById('p3c2').checked;

/*			var checkedp2c3 = document.getElementById('p2c3').checked;

			var checkedp1np = document.getElementById('p1np').checked;
			var checkedp2np = document.getElementById('p2np').checked;
			var checkedp3np = document.getElementById('p3np').checked;*/

			if(checkedp1c1 == false && checkedp1c2 == false)
				{
					alert('You have not voted for Post 1');
					return false;
				} 
			else if (checkedp2c1 == false && checkedp2c2 == false) 
				{	
					alert('You have not voted for Post 2');		
					return false;		
				} 
			else if (checkedp3c1 == false && checkedp3c2 == false) 
				{
					alert('You have not voted for Post 3');		
					return false;
				} 
			else 
				{
				return true;
				}
		}

	</script>
	</body>
</html>
