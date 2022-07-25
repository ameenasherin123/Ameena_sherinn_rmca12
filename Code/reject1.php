<?php 
include('includes/dbconnection.php');

if(isset($_GET['id']))
{
    $i1=$_GET['id'];
    #echo $i1;
    mysqli_query($con,"UPDATE `tbl_users` SET `approve`='Rejected' WHERE ID='$i1'");
    header('location:manage-agents.php');

}

?>