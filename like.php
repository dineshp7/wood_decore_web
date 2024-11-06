<?php
session_start();
require_once("connect.php");
if(isset($_SESSION['user'])=="")
{
	header("location:index.php?msg3=stop");
	exit(0);
}

$a=$_SESSION['user'];
$p=$_REQUEST['p'];
mysqli_query($cn,"insert into tbl_like(pid,uid)values('$p','$a')")or die ("QF");
header("location:product_details.php?p=$p"); 
?>