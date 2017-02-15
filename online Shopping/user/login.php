<?php
	
	require_once("/../dataAccessLayer/dalLogin.php");

?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>

<h2 align="center">Login</h2>
<?php
if (isset($_POST['sub'])) {
	$ad = new Reg();
	$ad->user_email = $_POST['email'];
	$ad->user_pass = $_POST['password'];
	$ad->Select();
}
?>
<form action="" method="post">
    <table align="center">
      <tr>
	      <td><h3>E-mail</h3></td>
	      <td><input type="email" name="email" placeholder="email" /></td>
	  </tr> 
	  <tr>   
	      <td><h3>Password</h3></td>
	      <td><input type="password" name="password" placeholder="password" /></td>
	  </tr> 
	  <tr>   
	      <td></td>
	      <td><input type="submit" value="Login" name="sub" /><br/><br/></td>
	  </tr> 

    </table>
     <h4 align="center">Not a register member ???</h4>
	   <h4 align="center"><a href="registration.php">Click here for registration</a></h4>
</form>

</body>
</html>