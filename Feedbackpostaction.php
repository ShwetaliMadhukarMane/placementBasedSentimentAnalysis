<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

include("db.php");
$uid=$_SESSION['userid'];
$a=$_POST["Feedback"];

$mess="";
$mess.=nullvalid($a,"Enter Feedback");


		//++++++++Not Empty+++++++++++++++
	function nullvalid($names,$nametital)
	{
		if($names=="")
		{
         return $nametital.",";
		}	
	}


if($mess=="")
{

$a=mysql_real_escape_string($a);

mysql_query("INSERT INTO feedbacktb(UID,Feedback,Postdate,Feedbacktype) VALUES('$uid','$a',now(),'')");

echo "<script> alert('Feedback Post Successfully .!'); location.href='Main.php?page=3';</script>";

}
else
{
echo $mess;
}
?>
