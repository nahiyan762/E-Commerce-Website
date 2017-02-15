<?php

class Service
{
	public $service_id;
	public $area;
	public $s_price;

	 public function DB()
    {
	    $connection = mysqli_connect("localhost","root","","project");
		return $connection;
	}

	public function Insert()
	{
		$sql = "INSERT INTO service (area, s_price) 
		       VALUES ('".$this->area."', '".$this->s_price."');";
		       
		if(mysqli_query($this->DB(), $sql))
		{
				return true;
		}
			return false;
	}

	public function Update()
	{
        $sql = "UPDATE service SET area = '".$this->area."', s_price = '".$this->s_price."' WHERE service_id = '".$this->service_id."'";
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
		$sql = "select * from service";
		$sql_connect = mysqli_query($this->DB(),$sql);
		while($d = mysqli_fetch_row($sql_connect))
			{
				$arr[] = $d;
			}
			return $arr;
	}

	public function Delete()
		{
			$sql = "DELETE FROM service WHERE service_id = '".$this->service_id."'";
			if(mysqli_query($this->DB(),$sql))
			{
				return true;
			}
			return false;
		}

     public function Load(){
     	$output= "";
     	$sql = "SELECT * FROM service";
		$sql_connect = mysqli_query($this->DB(),$sql);
		while($d = mysqli_fetch_array($sql_connect))
		{
             $output .= '<option value="'.$d["service_id"].'">'.$d["area"].'</option>';
		}
		return $output;
     }

}

?>