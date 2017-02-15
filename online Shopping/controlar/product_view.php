<?php
    require_once("/../dataAccessLayer/dalSession.php");
    session::checkA();
	require_once("/../dataAccessLayer/dalProduct.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
   if(isset($_GET['action']) && ($_GET['action']== "logout")){
        Session::StopA();
    }
?>
<div style="text-align:left;">
   <a href="admin.php">GO HOME</a>
   <br/><br/>
   <a href="product.php">Insert Product</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>

<h1 align="center">View Product</h1>
	<table width="500" align="center" border="1">
		<tr>
        	<th>Id</th>
            <th>Name</th>
            <th>Price</th>
            <th>Vat</th>
            <th>Discount</th>
            <th>Picture</th>
            <th>Details</th>
            <th>Quantity</th>
            <th>SubCategory</th>
            <th>Size</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        <?php
        	$p = new Product();
			$d = $p->View();
			for($i=0; $i<count($d); $i++)
			{
		?>
        
         <tr>
         	<td><?php echo $d[$i][0]; ?></td>
         	<td><?php echo $d[$i][1]; ?></td>
         	<td><?php echo $d[$i][2]; ?></td>
         	<td><?php echo $d[$i][3]; ?></td>
         	<td><?php echo $d[$i][4]; ?></td>
         	<td><img style="width: 150px;height: 150px;" src="<?php echo '../image/'.$d[$i][5]; ?>"></td>
         	<td><?php echo $d[$i][6]; ?></td>
         	<td><?php echo $d[$i][7]; ?></td>
         	<td><?php echo $d[$i][8]; ?></td>
         	<td><?php echo $d[$i][9]; ?></td>
         	<td><a  href="product_edit.php?id=<?php echo $d[$i][0] ?>">Update</a></td>
         	<td><a  href="product_delete.php?id=<?php echo $d[$i][0] ?>">Delete</a></td>
         </tr>
			
		<?php	
		}
		
		?>   	
    </table>

</body>
</html>