<?php
	session_start();
	if(!isset($_SESSION['user_userid']))
	{
		$_SESSION['error'] = 'You Must Be logged in to Give our Examination!';
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
				<h1 style="color:#337ab7"  class="page-header">Akash Online Aptitude Test Generator</h1>
			</div>
		</div>
		<?php
		
		if($_SESSION['user_examflag'] != 1)
		{
			include('../etc/dbconnect.php');
															
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
			else
			{
				echo '					
							<div class="row">
								<div class="col-lg-12">
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
										<a href="../etc/teststarter.php">
											<div class="panel-footer">
												<span class="pull-left"><strong>Start Examination </strong>(Read Instructions Given Below about the examination first !)</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
							</div>
				'; 
			}	
		}
		else
		{
			echo '
							<div class="row">
								<div class="col-lg-12">
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
										<a href="../profile">
											<div class="panel-footer">
												<span class="pull-left">View Your Score</span>
												<span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
												<div class="clearfix"></div>
											</div>
										</a>
									</div>
								</div>
							</div>
				';
			
		}
		?>
		
							<div class="row">
								<div class="col-lg-12">
									<div class="panel panel-primary">
										<div class="panel-heading">
											<div class="row">
												<div class="col-xs-3">
													<i class="fa fa-edit fa-5x"></i>
												</div>
												<div class="col-xs-9 text-right">
													<div class="huge">Aptitute Examination Instructions</div>
													<div>must read before giving the exam!</div>
												</div>
											</div>
										</div>
										
											<div class="panel-footer">
												<span class="pull-right">There are 3 sections. <br>1) Qualitative Reasoning <br>2) Quantitative Reasoning <br>3) Verbal Reasoning</span>
												<div class="clearfix"></div>
											</div>
										
											<div class="panel-footer">
												<span class="pull-right">All the sections will be attempted in the order stated above</span>
												<div class="clearfix"></div>
											</div>
										
											<div class="panel-footer">
												<span class="pull-right">Each Section has 30 questions of 4 marks each. However theres a negative one marking for every wrong answer</span>
												<div class="clearfix"></div>
											</div>
										
											<div class="panel-footer">
												<span class="pull-right">You will be given 30 minutes for each Section (Individually)</span>
												<div class="clearfix"></div>
											</div>
											
											<div class="panel-footer">
												<span class="pull-right">You will have to PASS in all the three sections in order to pass the Examination</span>
												<div class="clearfix"></div>
											</div>
										
									</div>
								</div>
							</div>
	</div>
</div>
           
</body>

</html>
