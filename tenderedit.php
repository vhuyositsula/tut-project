<?php
include("session.php");
include("connection.php");

$username = $_SESSION['username'];

$error = "";
if(isset($_POST['save']))
{
    $title = mysqli_real_escape_string($con,$_POST['title']);
    $description = mysqli_real_escape_string($con,$_POST['description']);
    $description2 = mysqli_real_escape_string($con,$_POST['description2']);
    $catergory= mysqli_real_escape_string($con,$_POST['catergory']);
    $date = mysqli_real_escape_string($con,$_POST['date']);
    $minimum= mysqli_real_escape_string($con,$_POST['minimum']);
    $maximum = mysqli_real_escape_string($con,$_POST['maximum']);
   // $admin_id =
    $tender_id = $_GET['id'];

    if(!empty($title)||!empty($description)||!empty($description2)||empty($catergory)||empty($date)||!empty($minimum)||!empty($maximum))
    {

      
     $query = mysqli_query("$con,UPDATE `tender` SET`tender_title`='$title',`short_description`='$description',`full_description`='$description2',
        `due_date`='$date',`min_budget`=$minimum,`max_budget`=$maximum WHERE tenderId = '$tender_id'");

        if(mysqli_query($con,$query))
        {
          $error = "Successfully updated";
          header("location:tenders.php");
        }
       else{
         $error = "Something went wrong";
       }
         
    }
    else{
       $error="All fields must be filled";
    }

}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Tender Bidding System</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link rel="shortcut icon" href="assets/ico/favicon.png">
</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN <sup>(TBS)</sup></div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.html">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
       Admin Dashboard
      </div>
          <!-- Divider -->
      <hr class="sidebar-divider">
      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Actions</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header"> Preform Admin Actions:</h6>
            <a class="collapse-item" href="#">Add Admin</a>
            <a class="collapse-item" href="admin.php">Add Tenders</a>
            <a class="collapse-item" href="#">Send Notification</a>
          </div>
        </div>
      </li>
  <!-- Divider -->
  <hr class="sidebar-divider">
      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>View</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">View and Generate Reports:</h6>
            <a class="collapse-item" href="tenders.php">View Tenders</a>
            <a class="collapse-item" href="#">View Users</a>
            <a class="collapse-item" href="#">View Status</a>
            <a class="collapse-item" href="#">View Notifications</a>
          </div>
        </div>
      </li>
 
      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
            
            </li>

         

           

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $username."[-ADMIN-]" ?></span>
               <!-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> -->
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Add New Tender</h1>
            
          </div>
          
          <!-- Content Row -->
          <div class="row">
            <div class="col-lg-6 my-auto"> 
          <form role="form" id="formLogin" novalidate="" method="POST" action="edit.php">
                <label><?php echo $error; ?></label>
                <?php
                    // include("session.php");
                   include("connection.php");
                    
                   $id = $_GET['id'];
                                $t1 ="";
                                $desc = "";
                                $desc2="";
                                $cat = "";
                                $min = "";
                                $max="";
                                $due = "";
                                
                                $sql = mysqli_query($con,"SELECT * FROM tender WHERE tenderId = '$id'");
                                
                                while($tender = mysqli_fetch_array($sql))
                                {
                                  $t1 = $tender['tender_title'];
                                  $desc = $tender['short_description'];
                                  $desc1 =$tender['full_description'];
                                  $cat = $tender['category'];
                                  $due = $tender['due_date'];
                                  $min = $tender['min_budget'];
                                  $max = $tender['max_budget'];
                                }

                ?>
              <div class="form-group">
               <label>Reference</label>
                <input class="form-control" name="id" id="id" value="<?php echo $id;?>"  maxlength="20" >
              </div>
              <div class="form-group">
               <label>Title</label>
                <input class="form-control" name="title" id="title" value="<?php echo $t1;?>"  maxlength="20" >
              </div>
               <div class="form-group">
               <label>Short description</label>
                <input class="form-control" name="description" id="description" value="<?php echo $desc;?>" maxlength="25">
              </div>
               <div class="form-group">
               <label>Full description</label>
                <input class="form-control" name="description2" id="description2" value="<?php echo $desc1;?>" > 
               
              </div>    
              <div class="form-group">
               <label>Catergory</label>
               <input class="form-control"  maxlength="12" name="catergory" id="catergory" value="<?php echo $cat;?>" >
              </div>
              <div class="form-group">
               <label>Due Date</label>
                <input class="form-control" type="date" name="date" id="date" value="<?php echo $due;?>" >
              </div> 
              <div class="form-group">
               <label>Minimum  budget</label>
                <input class="form-control"  maxlength="12" name="minimum" id="minimum" value="<?php echo $min;?>" >
              </div>
              <div class="form-group">
               <label>Maximum  budget</label>
                <input class="form-control"  maxlength="12" name="maximum" id="maximum" value="<?php echo $max;?>" >
              </div> 


              <div >


              <div>


              <button type="submit" class="btn btn-success"  name="save"id="save">Save Tender</button>
          </form>
          <br>
              </div>
           <div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; TBS 2019</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="index.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>
