<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);

include("db.php");
$uid=$_POST["UID"];

$a=$_POST["FName"];
$a1=$_POST["MName"];
$a2=$_POST["LName"];
$b=$_POST["Mobile"];

$mess="";
$mess.=nullvalid($a,"Enter First Name");
$mess.=nullvalid($a1,"Enter Mid Name");
$mess.=nullvalid($a2,"Enter Last Name");
$mess.=nullvalid($b,"Enter Mobile Number");

//++++++++Email valid+++++++++++++++
	function EmailValid($names,$nametital)
	{
		if(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $names))
		{
			 return $nametital.",";
		}
	}

	//++++++++Full Name Only+++++++++++++++
	function Fullnamevalid($names,$nametital)
	{
         if(!preg_match('/^[_a-z]+( [_a-z]+)$/i',$names))
         {
         return $nametital.",";
         }
	}


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
$a1=mysql_real_escape_string($a1);
$a2=mysql_real_escape_string($a2);
$b=mysql_real_escape_string($b);
 

mysql_query("update student set First_Name='$a',Mid_Name='$a1',Last_Name='$a2', contact='$b' where Sid=$uid");


echo "Your Record Updated";
}
else
{
echo $mess;
}
?>
