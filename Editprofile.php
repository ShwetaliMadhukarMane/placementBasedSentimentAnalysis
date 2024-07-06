<section class="wrapper">

<?php

if(isset($_SESSION['userid']))
{
$select_table = "select * from  student where Sid='".$_SESSION['userid']."'";
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
		<div class="agil-info-calendar">

		
				<!--notification start-->
				
					<header class="panel-heading">
						Edit Student Profile
					</header>
					
	<div class="notifications">

<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.form.js"></script>
				
				<script type="text/javascript" >
				$(function() {
				$("#submit_button").click(function() {
				$("#create_account").ajaxForm({
						target: '#preview'
					}).submit();
				});
				}); 
				</script>
				

 <form class="form-horizontal" role="form" action="Studentaction.php" method="post" id="create_account">
	  
	  <input type="hidden" name="UID" value="<?php echo $row['Sid']; ?>" />
	  
 <fieldset style="border:1px solid silver;">

        <br>
		 <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">First Name</label>
            <div class="col-sm-10">

<input type="text" size="30" name="FName" class="form-control" value="<?php echo $row['First_Name']; ?>" Placeholder="Name"/>
            </div>
          </div>              
        </div>

		 <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">Mid Name</label>
            <div class="col-sm-10">

<input type="text" size="30" name="MName" class="form-control" value="<?php echo $row['Mid_Name']; ?>" Placeholder="Name"/>
            </div>
          </div>              
        </div>

		 <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">Last Name</label>
            <div class="col-sm-10">

<input type="text" size="30" name="LName" class="form-control" value="<?php echo $row['Last_Name']; ?>" Placeholder="Name"/>
            </div>
          </div>              
        </div>

		
				  <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
<?php echo $row['Email']; ?>
            </div>
          </div>              
        </div>
		
		
		  <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-2 control-label">Mobile No</label>
            <div class="col-sm-10">
<input type="text" size="12" name="Mobile" class="form-control" value="<?php echo $row['contact']; ?>" Placeholder="Mobile No"/>
            </div>
          </div>              
        </div>
 
 
		
        <div class="form-group">
          <div class="col-md-12">
            <div class="col-sm-offset-2 col-sm-10">
              <input type="Button" value="Submit" name="signin" class="form-control" id="submit_button">
            </div>
          </div>
        </div>
		
		<div class="col-md-12" id="preview"></div>
		
		 </fieldset>
      </form>



				<!--notification end-->
				</div>
			</div>
			<div class="clearfix"> </div>
		</div>

	<?php
}
}
?>
</section>