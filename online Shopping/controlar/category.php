<?php
    require_once("/../dataAccessLayer/dalSession.php");
    session::checkA();
	require_once("/../dataAccessLayer/dalCategory.php");
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
   <a href="category_view.php">View Category Table</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>

<?php
	if(isset($_POST['sub']))
	{
		$c = new Category();
		$c->Name = $_POST['cat'];
		if($c->Insert())
		{
			print "Insert Successfully";
		}
		else
		{
			print "Hoy nai";
		}
	}
?>
<h1 align="center">Insert Category</h1>
<form action="" method="post">
	<table align="center">
    	<tr>
        	<td>Category Name:</td>
            <td><input type="text" name="cat"></td>
        </tr>
        <tr>
        	<td></td>
            <td colspan="2">
            	<input type="submit" name="sub" value="Save">
                <input type="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>