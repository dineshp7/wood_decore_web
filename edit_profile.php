<?php
session_start();
if(isset($_SESSION['user'])=="")
{
header("location:index.php?msg3=stop");
exit(0);
}
$a=$_SESSION['user'];
require_once("connect.php");
$q=mysqli_query($cn,"select * from user where uid=$a")or die("QF");
$data=mysqli_fetch_array($q);


if(isset($_REQUEST['Submit2']))
{
extract($_POST);
mysqli_query($cn,"update user set name='$nm',mobile_no='$mob',email_id='$eid',address='$add',pincode='$pin' where uid=$a")or die("QF1");
header("location:profile.php?msg1=1");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Title Here</title>
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
			<h2>Edit Profile</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Edit Profile</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 
	<!-- about -->
	<div class="about">
		<div class="container">	
			<div class="w3ls_about_grids">
				<div class="col-md-12 w3ls_about_grid_left">
					<form action="" method="post" enctype="multipart/form-data" name="form1" id="form1" onSubmit="">
<table width="50%" border="1" align="center">

<tr>
<td>Name</td>
<td>:</td>
<td><input name="nm" type="text" id="nm" value="<?php echo $data['name']?>" autofocus placeholder="Enter Name" required onKeyPress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==32) " 
/></td>
</tr>
<tr>
<td>Mobile</td>
<td>:</td>
<td><input name="mob" type="text" id="mob" required placeholder="Enter Mobile No." value="<?php echo $data['mobile_no'];?>" maxlength="10" pattern="[6-9]{1}[0-9]{9}" onKeyPress="return (event.charCode >= 48 && event.charCode <= 57)" 
/></td>
</tr>
<tr>
<td>Email ID </td>
<td>:</td>
<td><input name="eid" type="text" id="eid" value="<?php echo $data['email_id'];?>"  required placeholder="Enter Email Id"/></td>
</tr>
<tr>
  <td> Address </td>
  <td>:</td>
  <td><input name="add" type="text" id="add" value="<?php echo $data['address'];?>"required placeholder="Enter Shop Address"/></td>
</tr>
<tr>
  <td>Pincode</td>
  <td>:</td>
  <td><input name="pin" type="text" id="pin" value="<?php echo $data['pincode'];?>" maxlength="10" required placeholder="Enter Contact Number" onKeyPress="return (event.charCode >= 48 && 
	event.charCode <= 57)"/></td>
</tr>
<tr>
<td><div align="right">
<input type="reset" name="Reset" value="Reset" />
</div></td>
<td>&nbsp;</td>
<td><input type="submit" name="Submit2" value="Update" onClick="return f1();"/></td>
</tr>
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
</html><script>
function f1()
{
return confirm("Are You sure to Update Profile?");
}
</script>