<section class="wrapper">

		<div class="agil-info-calendar">

		
				<!--notification start-->
				
					<header class="panel-heading">
						Student Feedback
					</header>
					
	<div class="notifications">

<script type="text/javascript" src="js/jquery.min.js"></script>

<script type="text/javascript" src="js/jquery.form.js"></script>
				
				<script type="text/javascript" >
				$(function() {
				$("#submit_button").click(function() {
				$("#create_account").ajaxForm({
						success: function(responseText){
								
								
								$.ajax({
								type: "POST",
								url: "http://127.0.0.1:5555/success",
								data: '',
								cache: true,
								success: function(html){
									//alert(html);
									$("#preview").html(responseText);
								}  
								});
								
							}
					}).submit();
				});
				}); 
				</script>
				

 <form class="form-horizontal" role="form" action="Feedbackpostaction.php" method="post" id="create_account">
	  
	  <input type="hidden" name="UID" value="<?php echo $_SESSION['userid']; ?>" />
	  
 <fieldset style="border:1px solid silver;"><br>

        
		 <div class="form-group">
          <div class="col-md-12">
            <label for="username" class="col-sm-4 control-label">Post Your Feedback </label>
            <div class="col-sm-8">

<textarea type="text" name="Feedback" class="form-control" ></textarea>
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
</section>