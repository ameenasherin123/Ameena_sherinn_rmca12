<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid'])) {
 

    if(isset($_POST['submit']))
  {
$eid=$_GET['editid'];
$cmsaid=$_SESSION['remsuid'];
 $protype=$_POST['propertytype'];


 $query=mysqli_query($con,"update tblpropertytype set PropertType = '$protype' where  ID='$eid'");

    if ($query) {
    $msg="Propert Type has been update.";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }
  
}

?>

<!doctype html>
<html lang="en">

 
<head>
    
    <title>Realtor || Update Property Type</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
       
         <?php include_once('includes/header.php');?>
       
       <?php include_once('includes/sidebar.php');?>
       
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Update Property Type </h2>
                            
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                        
                                        <li class="breadcrumb-item active" aria-current="page">Update Property Type</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                
                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- valifation types -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Update Property Type</h5>
                                <div class="card-body">
                                    <form  method="post">
                                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
  <?php
 $cid=$_GET['editid'];
$ret=mysqli_query($con,"select * from  tblpropertytype where ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Property Type</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <span id="msg1" style="color:red;"></span>
                                                <input type="text" name="propertytype" id="propertytype" required="true" class="form-control" value="<?php  echo $row['PropertType'];?>" required onchange="validateadd();">

                                                  <script>
function validateadd(){
    var val = document.getElementById('propertytype').value;

    if (!val.match(/^[A-Z][a-z" "]{3,}$/))
    {
        document.getElementById('msg1').innerHTML="Start with a Capital letter & Only alphabets are allowed";
           document.getElementById('propertytype').value = "";
        return false;
    }
document.getElementById('msg1').innerHTML=" ";
    return true;
    }
</script>
                                            </div>
                                        </div>
                                    <?php } ?>
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                               <p style="text-align: center;"> <button type="submit" class="btn btn-space btn-primary" name="submit">Submit</button></p>
                                                
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end valifation types -->
                        <!-- ============================================================== -->
                    </div>
           
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
             <?php include_once('includes/footer.php');?>
            <!-- ============================================================== -->
            <!-- end footer -->
            <!-- ============================================================== -->
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- end main wrapper -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    <script src="assets/vendor/parsley/parsley.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script>
    $('#form').parsley();
    </script>
    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict';
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault();
                        event.stopPropagation();
                    }
                    form.classList.add('was-validated');
                }, false);
            });
        }, false);
    })();
    </script>
</body>
 
</html>
<?php 
}
else
{
     header('location:logout.php');
}
?>