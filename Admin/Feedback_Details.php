  
        <div class="templatemo-content">
          <h1>Feedback Details</h1>
		<hr>

<script type="text/javascript" src="js/jquery.min.js"></script>

<div id="cp_contact_form">
 <label for="lastName" class="control-label">Search:</label>
 
<select class="form-control" id="sertex" name="sertex" Style="width:400px;">
<option value="">Select Feedback Sentiment </option>
<option value="positive">positive</option>
<option value="negative">negative</option>
</select>
					
</div>
<script type="text/javascript">
$("#sertex").change(function (e) {



var textcontent1 = $("#sertex").val();
var info = 'sid=' + textcontent1+"&page=1";
if(info=='')
{
	
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

	});
</script>

<hr>

<script type="text/javascript">
	$(document).ready(function(){
var textcontent2 = $("#pagva").val();
var dataString = 'page=1';//+ textcontent2;
document.getElementById("show").innerHTML="";
$("#flash").fadeIn(400).html('<span class="load"><img src="load.gif"></span>');
$.ajax({
type: "POST",
url: "Feedbackaction.php",
data: dataString,
cache: true,
success: function(html){
$("#flash").fadeIn(400).html('');
$("#show").append(html);
}  
});
return false;
});

</script>


<div id="container">

<div id="flash" class="flash"></div>
<div id="show" class="show"></div>

</div>
</div>
