<?php

 class Purchase 
 {
     public $Id;
	 public $Date;
	 public $total;
	 public $user_id;
 
  public function Insert()
	{
		
		$mysqli = new mysqli("localhost","root","","project");
		if ($result = $mysqli->query("INSERT INTO purchase(date, total, user_id) 
				VALUES('".$this->Date."', 
			   			'".$this->total."', 
						'".$this->user_id."');")) 
		{
			   $this->Id = $mysqli->insert_id;
			   return true;
			   
		}
		else
		{
			return false;
		}
		
		
	}
   
 }

?>