<?php 
include('includes/dbconnection.php');

if(isset($_GET['id']))
{
    $i1=$_GET['id'];
    #$sql=mysqli_query($con,"SELECT * FROM `tbl_users` WHERE ID='$i1'");
   # $rows=mysqli_fetch_array($sql);
    #$email=$rows['email_id'];
    mysqli_query($con,"UPDATE `tbl_users` SET `approve`='approved' WHERE ID='$i1'");
   #echo "<script>window.location.href='admin/src/verifymail.php?email=$email'</script>";
     header('location:manage-owners.php');
}

?>