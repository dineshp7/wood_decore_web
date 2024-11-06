<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>My Orders</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="KW Here" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<!-- //Custom Theme files -->
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery.min.js"></script> 
<!-- //js -->  
<!-- web fonts --> 
<link href='//fonts.googleapis.com/css?family=Glegoo:400,700' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- //web fonts --> 
<!-- for bootstrap working -->
<script type="text/javascript" src="js/bootstrap-3.1.1.min.js"></script>
<!-- //for bootstrap working -->
<!-- start-smooth-scrolling -->
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- //end-smooth-scrolling --> 
<style type="text/css">
<!--
.style1 {font-size: x-large}
.style2 {
	color: #FF0000;
	font-weight: bold;
}
-->
</style>
</head> 
<body> 
	<!-- header modal -->
	 <?php require_once("login_register.php");?> 
	<!-- header modal -->
	<!-- header -->
	<div class="header" id="home1">
		<div class="container">
			<div class="w3l_login">
				<a href="#" data-toggle="modal" data-target="#myModal88"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></a>
			</div>
			<?php require_once("logo.php");?>
			 
			   
		</div>
	</div>
	<!-- //header -->
	<!-- navigation -->
	<div class="navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header nav_2">
					<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
				</div> 
				<?php require_once("menu.php");?>
			</nav>
		</div>
	</div>
	<!-- //navigation -->
	<!-- banner -->
	<div class="banner banner10">
		<div class="container">
			<h2>My orders</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>My Orders</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 
	<!-- about -->
	<div class="about">
		<div class="container">	
			<div class="w3ls_about_grids">
				<div class="col-md-12 w3ls_about_grid_left">
				  <div align="center" class="style1">Orders				  </div>
				  <form name="form1" method="post" action="">
				    <table width="100%" border="1">
                      <tr>
                        <td>No.</td>
                        <td>Product Name </td>
                        <td>Seling Price </td>
                        <td>Seling Quantity </td>
                        <td>Sub Total</td>
                        <td>Bill Date </td>
                        <td>Bill No</td>
                        <td>Status</td>
                        <td colspan="2" align="center">Action</td>
                      </tr>
					  <?php
					  require_once("connect.php");
					  $q=mysqli_query($cn,"select * from invoice_tbl")or die("Qf1");
					  while($data=mysqli_fetch_array($q))
					  {
					  ?>
                      <tr <?php if($data['order_status']=="Approved") { ?>bgcolor="#CFFBCA"<?php } else if($data['order_status']=="Disapproved") { ?> bgcolor="#FDDBDC"<?php } ?>>
                        <td><?php echo $data['bid'];?></td>
                        <td><?php echo $data['product_name'];?></td>
                        <td><?php echo $data['selling_price'];?></td>
                        <td><?php echo $data['s_quantity'];?></td>
                        <td><?php echo $data['sub_total'];?></td>
                        <td><?php echo $data['bill_date'];?></td>
                        <td><?php echo $data['bill_no'];?></td>
                        <td><?php echo $data['order_status'];?></td>
                       <?php if($data['order_status']=="")  { ?>
					    <td><a href="cancel_order.php?b=<?php echo $data['bid'];?>">Cancel Order </a></td>
							
						
						<?php  } ?>
						<td><a href="redmore_orders.php?rr=<?php echo $data['bid'];?>">Redmore</a></td>
                      </tr>
                      <tr <?php if($data['order_status']=="Approved") { ?>bgcolor="#CFFBCA"<?php } else if($data['order_status']=="Disapproved") { ?> bgcolor="#FDDBDC"<?php } ?>>
					  <?php 
					  }
					  ?>
					 <?php
					  if(!mysqli_num_rows($q))
					  {
					  ?>
                        <td colspan="10"><div align="center" class="style2">No Data Found..! </div></td>
                      </tr>
					  <?php }?>
					  
                    </table>
					 
                  </form>
				  <div class="clearfix"> </div>
					 
					 
			  </div>
				 
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!-- //about --> 
	<!-- team -->
	 
	<!-- //team -->
	<!-- team-bottom -->
	 
	<!-- //team-bottom -->
	<!-- newsletter -->
	 
	<!-- //newsletter -->
	<!-- footer -->
	<?php require_once("footer.php");?>
	<!-- //footer -->  
	<!-- cart-js -->
	<script src="js/minicart.js"></script>
	<script>
        w3ls.render();

        w3ls.cart.on('w3sb_checkout', function (evt) {
        	var items, len, i;

        	if (this.subtotal() > 0) {
        		items = this.items();

        		for (i = 0, len = items.length; i < len; i++) { 
        		}
        	}
        });
    </script>  
	<!-- //cart-js --> 
</body>
</html>