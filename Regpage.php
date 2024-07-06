<?php
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include("db.php");

$a1= $_POST["Course"];
$c= $_POST["FName"];
$c1= $_POST["MName"];
$c2= $_POST["LName"];
$d= $_POST["Email"];
$e= $_POST["Password"];
$F= $_POST["RPassword"];
$g= $_POST["Mobile"];


$mess="";
$mess.=nullvalid($a1,"Select Course Name");
$mess.=nullvalid($g,"Enter Mobile No.");
$mess.=Fullnamevalid($c,"Enter First Name");
$mess.=Fullnamevalid($c1,"Enter Mid Name");
$mess.=Fullnamevalid($c2,"Enter Last Name");
$mess.=EmailValid($d,"Plz Enter Email");
$mess.=DatbaseValid($d,"Email All Ready Register");
$mess.=Passvalid($e,"Plz Enter Password",8);
$mess.=EqualValid($e,$F,"Password Conformation Fail");


	//++++++++Full Name Only+++++++++++++++
	function Fullnamevalid($names,$nametital)
	{
         if(!preg_match('/^[_a-z]+$/i',$names))
         {
         return $nametital.", ";
         }
	}

	//++++++++Email Valid+++++++++++++++
	function EmailValid($names,$nametital)
	{
		if(!preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $names))
		{
			 return $nametital.", ";
		}
	}

		//++++++++Not Empty+++++++++++++++
	function nullvalid($names,$nametital)
	{
		if($names=="")
		{
         return $nametital.", ";
		}	
	}

//++++++++Data Base Valid+++++++++++++++
	function DatbaseValid($valuechk,$nametital)
	{
	$select_table = "select * from student where Email='".$valuechk."'";
	$fetch= mysql_query($select_table);
	if(mysql_num_rows($fetch)>=1)
		{
		 return $nametital.",";
		}
	}
	
	
	function Passvalid($names,$nametital,$length)
	{
		$x=strlen($names);
		if($x<$length)
		{
			return $nametital."(Min Length $length), ";
		}
	}

//++++++++Equal Valid+++++++++++++++
	function EqualValid($names1,$names2,$nametital)
	{
		if($names1!=$names2 || $names1=="")
		{
			 return $nametital.", ";
		}
	}


if($mess=="")
{

mysql_query("INSERT INTO student(First_Name,Mid_Name,Last_Name,Email,contact,password,Course) VALUES ('$c','$c1','$c2','$d','$g','$e','$a1')");

echo "<script> alert('Student Registration Successfully .!'); location.href='index.php';</script>";
}
else
{
echo "<font color='#f00' >Student Registration Fail :- ".$mess."</font>";
}

?>
