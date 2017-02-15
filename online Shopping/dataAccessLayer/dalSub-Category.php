<?php
	class SubCategory
	{
		public $SubCategory_id;
		public $Name;
		public $Category_id;
		
		private function DB()
		{
			$connection = mysqli_connect("localhost","root","","project");
			return $connection;
		}
		
		public function Insert()
		{
			$sql = "INSERT INTO subcategory (name, category_id) 
					VALUES ('".$this->Name."', '".$this->Category_id."');";
			if(mysqli_query($this->DB(), $sql))
			{
				return true;
			}
			return false;
		}
		
		public function Update()
		{
			$sql = "UPDATE subcategory SET name = '".$this->Name."', category_id = '".$this->Category_id."' 
					WHERE subcategory_id = '".$this->SubCategory_id."'";
			
			if(mysqli_query($this->DB(),$sql))
			{
				return true;
			}
			return false;	
		}
		
		public function SelectById()
		{
			$sql = "SELECT * FROM subcategory WHERE subcategory_id = '".$this->SubCategory_id."'";
			$sql = mysqli_query($this->DB(),$sql);
			while($d = mysqli_fetch_row($sql))
			{
				return $d;
			}
		}
		
		public function Delete()
		{
			$sql = "DELETE FROM subcategory WHERE subcategory_id = '".$this->SubCategory_id."'";
			if(mysqli_query($this->DB(),$sql))
			{
				return true;
			}
			return false;
		}
		
		public function View()
		{
			$sql = "SELECT subcategory.subcategory_id, subcategory.name, category.name
					 FROM subcategory,category
					 WHERE subcategory.category_id = category.category_id";
			$sql = mysqli_query($this->DB(),$sql);
			while($d = mysqli_fetch_row($sql))
			{
				$arr[] = $d;
			}
			return $arr;		
		}

		public function View_dd()
		{
			$sql = "SELECT * FROM subcategory";
			$sql_connect = mysqli_query($this->DB(),$sql);
			while($d = mysqli_fetch_object($sql_connect))
			{
				echo "<option value='".$d->subcategory_id."'>".$d->name."</option>";
			}
			return $d;		
		}
		
		
	}
?>