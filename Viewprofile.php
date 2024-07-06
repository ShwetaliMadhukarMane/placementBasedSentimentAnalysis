<section class="wrapper">

<?php

if(isset($_SESSION['userid']))
{
$select_table = "select * from student where Sid='".$_SESSION['userid']."'";
$fetch= mysql_query($select_table);
while($row = mysql_fetch_array($fetch))
{
?>
		<div class="agil-info-calendar">

		<div class="col-md-12 w3agile-notifications">
			<div class="notifications">
				<!--notification start-->
				
					<header class="panel-heading">
						Student Profile <a href="Main.php?page=6">[ Edit ]</a>
					</header>
					<div class="notify-w3ls">
						<div class="alert alert-info clearfix">
						<br><br>
							<div class="notification-info">
								Name : <?php echo $row['First_Name'].' '.$row['Mid_Name'].' '.$row['Last_Name']; ?><br><br>
								Email : <?php echo $row['Email']; ?><br><br>
								Mob : <?php echo $row['contact']; ?><br><br>
								Course : <?php echo $row['Course']; ?><br><br>
							</div>
						</div>
												
					</div>
				
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