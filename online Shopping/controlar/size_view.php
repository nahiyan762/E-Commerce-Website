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
   <a href="size.php">Insert Size</a>
   <br/><br/>
   <a href="?action=logout">Logout</a>
</div>

<h1 align="center">View SIZE</h1>
	<table width="300" border="1" align="center">
    <tr>
    	<th>Id</th>
        <th>Name</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
	$s = new Size();
	$r = $s->View();
	
    	for($i=0; $i<count($r); $i++)
		{
			print "<tr>";
			for($j=0; $j<count($r[$i]); $j++)
			{
				print "<td>{$r[$i][$j]}</td>";
			}
			print "<td><a href=\"size_edit.php?id={$r[$i][0]}\">Edit</td>";
			print "<td><a href=\"size_delete.php?id={$r[$i][0]}\">Delete</td>";
			print "</tr>";
		}
	?>
    </table>
</body>
</html>