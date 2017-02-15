<?php
	class Category
	{
		public $Category_id;
		public $Name;
		
		private function DB()
		{
			$connection = mysqli_connect("localhost","root","","project");
			return $connection;
		}
		
		public function Insert()
		{
			$sql = "INSERT INTO category(name) values('".$this->Name."')";
			if(mysqli_query($this->DB(), $sql))
			{
				return true;
			}
			return false;
		}
		
		public function Update()
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
		
		public function View()
		{
			$sql = "SELECT * FROM category";
			$sql = mysqli_query($this->DB(),$sql);
			while($d = mysqli_fetch_row($sql))
			{
				$arr[] = $d;
			}
			return $arr;
		}
	}
?>