<?php 
	session_start();
	if(isset($_SESSION['user_userid']))
	{
		header('location:etc/logout.php');
		exit();
	}
	
	
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
        <div class="row">
            <div class="col-md-4 col-md-offset-4"><br><br>
				<br><br><br>
				<form action="etc/loginhandler.php" method="POST">
					<fieldset>
						<div class="form-group">
							<p style="color:red">
								<?php 
									if(isset($_SESSION['error']))
										echo "<br>".$_SESSION['error'];
									unset($_SESSION['error']);
								?>
							</p>
						</div>
						<div class="form-group">
							<input class="form-control" value="<?php if(isset($_SESSION['user_username'])) echo $_SESSION['user_username'];?>" placeholder="Username" name="username" type="text" <?php if(!isset($_SESSION["user_username"])) echo 'autofocus'; ?> required>
						</div>
						<div class="form-group">
							<input class="form-control" placeholder="Password" name="password" type="password" value="" <?php if(isset($_SESSION["user_username"])) echo 'autofocus'; ?> reqiuired>
						</div>
						<div class="form-group">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="remember" value="on"> Remember Me
								</label>
							</div>
						</div>
						<input type="submit" value="Login" class="btn btn-lg btn-success btn-block">
						<div class="form-group">
							<br><p>not yet registered? <a href="registeration.php" style="color:green">register here</p>
						</div>
					</fieldset>
				</form>
            </div>
        </div>
    </div>
</div>

</body>

</html>
