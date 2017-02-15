<?php
require_once("../dataAccessLayer/dalSession.php");

Session::Start();

if(isset($_GET['id']))
{
	if(isset($_SESSION['cart']))
	{
		$c=0;
		for($i=0; $i<count($_SESSION['cart']); $i++)
		{	
			if($_SESSION['cart'][$i] == $_GET['id'])
			{
				$c++;
				break;
			}	
		}
		if($c == 0)
		{
			$_SESSION['cart'][] = $_GET['id'];
			$_SESSION['qty'][] = 1;
		}
			
	}
	else
	{
		$_SESSION['cart'][] = $_GET['id'];
		$_SESSION['qty'][] = 1; 	
	}
	
}
header("Location: details.php?id={$_GET['id']}");

?>