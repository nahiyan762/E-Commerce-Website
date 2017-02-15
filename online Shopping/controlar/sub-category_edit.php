<?php
require_once("/../dataAccessLayer/dalSession.php");
session::checkA();
require_once("/../dataAccessLayer/dalCategory.php");
require_once("/../dataAccessLayer/dalSub-Category.php");
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
   <a href="sub-category_view.php">View Sub-Category Table</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>

<?php
	if(isset($_POST['sub']))
	{
		$sc = new SubCategory();
		$sc->Name = $_POST['subCname'];
		$sc->Category_id = $_POST['catId'];
		$sc->SubCategory_id = $_GET['id'];
		if($sc->Update())
		{
			header("Location: sub-category_view.php");
		}
		else
		{
			print "Hoy nai";
		}
	}
	
		
	$sc = new SubCategory();
	$sc->SubCategory_id = $_GET['id'];
	$r = $sc->SelectById();
?>
<h1 align="center">Insert Sub-Category</h1>
<form action="" method="post">
	<table align="center">
    	<tr>
        	<td>Sub-Category Name:</td>
        	<td><input type="text" name="subCname" value = <?php print $r[1]?>></td>
        </tr>
    	<tr>
        	<td>Category:</td>
            <td>
            	<select name="catId">
                	<?php
                    	$c = new Category();
						$rc = $c->View();
						
						for($i=0; $i<count($rc); $i++)
						{
							if($rc[$i][0] == $r[2])
							{
								print "<option value=\"{$rc[$i][0]}\" selected='selected'>{$rc[$i][1]}</option>";
							}
							else
							{
								print "<option value=\"{$rc[$i][0]}\">{$rc[$i][1]}</option>";
							}
						}
					?>
                </select>
            </td>
        </tr>
        <tr>
        	<td></td>
            <td colspan="2">
            	<input type="submit" name="sub" value="Sava">
                <input type="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>
</body>
</html>