<?php
    require_once("/../dataAccessLayer/dalSession.php");
    session::checkA();
	require_once("/../dataAccessLayer/dalProduct.php");
	require_once("/../dataAccessLayer/dalSub-Category.php");
	require_once("/../dataAccessLayer/dalSize.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>untitled</title>
</head>
<body>
<?php
   if(isset($_GET['action']) && ($_GET['action']== "logout"))
   {
        Session::StopA();
    }
?>
<div style="text-align:left;">
   <a href="admin.php">GO HOME</a>
   <br/><br/>
   <a href="product_view.php">View Product Table</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>
<?php

if (isset($_POST['sub'])){

   $pro = new Product();
   $pro->p_name = $_POST['name'];
   $pro->price = $_POST['price'];
   $pro->vat = $_POST['vat'];
   $pro->discount = $_POST['discount'];
   $pro->picture = $_FILES['pic']['name'];
   $pro->details = $_POST['details'];
   $pro->quantity = $_POST['quantity'];
   $pro->subcat_id = $_POST['subcatagory'];
   $pro->size_id = $_POST['size'];
   if ($pro->Insert()) {
   	   echo "Insert Sucessfully";

   	   $image_type = $_FILES['pic']['type'];
       if ($image_type=='image/jpeg' || $image_type=='image/jpg' || $image_type=='image/png') 
	   {
              
              move_uploaded_file($_FILES['pic']['tmp_name'],'../image/'.$_FILES['pic']['name']);
		}

   }
   else { 
   	      echo "Data Failed";
   	      //echo $_POST['size'];
    }


}

?>

<h1 align="center">Insert Product</h1>
<form action="" method="post" enctype="multipart/form-data">
	<table align="center">
	    <tr>
	    	<td>Name: </td>
	    	<td><input type="text" name="name" /></td>
	    </tr>
	    <tr>
	    	<td>Price:</td>
	    	<td><input type="text" name="price" /></td>
	    </tr>
	    <tr>
	    	<td>Vat:</td>
	    	<td><input type="text" name="vat" /></td>
	    </tr>
	    <tr>
	    	<td>Discount:</td>
	    	<td><input type="text" name="discount" /></td>
	    </tr>
	    <tr>
	    	<td>Picture:</td>
	    	<td><input type="file" name="pic" /></td>
	    </tr>
	    <tr>
	    	<td>Details:</td>
	    	<td><input type="text" name="details" /></td>
	    </tr>
	    <tr>
	    	<td>Quantity:</td>
	    	<td><input type="text" name="quantity" /></td>
	    </tr>
	    <tr>
	    	<td>Subcatagory:</td>
	    	<td>
	    		<select name="subcatagory">
	    			<?php 
                        $sc = new SubCategory();
                        $sc->View_dd();
                    ?>
	    		</select>
	    	</td>
	    </tr>
	    <tr>
	    	<td>Size:</td>
	    	<td>
	    		<select name="size">
	    			<?php
                        $size = new Size();
                        $size->View_dd();
	    			?>
	    		</select>
	    	</td>
	    </tr>
	    <tr>
	    	<td></td>
	    	<td><input type="submit" name="sub" value="Save" /></td>
	    </tr>	
	    	
	</table>
</form>

</body>
</html>