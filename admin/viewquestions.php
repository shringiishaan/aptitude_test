<?php
	session_start();
	
	if(!isset($_SESSION['user_userid']) or $_SESSION['user_userid']!=-99)
	{
		header('location:../etc/logout.php');
		exit();
	}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('../assets/metaData.php'); ?>
</head>

<body>

<div  id="wrapper">
	<?php include('../assets/navbar.php'); ?>
	<div class="container text-center">
		<div class="row text-center">
			<div class="col-lg-12">
				<h1 style="color:#337ab7"  class="page-header">Administrative Page</h1>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-lg-12">
				<a href="../admin">Go Back</a>
				
			</div>
		</div>
		<br>
		
		<div class="row text-center">
			<div class="col-lg-12">
				<strong style="color:green"><?php if(isset($_SESSION['message']))
												{
													echo $_SESSION['message'];
													unset($_SESSION['message']);
												}?></strong>
			</div>
		</div>
		<div class="row text-center">
			<div class="col-lg-12">
				<strong style="color:red"><?php if(isset($_SESSION['error']))
												{
													echo $_SESSION['error'];
													unset($_SESSION['error']);
												}?></strong>
			</div>
		</div>
		<br>
		   <div class="row text-center">
               <div class="col-lg-6 col-lg-offset-3">
							<form role="form" method="post" action="#">
								 <div class="form-group">
									<select name="testname" class="form-control" required>
										<option value="select">--select test name---</option>
										<option value="qlr" <?php if(isset($_POST['testname']) and $_POST['testname']=="qlr") echo 'selected'; ?>>Qualitative Reasoning</option>
										<option value="qnr" <?php if(isset($_POST['testname']) and $_POST['testname']=="qnr") echo 'selected'; ?>>Quantitative Reasoning</option>
										<option value="vbr" <?php if(isset($_POST['testname']) and $_POST['testname']=="vbr") echo 'selected'; ?>>Verbal Reasoning</option>
									</select>
								</div>
								<button type="submit" class="btn btn-primary">View</button>
							</form>
                </div>
                <!-- /.col-lg-6 -->
            </div>
			
			<?php if(isset($_POST['testname']) and $_POST['testname'] != "select")
			{	echo '
			<hr>
			<div class="row">
				<div class="col-lg-10 col-lg-offset-1">
					<div class="panel panel-default">
						<div class="panel-heading">
							';
							
							if($_POST['testname'] == "qlr")
								echo 'Qualitative Reasoning';
							if($_POST['testname'] == "qnr")
								echo 'Quantitative Reasoning';
							if($_POST['testname'] == "vbr")
								echo 'Verbal Reasoning';
							
							
							echo '
						</div>
						<!-- /.panel-heading -->
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-hover">
									<thead>
										<tr>
											<th style="text-align:center">No.</th>
											<th style="text-align:center">Question</th>
										</tr>
									</thead>
									<tbody>';
												include('../etc/dbconnect.php');
													
													$sql = "SELECT * FROM questionbank WHERE testname = '".$_POST['testname']."'";
													$result = mysqli_query($conn, $sql);
													while($row = mysqli_fetch_assoc($result))
													{
														echo "
															<tr>
																<td>".$row['qnum']."</td>
																<td>".$row['question']."</td>
															</tr>
														";
													}

								echo '
										
										
									</tbody>
								</table>
							</div>
							<!-- /.table-responsive -->
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->
				</div>
		<!-- /.col-lg-6 -->
	   </div>';

			}
			
			?>
	</div>
</div>
           
</body>

</html>
