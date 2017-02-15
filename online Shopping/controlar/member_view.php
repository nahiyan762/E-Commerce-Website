<?php
require_once("/../dataAccessLayer/dalSession.php");
Session::CheckA();
require_once("/../dataAccessLayer/dalService.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
  <?php
	    if(isset($_GET['action']) && ($_GET['action']== "logout")){
			Session::StopA();
		}
  ?>
<div style="text-align:left;">
   <a href="admin.php">GO HOME</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>

  <h2 align="center">Registers Members</h2>
  <table align="center" border="1">
  	<tr>
  	   <th>Username</th>
  	   <th>Email</th>
  	   <th>Contact Number</th>
  	   <th>Gender</th>
  	   <th>Delete</th>	
  	</tr>
  	<?php
  	  $se = new Service();
  	  $sql = mysqli_query($se->DB(),"SELECT * FROM login WHERE user_type = 'member'");
  	  while ($result = mysqli_fetch_object($sql)) {
  	?>
  	<tr>
  		<td><?php echo $result->user_name; ?></td>
  		<td><?php echo $result->user_email; ?></td>
  		<td><?php echo $result->user_contact; ?></td>
  		<td><?php echo $result->user_gender; ?></td>
  		<td><a href="member_delete.php?id=<?php echo $result->user_id; ?>">Delete</a></td>
  	</tr>
  	<?php	
  	  }
  	?>
  </table>
</body>
</html>