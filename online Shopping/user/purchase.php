<?php
	
	require_once("../dataAccessLayer/dalSession.php");
	require_once("../dataAccessLayer/dalPurchase.php");
	require_once("../dataAccessLayer/dalOrder.php");
	

if(isset($_POST['sub']))
{
	if(Session::CheckUserLogin())
	{
		$p = new Purchase();
		$p->Date = date("Y-m-d");
		$p->total = $_SESSION['total'];
		$p->user_id = $_SESSION['userId'];	
		if($p->Insert())
		{
			for($i=0; $i<count($_SESSION['cart']); $i++)
			{
				$o = new Order();
				$o->Quantity = $_SESSION['qty'][$i];
				$o->ProductId = $_SESSION['cart'][$i];
				$o->PurchaseId = $p->Id;
				$o->Insert();
			}
			unset($_SESSION['cart']);
			unset($_SESSION['qty']);
			header("Location: delivary.php");
		}
		else
		{
			print "Perchase hoy nai";
		}
	}
	else
	{
		print "<a href=\"login.php\">Please Login!</a>";
	}
}
else
{
	print "ase nai";
}
?>
