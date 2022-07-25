 <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="dashboard.php">Realtor</a>
               
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                      
                     
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/images/images.png" alt="" class="user-avatar-md rounded-circle"></a> <div class=""> <?php
$aid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select full_name from tbl_users where ID='$aid'");
$row=mysqli_fetch_array($ret);
$name=$row['full_name'];

?>
     <h5 class="mb-0 text-black nav-user-name"><?php echo $name; ?> </h5>
</div>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <?php
$aid=$_SESSION['remsuid'];
$ret=mysqli_query($con,"select full_name from tbl_users where ID='$aid'");
$row=mysqli_fetch_array($ret);
$name=$row['full_name'];

?>
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $name; ?> </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                <a class="dropdown-item" href="admin-profile.php">Account</a>
                                <a class="dropdown-item" href="change-password.php">Setting</a>
                                <a class="dropdown-item" href="../EstateAgency/login1/logout.php">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>