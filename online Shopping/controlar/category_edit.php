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
			$c->Category_id = $_GET['id'];
		if($c->Update())
		{
			header("Location: category_view.php");
		}
		else
		{
			print "Hoy nai";
		}
	}

	$c = new Category();
	$c->Category_id = $_GET['id'];
	$r  = $c->SelectById();
?>
<h1 align="center">Insert Category</h1>
<form action="" method="post">
	<table align="center">
    	<tr>
        	<td>Category Name:</td>
            <td><input type="text" name="cat"value = <?php print $r[1]; ?>></td>
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