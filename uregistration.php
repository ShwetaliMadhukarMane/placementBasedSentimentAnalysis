<!DOCTYPE html>
<head>
<title>Feedback</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


<link rel="stylesheet" href="css/bootstrap.min.css" >
<!-- //bootstrap-css -->
<!-- Custom CSS -->
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href="css/style-responsive.css" rel="stylesheet"/>
<!-- font CSS -->

<!-- font-awesome icons -->
<link rel="stylesheet" href="css/font.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<script src="js/jquery2.0.3.min.js"></script>

<style>
 /*--placeholder-color--*/
::-webkit-input-placeholder {
	color:#fff !important;
}
:-moz-placeholder { /* Firefox 18- */
	color:#fff !important; 
}
::-moz-placeholder {  /* Firefox 19+ */
	color:#fff !important;
}
:-ms-input-placeholder {  
	color:#fff !important;
}
/*--//placeholder-color--*/
</style>

</head>
<body id="bodymystyle1">

<div class="reg-w3">
<div class="w3layouts-main">
<img src="PngItem_768452.png" style="width:100%;">
<hr><br>
	<h2>Register Now</h2>
		<form id="Regform" action="Regpage.php" method="post" >
		
			<select class="ggg" name="Course" >
			<option value="" style="color:#000;">Select Course</option>
			<option value="CSC" style="color:#000;">CSC</option>
			<option value="ENTC" style="color:#000;">ENTC</option>
			<option value="MECH" style="color:#000;">MECH</option>
			<option value="Civil" style="color:#000;">Civil</option>
			</select>


<input type="Course" class="ggg" name="FName" placeholder="Enter First Name" required="">
			<input type="Course" class="ggg" name="MName" placeholder="Enter Middle Name" required="">
			<input type="Course" class="ggg" name="LName" placeholder="Enter Last Name" required="">

			<input type="Course" class="ggg" name="Email" placeholder="Enter Email" required="">
			<input type="Course" class="ggg" name="Mobile" placeholder="Enter Mobile No" required="">
			
			<input type="password" class="ggg" name="Password" placeholder="Enter password" required="">
			<input type="password" class="ggg" name="RPassword" placeholder="Re-Enter Password" required="">
			
			<div class="card-heading"><div></div></div>
				<div class="clearfix"></div>
			<input type="button" value="Sign Up" name="login" id="reg_button" data-ng-click="Log_button($event)">
						<div id="previewreg"></div>
		</form>
		<p>Already Registered.<a href="index.php">Login</a></p>
</div>


<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
$(function() {
$("#reg_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();


$("#previewreg").html('');
$("#previewreg").html('<img src="loader.gif" alt="Uploading...."/>');

				$("#Regform").ajaxForm({
						target: '#previewreg'
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
