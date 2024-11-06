<?php
session_start();
if(isset($_SESSION['user'])=="")
{
	header("location:index.php?msg3=stop");
	exit(0);
}
require_once("connect.php");
$a=$_SESSION['user'];
$p=$_REQUEST['prod'];
$c=$_REQUEST['cmt'];
mysqli_query($cn,"insert into tbl_comments(uid,pid,comments)values('$a','$p','$c')")or
die("QF Comments add");
header("location:product_details.php?p=$p");
?>