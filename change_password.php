<?php
session_start();
require_once("connect.php");
$a=$_SESSION['user'];
if(isset($_SESSION['user'])=="")
{
header("location:index.php?msg3=stop");
exit(0);
}
$a=$_SESSION['user'];
require_once("connect.php");
//fetch password
$q=mysqli_query($cn,"select password from user where uid=$a")or die("QF");
$data=mysqli_fetch_array($q);
$old_pwd=$data['password'];

if(isset($_REQUEST['Submit']))
{
extract($_POST);
if($old_pwd==$cpwd)
{
//update pwd
mysqli_query($cn,"update user set password='$npwd' where uid=$a")or die("QF2");
header("location:logout.php?msg=ok");
}
else
{
header("location:change_password.php?msg=wrong");
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Change Password</title>
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
			<h2>Change Password</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Change Password</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 
	<!-- about -->
	<div class="about">
		<div class="container">	
			<div class="w3ls_about_grids">
				<div class="col-md-12 w3ls_about_grid_left">
					<form id="form1" name="form1" method="post" action="" onSubmit="">
<p>&nbsp;</p>
<table width="50%" border="1" align="center">

<tr>
<td>Enter Current Password  </td>
<td>:</td>
<td><input name="cpwd" type="password" id="cpwd" autofocus placeholder="Enter Current Password" required/></td>
</tr>
<tr>
<td>Enter New Password </td>
<td>:</td>
<td><input name="npwd" type="password" id="npwd" required placeholder="Enter New Password"/></td>
</tr>
<tr>
<td>Re-Type New Password </td>
<td>:</td>
<td><input name="rpwd" type="password" id="rpwd" required placeholder="Enter Re-Type Password"/></td>
</tr>
<tr>
  <td colspan="3"><input type="checkbox" name="checkbox" onClick="myFunction();" value="checkbox">Show Password</td>
</tr>
<tr>
<td colspan="3"><div align="center">
<input name="Submit" type="submit" id="Submit" value="CHANGE" onClick="return f1();"/>
</div></td>
</tr>
</table>
<p>&nbsp;</p>
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
<script>
function f1()
{
if(form1.cpwd.value=="")
{
alert("Enter the current password");
form1.cpwd.focus();
return false;
}
else if(form1.npwd.value=="")
{
alert("Enter the new password");
form1.npwd.focus();
return false;
}
else if(form1.rpwd.value=="")
{
alert("Enter the re-type password");
form1.rpwd.focus();
return false;
}
if(form1.npwd.value!=form1.rpwd.value)
{
alert("new password and re-type password are not match");
form1.npwd.value="";
form1.rpwd.value="";
form1.npwd.focus();
return false;
}
return confirm("Are u sure to Update Password?");
}
</script>
<?php if(isset($_REQUEST['msg'])=="wrong"){?>
<script>
alert("Current password is wrong");
</script>
<?php }?>


<script>
function myFunction() {
  var x = document.getElementById("cpwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var x = document.getElementById("npwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var x = document.getElementById("rpwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
