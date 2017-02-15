<?php
	require_once("/../dataAccessLayer/dalProduct.php");
	
	$p = new Product();
	$p->product_id = $_GET['id'];
    $sql = "SELECT picture FROM product WHERE product_id = '".$_GET['id']."';";
    $sql_connect = mysqli_query($p->DB(),$sql);
    $del = mysqli_fetch_object($sql_connect);
    $pic_name = $del->picture;

	if($p->Delete())
	{   
		
		unlink('../image/'.$pic_name);
		header("Location: product_view.php");
	}
	else
	{
		print "Hoy nai";
	}
?>