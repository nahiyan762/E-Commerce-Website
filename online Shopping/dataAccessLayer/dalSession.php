<?php

class Session
{
	public static function Start(){
		session_start();
	}

	public static function Set($key , $value){
		$_SESSION[$key] = $value;
	}

	public static function Get($key){
		if (isset($_SESSION[$key])) {
			return $_SESSION[$key];
		}
		else{
			return false;
		}
	}
	
    public static function Stop(){
		session_destroy();
		header("Location:user/login.php");
	}

	public static function StopA(){
		session_destroy();
		header("Location:../user/login.php");
	}

	public static function StopB(){
		session_destroy();
		header("Location:login.php");
	}


	public static function Check()
	{
		self::Start();
		//echo $this->user_id;;
		if (self::Get("Mlogin")==false) 
		{
			self::Stop();
			header("Location:login.php");
		}
	}

	public static function CheckA(){
		self::Start();
		if (self::Get("Alogin")==false) {
		   self::StopA();
		   header("Location:../user/login.php");
		}
	}
	
	public static function CheckAll()
	{
		if (self::Get("Mlogin")==false && self::Get("Alogin")==false) 
		{
			return false;
		}
		else
		{
			return true;	
		}	 
	}
	
	public static function CheckUserLogin()
	{self::Start();
		if (self::Get("Mlogin")==false) 
		{
			return false;
		}
		else
		{
			return true;	
		}	 
	}
	
	public static function Auto(){
		self::Start();
        if(self::Get("Mlogin")==false){
           echo "<div align='right' ><a href='user/login.php'>Login/Register</a><div>";
     } else {
     	   echo "<div align='right' ><a href='?action=logout'>Logout</a><div>";
     	  if(isset($_GET['action']) && ($_GET['action']== "logout")){
			self::Stop();
		}
     }
			
	}

	public static function AutoA(){
		self::Start();
        if(self::Get("Mlogin")==false){
           echo "<div align='right' ><a href='login.php'>Login</a><div>";
        } else {
     	   echo "<div align='right' ><a href='?action=logout'>Logout</a><div>";
     	  if(isset($_GET['action']) && ($_GET['action']== "logout")){
			self::StopB();
		   }
       }
			
	}

	
}

?>
