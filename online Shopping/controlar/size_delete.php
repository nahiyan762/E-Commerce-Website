<?php
	require_once("/../dataAccessLayer/dalSize.php");
	//require_once("size_view.php");
	
	$s = new Size();
	$s->Size_id = $_GET['id'];
	//print $s->Size_id;
	if($s->Delete())
	{
		header("Location: size_view.php");
	}
	else
	{
		print "hoy nai";
	}
?>