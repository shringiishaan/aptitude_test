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
                            Edit a Question
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form role="form" method="post" action="#">
								 <div class="form-group">
									<select name="testname" class="form-control" required>
										<option value="select" >-- select test name --</option>
										<option value="qlr" <?php if(isset($_POST['testname']) and $_POST['testname']=="qlr") echo 'selected'; ?>>Qualitative Reasoning</option>
										<option value="qnr" <?php if(isset($_POST['testname']) and $_POST['testname']=="qnr") echo 'selected'; ?>>Quantitative Reasoning</option>
										<option value="vbr" <?php if(isset($_POST['testname']) and $_POST['testname']=="vbr") echo 'selected'; ?>>Verbal Reasoning</option>
									</select>
								</div>
								
								<div class="form-group input-group">
									<span class="input-group-addon">Question Number </span>
									<input type="text" class="form-control" name='qnum' value="<?php if(isset($_POST['qnum'])) echo $_POST['qnum']; ?>" placeholder="Question Number" required>
								</div>
								<button type="submit" class="btn btn-primary">Edit</button>
							</form>
                        </div>  
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
	<?php
				if(isset($_POST['testname']) and isset($_POST['qnum']) and $_POST['testname']!='select')
				{
					include('../etc/dbconnect.php');
															
					$sql = "SELECT * FROM questionbank WHERE testname = '".$_POST['testname']."' and qnum = '".$_POST['qnum']."'";
					$result = mysqli_query($conn, $sql);
					$row = mysqli_fetch_assoc($result);
					
               echo '<div class="col-lg-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Update Question
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
							<form role="form" method="post" action="../etc/editquestionshandler.php">
								 <div class="form-group input-group">
									<textarea class="form-control" name="question" style="width:523px" required >'.$row['question'].'</textarea>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">A</span>
									<input type="text" name="opta" value="'.$row['a'].'" class="form-control" placeholder="Option A" required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">B</span>
									<input type="text" name="optb" value="'.$row['b'].'" class="form-control" placeholder="Option B" required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">C</span>
									<input type="text"  name="optc" value="'.$row['c'].'" class="form-control" placeholder="Option C" required>
								</div>
								<div class="form-group input-group">
									<span class="input-group-addon">D</span>
									<input type="text"  name="optd" value="'.$row['d'].'" class="form-control" placeholder="Option D" required>
								</div>
								<input type="text"  name="testname" value="'.$_POST['testname'].'" hidden required>
								<input type="text"  name="qnum" value="'.$_POST['qnum'].'" hidden required>
								<div class="form-group">
									<label>Correct Answer : &nbsp; &nbsp; </label>
									<label class="radio-inline">
										<input type="radio" name="correctans" id="optionsRadiosInline1" value="a" ';
									if($row['correctanswer']=='a') echo 'checked ';
									echo ' required> A
									</label>
									<label class="radio-inline">
										<input type="radio" name="correctans" id="optionsRadiosInline2" value="b" ';
									if($row['correctanswer']=='b') echo 'checked ';
									echo ' required> B
									</label>
									<label class="radio-inline">
										<input type="radio" name="correctans" id="optionsRadiosInline3" value="c" ';
									if($row['correctanswer']=='c') echo 'checked ';
									echo ' required> C
									</label>
									<label class="radio-inline">
										<input type="radio" name="correctans" id="optionsRadiosInline3" value="d" ';
									if($row['correctanswer']=='d') echo 'checked ';
									echo ' required> D
									</label>
								</div>
								<button type="submit" class="btn btn-primary">Add Question</button>
							</form>
                        </div>  
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>';
				}
        ?>        
                <!-- /.col-lg-6 -->
            </div>
	</div>
</div>
           
</body>

</html>
