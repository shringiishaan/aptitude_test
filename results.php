<?php
	session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php include('assets/metaData.php'); ?>
</head>

<body>

<div  id="wrapper">
	<?php include('assets/navbar.php'); ?>
	<div class="container">
		<div class="row text-center">
			<div class="col-lg-12">
				<h1 style="color:#337ab7"  class="page-header">Aakash Institute</h1>
			</div>
		</div>
		
			
			<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="panel panel-default">
								<div class="panel-heading">
									Online Aptitude Test Details
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									
									<div class="table-responsive">
										<table class="table table-hover">
											<thead>
												<tr>
													<th style="text-align:center">Section Name</th>
													<th style="text-align:center">Max Questions</th>
													<th style="text-align:center">Max Time</th>
													<th style="text-align:center">Max Marks</th>
													<th style="text-align:center">Cut-Off Marks</th>
												</tr>
											</thead>
											<tbody>
														<?php
															include('etc/dbconnect.php');
															
															$sql = "SELECT * FROM admin";
															$result = mysqli_query($conn, $sql);
															$row = mysqli_fetch_assoc($result);
															echo "
																	<tr style='text-align:center'>
																		<td>Qualitative Reasoning</td>
																		<td>30</td>
																		<td>30 Minutes</td>
																		<td>120</td>
																		<td>".$row['cutoffQLR']."</td>
																	</tr>
																	<tr style='text-align:center'>
																		<td>Quantitative Reasoning</td>
																		<td>30</td>
																		<td>30 Minutes</td>
																		<td>120</td>
																		<td>".$row['cutoffQNR']."</td>
																	</tr>
																	<tr style='text-align:center'>
																		<td>Verbal Reasoning</td>
																		<td>30</td>
																		<td>30 Minutes</td>
																		<td>120</td>
																		<td>".$row['cutoffVBR']."</td>
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
               </div>
			
		<?php	
			include('etc/dbconnect.php');
															
			$sql = "SELECT * FROM admin";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);			
			$examend = strtotime($row['examend']);						

			if(strtotime('now')<$examend) 
			{
				echo '<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-right">
									<div>The Chart will be prepared on '.date('d/m/Y h:i a',$examend).'</div>
								</div>
							</div>
						</div>
					</div>
				</div></div>
				</div>
					</div>
							   
					</body>

					</html>
					';

					exit();
			}
			?>
										
			<div class="row">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="panel panel-default">
								<div class="panel-heading">
									Online Aptitude Test Rakers
								</div>
								<!-- /.panel-heading -->
								<div class="panel-body">
									
									<div class="table-responsive">

										<table class="table table-hover">
											<thead>
												<tr>
													<th style="text-align:center">Rank</th>
													<th style="text-align:center">Full Name</th>
													<th style="text-align:center">marks QLA</th>
													<th style="text-align:center">marks QNA</th>
													<th style="text-align:center">marks VBR</th>
													<th style="text-align:center">Total Marks</th>
												</tr>
											</thead>
											<tbody>
														<?php
															include('etc/dbconnect.php');
															
															$sql1 = "SELECT * FROM results order by total desc";
															$result1 = mysqli_query($conn, $sql1);
															$i = 1;
															while($row1 = mysqli_fetch_assoc($result1))
															{
																$sql2 = "SELECT * FROM users where userid='".$row1['userid']."'";
																$result2 = mysqli_query($conn, $sql2);
																$row2 = mysqli_fetch_assoc($result2);
																$fullname = $row2['fullname'];
																
																$sql2 = "SELECT * FROM admin";
																$result2 = mysqli_query($conn, $sql2);
																$row2 = mysqli_fetch_assoc($result2);
																
																if($row2['cutoffQLR']<=$row1['marksQLR'] and $row2['cutoffQNR']<=$row1['marksQNR'] and $row2['cutoffVBR']<=$row1['marksVBR'])
																{
																	echo "
																		<tr class='success' style='text-align:center'>
																			<td>".$i."</td>
																			<td>".$fullname."</td>
																			<td>".$row1['marksQLR']."</td>
																			<td>".$row1['marksQNR']."</td>
																			<td>".$row1['marksVBR']."</td>
																			<td>".$row1['total']."</td>
																		</tr>
																	";
																	
																	$i++;
																}
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
