<?php

class Report {

public $startDate;
public $endDate;

public function DB()
    {
	    $connection = mysqli_connect("localhost","root","","project");
		return $connection;
	}

public function Select(){

 	$sql = "SELECT product.p_name, `order`.quantity, purchase.total, login.user_id FROM product, `order`, purchase, login WHERE `order`.product_id = product.product_id AND purchase.user_id = login.user_id AND `order`.purchase_id = purchase.purchase_id AND purchase.`date` BETWEEN '$this->startDate' AND '$this->endDate'";
 	//$sql = "SELECT * FROM purchase WHERE purchase.`date` BETWEEN '$this->startDate' AND '$this->endDate'";              

 	$result = mysqli_query($this->DB(),$sql);
	while($o = mysqli_fetch_row($result)){
		  $arr[]=$o;
	    }
	    return $arr;

	}


}

?>