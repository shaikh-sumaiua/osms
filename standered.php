<?php  define('TITLE','Standered') ?>

<?php require_once('edit/heder.php')   ?>  <!-- heder part -->
<?php require_once('config.php')  ?>
  <!-- DataTables -->
  <!-- <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css"> -->
</head>
<?php 
if(isset($_POST['submit']))
{
  if($_POST['std']==""){
    $msg = '<div class="alert alert-warning mt-2" role="alert">
       All Feildes Are Required</div>';
      }else{// Email Already register
  $sql = "SELECT stname FROM standered WHERE stname
  ='".$_POST['std']."'";
  $result = $conn->query($sql);
  if($result->num_rows==1){
    $msg = '<div class="alert alert-warning mt-2" role="alert"> alrady exist</div>';
  }else{
    $std =$_POST['std'];
    $sql="INSERT INTO standered(stname)VALUES('$std')";
    $r=mysqli_query($conn,$sql);
    if($r>0)
    {
      echo "success";
    }
  else
    {
      echo 'fail';
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
            <h1 class="m-0 text-dark">Standerd</h1>
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
        <!-- Main row --><div class="row">
          <!-- Left col -->
          <section class="col-lg-12 connectedSortable">
            <!-- start 1st card-->
            <div class="card">
              <div class="card-body">
                <form method="POST" action="">
                 <div class="form-group">
                    <label for="exampleInputEmail1">Standered Name</label>
                    <input class="form-control form-control-lg" type="text" placeholder="Enter stander" name="std">
                <br>
              </div> 
              <button type="submit" class="btn btn-primary ml-4 mb-5" name="submit">Submit</button>
               </form>
               <?php if(isset($msg)){echo $msg;}?>
<!-- table start -->


<?php 
$sql = "SELECT * FROM standered"; 
$result = $conn->query($sql);
if($result->num_rows >0){
  echo '<table id="example1" class="table table-bordered table-striped mt-5">';
  echo '<thead>';
    echo '<tr>';
      echo '<th scope="col">Std ID</th>';
      echo '<th scope="col">Std Name</th>';
      echo '<th scope="col">Action</th>';
    echo '</tr>';
  echo '</thead>';
    echo '<tbody>';
    while($row = $result->fetch_assoc()){
      echo '<tr>';
        echo '<td>'.$row["stid"].'</td>';
        echo '<td>'.$row["stname"].'</td>';
          echo ' <td class="text-center">';
           echo '<form action="editstd.php" method="POST" 
            class="d-inline  mr-2">';
              echo '<input type="hidden" name="id"
              value='.$row['stid'].'> 

              <button class="btn btn-info" name="edit"
              value="edit" type="submit">
              <i class="fas fa-pen"></i>
              </button>';
            echo '</form>';
            echo '<form action="" method="POST"
            class="d-inline">';
              echo '<input type="hidden" name="id"
              value='.$row['stid'].'> 
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
  $sql = "DELETE FROM standered WHERE stid = {$_REQUEST['id']}";
  if($conn->query($sql) == TRUE){
    echo '<meta http-equiv="refresh" content="0;URL=?deleted"/>';
  }else{
    echo 'unable to delete';
  }
}

?>




































 <!-- <table id="example1" class="table table-bordered table-striped mt-5">
                  <thead>
                  <tr>
                    <th>ID</th>
                    <th>Standerd Name</th>
                    <th>Action</th>
                   </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td class="text-center">
                    <form action="viewassignwork.php" method="POST" 
            class="d-inline  mr-2"><input type="hidden" name="id"
              value=8> 
              <button class="btn btn-info" name="view"
              value="View" type="submit">
              <i class="far fa-eye"></i>
              </button></form>
              <form action="" method="POST"
            class="d-inline"><input type="hidden" name="id"
              value=8> 
              <button class="btn btn-secondary" name="delete"
              value="Delete" type="submit">
              <i class="far fa-trash-alt"></i>
              </button></form></td></tr></tbody></table>
 -->
<!-- table end -->

              </div>
             <!--  - /.card-body --> 
            </div>
          <!-- end of 1stcard -->
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
<!-- <script src="plugins/datatables/jquery.dataTables.min.js"></script>
 --><!-- <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script> -->
// <script>
//   $(function () {
//     $("#example1").DataTable({
//       "responsive": true,
//       "autoWidth": false,
//     });
//     $('#example2').DataTable({
//       "paging": true,
//       "lengthChange": false,
//       "searching": false,
//       "ordering": true,
//       "info": true,
//       "autoWidth": false,
//       "responsive": true,
//     });
//   });
// </script>
</body>
</html>
