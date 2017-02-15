<?php
require_once("/../dataAccessLayer/dalSession.php");
session::checkA();
?>

<!DOCTYPE html>
<html>

<head>
<title>My CV</title>
<link href="../CSS/style.css" type="text/css" rel="stylesheet"  />
</head>



<body>
<table align="center" border="1" height="20" width="1000" cellpadding="5" cellspacing="0">
<td align="right"> 
    <input type="text" name="search" placeholder="Search..">
<?php
   if(isset($_GET['action']) && ($_GET['action']== "logout")){
        Session::StopA();
    }
?>
    <div style="text-align:right;">
          <a href="?action=logout">Logout</a>
    </div> <a href="viewbasket.html">Your bag</a>
</td>
</table>

<table align="center" border="1" height="40" width="1000" cellpadding="5" cellspacing="0">
<th align="left">
<div class="menu">
	<ul>
    	<li><a href="#">Home</a></li>
        
        <li><a href="../controlar/category.php">Category</a></li>
        
        <li><a href="../controlar/sub-category.php">Sub-Category</a></li>
        
        <li><a href="../controlar/size.php">Size</a></li>
        
        <li><a href="../controlar/product.php">Product</a></li>
        
        <li><a href="../controlar/service.php">Service</a></li>
        
        <li><a href="report.php">Report</a></li>
        
        <li><a href="delivary_view.php">Delivary View</a></li>
        
        <li><a href="member_view.php">Member List</a></li>
        
    </ul>
</div>
</th>
</table>

<table align="center" border="1" height="450" width="1000" cellpadding="5" cellspacing="0">
  <tr>
    <td width="150"><b>Links</b><br>
	<a href="http://www.yahoo.com">Page 1</a><br>
	<a href="http://www.yahoo.com">Page 2</a>
	</td>
	<td width="700"><h2><b>Page 1<br>I am at page 1</b></h2><br>
	</td>
	<td width="150"><b>External Links</b><br>
	<a href="http://www.google.com">Google</a><br>
	<a href="http://www.yahoo.com">Yahoo</a><br>
	<a href="http://www.microsoft.com">Microsoft</a>
	</td>
	</tr>
</table>
<table align="center" border="1" height="50" width="1000" cellpadding="5" cellspacing="0">
<td align="center"><h4>Copyright</h4></td>
</table>
</body>
</html>