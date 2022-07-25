<?php
 include('includes/dbconnection.php');

if(isset($_GET['id']))
{
    $status= $_GET['status'];
 $i1=$_GET['id'];
mysqli_query($con,"delete from tbl_users where ID='$i1'");


    header('location:manage-agents.php');
}
?>