<?php
session_start();
if(isset($_SESSION['user'])=="")
{
header("location:index.php?msg3=stop");
exit(0);
}
$_SESSION['user']='';
session_destroy();
if(isset($_REQUEST['msg'])=="ok")
{
header("location:index.php?msg4=ok");
}
else
{
header("location:index.php?msg2=logout");
}
?>