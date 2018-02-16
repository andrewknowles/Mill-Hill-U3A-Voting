
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
<!--CSS--> 
		<link href="./css/mainu3a2.css" rel="stylesheet" type="text/css" />
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

		
		<h1> Special General Meeting 15th March 2018</h1>
		<h2>Please enter your Unique Members Key recently sent to you by email in the dark grey area below</h2>
		<h2>This key is 8 characters long and contains only the characters a-z and 0-9</br></br>
		
			<form action="vote_form21.php" method="post" name="key_input" onsubmit="return validateForm()"><h3>
				<table>
					<tr>
						<td>Unique Members Key</td>
						<td><input type="text" name="member_key" id="keyib" value="" /></td>
						<td><input type="image" alt="submit" src="./images/button_submit.png" /></td>
<!--						<td><input type="submit" name="CHECK" id="submit" value ="Submit" /></td>-->  
					</tr>
				</table>
			</form></h3>
		</br></br></br></br></br></br></br>
	
		<footer>
			<h3>Need help ? - email webmastermhu3a@gmail.com or phone XXXXXXXXXXXXXX</h3>
			<h3>Mill Hill U3A, Copyright &copy; 2017</h3>
		</footer>

	<script>
		function validateForm() {
			var member_key = document.forms["key_input"]["member_key"].value;
			var sanitized_member_key = member_key.replace(/[^0-9a-z]/g, '');
			if(sanitized_member_key == null || sanitized_member_key == "" || sanitized_member_key.length !== 8){
				alert("Your Unique Member key must be 8 characters long and contain ONLY the characters a-z and 0-9. You entered "+member_key);
				return false;
			}

		}
	</script>
	</body>
</html>