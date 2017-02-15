<?php
    
    class Product {

    public $product_id;
    public $p_name;
    public $price;
    public $vat;
    public $discount;
    public $picture;
    public $details;
    public $quantity;
    public $subcat_id;
    public $size_id;	

    public function DB()
    {
	    $connection = mysqli_connect("localhost","root","","project");
		return $connection;
	}
	
	public function SelectById()
		{
			$sql = "SELECT product.product_id, product.p_name, product.price, product.vat, product.discount,                    product.picture, product.details, product.quantity, subcategory.name, size.size_name 
					FROM product,subcategory,size 
					WHERE product.subcategory_id = subcategory.subcategory_id 
					AND product.size_id = size.size_id 
					AND product.product_id = '".$this->product_id."'";
			$sql = mysqli_query($this->DB(),$sql);
			while($d = mysqli_fetch_row($sql))
			{
				return $d;
			}
		}

	public function Insert()
	{
		$sql = "INSERT INTO product (p_name, price, vat, discount, picture, details, quantity, subcategory_id, size_id) 
		       VALUES ('".$this->p_name."', 
			   			'".$this->price."', 
						'".$this->vat."', 
						'".$this->discount."', 
						'".$this->picture."', 
		    		   '".$this->details."', 
					   '".$this->quantity."', 
					   '".$this->subcat_id."', 
					   '".$this->size_id."');";
		       
		if(mysqli_query($this->DB(), $sql))
		{
				return true;
		}
			return false;
	}

	public function Update()
		{
			$sql = "UPDATE product SET p_name = '".$this->p_name."',
										 price = '".$this->price."',  
										 vat = '".$this->vat."',
			        						discount = '".$this->discount."', 
											picture = '".$this->picture."', 
											details = '".$this->details."',
			       						 quantity = '".$this->quantity."', 
										 subcategory_id = '".$this->subcat_id."', 
										 size_id = '".$this->size_id."'
								WHERE product_id = '".$this->product_id."'";
			
			if(mysqli_query($this->DB(),$sql))
			{
				return true;
			}
			return false;	
		}
	
	public function View()
	{
		$sql = "SELECT product.product_id, product.p_name, product.price, product.vat,
        	        product.discount, product.picture, product.details, product.quantity,
			        subcategory.name, size.size_name
					FROM product,subcategory,size
					WHERE product.subcategory_id = subcategory.subcategory_id AND
					 product.size_id = size.size_id";
		$sql_connect = mysqli_query($this->DB(),$sql);
		while($d = mysqli_fetch_row($sql_connect))
			{
				$arr[] = $d;
			}
			return $arr;
	}
	
	public function Delete()
		{
			$sql = "DELETE FROM product WHERE product_id = '".$this->product_id."'";
			if(mysqli_query($this->DB(),$sql))
			{
				return true;
			}
			return false;
		}

	
}

?>