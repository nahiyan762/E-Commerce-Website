<?php

 class Order 
 {
     public $Id;
	 public $Quantity;
	 public $ProductId;
	 public $PurchaseId;
	 public $Sdate;
	 public $Edate;
 
  public function Insert()
	{
		
		$mysqli = new mysqli("localhost","root","","project");
		if ($result = $mysqli->query("INSERT INTO `project`.`order`(quantity, product_id, purchase_id) VALUES('".$this->Quantity."', '".$this->ProductId."', '".$this->PurchaseId."');")) 
		{
			   $this->Id = $mysqli->insert_id;
			   return true;
			   
		}
		else
		{
			return false;
		}
	}
	
	
	 public function View()
   {
      $connection = mysqli_connect("localhost","root","","project");
	  
	  $sql = "SELECT product.p_name, product.price, `order`.quantity, purchase.date, purchase.user_id
			FROM login, `order`, purchase, product
			WHERE purchase.user_id = login.user_id 
			AND `order`.purchase_id = purchase.purchase_id 
			AND `order`.product_id = product.product_id";
			
		if($this->Sdate != "" && $this->Edate != "")
		{
			$sql .= " and purchase.date between '".$this->Sdate."' and '".$this->Edate."'";  
		}
						
		else if($this->Sdate != "")
		{
			$sql .= " and purchase.date between '".$this->Sdate."' and '".$this->Sdate."'";  
		}
		
		else if($this->Edate != "")
		{
			$sql .= " and purchase.date between '".$this->Edate."' and '".$this->Edate."'";  
		}
	  
	  //	print_r($sql);
	  	$sql = mysqli_query($connection,$sql);
	
				
	  while($d = mysqli_fetch_row($sql))
	  {
	      $arr[] = $d;
	  }
	  return $arr;
   }	

	
   
 }

?>