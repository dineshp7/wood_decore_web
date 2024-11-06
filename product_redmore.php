<?php
session_start();

$a=$_REQUEST['b'];
require_once("connect.php");
	$q=mysqli_query($cn,"select * from products where pid=$a")or die("QF");
$data=mysqli_fetch_array($q);
?>
<!DOCTYPE html>

<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Title Here</title>
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
</head>
<body>
    <div id="wrapper">
        <nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
              		<?php require_once("logo.php");?>
            </div>
  				<?php require_once("top.php");?>
        </nav>   
           <!-- /. NAV TOP  -->
 				<?php require_once("menu.php");?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-md-12">
                     <h2>Product Detail</h2>   
                        <h5>  </h5>
                       <form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
      <table width="50%" border="1" align="center">
        <tr>
          <td colspan="3"><div align="center">Product Detail</div></td>
          </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Cat Name</td>
          <td>:</td>
          <td><?php echo $data['cat_name'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Sub Cat Name</td>
          <td>:</td>
          <td><?php echo $data['sub_cat_name'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Company Name</td>
          <td>:</td>
          <td><?php echo $data['company_name'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Size</td>
          <td>:</td>
          <td><?php echo $data['size'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Color</td>
          <td>:</td>
          <td><?php echo $data['color'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Type</td>
          <td>:</td>
          <td><?php echo $data['type'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Product Name </td>
          <td>:</td>
          <td><?php echo $data['Prod_name'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Purchase Price</td>
          <td>:</td>
          <td><?php echo $data['purchase_price'];?>&#8377;</td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Selling Price</td>
          <td>:</td>
          <td><?php echo $data['selling_price'];?>&#8377;</td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Product Qty</td>
          <td>:</td>
          <td><?php echo $data['p_qty'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Prod Code</td>
          <td>:</td>
          <td><?php echo $data['prod_code'];?></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>Photo1</td>
          <td>:</td>
          <td><img src="../Wholesaler/product_photo/<?php echo $data['photo1'];?>?url=../Wholesaler/product_photo/<?php echo $data['photo1'];?>?url=" height="80" width="80" style="border-radius:50px" class="dg-picture-zoom"/></td>
        </tr>
        <tr class="table-bordered table-condensed table-hover table-responsive">
          <td>photo2</td>
          <td>:</td>
          <td><p><img src="../Wholesaler/product_photo/<?php echo $data['photo2'];?>?url=../Wholesaler/product_photo/<?php echo $data['photo2'];?>?url=" height="80" width="80" style="border-radius:50px" class="dg-picture-zoom"/></p></td>
        </tr>
      </table>
        </form>
                    </div>
                </div>
                 <!-- /. ROW  -->
                 <hr />
               
    </div>
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
        </div>
     <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="assets/js/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="assets/js/bootstrap.min.js"></script>
    <!-- METISMENU SCRIPTS -->
    <script src="assets/js/jquery.metisMenu.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="assets/js/custom.js"></script>
    
   
</body>
</html>
