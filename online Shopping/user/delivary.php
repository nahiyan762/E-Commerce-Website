<?php
    require_once("/../dataAccessLayer/dalDelivary.php");
	require_once("../dataAccessLayer/dalService.php");
	require_once("../dataAccessLayer/dalLogin.php");
?>

<!DOCTYPE html>
<html>
<head>
	<title>untitled</title>
	<script src="../CSS/jquery-3.1.0.js"></script>
</head>
<body>
<?php
if (isset($_POST['sub'])) 
{
		$del = new Delivary();
		$del->place = $_POST['size'];
		$del->address = $_POST['addr'];
		$del->amount = $_POST['cost']+ $_SESSION['total'];
		$del->date = date('Y-m-d', strtotime("+7 days"));
		if ($del->Insert()) {
			header("Location:confirm.php");
		}
		else {
			echo "failed";
		}
}
?>
<form action="" method="post" >
	<table align="center">
	    <?php
             $lo = new Reg();
             $d = $lo->View();
             for ($i=0; $i<count($d) ; $i++) { 
        ?>
	    <tr>
	    	<td>Name: </td>
	    	<td><input type="text" name="name" value="<?php echo $d[$i][1]; ?>" /></td>
	    </tr>
	  <?php
         }
	    ?>
	    <tr>
	    	<td>Area:</td>
	    	<td>
	    		<select name="size" id="siz">
                    <option value="">Select</option>
	    			<?php
					 $ser = new Service();
					 $load = $ser->Load();
					 echo $load;	
					?>
	    		</select>
	    	</td>
	    </tr>
	    <tr>
	        <td>Cost:</td>
	    	<td><div id="cos"></div></td>
	    </tr>
	    <tr>
	    	<td>Address:</td>
	    	<td><textarea name="addr"></textarea></td>
	    </tr>
	    <tr>
	        <?php
             $lo = new Reg();
             $d = $lo->View();
             for ($i=0; $i<count($d) ; $i++) { 
            ?>
	    	<td>Mobile Number:</td>
	    	<td><input type="text" name="number" value="<?php echo $d[$i][3]; ?>" /></td>
	    	<?php
              }
	    	?>
	    </tr>
	    <tr>
	    	<td></td>
	    	<td><input type="submit" name="sub" value="Save" /></td>
	    </tr>	
	    	
	</table>
</form>
</body>
</html>
<script>
  $(document).ready(function(){
  	$("#siz").change(function(){
  	  var ser_id = $(this).val();
  	  $.ajax({
  	  	url:"cost.php",
  	  	method:"POST",
  	  	data:{ser_Id:ser_id},
  	  	dataType:"HTML",
  	  	success: function(data)
  	  	{
  	  		$("#cos").html(data);
  	  	}
  	  });

  	});
  });
</script>