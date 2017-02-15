<?php
	require_once("/../dataAccessLayer/dalLogin.php");
	
	$se = new Reg();
	$se->user_id = $_GET['id'];
    
    if($se->Delete())
	{   
		header("Location: member_view.php");
	}
	
?>