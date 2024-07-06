<?php
include('valid.php');

if(isset($_POST['vtitle']))
{
$mess="";
$a= mysql_real_escape_string($_POST["vtitle"]);
$b= mysql_real_escape_string($_POST["vurl"]);
$c= mysql_real_escape_string($_POST["videoinfo"]);

$mess.=nullvalid($a,"Enter Video Title,");
$mess.=nullvalid($b,"Enter Video URL,");
$mess.=nullvalid($c,"Enter Video Info,");


if($mess=="")
	{
	echo "Yes";
	}
	else
	{
	echo $mess;
	}

}


if(isset($_POST['vid']))
{

$mess="";
$a= mysql_real_escape_string($_POST["Uvtitle"]);
$b= mysql_real_escape_string($_POST["Uvurl"]);
$c= mysql_real_escape_string($_POST["Uvideoinfo"]);

$mess.=nullvalid($a,"Enter Video Title,");
$mess.=nullvalid($b,"Enter Video URL,");
$mess.=nullvalid($c,"Enter Video Info,");

if($mess=="")
	{
		echo "Yes";
	}
	else
	{
		echo $mess;
	}

}

?>