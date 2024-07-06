<?php
session_start();
error_reporting (E_ALL ^ E_NOTICE ^ E_WARNING);
include('db.php');

if(isset($_POST["signin"]))
{

$result=mysql_query("select * From admin where Aemail='".$_POST["username"]."' and Apwd='".$_POST["password"]."'");

while($row=mysql_fetch_array($result))
	{	
$_SESSION['Auserid']= $row[0];
$_SESSION['Ausername']= $row[1].' '.$row[2];
$_SESSION['Ausertype']= "Admin";
	}
}

if(!isset($_SESSION['Auserid']) and !isset($_SESSION['Ausername']))
{
		header("Location:index.php");
}
?>

<!DOCTYPE html>
<head>
  <meta charset="utf-8">
  <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
  <title>Dashboard</title>
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="viewport" content="width=device-width">        
  <link rel="stylesheet" href="css/templatemo_main.css">
</head>
<body>
<?php
include("Header.php");
?>
    <div class="template-page-wrapper">

<?php
include("Menubar.php");
?>

      <div class="templatemo-content-wrapper">
<?php

if(!isset($_GET['page']) or $_GET['page']=='1' or $_GET['page']=='0')
{
include('Home.php');
}
elseif($_GET['page']=='2')
{
include('Student_Details.php');
}
elseif($_GET['page']=='3')
{
include('Feedback_Details.php');	
}
elseif($_GET['page']=='4')
{
 include('FeedbackAnalysis_Details.php');
}
elseif($_GET['page']=='5')
{
include('Admin_Details.php');
}
else
{
}
?>
		
		</div>
      <!-- Modal -->
      <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
              <h4 class="modal-title" id="myModalLabel">Are you sure you want to sign out?</h4>
            </div>
            <div class="modal-footer">
              <a href="sign-in.html" class="btn btn-primary">Yes</a>
              <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
            </div>
          </div>
        </div>
      </div>
      <footer class="templatemo-footer">
        <div class="templatemo-copyright">
          <p>Copyright &copy; 2084 Your Company Name <!-- Credit: www.templatemo.com --></p>
        </div>
      </footer>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
 
    <script src="js/templatemo_script.js"></script>
     
</body>
</html>