<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");

$d= $_POST["Email"];
$e= $_POST["Password"];

$result=mysql_query("select * From student where Email='$d' and password ='$e'");

while($row=mysql_fetch_array($result))
	{	
	$_SESSION['userid'] = $row['Sid'];
	$_SESSION['username']= $row['First_Name']." ".$row['Last_Name'];
	}
		


if($_SESSION['userid']!="" and $_SESSION['username']!="")
	{
		echo "<script> location.href='Main.php';</script>";
	}
	else
	{
	    echo "<font color='#ff0000' >Login Fail plz Check User Email and Password.!</font>";
	}

?>
