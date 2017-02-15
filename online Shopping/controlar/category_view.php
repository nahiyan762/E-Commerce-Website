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
   <a href="category.php">Insert Category</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>

<h1 align="center">Category View</h1>
<table align="center" border="1" width="300">
	<tr>
    	<th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    	$c = new Category();
		$r = $c->View();
		
		for($i=0; $i<count($r); $i++)
		{
			print "<tr>";
			for($j=0; $j<count($r[$i]); $j++)
			{
				print "<td>{$r[$i][$j]}</td>";
			}
			print "<td><a href=\"category_edit.php?id={$r[$i][0]}\">Edit</td>";
			print "<td><a href=\"category_delete.php?id={$r[$i][0]}\">Delete</td>";
			print "</tr>";
		}
	?>
</table>
</body>
</html>