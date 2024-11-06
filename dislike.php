<?php
session_start();
if(isset($_SESSION['user'])=="")
{
	header("location:index.php?msg3=stop");
	exit(0);
}
require_once("connect.php");
$a=$_SESSION['user'];
$p=$_REQUEST['p'];
mysqli_query($cn,"delete from tbl_like where uid='$a' and pid='$p'")or die ("QF");
header("location:product_details.php?p=$p");
?>