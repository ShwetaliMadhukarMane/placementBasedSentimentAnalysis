<?php
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
url: "Contactaction.php",
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
url: "Contactaction.php",
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
url: "Contactaction.php",
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
$delete = "DELETE FROM contact WHERE CID='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$tit="";
$mess="";
$dtval="";

$id=$_POST['ide'];
$select_table = "select * from contact where CID=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
$tit=$row['Subject'];
$mess=$row['Message'];
//$dtval=$row['Datetm'];
//echo $row['Subject'];
//echo $row['Message'];
//echo $row['Datetm'];
$RD=date('Y-m-d');
mysql_query("INSERT INTO news(NTitle,Ninfo,Ndate) VALUES('$tit','$mess','$RD')");
}

}
?>

<div class="table-responsive">
<h4 class="margin-bottom-15">Contact Table</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>ID</b></td>
<td><b>Name</b></td>
<td><b>Email</b></td>
<td><b>Subject</b></td>
<td><b>Message</b></td>
<td><b>Date Time</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
					$per_page = 5; 
					$select_table = "select * from contact";
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
<TD><?php echo $row['Name']; ?></TD>
<TD><?php echo $row['Email']; ?></TD>
<TD><?php echo $row['Subject']; ?></TD>
<TD><?php echo $row['Message']; ?></TD>
<TD><?php echo $row['Datetm']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['CID']; ?>">[ Delete ]</a>
<TD><a href="#" class="Edit" id="<?php echo $row['CID']; ?>">[ Add In News ]</a>
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