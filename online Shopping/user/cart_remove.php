 <?php   
 require_once("../dataAccessLayer/dalSession.php");
 
 Session::Start();
 
	if(isset($_GET['id']))
	{
		//print $_GET['id'];
		for($i = 0; $i < count($_SESSION['cart']); $i++) 
		{
			if($_SESSION['cart'][$i] == $_GET['id']) 
			{
				//print $_GET['id'];
				unset($_SESSION['cart'][$i]);
				unset($_SESSION['qty'][$i]);				
				
				for($j = $i; $j < count($_SESSION['cart']) - 1; $j++)
				{	
					$_SESSION['cart'][$j] = $_SESSION['cart'][$j+1];
					$_SESSION['qty'][$j] = $_SESSION['qty'][$j+1];
				}
				
				if($i < count($_SESSION['cart'])-1) 
				{
					unset($_SESSION['cart'][count($_SESSION['cart'])-1]);
					unset($_SESSION['qty'][count($_SESSION['qty'])-1]);
				}
				break;

			}
		}
	}
	header("Location: checkout.php");
?>

