<?php
require_once("../dataAccessLayer/dalProduct.php");
?>

<?php
$pro = new Product();
$sql = "SELECT product.product_id, product.p_name, product.price, product.picture, subcategory.name FROM product INNER JOIN subcategory ON product.subcategory_id = subcategory.subcategory_id WHERE subcategory.name LIKE '%".$_POST['search']."%' OR product.p_name LIKE '%".$_POST['search']."%'";

$connect_result = mysqli_query($pro->DB(),$sql);

if (mysqli_num_rows($connect_result)>0) {
while($rows = mysqli_fetch_object($connect_result)) 
 
{
	echo "<li>";
    echo "<a href='user/details.php?id=".$rows->product_id."'><img src='image/".$rows->picture."'/></a>";
    echo "<a href='user/details.php?id=".$rows->product_id."'class='title'>".$rows->name."-".$rows->p_name."</a>";
    echo "<strong>".$rows->price."</strong>";
    echo "</li>";
} 
	          
} else {
	echo "<div align='center' style='color:red;'>Data not found</div>";
}

?>


