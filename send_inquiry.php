<?php
require_once("connect.php");
session_start();
if(isset($_SESSION['user'])=="")
{
header("location:index.php?msg3=stop");
exit(0);
}
if(isset($_REQUEST['Submit']))
{
extract($_POST);

mysqli_query($cn,"insert into inquiry(name,mobile,email_id,comments,inq_date)values('$nm','$mob','$em','$com','$dt')")or die("QF");
//email 
	$from=$em;
	$to="dinesh@gmail.com";
	$s="You have an inquiry from website";

	echo $body="<table width='50%'align='center' bgcolor='#990000'>
  <tr>
    <td colspan='3'><div align='center'>Email Details </div></td>
  </tr>
  <tr>
    <td width='24%'>Name</td>
    <td width='3%'>:</td>
    <td width='73%'>$nm</td>
  </tr>
  <tr>
    <td>Mobile No </td>
    <td>:</td>
    <td>$mob</td>
  </tr>
  <tr>
    <td>Email ID </td>
    <td>:</td>
    <td>$em</td>
  </tr>
  <tr>
    <td>Comments</td>
    <td>:</td>
    <td>$com</td>
  </tr>
  <tr>
    <td>Inquiry Date </td>
    <td>:</td>
    <td>$dt</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>
	";die;
	$headers  = "MIME-Version: 1.0\r\n";
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
	$headers .= "From: ".$from." <".$from.">\r\n";
	mail($to,$s,$body,$headers);
	echo "Mail Send";

header("location:email.php");
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
			<h2>Send Inquiry</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.html"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Send Inquiry</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs --> 
	<!-- about -->
	<div class="about">
		<div class="container">	
			<div class="w3ls_about_grids">
				<div class="col-md-12 w3ls_about_grid_left">
					<form id="form1" name="form1" method="post" action="">
      <table width="50%" border="1" align="center">
        
        <tr>
          <td>Name</td>
          <td>:</td>
          <td><input name="nm" type="text" id="nm" autofocus placeholder="Enter Name" required onkeypress="return (event.charCode > 64 && 
	event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==32) "/></td>
        </tr>
        <tr>
          <td>Mobile No.</td>
          <td>:</td>
          <td><input name="mob" type="text" id="mob" maxlength="10" pattern="[6-9]{1}[0-9]{9}" required placeholder="Enter Mobile No" onkeypress="return (event.charCode >= 48 && 
	event.charCode <= 57)"/></td>
        </tr>
        <tr>
          <td>Email Id </td>
          <td>:</td>
          <td><input name="em" type="email" id="em" required placeholder="Enter Email Id"/></td>
        </tr>
        <tr>
          <td>Comments</td>
          <td>:</td>
          <td><textarea name="com" id="com" required placeholder="Enter Comments"></textarea></td>
        </tr>
        <tr>
          <td>Inquiry Date </td>
          <td>:</td>
          <td><input name="dt" type="text"  id="dt" value="<?php echo date('Y-m-d');?>" required placeholder="Enter Inquiry Date"/></td>
        </tr>
        <tr>
          <td colspan="3"><div align="center">
            <input type="submit" name="Submit" value="Send" onclick="return f1();" />
          </div></td>
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
</html>
</script>
<?php if(isset($_REQUEST['msg1'])=="1"){?>
<script>
alert("Successfully Send Inquiries");
</script>
<?php }?>

<script>
function f1()
{
if(form1.nm.value=="")
 {
  alert("Enter Name");
  form1.nm.focus();
  return false;
 }
else if(form1.mob.value=="")
 {
  alert("Enter Mobile No.");
  form1.mob.focus();
  return false;
 }
 else if(form1.em.value=="")
 {
  alert("Enter Email Id");
  form1.em.focus();
  return false;
 }
 else if(form1.com.value=="")
 {
  alert("Enter Comments");
  form1.com.focus();
  return false;
 }
 else if(form1.dt.value=="")
 {
  alert("Enter Inquiry Date");
  form1.dt.focus();
  return false;
 }
}
</script>