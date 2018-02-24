<?php
session_start();


	if(!isset($_SESSION['user_userid']) or $_SESSION['user_userid']==-99)
	{
		header('location:../etc/logout.php');
		exit();
	}
	
	if($_SESSION['user_examflag']==1)
	{
		$_SESSION['message'] = "You have already given our Online Exam !";
		header('location:../index.php');
		exit();
	}
	
include('../etc/dbconnect.php');
$sql = "SELECT * FROM livetesttime WHERE userid='".$_SESSION['user_userid']."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$starttime = strtotime($row['starttime']);
	$endtime = strtotime($row['starttime'])+(30*60);
	
	$timeleft = $endtime - strtotime('now');
	if($timeleft<1)
	{
		header('location:../etc/submitsection.php');
		exit();
	}
	
	if(!isset($_GET['qnum']) or $_GET['qnum']>30 or $_GET['qnum']<1)
	{
		header('location:../etc/logout.php');
		exit();
	}
	
	
	
	if(!isset($_SESSION['user_userid']))
	{
		$_SESSION['error'] = 'You Must Be logged in to Give our Examination!';
		header('location:../login.php');
		exit();
	}
	
	if($_SESSION['test_testname'] == 'qlr')
		$testname = 'Qualitative Reasoning';
	if($_SESSION['test_testname'] == 'qnr')
		$testname = 'Quantitative Reasoning';
	if($_SESSION['test_testname'] == 'vbr')
		$testname = 'Verbal Reasoning';
	$qnum = $_GET['qnum'];
	
	include('../etc/dbconnect.php');
							
	$sql = "SELECT * FROM livetest WHERE userid='".$_SESSION['user_userid']."' and testname='".$_SESSION['test_testname']."' and qnum='".$qnum."'";
	$result = mysqli_query($conn, $sql);
	$row = mysqli_fetch_assoc($result);
	$question = $row['question'];
	$A = $row['a'];
	$B = $row['b'];
	$C = $row['c'];
	$D = $row['d'];
	$useranswer = $row['useranswer'] ;
	
	$temp = 0;

	

?>
<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">
<link href="../dist/css/timeline.css" rel="stylesheet">
<link href="../dist/css/sb-admin-2.css" rel="stylesheet">
<link href="../bower_components/morrisjs/morris.css" rel="stylesheet">
<link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>
<script src="../bower_components/raphael/raphael-min.js"></script>
<script src="../bower_components/morrisjs/morris.min.js"></script>
<script src="../js/morris-data.js"></script>
<script src="../dist/js/sb-admin-2.js"></script>
<script>

function submitanswer()
{
	document.getElementById("questionform").submit();
}

function submitSection()
{
	window.location.assign("/etc/submitsection.php");
}
	
function startTimer(duration, display) 
{
    var timer = duration, minutes, seconds;
    setInterval(    function () 
					{
						minutes = parseInt(timer / 60, 10);
						seconds = parseInt(timer % 60, 10);

						minutes = minutes < 10 ? "0" + minutes : minutes;
						seconds = seconds < 10 ? "0" + seconds : seconds;

						display.textContent = minutes + ":" + seconds;

						if (--timer < 0) 
						{
							timer = duration;
							submitSection();
						}
					}, 1000);
}

window.onload = function () 
{
	$secs = parseInt(document.getElementById('timeleftphp').innerHTML);
   display = document.querySelector('#time');
    startTimer($secs, display);
};


</script>
</head>

