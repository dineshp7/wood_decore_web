<?php
session_start();
require_once("connect.php");
$p=$_REQUEST['p'];
$u=$_SESSION['user'];
$qp1=mysqli_query($cn,"select * from products where pid=$p")or die ("QF");
$datap1=mysqli_fetch_array($qp1);
$w=$datap1['wid'];
$dt=date('Y-m-d');
$pi=$datap1['pid'];

$q21=mysqli_query($cn,"select max(bill_no) from invoice_tbl")or die ("QF Bill No");
	  $data21=mysqli_fetch_array($q21);
	  if($data21[0]=="")
	  {
	  		$bno=101;
	}
	else
	{
		$bno=$data21[0]+1;
	}

if(isset($_REQUEST['Submit2']))
{	
	
	extract($_POST);
	$a=$_REQUEST['a'];
	$q11=mysqli_query($cn,"select * from products")or die ("QF product");
	$data11=mysqli_fetch_array($q11);
	
	//Bill No genrate
	mysqli_query($cn,"insert into invoice_tbl (pid,product_name,selling_price,s_quantity,sub_total,discount,cgst,sgst,total_amount,paid_method,customer_name,mobile,address,bill_date,bill_no,wid)values('$pi','$pnm','$spr','$sqty','$stot','$dis','$cgst','$sgst','$tot','$pm','$cnm','$mob','$add','$dt','$bno','$w')")or die ("Qf Invoice");	
	header("location:orders.php");	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Title Here</title>
<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script> 
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Electronic Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
	SmartPhone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
	function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<!-- Custom Theme files -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" /> 
<link href="css/fasthover.css" rel="stylesheet" type="text/css" media="all" />
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
<!-- //end-smooth-scrolling --></head> 
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
			<h2>Product Details</h2>
		</div>
	</div>
	<!-- //banner -->   
	<!-- breadcrumbs -->
	<div class="breadcrumb_dress">
		<div class="container">
			<ul>
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span> Home</a> <i>/</i></li>
				<li>Product Details</li>
			</ul>
		</div>
	</div>
	<!-- //breadcrumbs -->  
	<!-- single -->
	<div class="single">
		<div class="container">
			<div class="col-md-4 single-left">
				<div class="flexslider">
					<ul class="slides">
						<li data-thumb="wholesaler/w/product_photo/<?php echo $datap1['photo1'];?>">
							<div class="thumb-image"> <img src="wholesaler/w/product_photo/<?php echo $datap1['photo1'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
						<li data-thumb="wholesaler/w/product_photo/<?php echo $datap1['photo2'];?>">
							 <div class="thumb-image"> <img src="wholesaler/w/product_photo/<?php echo $datap1['photo2'];?>" data-imagezoom="true" class="img-responsive" alt=""> </div>
						</li>
						  
					</ul>
					
				</div>
				<div>
<?php
//check like given or not
$qlike=mysqli_query($cn,"select * from tbl_like where uid='$u' and pid='$p'")or die ("QF Like Check");
if(!mysqli_num_rows($qlike))
{
?>

<a href="like.php?p=<?php echo $datap1['pid'];?>"><img src="img_logo/like.png" width="80"></a>
<?php } else { ?>
<a href="dislike.php?p=<?php echo $datap1['pid'];?>"><img src="img_logo/dislike.png" width="80"></a>
<?php } ?>	
<br>
Likes:(<?php $qcc=mysqli_query($cn,"select count(lid) from  tbl_like where pid=$p")or die("QF CMT Count");
$datacc=mysqli_fetch_array($qcc);
echo $datacc[0];?>)


			  </div>
				
				
				<!-- flexslider -->
					<script defer src="js/jquery.flexslider.js"></script>
					<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
					<script>
					// Can also be used with $(document).ready()
					$(window).load(function() {
					  $('.flexslider').flexslider({
						animation: "slide",
						controlNav: "thumbnails"
					  });
					});
					</script>
				<!-- flexslider -->
				<!-- zooming-effect -->
					<script src="js/imagezoom.js"></script>
				<!-- //zooming-effect -->
			</div>
			<div class="col-md-8 single-right">
				<h3><?php echo $datap1['cat_name']." - ".$datap1['sub_cat_name'];?></h3>
				<h3><?php echo $datap1['Prod_name'];?></h3>
				  
				<div class="description">
					<h5><i>Size : <?php echo $datap1['size'];?></i></h5>
			 		<h5><i>Color : <?php echo $datap1['color'];?></i></h5>
			 
			 		<h5><i>Company_Name: <?php echo $datap1['company_name'];?></i></h5>
			 
			 		
			 
			 	</div>
				 
				 
				<div class="simpleCart_shelfItem">
					 <form action="" method="post" name="frm_invoice" id="frm_invoice"> 
					 <table width="80%" border="1">
  <tr>
    <td colspan="3"><div align="center">Invoice</div></td>
    </tr>
  
  <tr>
    <td>Product Name </td>
    <td>:</td>
    <td><input name="pnm" type="text" id="pnm" value="<?php echo $datap1['Prod_name'];?>" readonly=""></td>
  </tr>
  <tr>
    <td>Seling Price </td>
    <td>:</td>
    <td><input name="spr" type="text" id="spr" value="<?php echo $datap1[	'selling_price'];?>" autofocus placeholder="Seling Quntity"></td>
  </tr>
  <tr>
    <td>Seling Quntity </td>
    <td>:</td>
    <td>
      <input name="sqty" type="text" id="sqty" onBlur="return f22();" placeholder="Seling Quntity" >    </td>
  </tr>
  <tr>
    <td>Sub Total </td>
    <td>:</td>
    <td>
      <input name="stot" type="text" id="stot" readonly="" placeholder="Sub Total">    </td>
  </tr>
  <tr>
    <td>Discount</td>
    <td>:</td>
    <td>
      <input name="dis" type="text" id="dis" size="10" placeholder="Discount">
      %    </td>
  </tr>
  <tr>
    <td>CGST</td>
    <td>:</td>
    <td><input name="cgst" type="text" id="cgst" size="10" placeholder="CGST">
      %</td>
  </tr>
  <tr>
    <td>SGST</td>
    <td>:</td>
    <td><input name="sgst" type="text" id="sgst" size="10" onBlur="return f33();" placeholder="SGST">
      %</td>
  </tr>
  <tr>
    <td>Total Amount </td>
    <td>:</td>
    <td>
      <input name="tot" type="text" id="tot" placeholder="Total Amount">    </td>
  </tr>
  <tr>
    <td>Paid Method </td>
    <td>:</td>
    <td>
      <select name="pm" id="pm">
        <option value="SELECT">SELECT</option>
        <option value="CASH ON DELIVERY">CASH ON DELIVERY</option>
       
      </select>    </td>
  </tr>
  <tr>
    <td>Customer Name</td>
    <td>:</td>
    <td><input name="cnm" type="text" id="cnm" placeholder="Customer Name"></td>
  </tr>
  <tr>
    <td>Mobile No </td>
    <td>:</td>
    <td><input name="mob" type="text" id="mob" maxlength="10" pattern="[6-9]{1}[0-9]{9}"  placeholder ="Enter mobile number" ></td>
  </tr>
  <tr>
    <td>Address</td>
    <td>:</td>
    <td><textarea name="add" id="add" placeholder="Address"></textarea></td>
  </tr>
  <tr>
    <td>Bill Date </td>
    <td>:</td>
    <td>
    <input name="dt" type="text" class="tcal" id="dt" value="<?php echo date('Y-m-d');?>" readonly="" />    </td>
  </tr>
  <tr>
    <td>Bill No </td>
    <td>:</td>
    <td><input name="bno" type="text" id="bno" value="<?php echo $bno;?>" readonly=""></td>
  </tr>
  <tr>
    <td><input name="Reset" type="reset" value="Reset"></td>
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit2" value="Buy Now" onClick="return f11();"></td>
  </tr>
</table>

					 </form>
				</div> 
			</div>
			<div class="clearfix"> </div>
		</div>
	</div> 
	
	<!-- Related Products -->
	
	<!-- //Related Products -->
	<div class="modal video-modal fade" id="myModal6" tabindex="-1" role="dialog" aria-labelledby="myModal6">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="images/34.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>Musical Kids Toy</h4>
							<p>Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea 
								commodo consequat.Duis aute irure dolor in 
								reprehenderit in voluptate velit esse cillum dolore 
								eu fugiat nulla pariatur. Excepteur sint occaecat 
								cupidatat non proident, sunt in culpa qui officia 
								deserunt mollit anim id est laborum.</p>
							<div class="rating">
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><span>$150</span> <i class="item_price">$100</i></p> 
								<form action="#" method="post" name="frm4" id="frm4">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1"> 
									<input type="hidden" name="w3ls_item" value="Kids Toy"> 
									<input type="hidden" name="amount" value="100.00">   
									<button type="submit" class="w3ls-cart">Add to cart</button>
								</form>
							</div>
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
									<li><a href="#"><span></span></a></li>
									<li><a href="#" class="brown"><span></span></a></li>
									<li><a href="#" class="purple"><span></span></a></li>
									<li><a href="#" class="gray"><span></span></a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<div class="modal video-modal fade" id="myModal5" tabindex="-1" role="dialog" aria-labelledby="myModal5">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="images/36.jpg" alt=" " class="img-responsive">
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>Dry Vacuum Cleaner</h4>
							<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea 
								commodo consequat.Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat 
								cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
							<div class="rating">
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive">
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><span>$960</span> <i class="item_price">$920</i></p>
								<form action="#" method="post" name="frm3" id="frm3">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1"> 
									<input type="hidden" name="w3ls_item" value="Vacuum Cleaner"> 
									<input type="hidden" name="amount" value="920.00">   
									<button type="submit" class="w3ls-cart">Add to cart</button>
								</form>
							</div>
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
									<li><a href="#"><span></span></a></li>
									<li><a href="#" class="brown"><span></span></a></li>
									<li><a href="#" class="purple"><span></span></a></li>
									<li><a href="#" class="gray"><span></span></a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<div class="modal video-modal fade" id="myModal4" tabindex="-1" role="dialog" aria-labelledby="myModal4">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="images/p3.jpg" alt=" " class="img-responsive" />
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>Music MP3 Player </h4>
							<p>Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea 
								commodo consequat.Duis aute irure dolor in 
								reprehenderit in voluptate velit esse cillum dolore 
								eu fugiat nulla pariatur. Excepteur sint occaecat 
								cupidatat non proident, sunt in culpa qui officia 
								deserunt mollit anim id est laborum.</p>
							<div class="rating">
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive" />
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive" />
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><span>$60</span> <i class="item_price">$58</i></p>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart" />
									<input type="hidden" name="add" value="1" /> 
									<input type="hidden" name="w3ls_item" value="MP3 Player" /> 
									<input type="hidden" name="amount" value=" $58.00"/>   
									<button type="submit" class="w3ls-cart">Add to cart</button>
								</form>
							</div>
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
									<li><a href="#"><span></span></a></li>
									<li><a href="#" class="brown"><span></span></a></li>
									<li><a href="#" class="purple"><span></span></a></li>
									<li><a href="#" class="gray"><span></span></a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>
	<div class="modal video-modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModal3">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>						
				</div>
				<section>
					<div class="modal-body">
						<div class="col-md-5 modal_body_left">
							<img src="images/38.jpg" alt=" " class="img-responsive">
						</div>
						<div class="col-md-7 modal_body_right">
							<h4>Kitchen &amp; Dining Accessories</h4>
							<p>Ut enim ad minim veniam, quis nostrud 
								exercitation ullamco laboris nisi ut aliquip ex ea 
								commodo consequat.Duis aute irure dolor in 
								reprehenderit in voluptate velit esse cillum dolore 
								eu fugiat nulla pariatur. Excepteur sint occaecat 
								cupidatat non proident, sunt in culpa qui officia 
								deserunt mollit anim id est laborum.</p>
							<div class="rating">
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star-.png" alt=" " class="img-responsive">
								</div>
								<div class="rating-left">
									<img src="images/star.png" alt=" " class="img-responsive">
								</div>
								<div class="clearfix"> </div>
							</div>
							<div class="modal_body_right_cart simpleCart_shelfItem">
								<p><span>$650</span> <i class="item_price">$645</i></p>
								<form action="#" method="post">
									<input type="hidden" name="cmd" value="_cart">
									<input type="hidden" name="add" value="1"> 
									<input type="hidden" name="w3ls_item" value="Microwave Oven"> 
									<input type="hidden" name="amount" value="645.00">   
									<button type="submit" class="w3ls-cart">Add to cart</button>
								</form>
							</div>
							<h5>Color</h5>
							<div class="color-quality">
								<ul>
									<li><a href="#"><span></span></a></li>
									<li><a href="#" class="brown"><span></span></a></li>
									<li><a href="#" class="purple"><span></span></a></li>
									<li><a href="#" class="gray"><span></span></a></li>
								</ul>
							</div>
						</div>
						<div class="clearfix"> </div>
					</div>
				</section>
			</div>
		</div>
	</div>  
	<!-- //single -->
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
function f11()
{
	
	if(frm_invoice.sqty.value=="")
	{
		alert("Enter Seling Quantity");
		frm_invoice.sqty.focus();
		return false;
	}
	else if(frm_invoice.dis.value=="")
	{
		alert("Enter Discount");
		frm_invoice.dis.focus();
		return false;
	}		
}
function f22()
{
	var p=Number(frm_invoice.spr.value);
	var q=Number(frm_invoice.sqty.value);
	var s=(p*q);
	frm_invoice.stot.value=s;
}
function f33()
{
	var st=Number(frm_invoice.stot.value);
	var d=Number(frm_invoice.dis.value);
	var cg=Number(frm_invoice.cgst.value);
	var sg=Number(frm_invoice.sgst.value);
	
	var tmp=(st-d);
	
	var c_rs=(tmp*cg)/100;
	var s_rs=(tmp*sg)/100;
	
	var mt=(tmp+c_rs+s_rs);
	frm_invoice.tot.value=mt;
}	
</script>