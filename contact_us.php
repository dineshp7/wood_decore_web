<?php
if(isset($_REQUEST['Submit']))
{
	require_once("connect.php");
	extract($_POST);
	$dt=date('Y-m-d');
	mysqli_query($cn,"insert into inquiry (name,mobile,email_id,comments,inq_date)values('$nm','$mob','$lid','$msg','$dt')")or die ("QF");
	header("location:contact_us.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Contact Us</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Ky Here" />
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
<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
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
			<?php require_once("search.php");?>
			  
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
			<h2>Contact Us</h2>
		</div>
	</div>
	<!-- //banner -->    
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Contact Us</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 
	<!-- mail -->
	<div class="mail">
		<div class="container">
			<h3>Contact Us</h3>
			<div class="agile_mail_grids">
				<div class="col-md-5 contact-left">
					<h4>Address</h4>
					<p>At Nari Old Bustend
						<span>Plot No.102</span></p>
					<ul>
						<li>Mobile Number :+91 9328255232</li>
						<li>Second Mobile Number :+91 6351612213</li>
						
						<li><a href="hitenc239@gmail.com">hitenc239@gmail.com</a></li>
					</ul>
				</div>
				<div class="col-md-7 contact-left">
					<h4>Contact Form</h4>
					<form action="" method="post" name="form1" id="form1" >
						<input type="text" name="nm" id="nm" placeholder="Your Name" >
						<input type="text" name="lid" id="lid" placeholder="Your Email ID" >
						<input type="text" name="mob" id="mob" placeholder="Mobile No" pattern="[6-9]{1}[0-9]{9}">
						
						<textarea  type="text" name="msg" id="msg" placeholder="Message..." ></textarea>
						<input type="submit" name="Submit" value="Submit"  onClick="return f1();"/>
					</form>
				</div>
				<div class="clearfix"> </div>
			</div>

			<div class="contact-bottom">
				<iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d96908.54934770924!2d-73.74913540000001!3d40.62123259999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sanimal+rescue+service+near+Inwood%2C+New+York%2C+NY%2C+United+States!5e0!3m2!1sen!2sin!4v1436335928062" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</div>
	<!-- //mail -->
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
<script>
function f1()
{
	if(form1.nm.value=="")
	{
		alert("Enter Your Name");
		if(c==false)
		return false;
	}
	else if(form1.lid.value=="")
	{
		alert("Enter Email ID");
		if(c==false)
		return false;
	}
	else if(form1.mob.value=="")
	{
		alert("Enter Mobile No");
		if(c==false)
		return false;
	}
	else if(form1.dt.value=="")
	{
		alert("Enter Date");
		if(c==false)
		return false;
	}
	else if(form1.msg.value=="")
	{
		alert("Enter Message..");
		if(c==false)
		return false;
	}
		
}
	
</script>