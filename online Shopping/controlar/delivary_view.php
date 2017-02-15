<?php
require_once("../dataAccessLayer/dalSession.php");
session::checkA();
require_once("../dataAccessLayer/dalDelivary.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

<?php 
	$del = new Delivary();
	$d = $del->View();
		if(isset($_POST['sub']))
		{
			for($i=0; $i<count($d); $i++)
			{
				if(isset($_POST['date_' . $d[$i][0]]))
				{
					$del->id = $d[$i][0];
					$del->date = $_POST['date_' . $d[$i][0]];
					
					if($del->Update())
					{
						header("Location: delivary_view.php");
					} 
					else
					{
						print "hoy nai";
					}
				}
			}
		}
 ?>
<div style="text-align:left;">
   <a href="admin.php">GO HOME</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>
  <form action="delivaryaction.php" method="post">
    <h1 align="center">Delivary Report</h1>
  	<table align="center" border="1">
  		<tr>
  			<th>Delivary Id</th>
  			<th>Area</th>
  			<th>Address</th>
  			<th>Amount</th>
  			<th>Delivary Date</th>
            <th>Delivared OR Not</th>
  		</tr>
  		<?php
         
         for ($i=0; $i<count($d); $i++) 
		 { 
         ?>
  		<tr>
  			<td><?php echo $d[$i][0];?></td>
  			<td><?php echo $d[$i][1];?></td>
  			<td><?php echo $d[$i][2];?></td>
  			<td><?php echo $d[$i][3];?></td>
  			<td><form action="" method="post">
                <input type="text" name="date_<?php echo $d[$i][0];?>" value="<?php echo $d[$i][4];?>">
                <input type="submit" name="sub" value="Update">
             </form></td>
            <td align="center"><input type="checkbox" name="check[]" value="<?php echo $d[$i][0];?>" <?php if($d[$i][5] == "clear") echo "checked"; ?>></td>
  		</tr>
  		<?php
         }
  		?>
        <tr>
        	<td align="center" colspan="7"><input style="width:300px" type="submit" name="sub" value="submit"></td>
        </tr>
  	</table>
  </form>
</body>
</html>

