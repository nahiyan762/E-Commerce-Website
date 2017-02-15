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
       
       if(isset($_POST['sub']))
       {
         $ser = new Service();
         $ser->area = $_POST['ta'];
         $ser->s_price = $_POST['price'];
         if($ser->Insert())
         {
         	echo "Insert Sucessfuly";
         }
         else {echo "Data Failed";}
       } 
   ?>
   
   <h1 align="center">INSERT SERVICE DATA</h1>
   <form action="" method="post">
   	 <table align="center">
   	 	<tr>
   	 		<td>Location: </td>
   	 		<td><textarea name="ta"></textarea></td>
   	 	</tr>
   	 	<tr>
   	 		<td>Price: </td>
   	 		<td><input type="text" name="price" /></td>
   	 	</tr>
   	 	<tr>
   	 		<td></td>
   	 		<td><input type="submit" value="Save" name="sub" /></td>
   	 	</tr>
   	 </table>
   </form>

</body>
</html>