<?php
$connection = mysqli_connect("localhost","root","","project");
	if(isset($_POST['sub']))
	{
		for($i=0; $i<count($_POST['check']); $i++)
		{
			$sql = "UPDATE `project`.`delivery` SET `check` = 'clear' WHERE `delivery`.`delivery_id` = '".$_POST['check'][$i]."';";
			print $sql;
			if(mysqli_query($connection, $sql))
			{
				header("Location: delivary_view.php");
			}
			else
			{
				print "Hoy nai";	
			}
		}
	}
?>

