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
url: "Officesvalid.php",
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
url: "Officesvalid.php",
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
url: "Officesaction.php",
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
url: "Officesaction.php",
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
url: "Officesaction.php",
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
$delete = "DELETE FROM Offices WHERE ID='$id'";
mysql_query( $delete);
}
?>

<?php
if(isset($_POST['ide']))
{
$id=$_POST['ide'];
$select_table = "select * from Offices where ID=".$id;
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
<div id="cp_contact_form">
<div id="cp_contact_form">
<form action="Officesaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">ID</label>
                    <input type="text" name="ucontent" size="0" maxlength="0" value="<?php echo $row['ID']; ?>" class="form-control" id="firstName" Placeholder="ID">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Title</label>
                    <input type="text" name="ucontent1"  value="<?php echo $row['Title']; ?>" class="form-control" id="lastName" Placeholder="Title">        
                  </div>
                </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Address</label>
                    <textarea name="ucontent2" class="form-control" id="firstName"><?php echo $row['Address']; ?>  </textarea>
                  </div>
                </div>

			<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Type</label>
                    <Select name="ucontent3"  class="form-control" id="firstName">   
					<option value="<?php echo $row['type']; ?>"><?php echo $row['type']; ?></option>
					<option value="Goverment">Goverment</option>
					<option value="Non Goverment">Non Goverment</option>
					</Select>
                  </div> </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Latitude</label>
                    <input type="text" name="ucontent4" size="0" value="<?php echo $row['Latitude']; ?>" class="form-control"  Placeholder="Latitude" id="lat">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Longitude</label>
                    <input type="text" name="ucontent5"  value="<?php echo $row['Longitude']; ?>" class="form-control"  Placeholder="Longitude" id="lng">        
                  </div>
                </div>

<input  type="file" name="file" placeholder="Select File" value="">

              <div class="row templatemo-form-buttons">

        <script>
            var map;
            function initialize() {
                var mapOptions = {
                    zoom: 12,
                    center: new google.maps.LatLng(16.6972161, 74.2825023),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('map_canvas'),
                    mapOptions
                );
                google.maps.event.addListener(map, 'click', function(event) {

                });
            }

			
function newLocation(newLat,newLng) {
	map.setCenter({
		lat : newLat,
		lng : newLng
	});

            function mapDivClicked (event) {
				
                var target = document.getElementById('map_canvas'),
                    posx = event.pageX - target.offsetLeft,
                    posy = event.pageY - target.offsetTop,
                    bounds = map.getBounds(),
                    neLatlng = bounds.getNorthEast(),
                    swLatlng = bounds.getSouthWest(),
                    startLat = neLatlng.lat(),
                    endLng = neLatlng.lng(),
                    endLat = swLatlng.lat(),
                    startLng = swLatlng.lng();

                document.getElementById('lat').value = startLat + ((posy/350) * (endLat - startLat));
                document.getElementById('lng').value = startLng + ((posx/500) * (endLng - startLng));
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>


        <div id="map_canvas" onclick="mapDivClicked(event);" style="height: 350px; width: 100%;"></div>


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
<form  action="Officesaction.php" method="post" name="form" id="form" enctype="multipart/form-data">

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Title</label>
                    <input type="text" name="content"  class="form-control" id="lastName" Placeholder="Title">        
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
                    <label for="firstName" class="control-label">Type</label>
                    <Select name="content2"  class="form-control" id="firstName">   
					<option value="Goverment">Goverment</option>
					<option value="Non Goverment">Non Goverment</option>
					</Select>
                  </div> </div>

				<div class="row">
                  <div class="col-md-6 margin-bottom-15">
                    <label for="firstName" class="control-label">Latitude</label>
                    <input type="text" name="content3" size="0" value="" class="form-control"  id="lat" Placeholder="Latitude">           
                  </div>
                  <div class="col-md-6 margin-bottom-15">
                    <label for="lastName" class="control-label">Longitude</label>
                    <input type="text" name="content4"  value="" class="form-control" id="lng" Placeholder="Longitude">        
                  </div>
                </div>

<input  type="file" name="file" placeholder="Select File" value="">


              <div class="row templatemo-form-buttons">

        <script>
            var map;
            function initialize() {
                var mapOptions = {
                    zoom: 12,
                    center: new google.maps.LatLng(16.6972161, 74.2825023),
                    mapTypeId: google.maps.MapTypeId.ROADMAP
                };
                map = new google.maps.Map(document.getElementById('map_canvas'),
                    mapOptions
                );
                google.maps.event.addListener(map, 'click', function(event) {

                });
            }
            function mapDivClicked (event) {
                var target = document.getElementById('map_canvas'),
                    posx = event.pageX - target.offsetLeft,
                    posy = event.pageY - target.offsetTop,
                    bounds = map.getBounds(),
                    neLatlng = bounds.getNorthEast(),
                    swLatlng = bounds.getSouthWest(),
                    startLat = neLatlng.lat(),
                    endLng = neLatlng.lng(),
                    endLat = swLatlng.lat(),
                    startLng = swLatlng.lng();

                document.getElementById('lat').value = startLat + ((posy/350) * (endLat - startLat));
                document.getElementById('lng').value = startLng + ((posx/500) * (endLng - startLng));
            }
            google.maps.event.addDomListener(window, 'load', initialize);
        </script>
        <div id="map_canvas" onclick="mapDivClicked(event);" style="height: 350px; width: 100%;"></div>


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
$content3=mysql_real_escape_string($_POST['content3']);
$content4=mysql_real_escape_string($_POST['content4']);

$RD=date('Y-m-d');

$h="";
if(isset($_FILES['file']['name']))
	{
$h=time().$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"../upload/".$h); 
	}


mysql_query("INSERT INTO Offices(Title,Address,datesave,Imgfile,type,Latitude,Longitude) VALUES('$content','$content1','$RD','$h','$content2','$content3','$content4')");

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

$h="";
if(isset($_FILES['file']['name']))
	{
$h=time().$_FILES['file']['name'];
move_uploaded_file($_FILES['file']['tmp_name'],"../upload/".$h); 
	}

$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("update Offices set Title='$ucontent1', Address='$ucontent2',Imgfile='$h',type='$ucontent3',Latitude='$ucontent4',Longitude='$ucontent5' where ID=$ucontent");
echo "<font style='color:#0000FF;'>Record Update</font><br><br><br>";
}
?>


<div class="table-responsive">
<h4 class="margin-bottom-15">All Offices and Business</h4>
<table class="table table-striped table-hover table-bordered">
<thead><tr>
<td><b> ID</b></td>
<td><b> Title</b></td>
<td><b> Type</b></td>
<td><b> Date</b></td>
<td></td>
</tr></thead>
<tbody>
<?PHP
					$per_page = 5; 
					$select_table = "select * from Offices";
					$fetch= mysql_query($select_table);
					$count = mysql_num_rows($fetch);
					$pages = ceil($count/$per_page);

$page=1;
if(isset($_POST['page']))
{
$page=$_POST['page'];
$start = ($page-1)*$per_page;
$select_table =$select_table." order by ID limit $start,$per_page";
$fetch= mysql_query($select_table);
}
while($row = mysql_fetch_array($fetch))
{
?>
<TR>
<TD><?php echo $row['ID']; ?></TD>
<TD><?php echo $row['Title']; ?></TD>
<TD><?php echo $row['type']; ?></TD>
<TD><?php echo $row['datesave']; ?></TD>
<TD><a href="#" class="ABCD" id="<?php echo $row['ID']; ?>">[ Delete ]</a>
<a href="#" class="Edit" id="<?php echo $row['ID']; ?>">[ Update ]</a>
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
