<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);

if(isset($_POST['submit']))
  {
    $contactno=$_SESSION['contactno'];
    $email=$_SESSION['email'];
    $password=($_POST['newpassword']);

        $query=mysqli_query($con,"UPDATE tbl_users set password='$password' where email_id='$email' && mob_no='$contactno' ");
   if($query) {
            echo "<div class='form'>
                  <h3>Password successfully changed.</h3><br/>
                  <p class='link'>Click here to <a href='../EstateAgency/login1/login.php'>Login</a></p>
                  </div>";
              }
  
  }
  else {
  ?>
<!doctype html>
<html lang="en">
 
<head>
    
    <title>Realtor || Reset Page</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <style>
    html,
    body {
        height: 100%;
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
    }
    </style>
    <script type="text/javascript">
function checkpass()
{
if(document.changepassword.newpassword.value!=document.changepassword.confirmpassword.value)
{
alert('New Password and Confirm Password field does not match');
document.changepassword.confirmpassword.focus();
return false;
}
return true;
} 

</script>
</head>

<body>
    <!-- ============================================================== -->
    <!-- forgot password  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card">
            <div class="card-header text-center"><h2 style="color: blue">Realtor</h2><span class="splash-description">Please enter your user information.</span></div>
            <div class="card-body">
                <form role="form" method="post" action="" name="changepassword" onsubmit="return checkpass();">
                    <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                    <div class="form-group">
                        <span id="msg5" style="color:red;"></span>
                        <input type="password" name="newpassword" class="form-control form-control-lg" placeholder="New Password" required="true" required onchange="vali();">

                                 <script>
function vali(){
      var val = document.getElementById('password').value;

    if (!val.match(/^[A-Za-z0-9!-*]{6,15}$/))
    {
        document.getElementById('msg5').innerHTML="Password should contain atleast 6 characters";

    document.getElementById('password').value = "";
        return false;
    }
document.getElementById('msg5').innerHTML=" ";
    return true;
    }

</script>

                    </div>
                     <div class="form-group">
                        <input type="password" name="confirmpassword" class="form-control form-control-lg" placeholder="Confirm Password" required="true">
                        
                        
                    </div>
                    <div class="form-group pt-1"><button type="submit" class="btn btn-primary btn-lg btn-block" name="submit">Reset</button></div>
                </form>
            </div>
            <div class="card-footer text-center">
                <span><a href="../EstateAgency/login1/login.php">Sign In</a></span>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end forgot password  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="../assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>

    <?php
    }
?>
</body>

 
</html>