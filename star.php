<?php
session_start();
if(isset($_SESSION['user'])=="")
{
	header("location:index.php?msg2=stop");
	exit(0);
}
require_once("connect.php");
$a=$_SESSION['user'];
$p=$_REQUEST['p'];
$r=$_REQUEST['s'];
mysqli_query($cn,"insert into tbl_star(pid,uid,star_rate)values('$p','$a','$r')")or die ("QF Star");
header("location:product_details.php?p=$p");
?>