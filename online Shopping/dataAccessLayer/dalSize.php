<?php

class Size
{
	public $Size_id;
	public $Name;
	
	private function DB()
	{
		$connection = mysqli_connect("localhost","root","","project");
		return $connection;
	}
	
	public function Insert()
	{
		$sql = "INSERT INTO size(size_name) values('".$this->Name."')";
		if(mysqli_query($this->DB(),$sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function Update()
	{
		$sql = "UPDATE size SET size_name = '".$this->Name."' WHERE size_id = '".$this->Size_id."'";
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
		$sql = "SELECT * FROM size WHERE size_id = '".$this->Size_id."' ";
		$sql = mysqli_query($this->DB(),$sql);
		while($d = mysqli_fetch_row($sql))
		{
			return $d;
		}
	}
	
	public function Delete()
	{
		$sql = "DELETE FROM size WHERE size_id = '".$this->Size_id."' ";
		if(mysqli_query($this->DB(),$sql))
		{
			return true;
		}
		else
		{
			return false;
		}
	}
	
	public function View()
	{
		$sql = "SELECT * FROM size";
		$sql = mysqli_query($this->DB(),$sql);
		while($d = mysqli_fetch_row($sql))
		{
			$arr[] = $d;
		}
		return $arr;
	}

	public function View_dd()
		{
			$sql = "SELECT * FROM size";
			$sql_connect = mysqli_query($this->DB(),$sql);
			while($d = mysqli_fetch_object($sql_connect))
			{
				echo "<option value='".$d->size_id."'>".$d->size_name."</option>";
			}
			return $d;		
		}
}

?>