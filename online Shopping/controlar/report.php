<?php
require_once("../dataAccessLayer/dalSession.php");
session::checkA();
require_once("../dataAccessLayer/dalReport.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>REPORT</title>
</head>
<body>
<div style="text-align:left;">
   <a href="admin.php">GO HOME</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>
   <form action="" method="post">
    <h1 align="center">REPORT</h1>
    	<table align="center">
    		<tr>
    			<td>Start Date</td>
    			<td><input name="start" type="date"></td>
    			<td></td>
    			<td></td>
    			<td></td>
    			<td>End Date</td>
    			<td><input name="end" type="date"></td>
    		</tr>
    		<tr>
    			<td colspan="2"><input type="submit" name="sub" value="Search"/></td>
    		</tr>
    	</table><br/><br/>
    </form>
     
    
    	<table align="center">
    		<tr>
    		   <th>Product Name</th>
    		   <th>Quantity</th>
    		   <th>Total Price</th>
           <th>User</th>
    		</tr>
            <?php
              $total ="";
              if (isset($_POST['sub'])) {
              $re = new Report();
              $re->startDate = $_POST['start'];
              $re->endDate = $_POST['end'];

              if($d= $re->Select()){
              
              for($i=0; $i<count($d); $i++){
            ?>
            <tr>
                <td><?php echo $d[$i][0]; ?></td>
                <td><?php echo $d[$i][1] ?></td>
                <td><?php echo $d[$i][2] ?></td>
                <td><?php echo $d[$i][3] ?></td>
            </tr>
            <?php
              $total += $d[$i][2];
              }
            }else{echo "not found";}
            }
            ?>
            <tr>
              <td colspan="3"><?php echo "Total Income ".$total; ?></td>
            </tr>
    	</table>
</body>
</html>