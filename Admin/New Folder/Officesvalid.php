<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content1=mysql_real_escape_string($_POST['content']);
$content2=mysql_real_escape_string($_POST['content1']);

$mess.=nullvalid($content1,"Enter Offices/Business Title,");
$mess.=nullvalid($content2,"Enter Offices/Business Address,");


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
$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);

$mess.=OnlyNumbervalid($ucontent,"Enter valid Offices/Business ID,");
$mess.=nullvalid($ucontent1,"Enter Offices/Business Title,");
$mess.=nullvalid($ucontent2,"Enter Offices/Business Address,");


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