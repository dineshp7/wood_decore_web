 <?php
require_once("connect.php");

if(isset($_REQUEST['Submit1']))
{
extract($_POST);
mysqli_query($cn,"insert into user(name,mobile_no,email_id,address,pincode	,login_id,password,s_question,s_answer)values('$nm','$mob','$emid','$add','$pin','$logid','$pass','$sq','$sa')")or die("QF");
header("location:index.php?msg5=5");
}

session_start();
if(isset($_REQUEST['Submit_l']))
{
extract($_POST);

$q=mysqli_query($cn,"select uid from user where password='$pwd' and (mobile_no='$lid' or email_id='$lid' or login_id='$lid')")or die ("QF");
if(mysqli_num_rows($q))
{
$data=mysqli_fetch_array($q);
$_SESSION['user']=$data['uid'];
header("location:profile.php");
}
else
{
header("location:index.php?msg1=1");
}
}
?>



<div class="modal fade" id="myModal88" tabindex="-1" role="dialog" aria-labelledby="myModal88"
		aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						&times;</button>
					<h4 class="modal-title" id="myModalLabel">Don't Wait, Login now!</h4>
				</div>
				<div class="modal-body modal-body-sub">
					<div class="row">
						<div class="col-md-8 modal_body_left modal_body_left1" style="border-right: 1px dotted #C2C2C2;padding-right:3em;">
							<div class="sap_tabs">	
								<div id="horizontalTab" style="display: block; width: 100%; margin: 0px;">
									<ul>
										<li class="resp-tab-item" aria-controls="tab_item-0"><span>Sign in</span></li>
										<li class="resp-tab-item" aria-controls="tab_item-1"><span>Sign up</span></li>
									</ul>		
									<div class="tab-1 resp-tab-content" aria-labelledby="tab_item-0">
										<div class="facts">
											<div class="register">
												<form action="" method="post" name="frm1" id="frm1">			
													<input name="lid" type="text" id="lid" autofocus placeholder="Enter the Login id / Mobile no. / Email id" />			
												<input type="Password" name="pwd" id="pwd"  placeholder="Enter Password" />			
												<input name="checkbox" type="checkbox" onClick="myFunction();" value="checkbox" />
Show Password					
													<div class="sign-up">
														<input type="submit" name="Submit_l" value="Login" onclick="return f2();"/>
													</div>
												</form>
											</div>
										</div> 
									</div>	 
									<div class="tab-2 resp-tab-content" aria-labelledby="tab_item-1">
										<div class="facts">
											<div class="register">
												<form action="" method="post" id="frm2" name="frm2">			
													<input name="nm" type="text" id="nm" autofocus placeholder="Enter Name"  onkeypress="return (event.charCode > 64 && 
event.charCode < 91) || (event.charCode > 96 && event.charCode < 123 || event.charCode==32) " />
													<input name="mob" type="text" id="mob" maxlength="10"  placeholder="Enter Mobile No" pattern="[6-9]{1}[0-9]{9}" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"/>
													 <input name="emid" type="email" id="emid"  placeholder="Enter Email Id"/> 
													
													<textarea name="add" id="add"  placeholder="Enter Address"></textarea>
													<input name="pin" type="text" id="pin" maxlength="6"  placeholder="Enter Pincode" onkeypress="return (event.charCode >= 48 && event.charCode <= 57)"/>
													<input name="logid" type="text" id="logid"  placeholder="Enter Login Id"/>
													<input name="pass" type="password" id="pass"  placeholder="Enter Password"/>
													<input name="cpwd" type="password" id="cpwd"  placeholder="Enter Confirm Password" />	
													
													 <input name="checkbox" type="checkbox" onClick="myFunction();" value="checkbox" />
Show Password 
 											
													
													
		 
      Security Question :
     
       <select name="sq" id="sq">
        <option value="Select Question">Select Question</option>
        <option value="What is Your Nick Name?">What is Your Nick Name?</option>
        <option value="What is Your Fav Food Dish?">What is Your Fav Food Dish?</option>
      </select>
      
		
		<input name="sa" type="text" id="sa"  placeholder="Security Answer"/>
												
													<div class="sign-up">
													
														<input type="submit" value="Create Account" name="Submit1" onclick="return f1();"/>
													</div>
												</form>
											</div>
										</div>
									</div> 			        					            	      
								</div>	
							</div>
							<script src="js/easyResponsiveTabs.js" type="text/javascript"></script>
							<script type="text/javascript">
								$(document).ready(function () {
									$('#horizontalTab').easyResponsiveTabs({
										type: 'default', //Types: default, vertical, accordion           
										width: 'auto', //auto or any width like 600px
										fit: true   // 100% fit in a container
									});
								});
							</script>
							<div id="OR" class="hidden-xs">OR</div>
						</div>
						<div class="col-md-4 modal_body_right modal_body_right1">
							<div class="row text-center sign-with">
								<div class="col-md-12">
									<h3 class="other-nw">Sign in with</h3>
								</div>
								<div class="col-md-12">
									<ul class="social">
										<li class="social_facebook"><a href="#" class="entypo-facebook"></a></li>
										<li class="social_dribbble"><a href="#" class="entypo-dribbble"></a></li>
										<li class="social_twitter"><a href="#" class="entypo-twitter"></a></li>
										<li class="social_behance"><a href="#" class="entypo-behance"></a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<script>
function f1()
{
if(frm2.nm.value=="")
{
alert("Enter Name");
frm2.nm.focus();
return false;
}
else if(frm2.mob.value=="")
{
alert("Enter Mobile No");
frm2.mob.focus();
return false;
}
else if(frm2.emid.value=="")
{
alert("Enter Email Id");
frm2.emid.focus();
return false;
}
else if(frm2.add.value=="")
{
alert("Enter Address");
frm2.add.focus();
return false;
}
else if(frm2.pin.value=="")
{
alert("Enter Pincode");
frm2.pin.focus();
return false;
}
else if(frm2.logid.value=="")
{
alert("Enter Login Id");
frm2.logid.focus();
return false;
}
else if(frm2.pass.value=="")
{
alert("Enter Password");
frm2.pass.focus();
return false;
}
else if(frm2.cpwd.value=="")
{
alert("Enter the Confirm password");
frm2.cpwd.focus();
return false;
}
else if(frm2.sa.value=="")
{
  alert("Enter Your Security Answer");
  frm2.sa.focus();
  return false;
}
if(frm2.pass.value!=frm2.cpwd.value)
{
alert("new password and Confirm password are not match");
frm2.pass.value="";
frm2.cpwd.value="";
frm2.pass.focus();
return false;
}
}
</script>

<script>
function myFunction() {
var x = document.getElementById("pass");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
</script>


<script>
function myFunction() {
  var x = document.getElementById("pass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
  var x = document.getElementById("cpwd");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>

<script>
function f2()
{
if(frm1.lid.value=="")
{
alert("Enter Login ID / Mobile No. / Email Id or Password ");
form1.lid.focus();
return false;
}
else if(frm1.pwd.value=="")
{
alert("Enter Password ");
form1.pwd.focus();
return false;
}
}
</script>
<script>
function myFunction() {
var x = document.getElementById("pwd");
if (x.type === "password") {
x.type = "text";
} else {
x.type = "password";
}
}
</script>
