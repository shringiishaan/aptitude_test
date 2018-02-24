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
<br><br><br>                <form action="/etc/registerationhandler.php" method="POST">
                            <fieldset>
                            	  <div class="form-group"><p style="color:red">
                                    <?php 
                                    
                                    	if(isset($_SESSION['error']))
                                    		echo "<br>".$_SESSION['error'];
                                        unset($_SESSION['error']);
                                        
                                    	?></p></div>
								<div class="form-group">
                                    <input class="form-control" value="<?php if(isset($_SESSION['user_fullname'])) echo $_SESSION['user_fullname'];?>" placeholder="Full Name" name="fullname" type="text" required>
                                </div>
								<div class="form-group">
									<label class="radio-inline">
									  <input type="radio" name="gender" value="male" <?php if(isset($_SESSION['user_gender']) and $_SESSION['user_gender']=='male') echo 'checked';?>  required>Male
									</label>
									<label class="radio-inline">
									  <input type="radio" name="gender" value="female" <?php if(isset($_SESSION['user_gender']) and $_SESSION['user_gender']=='female') echo 'checked';?> required>Female
									</label>
								</div>
                                <div class="form-group">
                                    <input class="form-control" value="<?php if(isset($_SESSION['user_username'])) echo $_SESSION['user_username'];?>" placeholder="Username" name="username" type="text" required>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" placeholder="Password" name="password" type="password" value="<?php if(isset($_SESSION['user_password'])) echo $_SESSION['user_password'];?>"  required>
                                </div>
								<div class="form-group">
                                    <input class="form-control" placeholder="Re-Enter Password" name="password2" type="password" value="" required>
                                </div>
								<div class="form-group">
                                    <input class="form-control" value="<?php if(isset($_SESSION['user_email'])) echo $_SESSION['user_email'];?>" placeholder="Email" name="email" type="email" required>
                                </div>
								<div class="form-group">
                                    <input class="form-control" value="<?php if(isset($_SESSION['user_contact'])) echo $_SESSION['user_contact'];?>" placeholder="Contact" name="contact" type="number" required>
                                </div>
								<div class="form-group">
                                    <textarea class="form-control" placeholder="Address" name="address" type="text" required ><?php if(isset($_SESSION['user_address'])) echo $_SESSION['user_address'];?> </textarea>
                                </div>
                                <input type="submit" value="Signup" class="btn btn-lg btn-success btn-block">
                                <div class="form-group">
                                    <br><p>Already a member? <a href="login.php" style="color:green">login here</p>
                                </div>
                            </fieldset>
                  </form>
                    
            </div>
        </div>
    </div>
</div>
</body>

</html>
