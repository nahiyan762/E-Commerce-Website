<?php
require_once("/../dataAccessLayer/dalLogin.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
     <?php
	    if(isset($_GET['action']) && ($_GET['action']== "logout")){
			Session::Stop();
		}
	 ?>
     <div style="text-align:right;">
          <a href="?action=logout">Logout</a>
     </div><br/>

     <h2 align="center">Profile</h2>
       <?php
         if (isset($_POST['sub'])) {
         	$ad = new Reg();
         	$ad->user_id = $_SESSION['userId'];
         	$ad->user_name = $_POST['user_name'];
         	$ad->user_email = $_POST['user_email'];
         	$ad->user_contact = $_POST['user_contact'];
         	$ad->user_pass = $_POST['user_pass'];
         	if ($ad->Update()) {
         		echo "<div style='color:green' align='center'>Profile updated successfully</div><br/>";
         		echo "<div align='center' ><a href='login.php'>Back to LOGIN</a><div>";
         	}
         } else {
         	 echo "<div align='right' ><a href='checkout.php'>Back to Home</a><div>";
         }
       ?>
     <form method="post" action="">
     	 <table align="center">
     	     <?php
                $ad = new Reg();
                $sql = mysqli_query($ad->DB(),"SELECT * FROM login WHERE user_id = ".$_SESSION['userId']."");
                $result = mysqli_fetch_object($sql);

     	     ?>
     	 	<tr>
     	 		<td>Username</td>
     	 		<td><input type="text" name="user_name" value="<?php echo $result->user_name; ?>"/></td>
     	 	</tr>
     	 	<tr>
     	 		<td>E-mail</td>
     	 		<td><input type="email" name="user_email" value="<?php echo $result->user_email; ?>" /></td>
     	 	</tr>
     	 	<tr>
     	 		<td>Contact Number</td>
     	 		<td><input type="text" name="user_contact" value="<?php echo $result->user_contact; ?>" /></td>
     	 	</tr>
     	 	<tr>
     	 		<td>Password</td>
     	 		<td><input type="text" name="user_pass" value="<?php echo $result->user_pass; ?>" /></td>
     	 	</tr>
     	 	<tr>
     	 		<td></td>
     	 		<td><input type="submit" name="sub" value="Save"/></td>
     	 	</tr>
     	 </table>
     </form>

</body>
</html>