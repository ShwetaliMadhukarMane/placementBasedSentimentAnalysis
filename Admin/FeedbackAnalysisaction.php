<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
session_start();
include('db.php');

$select_table = "SELECT Feedbacktype, COUNT(*) as count FROM feedbacktb GROUP BY Feedbacktype";
$fetch= mysql_query($select_table);
$data = array();

while($row = mysql_fetch_array($fetch))
{
$data[$row['Feedbacktype']] = $row['count'];
}

echo json_encode($data);
?>