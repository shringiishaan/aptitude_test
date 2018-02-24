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
                           Set Exam Dates
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form role="form" method="post" action="../etc/setexamdatehandler.php">
								 <div class="form-group">
									<select class="form-control" required>
										<option>---select exam---</option>
										<option>Online Aptitude Test</option>
									</select>
								</div>
								
								<div class="form-group input-group">
									<span class="input-group-addon">Exam Start Date </span>
									<input type="text" class="form-control" name='examstart' placeholder="Start Date" autofocus required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">Exam End Date </span>
									<input type="text" class="form-control" name='examend' placeholder="End Date" required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">Example Date Format : <?php echo date("Y-m-d H:i:s",strtotime("now")); ?></span>
								</div>
								<button type="submit" class="btn btn-primary">Set Dates</button>
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
																<td>Examination Start Date</td>
																<td>".$row['examstart']."</td>
															</tr>
															<tr>
																<td>Examination End Date</td>
																<td>".$row['examend']."</td>
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
