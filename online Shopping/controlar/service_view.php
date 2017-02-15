<?php
require_once("/../dataAccessLayer/dalSession.php");
session::checkA();
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
   <a href="service.php">Insert Service</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>
   
   <h1 align="center">Service Database</h1>
   <form>
   	  <table align="center" border="1">
   	  	 <tr>
   	  	 	<th>ID</th>
   	  	 	<th>AREA</th>
   	  	 	<th>PRICE</th>
   	  	 	<th>UPDATE</th>
   	  	 	<th>DELETE</th>
   	  	 </tr>
   	  	    <?php
   	  	    $ser = new Service();
   	  	    $sql = "SELECT * FROM service";
			$sql_connect = mysqli_query($ser->DB(),$sql);
			while($d = mysqli_fetch_object($sql_connect))
			{
			?>
		 <tr>
		 	<td><?php echo $d->service_id; ?></td>
		 	<td><?php echo $d->area; ?></td>
		 	<td><?php echo $d->s_price; ?></td>
		 	<td><a href="service_edit.php?id=<?php echo $d->service_id; ?>">Edit</a></td>
		 	<td><a href="service_delete.php?id=<?php echo $d->service_id; ?>">Delete</a></td>
		 </tr>
		     <?php
              }
		     ?>	
   	  </table>
   </form>
</body>
</html>