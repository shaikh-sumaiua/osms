<?php require_once('edit/heder.php')   ?>  <!-- heder part -->
<?php require_once('config.php')    ?>
</head>
<?php
if(isset($_REQUEST['edit'])){
    $sql = "SELECT * FROM standered WHERE stid = {$_REQUEST['id']}";
   $result = $conn->query($sql);
  $row = $result->fetch_assoc();
}

if(isset($_REQUEST['update'])){
  if(($_REQUEST['stid'] == "") || ($_REQUEST['sname'] == "")){
     $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert"> Full Fill All the Fields </div>';
    
  }else{
     $rid = $_REQUEST['stid'];
   $rname = $_REQUEST['sname'];
  
    $sql = "UPDATE standered SET stid = '$rid', stname='$rname'  WHERE stid='$rid'";
    if($conn->query($sql) == TRUE){
    $msg = '<div class="alert alert-success col-sm-6 mt-2 ml-5" role="alert">Updated sucessfully </div>'; 
    }else{
      $msg = '<div class="alert alert-danger col-sm-6 mt-2 ml-5" role="alert">Unable to upadate</div>';
    }
  }
}

















?>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
     </ul>

    <!-- SEARCH FORM -->
   

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Messages Dropdown Menu -->
      <li>
sumaiy
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <?php require_once('edit/sidemenu.php');    ?>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Upadate Standerd</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                
                <form action="" method="POST">
    <div class="form-group">
      <label for="r_login_id">standered Id</label>
      <input type="text" class="form-control" id="stid" 
      name="stid" 
      value="<?php if(isset($row['stid'])){echo $row['stid'];} ?>"readonly>
    </div>
    <div class="form-group">
      <label for="r_name">Standered Name</label>
      <input type="text" class="form-control" id="sname" 
      name="sname" 
      value="<?php if(isset($row['stname'])){echo $row['stname'];} ?>">
    </div>
   
    <div class="text-center">
    <button type="submit" class="btn btn-danger" id="requpdate"
    name="update">Upadate</button>
    <a href="standered.php" class="btn btn-secondary">Close</a>
    </div>
    <?php if(isset($msg)){echo $msg;}?>
</form>   
              </div><!-- /.card-header -->
             <!--  - /.card-body --> 
            </div>
          
          </section>
        
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php require_once('edit/mfooter.php');  ?>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?php require_once('edit/footer.php');?>
</body>
</html>
