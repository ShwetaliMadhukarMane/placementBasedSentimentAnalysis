<?php
include('db.php');
?>
<div id="flash" class="flash"></div>
<script type="text/javascript" src="./jquery-1.4.2.min.js"></script>
<script type="text/javascript" src="js/jquery.min.js" ></script>
<script type="text/javascript" src="js/jquery.form.js"></script>

<script type="text/javascript">
// Insert Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".submit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();

$.ajax({
type: "POST",
url: "Impcvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
//document.getElementById("show").innerHTML="";
				$("#form").ajaxForm({
						target: '#show'
					}).submit();
}
else
	{
	alert(html);
	}
}  
});



return false;
});
});
</script>

<script type="text/javascript">
// Update Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Updatesubmit_button").click(function() {
var dataString = $('#form').serialize()+'&page='+ $("#pagva").val();;

$.ajax({
type: "POST",
url: "Impcvalid.php",
data: dataString,
cache: true,
success: function(html){
if(html=="Yes")
{
//document.getElementById("show").innerHTML="";
				$("#form").ajaxForm({
						target: '#show'
					}).submit();
}
else
	{
	alert(html);
	}
	}  
});

return false;
});
});
</script>

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
url: "Impcaction.php",
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
// Update selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".Edit").click(function() {
var element = $(this);
var del_id = element.attr("id");
var textcontent2 = $("#pagva").val();
var info = 'ide=' + del_id+'&page='+ textcontent2;

if(info=='')
{
alert("Select For Edit..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Impcaction.php",
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
url: "Impcaction.php",
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
$delete = "DELETE FROM impcontact WHERE CID='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from impcontact where CID=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div id="cp_contact_form">
<div id="cp_contact_form">
<form action="Impcaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">ID</label>
                    <input type="text" name="ucontent" size="0" maxlength="0" value="<?php echo $row['CID']; ?>" class="form-control" id="firstName" Placeholder="ID">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Name</label>
                    <input type="text" name="ucontent1"  value="<?php echo $row['CName']; ?>" class="form-control" id="lastName" Placeholder="Name">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Address</label>
                    <textarea name="ucontent2" class="form-control" id="firstName"><?php echo $row['CAddress']; ?></textarea>
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Contact No</label>
                    <input type="text" name="ucontent3" value="<?php echo $row['Contactno']; ?>" class="form-control" id="firstName" Placeholder="Contact No">           
                  </div>
                </div>

              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="Updatesubmit_button">Update</button>   
                </div>
              </div>
</form>
</form>
</div>
</div>
<?php
}
}
else
{
?>
<div id="cp_contact_form">
<div id="cp_contact_form">
<form  action="Impcaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Name</label>
                    <input type="text" name="content"  class="form-control" id="lastName" Placeholder="Name">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Address</label>
                    <textarea name="content1" class="form-control" id="firstName"></textarea>
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Contact No</label>
                    <input type="text" name="content2"  class="form-control" id="lastName" Placeholder="Contact No">        
                  </div>
                </div>

              <div class="row templatemo-form-buttons">
                <div class="col-md-12">
                  <button type="button" name="submit" class="submit_button">Save</button>   
                </div>
              </div>

</form>
</div>
</div>
<?php
}
?>


<?php
if(isset($_POST['content']))
{

$content=mysql_real_escape_string($_POST['content']);
$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);

mysql_query("INSERT INTO impcontact(CName,CAddress,Contactno) VALUES('$content','$content1','$content2')");
echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}
if(isset($_POST['ucontent']))
{

$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);

mysql_query("update impcontact set CName='$ucontent1',CAddress='$ucontent2',Contactno='$ucontent3' where CID=$ucontent");
echo "<font style='color:#0000FF;'>Record Update</font><br><br><br>";
}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">All Contacts Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b> ID</b></td>
<td><b> Name</b></td><td><b> Address</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
					$per_page = 5; 
					$select_table = "select * from impcontact";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by CID limit $start,$per_page";
$fetch= mysql_query($select_table);
}
//echo $select_table."sdfdfds".$page;
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['CID']; ?></TD>
<TD><?php echo $row['CName']; ?></TD>
<TD><?php echo $row['CAddress']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['CID']; ?>">[ Delete ]</a>
<a href="#" class="Edit" id="<?php echo $row['CID']; ?>">[ Update ]</a>
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