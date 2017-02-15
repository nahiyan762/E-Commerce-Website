<?php
     require_once("../dataAccessLayer/dalSession.php");
	 Session::Start();
	 require_once("../dataAccessLayer/dalProduct.php");
     require_once("../dataAccessLayer/dalService.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>

        <a href="viewregistration.php">View Profile</a>
		<table width="1000" align="center" border="1">
		<tr>
            <th>Product</th>
            <th>Price</th>
            <th>Vat</th>
            <th>Discount</th>
            <th>Quantity</th>
            <th>Total Price</th>
            <th>Delete</th>
        </tr> 
        
        <?php
		
		if(isset($_POST['sub']))
		{
			
			for($i=0; $i<count($_SESSION['cart']); $i++)
			{
				//print "for loop in";
				if(isset($_POST['qty_' . $_SESSION['cart'][$i]]))
				{
					
					//print $_POST['qty_' . $_SESSION['cart'][$i]];
					$_SESSION['qty'][$i] = $_POST['qty_'.$_SESSION['cart'][$i]]; 
				}
			}
		}
		
		
		$total = 0;
        	for($i=0; $i<count($_SESSION['cart']); $i++)
			{
				$p = new Product();
				$p->product_id = $_SESSION['cart'][$i];
				$r = $p->SelectById();
				print "<tr>";
print "<td align=\"center\"><img style=\"width: 50px;height: 50px;\" src=\"../image/$r[5]\"></td>";
					echo "<td align=\"center\">","$","$r[2]</td>";
					echo "<td align=\"center\">$r[3]","%","</td>";
					echo "<td align=\"center\">$r[4]","%","</td>";
					print "<td align=\"center\">";
		?>
        				<form action="" method="post">
                          <input type="text" name="qty_<?php print $_SESSION['cart'][$i];?>" value="<?php print $_SESSION['qty'][$i];?>">
                          <input type="submit" name="sub" value="Update">
                        </form>
		<?php				
					print "</td>";
					print "<td align=\"center\">";
						   $price = $r[2] * $_SESSION['qty'][$i];               
						   echo "$".$t = $price + ($price * $r[3])/100 - ($price * $r[4])/100; 
						   $total += $t;  
					print "</td>";
					print "<td align=\"center\"><a href=\"cart_remove.php?id={$_SESSION['cart'][$i]}\">Remove</a></td>";
					
				print "</tr>";
			
			}
			
		?>
                    <form action="purchase.php" method="post">
                        <tr>
                            <td colspan="5" align="right">Total Amount: </td>
                            <td colspan="2" align="center">
                            <?php print "$".$total; Session::Set("total",$total); ?></td>
                        </tr>
                        <tr align="center">
                        	<td colspan="4"><a href="../index.php">Continue Shopping</a></td>
                        	<td colspan="3"><input type="submit" name="sub" value="Place Order"></td>
                        </tr>	
                    </form>
    </table>

</body>
</html>