<?php
	include("connect.php");
 $qy=mysqli_query($cn,"select * from user")or die("QFFFFFFF");
 $data=mysqli_fetch_array($qy);
 
 ?>
	<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
					<ul class="nav navbar-nav">
						<li><a href="index.php" class="act">Home</a></li>	
						<!-- Mega Menu -->
						<li class="dropdown">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown">Products <b class="caret"></b></a>
							<ul class="dropdown-menu multi-column columns-3">
								<div class="row">
									<?php
									require_once("connect.php");
									$qmm=mysqli_query($cn,"select * from main_cat")or die ("QF main menu");
									while($datamm=mysqli_fetch_array($qmm))
									{
									?>
									<div class="col-sm-3">
										<ul class="multi-column-dropdown">
											<h6><?php echo $datamm['main_cat_name'];?></h6>
<?php
$mnm1=$datamm['main_cat_name'];
$qsc=mysqli_query($cn,"select * from sub_cat where main_cat_name='$mnm1'")or die ("QF Sub Cat");
while($datass=mysqli_fetch_array($qsc))
{
?>
<li><a href="products.php?m=<?php echo $datamm['main_cat_name'];?>&s=<?php echo $datass['sub_cat_name'];?>"><?php echo $datass['sub_cat_name'];?></a></li>
<?php } ?>
											 
										</ul>
									</div>
									 <?php } ?>
									<div class="clearfix"></div>
								</div>
							</ul>
						</li>
						<li><a href="about.php">About Us</a></li> 
						
						<li><a href="contact_us.php">Contact Us</a></li>
						
						 
						 
						<?php
						
						if(isset($_SESSION['user'])!="")
						{
						?>
						<li><a href="orders.php">My Order</a></li>
						 <li class="w3pages"><a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><?php echo $data['name'];?> <span class="caret"></span></a>
						 
	<ul class="dropdown-menu">
		<li><a href="profile.php"><?php
		 echo $datamm['name'];?></a></li>
		<li><a href="change_password.php">Change Password</a></li>     
		<li><a href="logout.php">Logout</a></li>
	</ul>
						
						</li> 
						<?php
						}
						?>
					
					
					</ul>
				</div>