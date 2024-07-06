</br></br></br>
<div class="col-sm-12">
</br>
<div class="table-agile-info">


<h3>Feedback <a href="Main.php?page=2">[Post Feedback]</a></b><hr></h3>

<?php
if(isset($_SESSION['userid']))
{
?>

<?php
if(isset($_GET['FID']) and $_GET['FID']!='')
{
$FID=$_GET['FID'];
$delete = "DELETE FROM feedbacktb WHERE FID='$FID'";
mysql_query($delete);
echo "<script> alert('Feedback Deleted Successfully .!');</script>";
}
?>
				
<div class="panel panel-default" id="mydiv"><div class="">

<div class="table-responsive">
 <table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b>ID</b></td>
<td><b>Feedback</b></td>
<td><b>Postdate</b></td>
<td><b>Type Of Feedback</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
$sid=$_SESSION['userid'];
$select_table = "select * from feedbacktb where UID=".$sid." order by FID";
$fetch= mysql_query($select_table);

while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['FID']; ?></TD>
<TD><?php echo $row['Feedback']; ?></TD>
<TD><?php echo $row['Postdate']; ?></TD>
<TD><a href="Main.php?page=3&FID=<?php echo $row['FID']; ?>">[ X ]</a></TD>
</TR>
<?php
}
?>
</tbody></TABLE> 
  
</div></div>
</div>
<?php
}
?>

</div>		

<style>
#mydiv
{
padding-left: 15px;
padding-right: 15px;
padding-top: 10px;
padding-bottom: 10px;
box-shadow: 0 0.1875rem 1.25rem rgba(0, 0, 0, 0.16);
margin-bottom: 0.625rem;
border-radius: 10px;
font-size:90%;
}

#myimg
{
	width:80px;
	height:80px;
	background: #0000ff;
	border-radius: 80%;
	float:left;
	margin-right: 0.625rem;

  background-image: url('bg1.jpg');

}

#mybutton
{
color: rgba(0, 0, 0, 0.87);
    border: none;
    cursor: default;
    height: 32px;
    display: inline-flex;
    outline: none;
    padding: 10px;
	margin-right: 10px;
    font-size: 0.8125rem;
    box-sizing: border-box;
    transition: background-color 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms,box-shadow 300ms cubic-bezier(0.4, 0, 0.2, 1) 0ms;
    align-items: center;
    font-family: SF Pro Display,"Helvetica Neue",Arial,sans-serif;
    white-space: nowrap;
    border-radius: 16px;
    vertical-align: middle;
    justify-content: center;
    text-decoration: none;
    background-color: #e0e0e0;
	font-size:70%;
}	
.panel-heading {
    position: relative;
    height: 57px;
    line-height: 57px;
    letter-spacing: 0.2px;
    color: black;
    font-size: 18px;
    font-weight: 400;
    padding: 0 16px;
    background:#dea1e2;
   border-top-right-radius: 2px;
   border-top-left-radius: 2px; 
    text-transform: uppercase;
    text-align: center;
}
</style>