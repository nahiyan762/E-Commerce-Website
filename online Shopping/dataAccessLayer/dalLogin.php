<?php
require_once("dalSession.php");
Session::Start();

    
class Reg
{
	public $user_id;
	public $user_name;
	public $user_email;
	public $user_contact;
	public $user_pass;
	public $user_gender;

	public function DB()
    {
	    $connection = mysqli_connect("localhost","root","","project");
		return $connection;
	}

	public function Insert()
	{
			
		$sql = "INSERT INTO login (user_name, user_email, user_contact, user_pass,
		        user_gender, user_type) 
		        VALUES ('".$this->user_name."', '".$this->user_email."',
		        '".$this->user_contact."', '".$this->user_pass."', 
		        '".$this->user_gender."', 'member');"; 
		       

			   if(mysqli_query($this->DB(), $sql))
		           {
				      return true;
		           }
			          return false;
    } 

	public function Select()
		{
			
			$sql = "SELECT * FROM login WHERE user_email = '$this->user_email'
			        AND user_pass = '$this->user_pass'";
			   if ($result = mysqli_query($this->DB(),$sql)) {
				$value = mysqli_fetch_object($result);
				$row   = mysqli_num_rows($result);
				if ($row >0) {
					if ($value->user_type == "member") {
					Session::set("Mlogin",true);
					Session::set("Alogin",false);
					Session::set("user_email",$value->user_email);
					Session::set("userId",$value->user_id);
					header("Location:../index.php");
					} else {
					   Session::set("Alogin",true);
					   Session::set("Mlogin",false);
					   Session::set("user_email",$value->user_email);
					   Session::set("userId",$value->user_id);
					   header("Location:../controlar/admin.php");
					}
					
				}
				 else{
					  echo "<div style='color:red; text-align:center;'>Username or Password Does not match !!</div>";
				}
			}
		}

		public function Update()
	     {
			
		$sql = "UPDATE login SET user_name = '".$this->user_name."', user_email = '".$this->user_email."', user_contact = '".$this->user_contact."', user_pass = '".$this->user_pass."' WHERE user_id = '".$this->user_id."'"; 
		       

			   if(mysqli_query($this->DB(), $sql))
		           {
				      return true;
		           }
			          return false;
         }

        public function Delete()
		{
			$sql = "DELETE FROM login WHERE user_id = '".$this->user_id."'";
			if(mysqli_query($this->DB(),$sql))
			{
				return true;
			}
			return false;
		} 

		public function View()
		{
			$sql = "SELECT * FROM login WHERE user_id = '$_SESSION[userId]'";
			$result = mysqli_query($this->DB(),$sql);
			while ($d = mysqli_fetch_row($result)) {
				$arr[] = $d;
			}
			return $arr;
		} 
			
  }


?>