<?php
include("session.php");
include("connection.php");

$username = $_SESSION['username'];

$error = "";
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

  <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="assets/css/fpwdmodal.css">
</head>

<body id="page-top">


<?php
  if(isset($_POST['save'])){
    
      $name = $con->real_escape_string($_POST['name']);
      $email = $con->real_escape_string($_POST['email']);
      $contact_no = $con->real_escape_string($_POST['contact_no']);
      $surname = $con->real_escape_string($_POST['surname']);
      $id_num = $con->real_escape_string($_POST['id_num']);


      $sql = "START TRANSACTION; "
      ."INSERT INTO users (username, password, role) "
           ."VALUES ('Admin', 'password', 'Admin'); "
      ."INSERT INTO admin (name, surname, id_num, email, contact_no,user_id) "
           ."VALUES ('$name', '$surname','$id_num','$email','$contact_no', 'LAST_INSERT_ID()'); "
      ."COMMIT;";
              $res = mysqli_query($con,$sql);

              if (!$res) {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
          } else {
            
            header('Location: Admin.php?id='.$username);
        }
      /*if ($row['type'] !== 'Super-Super-Admin') {
          
              //SQL statement to enter the items in the database
              $org2 = $row['org'];
              $sql = "INSERT INTO users (type, fullname, email, org, phone, address, city, code)"
                    ."VALUES ('$type', '$name','$email','$org2', '$phone','$address', '$city', '$code')";
              $res = mysqli_query($conn,$sql);

              if (!$res) {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
              } else {
                
                header('Location: Admin.php?id='.$id);
            }
                
      }else{
          //SQL statement to enter the items in the database
          $sql = "INSERT INTO users (type, fullname, email, org, phone, address, city, code)"
                    ."VALUES ('$type', '$name','$email','$org', '$phone','$address', '$city', '$code')";
          $res = mysqli_query($conn,$sql);

          if (!$res) {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
          } else {
            header('Location: Admin.php?id='.$id);
            }
      }*/

}
?>



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
                <a class="dropdown-item" href="adminProfile.php?id=<?php echo $username; ?>">
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
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Administrators</h4>
                                
                                 <button class="category" onclick="Modal.open('#modal02')" style="float: right;"><i class="pe-7s-plus" style="padding-right: 5px;"></i>Add admin</button>
                             
                            </div>
                            
                           
                                <table class='table table-hover table-striped'>
                                  <thead>
                                      <th>Name</th>
                                    	<th>Surname</th>
                                    	<th>Phone</th>
                                    	<th>Email</th>
                                  </thead>
                                    <tbody>
                                    <?php 
                                    $sql =  "select * from admin";
                                    $r = mysqli_query($con,$sql);
                                    $projects = array();
                                    while ($project =  mysqli_fetch_assoc($r))
                                    {
                                        $projects[] = $project;
                                    }
                                    foreach ($projects as $project)
                                    {
                                  ?>
                                    <tr>
                                        <td><?php echo $project['name']; ?></td>
                                        <td><?php echo $project['surname']; ?></td>
                                        <td><?php echo $project['contact_no']; ?></td>
                                        <td><?php echo $project['email']; ?></td>
                                    </tr>
                                  <?php
                                    }
                                  ?>

                                  </tbody>
                                </table>

                            
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <!-- <nav class="pull-left">
                    <ul>
                        <li>
                            <a href="#">
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Company
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                Portfolio
                            </a>
                        </li>
                        <li>
                            <a href="#">
                               Blog
                            </a>
                        </li>
                    </ul>
                </nav>
                <p class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                </p> -->
            </div>
        </footer>


    </div>
</div>



<div class="overlay" id="modal02" data-backdrop>
  <button class="button" data-type="icon" onclick="Modal.close(event)" data-modal-close><svg class="icon icon-clear" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg></button>
  <form class="modal modal2" style="width: 100%;" method="post" action="" enctype="multipart/form-data" role="form">
    <header class="modal--header">
      <h3 class="modal--title">Add Administrator</h3>
    </header>
    <div class="modal--content">
       
       <div class="row">
                <div class="col-md-5">
                    <div class="form-group">
                    
    
                    </div>
                </div>
                <div class="col-md-3">
                    
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Full Name</label> -->
                        <input type="text" name="name" class="form-control" placeholder=" Name" value="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Email</label> -->
                        <input type="text" name="surname" class="form-control" placeholder="Surname" value="" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>id</label> -->
                        <input type="text" class="form-control" name="id_num" placeholder="Identity Number" value="" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Phone/label> -->
                        <input type="text" class="form-control" name="contact_no" placeholder="Phone" value="" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- <label>Email</label> -->
                        <input type="text" name="email" class="form-control" placeholder="Email Address">
                                
                    </div>
                </div>
            </div>
            <!--<div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        
                        <input type="text" class="form-control" name="city" placeholder="City" value="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                      
                        <input type="number" class="form-control" name="code" placeholder="ZIP Code" value="" required>
                    </div>
                </div>
                <div class="col-md-4">
                    
                </div>
            </div>-->

            <div class="row">
                <div class="col-md-12">
                   
                </div>
            </div>

    </div>
    <footer class="modal--footer">
      <button type="submit" name="save">Add Admin</button>
    </footer>
  </form>
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

  <script src="assets/js/fpwdmodal.js"></script>

</body>

</html>
