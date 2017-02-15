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
   <a href="service_view.php">View Service Table</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>
    <?php 
       if (isset($_POST['sub'])) {
       	  $s = new Service();
       	  $s->service_id = $_GET['id'];
       	  $s->area = $_POST['ta'];
       	  $s->s_price = $_POST['price'];
       	  if ($s->Update()) {
       	  	 header("Location: service_view.php");
       	  }
       	  else {echo "Data Failed";}
       }
    ?>
    
    <form action="" method="post">
       <h1 align="center">Update Service</h1>
       <table align="center">
           <?php
             $ser = new Service();
             $sql = "SELECT * FROM service WHERE service_id = ".$_GET['id']."";
             $sql_connect = mysqli_query($ser->DB(),$sql);
             $ob = mysqli_fetch_object($sql_connect);
			 
   	      ?>
		      <tr>
        	 <td>Area:</td>
             <td><textarea name="ta"><?php echo $ob->area; ?></textarea></td>
          </tr>
          
          <tr>
        	   <td>Price:</td>
             <td><input type="text" name="price" value="<?php echo $ob->s_price; ?>"></td>
          </tr>
          <tr> 
 			       <td></td>      
             <td><input type="submit" value="Save" name="sub"></td>
          </tr>
               
    </table>
</form>
</body>
</html>