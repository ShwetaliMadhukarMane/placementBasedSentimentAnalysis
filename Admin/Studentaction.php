<?php
session_start();
include('db.php');
?>
<div id="flash" class="flash"></div>


<script type="text/javascript">
// Paging Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".pages").click(function() {
var element = $(this);
var del_id = element.attr("id");
var info = 'page=' + del_id;

if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Studentaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>



<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'id=' + del_id+'&page='+ textcontent2;
if(info=='')
{
alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Studentaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
return false;
});
});
</script>

<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".APP").click(function() {

var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var textcontent1 = $("#sertex").val();

var info = 'idapp=' + del_id+'&page='+ textcontent2+'&sid='+ textcontent1;
if(info=='')
{
alert("Select For delete..");
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Studentaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
$("#content").focus();
}  
});
}
	
return false;
});
});
</script>

<?php
if(isset($_POST['id']))
{
$id=$_POST['id'];
$delete = "DELETE FROM student WHERE Sid='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['idapp']))
{

$select_table = "select * from  student where Sid='".$_POST['idapp']."'";
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div class="table-responsive">
<section class="wrapper">
		<div class="agil-info-calendar">

		<div class="col-md-6 w3agile-notifications">
			<div class="notifications">
				<!--notification start-->
				
					<header class="panel-heading">
						Student Resume 
					</header>
					<div class="notify-w3ls">
						<div class="alert alert-info clearfix">
						<br><br>
							<div class="notification-info">
								Name : <?php echo $row['First_Name'].' '.$row['Mid_Name'].' '.$row['Last_Name']; ?><br><br>
								Email : <?php echo $row['Email']; ?><br><br>
								Mob : <?php echo $row['contact']; ?><br><br>
								Address : <?php echo $row['Address']; ?><br><br>
								Course : <?php echo $row['Course']; ?><br><br>
								Student Photo : <br>
								<img style="width:200px;" src="../upload/<?php echo $row['Profilepic']; ?>">
							</div>
						</div>
						<div class="alert alert-danger">
							<br><br>
							<div class="notification-info">
								10 Th : <?php echo $row['Teen']; ?>%<br><br>
								12 Th : <?php echo $row['twelve']; ?>%<br><br>
								SEM_I : <?php echo $row['SEM_I']; ?>%<br><br>
								SEM_II : <?php echo $row['SEM_II']; ?>%<br><br>
								SEM_III : <?php echo $row['SEM_III']; ?>%<br><br>
								SEM_IV : <?php echo $row['SEM_IV']; ?>%<br><br>
								SEM_V : <?php echo $row['SEM_V']; ?>%<br><br>
								SEM_VI : <?php echo $row['SEM_VI']; ?>%<br><br>
								SEM_VII : <?php echo $row['SEM_VI']; ?>%<br><br>
								SEM_VIII : <?php echo $row['SEM_VI']; ?>%<br><br>
								
								</div>
						</div>
						<div class="alert alert-success ">
							<br><br>
							<div class="notification-info">
								Education : <?php echo $row['Education']; ?><br><br>
								Experience : <?php echo $row['Experience']; ?><br><br>
							</div>
						</div>
						<div class="alert alert-warning ">
							<br><br>

							<div class="notification-info">
								Skill : <?php echo $row['Skil']; ?><br><br>
							</div>
						</div>
						<div class="alert alert-info clearfix">
							<br><br>

							<div class="notification-info">
								Hobbies : <?php echo $row['Hobbies']; ?><br><br>

							</div>
						</div>
									
						<div class="alert alert-info clearfix">
							<br><br>

							<div class="notification-info">
								Documents : <br><br>
								<?php

								$select_table1 = "select * from  document where Sid='".$_POST['idapp']."'";
								$fetch1= mysql_query($select_table1);
								while($row1= mysql_fetch_array($fetch1))
								{
								?>
								<a href="../upload/<?php echo $row1['Document']; ?>">[ Download <?php echo $row1['Documenttype']; ?> ]</a>

								<?php
								}
								?>
							</div>
						</div>
						
					</div>
				
				<!--notification end-->
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>


</section>
</div>
<?PHP
}
}
?>


<div class="table-responsive">
<h4 class="margin-bottom-15">Student List</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Id</b></td>
<td><b>Name</b></td>
<td><b>Mobile</b></td>
<td><b>Email</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP

$sid="";
if(isset($_POST['sid']))
{
	$sid=$_POST['sid'];
}

					$per_page = 5; 
					$select_table = "select * from student where concat(First_Name,' ',Mid_Name,' ',Last_Name,' ',contact) like '%".$sid."%'";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by Sid DESC limit $start,$per_page";
$fetch= mysql_query($select_table);
}
//echo $select_table."sdfdfds".$page;
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['Sid']; ?></TD>
<TD><?php echo $row['First_Name']." ".$row['Last_Name']; ?></TD>
<TD><?php echo $row['contact']; ?></TD>
<TD><?php echo $row['Email']; ?></TD>
<TD>
<a href="#" class="ABCD" id="<?php echo $row['Sid']; ?>">[ X ]</a>
<a href="#" class="APP" id="<?php echo $row['Sid']; ?>">[ Show ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
              <ul class="pagination pull-right">
				<?php
				echo "<li><a href='#'class='pages' id='1'>|<</a></li>";
				for($i=1; $i<=$pages; $i++)
				{
					echo "<li><a href='#' class='pages' id=".$i.">".$i."</a></li>";
				}
				echo "<li><a href='#' class='pages' id=".--$i.">>|</a></li>";
				echo "<input type='hidden' id='pagva' class='pagva' name='pagva' style='width:30px;' value='".$page."'>";
				?>
</ul> 				
</div>