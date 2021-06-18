<?php require_once('edit/heder.php')   ?>  <!-- heder part -->
<?php require_once('config.php') ?>
</head>
<?php 
if(isset($_POST['submit']))
{
  if(($_POST['std']=="")||($_POST['subject']=="")||($_POST['chpname']=="")){
    $msg = '<div class="alert alert-warning mt-2" role="alert">
    All Feildes Are Required</div>';}
    //   }else{// Subject Already exist
    //      $sql = "SELECT chapname FROM chapter WHERE chapname
    //     ='".$_POST['chpname']."'";
    //     $result = $conn->query($sql);
    //     if($result->num_rows==1){
    //       $msg = '<div class="alert alert-warning mt-2" role="alert"> alrady exist</div>';
    //     }else{
    //       echo $std =$_POST['std'];
    //       $subject =$_POST['subject'];
    //       $chapter =$_POST['chpname'];
    //     echo  $sql="INSERT INTO chapter(stid,subjectid,chapname)VALUES('$std','$subject','$chapter')";
    //       $r=mysqli_query($conn,$sql);
    //       if($r>0)
    //       {
    //         $msg = '<div class="alert alert-warning mt-2" role="alert">
    // suceess</div>';
    //       }
    //       else
    //       {
    //         $msg = '<div class="alert alert-warning mt-2" role="alert"
    // failed</div>';
    //       }
    //     }                                    

    //   }





else{// Subject Already exist
 $sql = "SELECT chapname FROM chapter WHERE chapname
 ='".$_POST['chpname']."'";
 $result = $conn->query($sql);
 if($result->num_rows==1){
  $msg = '<div class="alert alert-warning mt-2" role="alert"> alrady exist</div>';
}else{
  $std =$_POST['std'];
  $subject =$_POST['subject'];
  $chn =$_POST['chpname'];
  echo  $sql="INSERT INTO chapter(stid,subjectid,chapname)VALUES('$std','$subject','$chn')";
  $r=mysqli_query($conn,$sql);
  if($r>0)
  {
    $msg = '<div class="alert alert-success mt-2" role="alert"> chapter insert</div>';
  }
  else
  {
   $msg = '<div class="alert alert-danger mt-2" role="alert"> sorry chapter not inserted</div>';
  }
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
              <h1 class="m-0 text-dark">chapter</h1>
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



          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">
              <!-- start card-->
              <div class="card">
                <div class="card-body">
                  <form method="POST" action="">

                    <div class="form-group" >
                      <label>Standered</label>
                      <select class="form-control" onchange="myfun(this.value)" name="std">
                        <option>select standard</option>
                        <?php
                        $query ="SELECT * FROM standered";
                        $result = mysqli_query($conn,$query);
                        while ($rows = mysqli_fetch_array($result)) {
                          ?>
                          <option value="<?php echo $rows['stid'];?>"><?php echo $rows['stname'];?></option>
                          <?php } ?>
                        </select>
                      </div>
                          <div class="form-group">
                        <label>Subject</label>
                        <select class="form-control" id="dataget" name="subject">
                          <option>select subject</option>
                        </select>
                      </div>



                      <div class="form-group">
                        <label for="exampleInputEmail1">Chapter Name</label>
                        <input class="form-control form-control-lg" type="text" placeholder="Enter stander" name="chpname">
                        <br>
                      </div>
                      <!-- /.card-body -->
                      <button type="submit" class="btn btn-primary ml-4 mb-5" name="submit">Submit</button>
                    </form>
                    <?php if(isset($msg)){echo $msg;}?>
                    <!-- table start -->
                                     <?php 
$sql = "SELECT * FROM chapter"; 
$result = $conn->query($sql);


$res = $conn->query($sql);
if($result->num_rows >0){
  echo '<table id="example1" class="table table-bordered table-striped mt-5">';
  echo '<thead>';
    echo '<tr>';
      echo '<th scope="col">chapter ID</th>';
      echo '<th scope="col">Std Name</th>';
      echo '<th scope="col">Subject Name</th>';
      echo '<th scope="col">Chapter Name</th>';
      echo '<th scope="col">Action</th>';
    echo '</tr>';
  echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc()){
       
         $sid= $row["stid"];
         $sname= $row["subjectid"];


        $s= mysqli_query($conn,"SELECT * FROM subject WHERE subjectid = $sname");
        $rs = mysqli_fetch_array($s);


        $c= mysqli_query($conn,"SELECT * FROM standered WHERE stid = $sid");
        $rc = mysqli_fetch_array($c);

      echo '<tr>';
        echo '<td>'.$row["chid"].'</td>';
        echo '<td>'.$rc["stname"].'</td>';
        echo '<td>'.$rs["subjectname"].'</td>';
        echo '<td>'.$row["chapname"].'</td>';
          echo ' <td class="text-center">';
           echo '<form action="editchapter.php" method="POST" 
            class="d-inline  mr-2">';
              echo '<input type="hidden" name="id"
              value='.$row['chid'].'> 

              <button class="btn btn-info" name="edit"
              value="edit" type="submit">
              <i class="fas fa-pen"></i>
              </button>';
            echo '</form>';
            echo '<form action="" method="POST"
            class="d-inline">';
              echo '<input type="hidden" name="id"
              value='.$row['chid'].'> 
              <button class="btn btn-secondary" name="delete"
              value="Delete" type="submit">
              <i class="far fa-trash-alt"></i>
              </button>';
            echo '</form>';


        echo '</td>';
      echo '</tr>';
    }
    echo '</tbody>';
  echo '</table>';
} else{
  echo '0 result';
}

?>




<!-- this is delete code -->

<?php  
if(isset($_REQUEST['delete'])){
  $sql = "DELETE FROM chapter WHERE  chid= {$_REQUEST['id']}";
  if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
  }else{
    echo 'unable to delete';
  }
}

?>


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
