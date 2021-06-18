<?php include_once('config.php');   

echo $nameid = $_POST['datapost'];
$q = "SELECT * FROM subject  WHERE stid='$nameid'";
$result = mysqli_query($conn,$q);
while ($rows = mysqli_fetch_array($result)) {
								?>
								<option value="<?php echo $rows['subjectid'];?>"><?php echo $rows['subjectname'];?></option>
							<?php 
							}

							 ?>