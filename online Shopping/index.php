<?php
     require_once("./dataAccessLayer/dalSession.php");
     require_once("./dataAccessLayer/dalProduct.php");
	 require_once("./dataAccessLayer/dalCategory.php");
	 require_once("./dataAccessLayer/dalSub-Category.php");
?>


<!DOCTYPE html>
<html>

<head>
<script src="CSS/jquery-3.1.0.js"></script>
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



#products li 
{
	float:left;
	width:172px;
	padding:10px;
	height:333px;
	position:relative;
}
	#products li span 
	{
		position:absolute;
		top:20px;
		right:0px;
		padding:5px;
		line-height:normal;
		text-align:right;
		color:#fff;
		background:#ff5454;
		
	}
	#products a 
	{
		display:block;
		text-decoration:none;
	}
	#products a.title 
	{
		height:40px;
	}
	#products a img 
		{
			width:170px;
			border:1px solid #fff;
			
		}
		
	#products strong 
	{
		border-bottom: 1px solid #ececec;
		display:block;
		padding-bottom:5px;
	}
		#products strong em 
		{
			float:right;
			font-weight:normal;
			font-size:0.833em;
		}

</style>
</head>
<body>

<table align="center" border="1" height="20" width="1000" cellpadding="5" cellspacing="0">
<td align="right"> <input type="text" name="search" id="search" placeholder="Search..">
<!-- user/login.php -->
<?php  Session::Auto(); ?> 
 <a href="user/checkout.php">Product: 
 <?php 
 if(isset($_SESSION['cart']))
 {
	 print count($_SESSION['cart']);
 }
 else
 {
	 print 0;
 }
 ?>
 </a>
 <a href="user/checkout.php">Cost:
 <?php
 	if(isset($_SESSION['cart']))
	{
		$total = 0;
		for($i=0; $i<count($_SESSION['cart']); $i++)
		{
			$p = new Product();
			$p->product_id = $_SESSION['cart'][$i];
			$r = $p->SelectById();
			$price = $r[2] * $_SESSION['qty'][$i];
			$total += $price + ($price * $r[3])/100 + ($price * $r[4])/100; 
		}
		print $total;
	}
	else
	{
		print 0;
	}
 ?>
 </a> 
 </td>
</table>

<table align="center" border="1" height="40" width="1000" cellpadding="5" cellspacing="0">
<td align="left">
<div id="menu">

<ul id="nav">
<li><a href="index.php">Home</a>
</li>
<?php
	$c = new Category();									
	$r = $c->View();
	for($i = 0; $i < count($r); $i++) 
	{
?>
<li><a href="#"><?php echo $r[$i][1]; ?></a></li>
<?php } ?>

<li><a href="user/checkout.php">Your bag</a></li>
</ul>

</div>
</td>
</table>

<table align="center" border="1" height="450" width="1000" cellpadding="5" cellspacing="0">

  <tr>
    <td width="150" valign="top"><b>Advertise</b><br>
	
	</td>
	<td>
	
	<ul id="products">
    	<?php
		$per_page = 6;
        	$p = new Product();
			$data = $p->View();
			
			if(!isset($_GET['pg']))
			{
				$start = 0;
				$end = $per_page;
			}
			else
			{
				$start = ($_GET['pg'] - 1) * $per_page;
				$end = $_GET['pg'] * $per_page;
			}
			if($end>count($data))
			{
				$end = count($data);
			}

			for($i=$start; $i<$end; $i++)
			{
		?>
        <div id="main">
        <li>
			<a href="user/details.php?id=<?php print $data[$i][0];?>"><img src="image/<?php print $data[$i][5]?>"/></a>
            <a href="user/details.php?id=<?php print $data[$i][0];?>" class="title"><?php echo $data[$i][8]."-".$data[$i][1]; ?></a>
            <strong>$ <?php print $data[$i][2]?></strong>
       </li>
       </div>
        <?php
			}
		?>
	</ul>
		
		<table align="center" border="1" height="30" width="700" cellpadding="5" cellspacing="0">
       <tr>
           <td>
          		<?php
					$p = 1;
					for($i=0; $i<count($data); $i = $i+$per_page)
					{
						echo "<a href=\"index.php?pg={$p}\" class='pg'>". $p . "   |  " ."</a>";
						$p++;
					}
				?>
           </td>
       </tr>
	   </table>
	 
	<td width="150" valign="top"><b>Advertise</b><br>
	
	</td>
	</tr>
	
</table>
<table align="center" border="1" height="50" width="1000" cellpadding="5" cellspacing="0">
<td align="center"><h4>Copyright</h4></td>
</table>
</body>
</html>

<script>
    $(document).ready(function(){
        $('#search').keyup(function(){
                var search = $(this).val();
                if(search != ''){
                $.ajax({
                         url:"user/search.php",
                         method:"post",
                         data:{search:search},
                         dataType:"text",
                         success:function(data){
                         $('#products').html(data);
                         }
                	});
                   } else {
                	window.location.reload();
                }

                });
            });	
</script>
