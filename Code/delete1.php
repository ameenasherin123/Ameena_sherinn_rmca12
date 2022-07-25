<?php
 include('includes/dbconnection.php');

if(isset($_GET['id']))
{
 $i1=$_GET['id'];
$del = mysqli_query($query,"delete from tbl_users where ID = '$i1'");

	header("location:manage-owners.php");
}
?>