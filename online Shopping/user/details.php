<?php
     require_once("../dataAccessLayer/dalSession.php");
	 require_once("../dataAccessLayer/dalComment.php");
	 require_once("../dataAccessLayer/dalProduct.php");
?>

<!DOCTYPE html>
<html>

<head>

<script type="text/javascript">
openTab("tab1")
function openTab(cityName) {
    var i;
    var x = document.getElementsByClassName("city");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
    }
    document.getElementById(cityName).style.display = "block";
}

</script>

<title>E-Commerce</title>
<style>
#menu {
  width: 700px;
  height: 40px;
  clear: both;
}

ul#nav {
  float: left;
  width: 985px;
  margin: 0;
  padding: 0;
  list-style: none;
  background: #000000   
}

ul#nav li {
  display: inline;
}

ul#nav li a {
  float: left;
  font: bold 1.1em arial,verdana,tahoma,sans-serif;
  line-height: 40px;
  color: #fff;
  text-decoration: none;
  text-shadow: 1px 1px 1px #880000;
  margin: 0;
  padding: 0 30px;     
}


ul#nav .current a, ul#nav li:hover > a  {
  color: #fff;
  text-decoration: none;
  text-shadow: 1px 1px 1px #008800;
  background: #000000;
   
}


ul#nav  ul {
  display: none;
}


ul#nav li:hover > ul {
  position: absolute;
  display: block;
  width: 500px;
  height: 45px;
  position: absolute;
  margin: 40px 0 0 0;
  background: #000000  
}

ul#nav li:hover > ul li a {
  float: left;
  font: bold 1.1em arial,verdana,tahoma,sans-serif;
  line-height: 45px;
  color: #fff;
  text-decoration: none;
  text-shadow: 1px 1px 1px #008800;
  margin: 0;
  padding: 0 30px 0 0;
  background: #000000  
}

ul#nav li:hover > ul li a:hover {
  color: #120000;
  text-decoration: none;
  text-shadow: none;
}

#tabs {
    float: left;
    clear: left;
    width: 458px;
    padding: 10px 20px;
}
</style>
</head>



<body>
<table align="center" border="1" height="20" width="1000" cellpadding="5" cellspacing="0">
<td align="right"> <input type="text" name="search" placeholder="Search..">
<?php  Session::AutoA(); ?> </h3> </td>
</table>

<table align="center" border="1" height="40" width="1000" cellpadding="5" cellspacing="0">
<td align="left">
<div id="menu">

<ul id="nav">
<li><a href="../index.php">Home</a></li>

<li><a href="checkout.php">Your bag</a></li>

</div>
</td>
</table>

<table align="center" border="1" height="450" width="1000" cellpadding="5" cellspacing="0">
  <tr>
    <td width="150" valign="top"><b>Advertise</b><br>
	
	</td>
	
	
	<td>
	<article id="mainview">
	<?php
    	$pro = new Product();
		$pro->product_id = $_GET['id'];
		$r = $pro->SelectById();
		
	 	//print_r($_SESSION['cart']);
	?>
	<div id="images">
    	<img src="../image/<?php  print $r[5];?>" height="400" width="400">
        <span class="sale"> </span>
        
    </div>
    
    <div id="description">
        <h4><?php print $r[8]."-".$r[1];?></h4>
        <h5>Size : <?php print $r[9];?></h5>
        <h5>Vat : <?php print $r[3];?></h5>
        <h5>Discount : <?php print $r[4];?></h5>
        <h4><strong id="price"> Price: $ <?php print $r[2];?></strong></h4>
        <?php
 	
		if(isset($_POST['sub']))
		{
			if(Session::CheckAll())
			{
				$com = new Comment();
				$com->Product_id = $_GET['id'];
				$com->User_id = $_SESSION['userId'];
				$com->Description = $_POST['com'];
				$com->Rating = $_POST['rat'];
				if($com->Insert())
				{
					print "successfull";
				}
				else
				{
					print "hoy nai";
				}
			}
			else
			{
				print "<h3>Please Login!</h3>";
			}
	}
	
		?>
        
        <a href="add_to_cart.php?id=<?php print $_GET['id'];?>">Add to cart</a>
        
 
        
        <h1>Comment</h1>
        <form action="#" method="post">
        	<textarea name="com"></textarea>
            <select name="rat">
            	<option value="5">Best</option>
                <option value="4">Good</option>
                <option value="3">Average</option>
                <option value="2">Poor</option>
                <option value="1">Bad</option>
            </select>
            <input type="submit" value="submit" name="sub">
       	</form>
    </div>
    <?php
		$c = new Comment();
		$c->Product_id = $_GET['id'];
    	$r = $c->View();
		for($i=0; $i<count($r); $i++)
		{
			echo $r[$i][0]." : ".$r[$i][1]." : ".$r[$i][2]."<br>";
		}

		
	?>
	
</article>

	</td>
	
	
	
	<td width="150" valign="top"><b>Advertise</b><br>
	
	</td>
	</tr>
	
</table>
<table align="center" border="1" height="50" width="1000" cellpadding="5" cellspacing="0">
<td align="center"><h4>Copyright</h4></td>
</table>
</body>
</html>