<?php
date_default_timezone_set("Asia/Kolkata");
mysql_connect("localhost","root") or die("Could not connect".mysql_error());
mysql_select_db("feedback")or die("Could not connect: ". mysql_error());
$Rdateus=date('Y-m-d h:i:s');

?>