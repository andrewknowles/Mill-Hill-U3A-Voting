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
		<link href="css/mainu3a2.css" rel="stylesheet" type="text/css" media="screen" />
<!--Other meta tags-->
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="Content-Language" content="en" />
		<meta http-equiv="Copyright" content="Copyright Andrew Knowles 2017" />
		<meta name="robots" content="index" />
		<meta content="all/follow" name="robots" />
		<meta content="general" name="rating" />
		<meta content="7days" name="revisit" />
<?php
/* 
vote_create_data.PHP
Creates tables members & votes
Populates members table for data exported from Beacon
14/2/18 - Add mysqli_real_escape_string to sanitize incoming data
14/2/18 - Changed file read method to fgetcsv - faster
14/2/18 - Added timestamp into hash - values will be different each time program executed
*/

// connect to the database
//connection for local testing
//$con   = mysqli_connect("localhost", "root", "", "mhu3a");
//connection for website
$con   = mysqli_connect("10.169.0.158", "millhill1_mhv", "Andy2rook", "millhill1_mhv");

// Check connection
    if (mysqli_connect_errno())
        {
			echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
		
//drop existing member & votes tables
mysqli_query($con, "drop table if exists members");
mysqli_query($con, "drop table if exists votes");
//create members table			
mysqli_query($con,"create table members(
					MemNo Int,
					FName Varchar(50),
					LName Varchar(50),
					Mail Varchar(50),
					Id Varchar(10),
					MemExpire DateTime,
					Voted DateTime)");
//create votes table					
mysqli_query($con,"create table votes(
					Id Varchar(10),
					Voted DateTime,
					Vote1 Varchar(50),
					Vote2 Varchar(50),
					Vote3 Varchar(50),
					Vote4 Varchar(50))");

//data file for local testing
//if (file_exists('c:\tmp\U3Amembers.csv')) {					
//$fp = fopen('c:\tmp\U3Amembers.csv', 'r');
//data file for live site
if (file_exists('U3Amembers.csv')) {					
$fp = fopen('U3Amembers.csv', 'r');
}else{
echo 'No file';
exit;
}

while ( !feof($fp) )
	{
		$line = fgetcsv($fp, 0);
		$Memkey = mysqli_real_escape_string($con, $line[0]);
		$Status = mysqli_real_escape_string($con, $line[2]);
//check value of mkey and status columns in Beacon data
//check mkey is numeric (removes title row in data) and only load members whose status = "Current"

			if (is_numeric($Memkey) && $Status == "Current")
				{		
					$MemNo = mysqli_real_escape_string($con, $line[1]);
					$First = mysqli_real_escape_string($con, $line[4]);
					$Last = mysqli_real_escape_string($con, $line[5]);
					$Mail = mysqli_real_escape_string($con, $line[11]);
					$Expire = $line[18];
					$timestamp = date("Y-m-d H:i:s");
					$Id = hash('crc32b', $MemNo.$First.$Last.$Mail.$timestamp);
					$ExpYear = substr($Expire,6,4);
					$ExpMonth = substr($Expire,3,2);
					$ExpDay = substr($Expire,0,2);
					$Expire = $ExpYear."-".$ExpMonth."-".$ExpDay." 00:00:01";

					$Mysql1 = mysqli_query($con, "insert into members(MemNo, FName, LName, Mail, Id, MemExpire) VALUES ('".$MemNo."', '".$First."', '".$Last."', '".$Mail."', '".$Id."', '".$Expire. "')");
				}
		
	}                       
fclose($fp);
mysqli_close($con);
?>