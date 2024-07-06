<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');

if(isset($_GET["Logout"]))
{
$_SESSION['userid']= "";
$_SESSION['username']= "";
$_SESSION['useremail']= "";
$_SESSION['userpic']= "";
unset($_SESSION['userid']);
unset($_SESSION['username']);
unset($_SESSION['useremail']);
unset($_SESSION['userpic']);
}else if(isset($_SESSION['userid']) and isset($_SESSION['username']))
{
		header("Location:Main.php");
}
?>

<!DOCTYPE html>
<head>
<title>Feedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- bootstrap-css -->
<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery2.0.3.min.js"></script>

</head>

<body id="bodymystyle1">
<div class="log-w3">
<div class="w3layouts-main">

<img src="PngItem_768452.png" style="width:100%;">
<hr><br>
	<h2>Sign In</h2>
		<form id="Logform" action="Logpage.php" method="post">
			<input type="email" class="ggg" name="Email" placeholder="E-MAIL" required="">
			<input type="password" class="ggg" name="Password" placeholder="PASSWORD" required="">
							<div class="clearfix"></div>
				<input type="button" value="Sign In" name="login" id="Log_button" data-ng-click="Log_button($event)">
						<div id="previewlog"></div>

		</form>
		<p>Don't Have an Account ?<a href="uregistration.php">Create an account</a></p>
</div>


<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
$(function() {
$("#Log_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();


$("#previewlog").html('');
$("#previewlog").html('<img src="loader.gif" alt="Uploading...."/>');

				$("#Logform").ajaxForm({
						target: '#previewlog'
					}).submit();
					

	
	return false;
});
});

</script>

</div>
<script src="js/bootstrap.js"></script>
<script src="js/jquery.dcjqaccordion.2.7.js"></script>
<script src="js/scripts.js"></script>
<script src="js/jquery.slimscroll.js"></script>
<script src="js/jquery.nicescroll.js"></script>
<!--[if lte IE 8]><script language="javascript" type="text/javascript" src="js/flot-chart/excanvas.min.js"></script><![endif]-->
<script src="js/jquery.scrollTo.js"></script>
</body>
</html>
