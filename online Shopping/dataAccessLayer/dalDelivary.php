<?php


class Delivary
{
	public $id;
	public $place;
    public $address;
    public $amount;
    //public $total = $_SESSION['total'] + (int)$amount;
    public $date;

    public function DB()
    {
	    $connection = mysqli_connect("localhost","root","","project");
		return $connection;
	}

    public function Insert()
    {
    	$sql = "INSERT INTO delivery (place, address, amount, `date`) 
						VALUES ('$this->place', 
								'$this->address', 
								'$this->amount', 
								'$this->date');";
    	if(mysqli_query($this->DB(), $sql))
		{
			return true;
		}
			return false;
    }

    public function View()
    {
        $sql = "SELECT delivery.delivery_id, service.area, delivery.address, delivery.amount, delivery.date, delivery.check FROM delivery, service WHERE service.service_id = delivery.service_id";
        $result = mysqli_query($this->DB(),$sql);
        while($d = mysqli_fetch_row($result))
            {
                $arr[] = $d;
            }
            return $arr;
    }
	//
	public function Update()
	{
		$sql = "UPDATE `project`.`delivery` SET `date` = '".$this->date."'
				 WHERE `delivery`.`delivery_id` = '".$this->id."';";
			
			//echo $sql;
			if(mysqli_query($this->DB(),$sql))
			{
				return true;
			}
			return false;
		
	}
    
}


?>