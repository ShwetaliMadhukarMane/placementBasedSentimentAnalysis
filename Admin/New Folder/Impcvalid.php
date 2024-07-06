<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content1=mysql_real_escape_string($_POST['content']);
$content2=mysql_real_escape_string($_POST['content1']);
$content3=mysql_real_escape_string($_POST['content2']);

$mess.=nullvalid($content1,"Enter Name,");
$mess.=nullvalid($content2,"Enter Address,");
$mess.=nullvalid($content3,"Enter Contact Number,");

if($mess=="")
	{
	echo "Yes";
	}
	else
	{
	echo $mess;
	}

}


if(isset($_POST['ucontent']))
{

$mess="";

$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);

$mess.=nullvalid($ucontent1,"Enter Name,");
$mess.=nullvalid($ucontent2,"Enter Address,");
$mess.=nullvalid($ucontent3,"Enter Contact Number,");

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