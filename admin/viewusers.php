<?php
	session_start();
	
	if(!isset($_SESSION['user_userid']) or $_SESSION['user_userid']!=-99)
	{
		header('location:../etc/logout.php');
		exit();
	}
	include('../etc/dbconnect.php');
	
	$sql = "SELECT * FROM users WHERE userid <> -99";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);

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
		
		         <div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="panel panel-default">
								<div class="panel-heading">
									All Users
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th style="text-align:center">UserID</th>
													<th style="text-align:center">Full Name</th>
													<th style="text-align:center">Username</th>
													<th style="text-align:center">e-Mail</th>
													<th style="text-align:center">Contact</th>
													<th style="text-align:center">Address</th>
												</tr>
											</thead>
											<tbody>
														<?php
															include('../etc/dbconnect.php');
															
															$sql = "SELECT * FROM users WHERE userid <> -99";
															$result = mysqli_query($conn, $sql);
															while($row = mysqli_fetch_assoc($result))
															{
																echo "
																	<tr class='";
																
																if($row['examflag']==0)
																	echo 'warning';
																else echo 'success';
																
																echo "' >
																		<td>".$row['userid']."</td>
																		<td>".$row['fullname']."</td>
																		<td>".$row['username']."</td>
																		<td>".$row['email']."</td>
																		<td>".$row['contact']."</td>
																		<td>".$row['address']."</td>
																	</tr>
																";
															}

														?>
												
												
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
               </div>
	</div>
</div>
           
</body>

</html>