<body>
	<div id="wrapper">
		<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand"><?php echo $testname; ?></a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
               <li style="margin-right:495px" class="dropdown">
                    <strong style="font-size:20px;color:orange"><span id="time"></span></strong>
                </li>
				<li class="dropdown" style="background-color:lightgreen">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<strong style="color:white">Submit Section</strong>
					</a>
					<ul class="dropdown-menu dropdown-user">
                        <li><a href="../etc/submitsection.php"><i class="fa fa-sign-out fa-fw"></i> Confirm Submit Section</a>
                        </li>
                    </ul>
                </li>
					
            </ul>
        </nav>
		
		<br>
		<br>
		<br>
		<br>
		<br>
		
		<div class="col-lg-12">
			<h2 id="qla" style="color:#aaaaaa" class="page-header text-center"><?php echo $testname; ?></h2>
		</div>	
		<div class="col-lg-1">
			<div class="row">
				
                <div class="col-lg-12">
					<table class="table table-bordered">
						<tbody>
							<tr>
						  <?php 
						  
							include('../etc/dbconnect.php');
							
							$sql = "SELECT * FROM livetest WHERE userid = '".$_SESSION['user_userid']."' and testname = '".$_SESSION['test_testname']."'";
							$result = mysqli_query($conn, $sql);
							while($row = mysqli_fetch_assoc($result))
							{
								$temp++;
								echo '<td class="';
								
								if($row['useranswer'] == 'Z')
								echo 'danger';
							else echo 'success';
								
								echo '"><a href="question.php?qnum='.$row['qnum'].'">';
								if($row['qnum'] < 10)
									echo '0';
								echo $row['qnum'].'</a></td>';
								
								if($temp%3==0)
								echo '</tr><tr>';
							}

						  
						  ?>
							
													  
							</tr>
						</tbody>
					  </table>
                </div>
                <!-- /.col-lg-12 -->
            </div>
		</div>
		<div class="col-lg-1">
		</div>
        <div class="col-lg-9">
            <div class="row">
				
                <div class="col-lg-12">
                    <br>
					<h5>Question : <?php echo $_GET['qnum']; ?></h5>
					<p>
					<form id="questionform" method="post" action="../etc/submitquestion.php">
						<?php echo $question; ?>
						<br><br>
						<input name="qnum" value="<?php echo $qnum; ?>" type='radio' checked hidden>
						<input name="opt" value="a" type="radio" <?php if($useranswer == 'a') echo 'checked'; ?>> <?php echo $A; ?> <br>
						<input name="opt" value="b" type="radio" <?php if($useranswer == 'b') echo 'checked'; ?>> <?php echo $B; ?> <br>
						<input name="opt" value="c" type="radio" <?php if($useranswer == 'c') echo 'checked'; ?>> <?php echo $C; ?> <br>
						<input name="opt" value="d" type="radio" <?php if($useranswer == 'd') echo 'checked'; ?>> <?php echo $D; ?>	<br>
						<hr>
					</form>
					
					<div class="col-lg-3 text-left">
					<?php 
						
					if($qnum != 1)
					echo '
					
						<form action="question.php?qnum='.($qnum -1).'" method="post">
							<input type="submit" value="Previous Question" class="btn btn-warning" />
						</form>
					';
					?>
					</div>
					
					<?php
					if($useranswer == 'Z')
					{
						echo '
						<div class="col-lg-6 text-center">
							<button type="button" onclick=submitanswer() class="btn btn-primary" >Submit Answer</button>
						</div>';
					}
					else 
					{	echo '
							<div class="col-lg-3 text-center">
								<button type="button" onclick=submitanswer() class="btn btn-primary" >Update Answer</button>
							</div>
							<div class="col-lg-3 text-center">
								<form action="../etc/removeanswer.php" method="post">
									<input type="text" name="qnum" value="'.$qnum.'" hidden>
									<input type="submit" value="Remove Answer" class="btn btn-primary" />
								</form>
							</div>';
					}
					?>
					<div class="col-lg-3 text-right">
					<?php 
						
					if($qnum != 30)
					echo '
					
						<form action="question.php?qnum='.($qnum +1).'" method="post">
							<input type="submit" value="Next Question" class="btn btn-warning" />
						</form>
					';
					?>
					</div>
					
					
					</p>
                </div>
                <!-- /.col-lg-12 -->
            </div>
			<hr>
             
        </div>
        <!-- /#page-wrapper -->
	
    </div>
 <div id="timeleftphp" style="display:none">
 <?php
	echo $timeleft;
 ?>
 </div>
</body>


</html>
