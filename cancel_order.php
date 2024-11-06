<?php
session_start();
require_once("connect.php");
$b=$_REQUEST['b'];
mysqli_query($cn,"update invoice_tbl set order_status='Order Cancelled' where bid=$b")or die ("QF");
header("location:orders.php");
?>