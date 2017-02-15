<?php
	
	require_once("/../dataAccessLayer/dalLogin.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<div>
   <h2 align="center">registration</h2>
</div>
<?php

if (isset($_POST['sub'])) {
	if (empty($_POST['username']) || empty($_POST['email']) || empty($_POST['contact']) || empty($_POST['password']) || empty($_POST['gender'])) {
		echo "<div style='color:red' align='center'>Field must not be empty !!</div><br/>";
	} else {
		$ad = new Reg();
		$ad->user_name = $_POST['username'];
		$ad->user_email = $_POST['email'];
		$ad->user_contact = $_POST['contact'];
		$ad->user_pass = $_POST['password'];
		$ad->user_gender = $_POST['gender'];
		if($ad->Insert()){
			echo "<div style='color:green' align='center'>Regestration successfull</div><br/>";
			echo "<div align='center' ><a href='login.php'>click here for login</a><div>";
		}
	}

}

?>
<form action="" method="post">
    <table align="center">
      <tr>
	      <td><h3>Username</h3></td>
	      <td><input type="text" name="username" placeholder="username" /></td>
	  </tr>
	  <tr>
	      <td><h3>E-mail</h3></td>
	      <td><input type="email" name="email" placeholder="e-mail" /></td>
	  </tr>
	  <tr>
	      <td><h3>Contact</h3></td>
	      <td><input type="text" name="contact" placeholder="contact number" /></td>
	  </tr>   
	  <tr>   
	      <td><h3>Password</h3></td>
	      <td><input type="password" name="password" placeholder="password" /></td>
	  </tr>
	  <tr>
	      <td><h3>Gender</h3></td>
	      <td>
	      	<select name="gender">
	      		<option value="male" >Male</option>
                <option value="female">Female</option>
	      	</select>
	      </td>
	  </tr>
	   <tr>   
	      <td></td>
	      <td><input type="submit" value="SUBMIT" name="sub" /></td>
	  </tr> 
	   
    </table>
</form>

</body>
</html>