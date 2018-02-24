<?php
	session_start();
	
	if(!isset($_SESSION['user_userid']))
	{
		$_SESSION['error'] = "Login to view your Profile !";
		header('location:../login.php');
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
				<h1 style="color:#337ab7"  class="page-header"><?php echo $_SESSION['user_fullname']; ?></h1>
			</div>
		</div>
		
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
		         <div class="row">
                <div class="col-lg-6">
                    <div class="panel panel-default">
								<div class="panel-heading">
									My Profile
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									<div class="table-responsive">
										<table class="table table-hover">
											<tbody>
														<?php
															include('../etc/dbconnect.php');
															
															$sql = "SELECT * FROM users WHERE userid = ".$_SESSION['user_userid'];
															$result = mysqli_query($conn, $sql);
															$row = mysqli_fetch_assoc($result);
															echo "
																	<tr>
																		<td style='text-align:left'><strong>Full Name</strong></td>
																		<td style='text-align:right'>".$row['fullname']."</td>
																	</tr>
																	<tr>
																		<td style='text-align:left'><strong>Username</strong></td>
																		<td style='text-align:right'>".$row['username']."</td>
																	</tr>
																	<tr>
																		<td style='text-align:left'><strong>Gender</strong></td>
																		<td style='text-align:right'>".$row['gender']."</td>
																	</tr>
																	<tr>
																		<td style='text-align:left'><strong>e-Mail</strong></td>
																		<td style='text-align:right'>".$row['email']."</td>
																	</tr>
																	<tr>
																		<td style='text-align:left'><strong>Contact</strong></td>
																		<td style='text-align:right'>".$row['contact']."</td>
																	</tr>
																	<tr>
																		<td style='text-align:left'><strong>Address</strong></td>
																		<td style='text-align:right'>".$row['address']."</td>
																	</tr>
																";

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
                <?php
					if(isset($_SESSION['user_examflag']) and $_SESSION['user_examflag']==1)
					{	
				
						include('../etc/dbconnect.php');
						$sql = "SELECT * FROM results WHERE userid = ".$_SESSION['user_userid'];
						$result = mysqli_query($conn, $sql);
						$row1 = mysqli_fetch_assoc($result);
						$sql = "SELECT * FROM admin";
						$result = mysqli_query($conn, $sql);
						$row2 = mysqli_fetch_assoc($result);
						
						if($row1['marksQLR'] >= $row2['cutoffQLR'])
						{
							$qlrstatus = "PASS";
						}
						else
						{
							$qlrstatus = "FAIL";							
						}
						if($row1['marksQNR'] >= $row2['cutoffQNR'])
						{
							$qnrstatus = "PASS";
						}
						else
						{
							$qnrstatus = "FAIL";							
						}
						if($row1['marksVBR'] >= $row2['cutoffVBR'])
						{
							$vbrstatus = "PASS";
						}
						else
						{
							$vbrstatus = "FAIL";							
						}
				
							echo '
								<div class="col-lg-6">
									<div class="panel panel-default">
										<div class="panel-heading">
											Exam Results
										</div>
										<!-- /.panel-heading -->
										<div class="panel-body">
											<div class="table-responsive">
												<table class="table table-hover">
													<thead>
														<tr>
															<th style="text-align:center">Exam Name</th>
															<th style="text-align:center">Your Marks</th>
															<th style="text-align:center">Cut-Off</th>
															<th style="text-align:center">Status</th>
														</tr>
													</thead>
													<tbody>
														<tr class="';
														
														if($qlrstatus=='PASS')
															echo 'success';
														else echo 'warning';
														
														echo '" >
															<td>Qualitative Reasoning</td>
															<td>'.$row1['marksQLR'].'</td>
															<td>'.$row2['cutoffQLR'].'</td>
															<td>'.$qlrstatus.'</td>
														</tr>
														<tr  class="';
														
														if($qnrstatus=='PASS')
															echo 'success';
														else echo 'warning';
														
														echo '"  >
															<td>Quantitative Reasoning</td>
															<td>'.$row1['marksQNR'].'</td>
															<td>'.$row2['cutoffQNR'].'</td>
															<td>'.$qnrstatus.'</td>
														</tr>
														<tr  class="';
														
														if($vbrstatus=='PASS')
															echo 'success';
														else echo 'warning';
												if($vbrstatus == 'PASS' and $qlrstatus == 'PASS' and $qnrstatus == 'PASS')
												{
													$finalstatus = 'PASS';
												}
												else
												{
													$finalstatus = 'FAIL';
												}
														echo '"  >
															<td>Verbal Reasoning</td>
															<td>'.$row1['marksVBR'].'</td>
															<td>'.$row2['cutoffVBR'].'</td>
															<td>'.$vbrstatus.'</td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="table-responsive">
												<table class="table table-hover">
													<tbody>
														<tr>
															<td>Total Marks :</td>
															<td>'.$row1['total'].'</td>
														</tr>
														<tr  class="';
														
														if($finalstatus=='PASS')
															echo 'success';
														else echo 'warning';
														
														echo '"  >
															<td>Final Result :</td>
															<td>'.$finalstatus.'</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>  
										<!-- /.panel-body -->
									</div>
									<!-- /.panel -->
								</div> ';
					}
					else
						echo '
						<div class="col-lg-6">
							<div class="panel panel-default">
								<div class="panel-heading">
									You have NOT appeared for our exam
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									<p>Give our integrated online aptitude test</p>
									<form role="form" method="post" action="../test">
										<button type="submit" class="btn btn-success">Give Test</button>
									</form>
								</div>  
								<!-- /.panel-body -->
							</div>
							<!-- /.panel -->
						</div> ';
				?>
                <!-- /.col-lg-6 -->
            </div>
	</div>
</div>
           
</body>

</html>
