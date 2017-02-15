<?php
	require_once("/../dataAccessLayer/dalSub-Category.php");
	
	$sc = new SubCategory();
	$sc->SubCategory_id = $_GET['id'];
	if($sc->Delete())
	{
		header("Location: sub-category_view.php");
	}
	else
	{
		print "Hoy nai";
	}
?>