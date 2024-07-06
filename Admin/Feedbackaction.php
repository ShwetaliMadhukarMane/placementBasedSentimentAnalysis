<?php
session_start();
include('db.php');
include('valid.php');
?>
<div id="flash" class="flash"></div>


<script type="text/javascript">
// Delete selection Record Into Table++++++++++++++++++++++++++++++++++++++++++++++++++++++
$(function() {
$(".ABCD").click(function() {
var element = $(this);
var uid = element.attr("id");
var textcontent2 = $("#sertex").val();
var info = 'id=' + uid+'&sid='+ textcontent2;

if(info=='')
{
//alert("Select For delete..");
//$("#content").focus();
}
else
{
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Feedbackaction.php",
data: info,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
 
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

mysql_query("Delete From feedbacktb where FID='$id'");

echo '<script>alert("Deleted..");</script>';
}
?>

 



<div class="table-responsive">
<h4 class="margin-bottom-15">Feedback List</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>Id</b></td>
<td><b>Feedback</b></td>
<td><b>Date</b></td>
<td><b>Sentiment</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$criteria=100;
$sid="";

if(isset($_POST['sid']) and $_POST['sid']!="")
{
$sid=$_POST['sid'];
}

$select_table ="select * from feedbacktb where Feedbacktype like '%".$sid."%'";
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['FID']; ?></TD>
<TD><?php echo $row['Feedback']; ?></TD>
<TD><?php echo $row['Postdate']; ?></TD>
<TD><?php echo $row['Feedbacktype']; ?></TD>
<TD>
<a href="#" class="ABCD" id="<?php echo $row['FID']; ?>">[ X ]</a>
</TD>
</TR>
<?php
}
?>
</tbody></TABLE> 

</div>
