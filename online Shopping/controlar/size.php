<?php
require_once("/../dataAccessLayer/dalSession.php");
session::checkA();
require_once("/../dataAccessLayer/dalSize.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
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
   <a href="size_view.php">View Size Table</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>

<?php
	if(isset($_POST['sub']))
	{
		$s = new Size();
		$s->Name = $_POST['name'];
		if($s->Insert())
		{
			print "Insert Successfully";
		}
		else
		{
			print "Hoy nai";
		}
	}
?>

<form action="" method="post">
<h1 align="center">Insert SIZE</h1>
    <table align="center">
		<tr>
        	<td>SIZE:</td>
            <td><input type="text" name="name"></td>
        </tr>
 <tr> 
 			<td></td>      
            <td colspan="2">
            	<input type="submit" value="save" name="sub">
            	<input type="reset" value="reset">
            </td>
        </tr>
               
    </table>
</form>

</body>
</html>