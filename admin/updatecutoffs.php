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
		         <div class="row">
               
                <!-- /.col-lg-6 -->
                <div class="col-lg-6 col-lg-offset-3">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                           Update Cutoffs
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form role="form" method="post" action="../etc/updatecutoffshandler.php">
								 <div class="form-group">
									<select name="testname" class="form-control" required>
										<option value="qlr" >Qualitative Reasoning</option>
										<option value="qnr">Quantitative Reasoning</option>
										<option value="vbr">Verbal Reasoning</option>
									</select>
								</div>
								
								<div class="form-group input-group">
									<span class="input-group-addon">Cutoff </span>
									<input type="text" class="form-control" name='cutoffm' placeholder="Cutoff Marks" required>
								</div>
								<button type="submit" class="btn btn-primary">Update</button>
							</form>
							<br>
							<br>
							<div class="table-responsive text-left">
								<table class="table table-hover">
									<tbody>
												<?php
													include('../etc/dbconnect.php');
													
													$sql = "SELECT * FROM admin";
													$result = mysqli_query($conn, $sql);
													$row = mysqli_fetch_assoc($result);
													echo "
															<tr>
																<td>Qualitative Reasoning</td>
																<td>".$row['cutoffQLR']."</td>
															</tr>
															<tr>
																<td>Quantitative Reasoning</td>
																<td>".$row['cutoffQNR']."</td>
															</tr>
															<tr>
																<td>Verbal Reasoning</td>
																<td>".$row['cutoffVBR']."</td>
															</tr>
														";

												?>
										
										
									</tbody>
								</table>
							</div>
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
