<?php
session_start();
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
url: "Transportvalid.php",
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
url: "Transportvalid.php",
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
url: "Transportaction.php",
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
url: "Transportaction.php",
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
url: "Transportaction.php",
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
$delete = "DELETE FROM transport WHERE Tid='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from transport where Tid=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div id="cp_contact_form">
<div id="cp_contact_form">
<form action="Transportaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">ID</label>
                    <input type="text" name="ucontent" size="0" maxlength="0" value="<?php echo $row['Tid']; ?>" class="form-control" id="firstName" Placeholder="ID">           
                  </div>

		
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Type</label>
                    <Select name="ucontent1"  class="form-control" id="firstName">   
					<option value="<?php echo $row['Ttype']; ?>"><?php echo $row['Ttype']; ?></option>
					<option value="Bus">Bus</option>
					<option value="Rail">Rail</option>
					<option value="Travels">Travels</option>
					<option value="Tempo">Tempo</option>
					</Select>
                  </div> 
				 </div>

		<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Title</label>
                    <input type="text" name="ucontent2"  value="<?php echo $row['Tname']; ?>" class="form-control" id="lastName" Placeholder="Title">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Info</label>
                    <textarea name="ucontent3" class="form-control" id="firstName"><?php echo $row['TAddress']; ?>  </textarea>
                  </div>
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Contact</label>
                    <input type="text" name="ucontent4" value="<?php echo $row['Tcontact']; ?>" class="form-control"  Placeholder="Contact" id="lat">           
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">From</label>
                    <input type="text" name="ucontent5" value="<?php echo $row['Tfrom']; ?>" class="form-control"  Placeholder="From" id="lat">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">To</label>
                    <input type="text" name="ucontent6"  value="<?php echo $row['Tto']; ?>" class="form-control"  Placeholder="To" id="lng">        
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
<form  action="Transportaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

				<div class="row">

                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Type</label>
                    <Select name="content1"  class="form-control" id="firstName">   
					<option value="Bus">Bus</option>
					<option value="Rail">Rail</option>
					<option value="Travels">Travels</option>
					<option value="Tempo">Tempo</option>
					</Select>
                  </div> 
				 </div>

		<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Title</label>
                    <input type="text" name="content2"  value="" class="form-control" id="lastName" Placeholder="Title">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Info</label>
                    <textarea name="content3" class="form-control" id="firstName"></textarea>
                  </div>
				  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Contact</label>
                    <input type="text" name="content4" value="" class="form-control"  Placeholder="Contact" id="lat">           
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">From</label>
                    <input type="text" name="content5" value="" class="form-control"  Placeholder="From" id="lat">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">To</label>
                    <input type="text" name="content6"  value="" class="form-control"  Placeholder="To" id="lng">        
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
if(isset($_POST['content1']))
{

$content1=mysql_real_escape_string($_POST['content1']);
$content2=mysql_real_escape_string($_POST['content2']);
$content3=mysql_real_escape_string($_POST['content3']);
$content4=mysql_real_escape_string($_POST['content4']);
$content5=mysql_real_escape_string($_POST['content5']);
$content6=mysql_real_escape_string($_POST['content6']);

mysql_query("INSERT INTO transport(Ttype,Tname,TAddress,Tcontact,Tfrom,Tto) VALUES('$content1','$content2','$content3','$content4','$content5','$content6')");

echo "<font style='color:#0000FF;'>Record Saved</font><br><br><br>";
}
if(isset($_POST['ucontent']))
{

$ucontent=mysql_real_escape_string($_POST['ucontent']);
$ucontent1=mysql_real_escape_string($_POST['ucontent1']);
$ucontent2=mysql_real_escape_string($_POST['ucontent2']);
$ucontent3=mysql_real_escape_string($_POST['ucontent3']);
$ucontent4=mysql_real_escape_string($_POST['ucontent4']);
$ucontent5=mysql_real_escape_string($_POST['ucontent5']);
$ucontent6=mysql_real_escape_string($_POST['ucontent6']);


$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("update transport set Ttype='$ucontent1', Tname='$ucontent2',TAddress='$ucontent3',Tcontact='$ucontent4',Tfrom='$ucontent5',Tto='$ucontent6' where Tid=$ucontent");
echo "<font style='color:#0000FF;'>Record Update</font><br><br><br>";
}
?>


<div class="table-responsive">
<h4 class="margin-bottom-15">All Transport</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b> ID</b></td>
<td><b> Title</b></td>
<td><b> Type</b></td>
<td><b> From-To</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
					$per_page = 5; 
					$select_table = "select * from transport";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by Tid limit $start,$per_page";
$fetch= mysql_query($select_table);
}
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['Tid']; ?></TD>
<TD><?php echo $row['Tname']; ?></TD>
<TD><?php echo $row['Ttype']; ?></TD>
<TD><?php echo $row['Tfrom']; ?> - <?php echo $row['Tto']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['Tid']; ?>">[ Delete ]</a>
<a href="#" class="Edit" id="<?php echo $row['Tid']; ?>">[ Update ]</a>
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
