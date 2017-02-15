<?php
$connection = mysqli_connect("localhost","root","","project");
$output = "";
$sql = "SELECT * FROM service WHERE service_id = '".$_POST['ser_Id']."'";
$result = mysqli_query($connection,$sql);

while ($row = mysqli_fetch_array($result)) {
	$output .= '<input name="cost" value="'.$row["s_price"].'"/>';
}

echo $output;
?>