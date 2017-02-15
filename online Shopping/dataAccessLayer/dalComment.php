<?php
	class Comment
	{
		public $Comment_id;
		public $Product_id;
		public $User_id;
		public $Description;
		public $Rating;
		
		
		private function DB()
		{
			$connection = mysqli_connect("localhost","root","","project");
			return $connection;
		}
		
		public function Insert()
		{
			$sql = "INSERT INTO comment (product_id, user_id, description, rating) 
					VALUES ('".$this->Product_id."',
							 '".$this->User_id."',
							 '".$this->Description."',
							 '".$this->Rating."');";
			if(mysqli_query($this->DB(), $sql))
			{
				return true;
			}
			return false;
		}
		
/*		public function Update()
		{
			$sql = "Update category SET name = '".$this->Name."' WHERE category_id = '".$this->Category_id."'";
			if(mysqli_query($this->DB(),$sql))
			{
				return true;
			}
			else
			{
				return false;
			}
		}
		
		public function SelectById()
		{
			$sql = "SELECT * FROM category WHERE category_id = '".$this->Category_id."'";
			$sql = mysqli_query($this->DB(),$sql);
			while($d = mysqli_fetch_row($sql))
			{
				return $d;
			}
		}
		
		public function Delete()
		{
			$sql = "DELETE FROM category WHERE category_id = '".$this->Category_id."'";
			if(mysqli_query($this->DB(), $sql))
			{
				return true;
			}
			return false;
		}
		
*/		public function View()
		{
			$sql = "SELECT login.user_name, comment.description, comment.rating 
					FROM login,comment,product
					WHERE login.user_id = comment.user_id
					AND comment.product_id = product.product_id
					AND comment.product_id = '".$this->Product_id."'";
					
					
			$sql = mysqli_query($this->DB(),$sql);
			if(mysqli_num_rows($sql) > 0)
			{
				while($d = mysqli_fetch_row($sql))
				{
					$arr[] = $d;	
				}
			
				return $arr;
			}
			else
				return NULL;
			
		}
		
	}
?>