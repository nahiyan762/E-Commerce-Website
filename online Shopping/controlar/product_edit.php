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
	<title></title>
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
   <a href="product_view.php">View Product Table</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>
   <?php
      if(isset($_POST['sub']))
      {
       $pro = new Product();
       $pro->product_id = $_GET['id'];
       $pro->p_name = $_POST['name'];
       $pro->price = $_POST['price'];
       $pro->vat = $_POST['vat'];
       $pro->discount = $_POST['discount'];
       $pro->picture = $_FILES['pic']['name'];
       $pro->details = $_POST['details'];
       $pro->quantity = $_POST['quantity'];
       $pro->subcat_id = $_POST['subcategory'];
       $pro->size_id = $_POST['size'];

       $image_name = $_FILES['pic']['name'];
	     $image_type = $_FILES['pic']['type'];
	     $delete_image = $_POST['pic_name'];

       if($pro->Update())
		    {
			if ($image_type=='image/jpeg' || $image_type=='image/jpg' || $image_type=='image/png') 
			    {
            unlink('../image/'.$delete_image);
		        move_uploaded_file($_FILES['pic']['tmp_name'],'../image/'.$_FILES['pic']['name']);
		      }
			header("Location: product_view.php");
		    }
		else {echo "Data Failed";}

      }
   ?>
   <h1 align="center">UPDATE PRODUCT</h1>
   <form action="" method="post" enctype="multipart/form-data">
   	   <table align="center">
   	      <?php
             $p = new Product();
             $sql = "SELECT * FROM product WHERE product_id = ".$_GET['id']."";
             $sql_connect = mysqli_query($p->DB(),$sql);
             $ob = mysqli_fetch_object($sql_connect);
   	      ?>
   	   	  <tr>
   	   	  	<td>Name:</td>
   	   	  	<td><input type="text" name="name" value="<?php echo $ob->p_name; ?>" /></td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td>Price:</td>
   	   	  	<td><input type="text" name="price" value="<?php echo $ob->price; ?>" /></td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td>Vat:</td>
   	   	  	<td><input type="text" name="vat" value="<?php echo $ob->vat; ?>" /></td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td>Discount:</td>
   	   	  	<td><input type="text" name="discount" value="<?php echo $ob->discount; ?>" /></td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td>Picture Name:</td>
   	   	  	<td><input type="text" name="pic_name" value="<?php echo $ob->picture; ?>" /></td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td><img style="width: 150px;height: 150px;" src="<?php echo '../image/'.$ob->picture; ?>"></td>
   	   	  	<td><input type="file" name="pic"/></td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td>Details:</td>
   	   	  	<td><input type="text" name="details" value="<?php echo $ob->details ?>" /></td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td>Quantity:</td>
   	   	  	<td><input type="number" name="quantity" value="<?php echo $ob->quantity ?>" /></td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td>Subcategory:</td>
   	   	  	<td>
   	   	  		<select name="subcategory">
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
                       $s = new Size();
                       $s->View_dd();
   	   	  			    ?>
   	   	  		</select>
   	   	  	</td>
   	   	  </tr>
   	   	  <tr>
   	   	  	<td></td>
   	   	  	<td><input type="submit" name="sub" /></td>
   	   	  </tr>
   	   </table>
   </form>
</body>
</html>