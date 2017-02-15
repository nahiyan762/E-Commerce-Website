<?php
	require_once("/../dataAccessLayer/dalService.php");
	
	$se = new Service();
	$se->service_id = $_GET['id'];
    
    if($se->Delete())
	{   
		header("Location: service_view.php");
	}
	
?>