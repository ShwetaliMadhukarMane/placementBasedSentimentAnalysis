<?php
include('valid.php');


if(isset($_POST['content']))
{

$mess="";
$content1=mysql_real_escape_string($_POST['content']);
$content2=mysql_real_escape_string($_POST['content1']);

$mess.=nullvalid($content1,"Enter entertainment Title,");
$mess.=nullvalid($content2,"Enter entertainment Address,");


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

$mess.=OnlyNumbervalid($ucontent,"Enter valid entertainment ID,");
$mess.=nullvalid($ucontent1,"Enter entertainment Title,");
$mess.=nullvalid($ucontent2,"Enter entertainment Address,");


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