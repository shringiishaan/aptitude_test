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
		<?php 
			if(isset($_SESSION['message'])) 
			{
				echo '<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-success">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-right">
									<div>'.$_SESSION['message'].'</div>
								</div>
							</div>
						</div>
					</div>
				</div></div>'; 
				unset($_SESSION['message']);
			}

				
			include('etc/dbconnect.php');
															
			$sql = "SELECT * FROM admin";
			$result = mysqli_query($conn, $sql);
			$row = mysqli_fetch_assoc($result);
			$examstart = strtotime($row['examstart']);			
			$examend = strtotime($row['examend']);						

			if(strtotime('now')<$examstart) 
			{
				echo '<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-right">
									<div>The Examination is scheduled from '.date('d/m/Y h:i a',$examstart).' to '.date('d/m/Y h:i a',$examend).'</div>
								</div>
							</div>
						</div>
					</div>
				</div></div>'; 
			}
			else if(strtotime('now')>$examend) 
			{
				echo '<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-right">
									<div>The Examination was over by '.date('d/m/Y h:i a',$examend).'</div>
								</div>
							</div>
						</div>
					</div>
				</div></div>'; 
			}
			else
			{
				echo '<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<div class="row">
								<div class="col-xs-12 text-right">
									<div>The Online Aptitude Test is on! and will Expire by '.date('d/m/Y h:i a',$examend).'</div>
								</div>
							</div>
						</div>
					</div>
				</div></div>'; 
			}			
		?>
		<div id="myCarousel" class="carousel slide" data-ride="carousel">
		  <!-- Indicators -->
		  <ol class="carousel-indicators">
			<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
			<li data-target="#myCarousel" data-slide-to="1"></li>
			<li data-target="#myCarousel" data-slide-to="2"></li>
			<li data-target="#myCarousel" data-slide-to="3"></li>
		  </ol>
		  <!-- Wrapper for slides -->
		  <div style="width:100%;height:280px" class="carousel-inner" role="listbox">
			<div class="item active">
			  <img src="images/image1.jpg" alt="Chania">
			</div>

			<div class="item">
			  <img src="images/image2.jpg" alt="Chania">
			</div>

			<div class="item">
			  <img src="images/image1.jpg" alt="Flower">
			</div>

			<div class="item">
			  <img src="images/image2.jpg" alt="Flower">
			</div>
		  </div>

			
			  <!-- Left and right controls -->
			  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
				<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
				<span class="sr-only">Previous</span>
			  </a>
			  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
				<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
				<span class="sr-only">Next</span>
			  </a>
			</div>
			<hr>
			
			
			<div class="row">
			<?php 
					if(isset($_SESSION['user_userid']) and isset($_SESSION['user_examflag']) and $_SESSION['user_examflag']==1) 
					{
						echo '
								<div class="col-lg-6">
									<div class="panel panel-success">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-3">
													<i class="fa fa-thumbs-up fa-5x"></i>
												</div>
												<div class="col-xs-9 text-right">
													<div class="huge">You have given our online test!</div>
													<div>with our new Online Aptitude Test Generator!</div>
												</div>
											</div>
										</div>
										<a href="profile">
											<div class="panel-footer">
												<span class="pull-left">View Your Score</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
							';
					}
					else
					{
						echo '
								<div class="col-lg-6">
									<div class="panel panel-info">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-3">
													<i class="fa fa-pencil fa-5x"></i>
												</div>
												<div class="col-xs-9 text-right">
													<div class="huge">Test Your Aptitude</div>
													<div>with our new Online Aptitude Test Generator!</div>
												</div>
											</div>
										</div>
										<a href="test">
											<div class="panel-footer">
												<span class="pull-left">View Examination Details</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
							';
					}
			?> 
			
							<div class="col-lg-6">
									<div class="panel panel-success">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-3">
													<i class="fa fa-pencil fa-5x"></i>
												</div>
												<div class="col-xs-9 text-right">
													<div class="huge">Institute toppers</div>
													<div>in our new Online Aptitude Test Generator!</div>
												</div>
											</div>
										</div>
										
														
								<?php
										include('etc/dbconnect.php');
										
										$sql = "SELECT * FROM admin";
										$result = mysqli_query($conn, $sql);
										$row = mysqli_fetch_assoc($result);
										$examstart = strtotime($row['examstart']);			
										$examend = strtotime($row['examend']);						

										if(strtotime('now')<$examend) 
										{
											echo '<a>
													<div class="panel-footer">
														<span class="pull-right">The Chart will be prepared on '.date('d/m/Y h:i a',$examend).'</span>
														<div class="clearfix"></div>
													</div>
												</a>'; 
										}
										else
										{
											$sql = "SELECT * FROM results order by total desc limit 3";
											$result = mysqli_query($conn, $sql);
											$i = 1;
											while($row = mysqli_fetch_assoc($result))
											{
												$sql1 = "SELECT * FROM users where userid = '".$row['userid']."'";
												$result1 = mysqli_query($conn, $sql1);
												$row1 = mysqli_fetch_assoc($result1);
												
												echo '
												<a>
													<div class="panel-footer">
														<span class="pull-left">Rank : '.$i.'</span>
														<span class="pull-right">'.$row1['fullname'].'</span>
														<div class="clearfix"></div>
													</div>
												</a>';
												$i++;
											}
										}
								
								?>
									</div>
								</div>
		</div>
			
			
		
	</div>
</div>
           
</body>

</html>
