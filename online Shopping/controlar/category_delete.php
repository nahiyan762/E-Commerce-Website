<?php
	require_once("/../dataAccessLayer/dalCategory.php");
	$c = new Category();
	$c->Category_id = $_GET['id'];
	if($c->Delete())
	{
		header("Location: category_view.php");
	}
	else
	{
		print "Hoy nai";
	}
?>