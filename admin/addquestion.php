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
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Add a new Question
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form role="form" method="post" action="../etc/addquestionhandler.php">
								 <div class="form-group">
									<select name="testname" class="form-control" required>
										<option value="qlr" >Qualitative Reasoning</option>
										<option value="qnr">Quantitative Reasoning</option>
										<option value="vbr">Verbal Reasoning</option>
									</select>
								</div>
								<div class="form-group input-group">
									<textarea class="form-control" name="question" style="width:523px"  required></textarea>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">A</span>
									<input type="text" name="opta" class="form-control" placeholder="Option A" required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">B</span>
									<input type="text" name="optb" class="form-control" placeholder="Option B" required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">C</span>
									<input type="text"  name="optc" class="form-control" placeholder="Option C" required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">D</span>
									<input type="text"  name="optd" class="form-control" placeholder="Option D" required>
								</div>
								<div class="form-group">
									<label>Correct Answer : &nbsp; &nbsp; </label>
									<label class="radio-inline">
										<input type="radio" name="correctans" id="optionsRadiosInline1" value="a" required> A
									</label>
									<label class="radio-inline">
										<input type="radio" name="correctans" id="optionsRadiosInline2" value="b" required> B
									</label>
									<label class="radio-inline">
										<input type="radio" name="correctans" id="optionsRadiosInline3" value="c" required> C
									</label>
									<label class="radio-inline">
										<input type="radio" name="correctans" id="optionsRadiosInline3" value="d" required> D
									</label>
								</div>
								<button type="submit" class="btn btn-primary">Add Question</button>
							</form>
                        </div>  
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-6 -->
                <div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Remove a Question
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form role="form" method="post" action="../etc/addquestionhandler.php">
								 <div class="form-group">
									<select name="testname" class="form-control">
										<option value="qlr" >Qualitative Reasoning</option>
										<option value="qnr">Quantitative Reasoning</option>
										<option value="vbr">Verbal Reasoning</option>
									</select>
								</div>
								
								<div class="form-group input-group">
									<span class="input-group-addon">Question Number </span>
									<input type="text" class="form-control" name='qnum' placeholder="Question Number">
								</div>
								<button type="submit" class="btn btn-warning">Remove</button>
							</form>
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
