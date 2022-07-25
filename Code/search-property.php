<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['remsuid'])) {
  



  ?>
<!doctype html>
<html lang="en">
 
<head>
   
    <title>Realtor || Search Properties</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="../assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/buttons.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/select.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="assets/vendor/datatables/css/fixedHeader.bootstrap4.css">
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
         <!-- ============================================================== -->
         <?php include_once('includes/header.php');?>
        
        <?php include_once('includes/sidebar.php');?>
       
        <!-- wrapper  -->
        <!-- ============================================================== -->
        <div class="dashboard-wrapper">
            <div class="container-fluid  dashboard-content">
                <!-- ============================================================== -->
                <!-- pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Search Properties</h2>
                           
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="dashboard.php" class="breadcrumb-link">Dashboard</a></li>
                                       
                                        <li class="breadcrumb-item active" aria-current="page">Search Properties</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- end pageheader -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- ============================================================== -->
                    <!-- basic table  -->
                    <!-- ============================================================== -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <h5 class="card-header">Search Properties</h5>
                            <form  method="post" enctype="multipart/form-data">
                                        <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                                        <div class="form-group row">
                                            <label class="col-12 col-sm-3 col-form-label text-sm-right">Search by Property Title/Name/Mobile No.:</label>
                                            <div class="col-12 col-sm-8 col-lg-6">
                                                <input type="text" name="searchdata" id="searchdata" class="form-control" required>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group row text-right">
                                            <div class="col col-sm-10 col-lg-9 offset-sm-1 offset-lg-0">
                                               <p style="text-align: center;"> <button type="submit" class="btn btn-space btn-primary" name="search">Search</button></p>
                                                
                                            </div>
                                        </div>
                                    </form>
                            <div class="card-body">
                                <div class="table-responsive">



<section id="properties-carousel" class="properties-carousel pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="heading heading-2  mb-70">
                            <h2 class="heading--title"> </h2>
                        </div>
                        <!-- .heading-title end -->
                    </div>
                    <!-- .col-md-12 end -->
                </div>
                <!-- .row end -->
               <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="carousel carousel-dots" data-slide="3" data-slide-rs="2" data-autoplay="true" data-nav="false" data-dots="true" data-space="25" data-loop="true" data-speed="800">
                            <!-- .property-item #1 -->






                                    <?php
if(isset($_POST['search']))
{ 

$sdata=$_POST['searchdata'];
  ?>
                                  
        <h4 align="center">Result against "<?php echo $sdata;?>" keyword </h4>
                                       
            
            
                                          <?php
$ret=mysqli_query($con,"select tblproperty.ID,tblproperty.PropertyTitle,tblproperty.Address,tblproperty.City,tblstate.StateName,tblcountry.CountryName,tblproperty.RentorsalePrice from tblproperty join tbl_users on tbl_users.ID=tblproperty.UserID join tblcountry on tblcountry.ID=tblproperty.Country join tblstate on tblstate.ID=tblproperty.State where tblproperty.PropertyTitle = '$sdata' or tbl_users.full_name = '$sdata' or tbl_users.mob_no = '$sdata' ");
$num=mysqli_num_rows($ret);
if($num>0){
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>
               <div class="col-xs-12 col-sm-6 col-md-6" width='300' height='300'>
                                    <!-- .property-item #1 -->
                                    <div class="property-item">
                                        <div class="property--img">

 </div>
 

    <div class="row">
                        <div class="col-xl-7 col-lg-10 col-md-10 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">
<a href="view-property-details.php?viewid=<?php echo $row['ID'];?>">
    <?php echo $row['PropertyTitle'];?></a></h5>

    <div class="card-body">
                                    <div class="metric-value d-inline-block">
<p class="property--location"><?php echo $row['Address'];?>&nbsp;
<?php echo $row['City'];?>&nbsp;
<?php echo $row['StateName'];?>&nbsp;  
<?php echo $row['CountryName'];?></p>
<p class="property--price"><?php echo $row['RentorsalePrice'];?></p>

 </div>
                          
                                            <!-- .property-features end -->
                                        </div>
                                    </div>
                                </div>
                            </div></div></div>
<?php }} else{ ?>

           <h2 align="center" style="color:red">No Record found</h2>

           <?php }?>                     <!-- .property item end -->

                              
                                <!-- .property item end -->
                            </div>
                     
                            <!-- .col-md-12 end -->
                        </div>
                        <!-- .row -->
                    </div>
                    <!-- .col-md-8 end -->
                </div>
                <!-- .row -->
            </div>
            <!-- .container -->
        </section>
        <!-- #properties-grid  end  -->
               
                <?php 
$cnt=$cnt+1;
} 

   
 ?>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ============================================================== -->
                    <!-- end basic table  -->
                    <!-- ============================================================== -->
                </div>
               
               
                
                
            </div>
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
    <script src="assets/vendor/multi-select/js/jquery.multi-select.js"></script>
    <script src="assets/libs/js/main-js.js"></script>
    <script src="../../../../../cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="assets/vendor/datatables/js/dataTables.bootstrap4.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="assets/vendor/datatables/js/buttons.bootstrap4.min.js"></script>
     <script src="assets/vendor/datatables/js/data-table.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="../../../../../cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="../../../../../cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="../../../../../cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="../../../../../cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="../../../../../cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
    
</body>
 
</html>
<?php 
}
else
{
     header('location:logout.php');
}
?> 