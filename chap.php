<?php include_once('config.php');   

echo $cnameid = $_POST['datapost1'];
$q = "SELECT * FROM chapter  WHERE subjectid='$cnameid'";
$result = mysqli_query($conn,$q);
while ($rows = mysqli_fetch_array($result)) {
								?>
								<option value="<?php echo $rows['chid'];?>"><?php echo $rows['chapname'];?></option>
							<?php 
							}

							 ?>