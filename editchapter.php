<?php require_once('edit/heder.php')   ?>  <!-- heder part -->
<?php require_once('config.php') ?>
</head>
<?php 

  
if(isset($_REQUEST['update'])){
  if(($_REQUEST['std'] == "") || ($_REQUEST['subject'] == "") || ($_REQUEST['chpname'] == "")){
     $msg = '<div class="alert alert-warning col-sm-6 mt-2 ml-5" role="alert"> Full Fill All the Fields </div>';
    
  }else{
     @$eid  = $_REQUEST['chid'];
      $rid = $_REQUEST['std'];
   $rsub = $_REQUEST['subject'];
  $rchap = $_REQUEST['chpname'];
    $sql = "UPDATE chapter SET stid = '$rid',subjectid='$rsub',chapname='$rchap'  WHERE chid ='$eid'";
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
                <h1 class="m-0 text-dark">Upadate Chapter</h1>
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
            <?php
            @$eid  = $_REQUEST['id'];

            $s = mysqli_query($conn,"select * from chapter where chid='$eid' ");
            $r = mysqli_fetch_array($s);
            ?>
            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <section class="col-lg-12 connectedSortable">
                <!-- start card-->
                <div class="card">
                  <div class="card-body">
                    <form method="POST" action="">

<input type="hidden" name='chid' value="<?php echo $eid; ?>" class="form-control">
                      <div class="form-group" >
                        <label>Standered</label>
                        <select class="form-control" onchange="myfun(this.value)" name="std">
                          <option>select standard</option>
                          <?php
                          $query ="SELECT * FROM standered";
                          $result = mysqli_query($conn,$query);
                          while ($rows = mysqli_fetch_array($result)) {
                            if($r['stid']==$rows['stid']) {
                              ?>
                              <option value="<?php echo $rows['stid'];?>" selected=""><?php echo $rows['stname'];?></option>
                              <?php }  else { ?>
                              <option value="<?php echo $rows['stid'];?>"><?php echo $rows['stname'];?></option>
                              <?php }  } ?>
                            </select>
                          </div>
                          <div class="form-group">
                            <label>Subject</label>
                            <select class="form-control" id="dataget" name="subject">
                              <option>select subject</option>
                              <?php
                              $query ="SELECT * FROM subject";
                              $result = mysqli_query($conn,$query);
                              while ($rows = mysqli_fetch_array($result)) {
                                if($r['subjectid']==$rows['subjectid']) {
                                  ?>
                                  <option value="<?php echo $rows['subjectid'];?>" selected=""><?php echo $rows['subjectname'];?></option>
                                  <?php }  else { ?>
                                  <option value="<?php echo $rows['subjectid'];?>"><?php echo $rows['subjectname'];?></option>
                                  <?php }  } ?>
                                </select>
                              </div>



                              <div class="form-group">
                                <label for="exampleInputEmail1">Chapter Name</label>

                                <input class="form-control form-control-lg" type="text" placeholder="Enter stander" name="chpname"
                                value="<?php echo $r['chapname']; ?>">
                                <br>
                              </div>
                              <!-- /.card-body -->

                              <div class="text-center">
                                <button type="submit" class="btn btn-danger" id="requpdate"
                                name="update">Upadate</button>
                                <a href="chapter.php" class="btn btn-secondary">Close</a>
                              </div>
                            </form>
                            <?php if(isset($msg)){echo $msg;}?>
                            <!-- table start -->


                            <!-- this is delete code -->




                            <!-- table end -->

                          </div>
                          <!--  - /.card-body --> 
                        </div>
                        <!-- end card -->
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
            <script type="text/javascript">
            function myfun(datavalue){

              $.ajax({
                url:'sub.php',
                type:'POST',
                data:{'datapost':datavalue},
                success: function(result){
              // alert(result);
              $('#dataget').html(result);
            }
          });
            }



            </script>
          </body>
          </html>
