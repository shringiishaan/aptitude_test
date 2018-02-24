
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
				<h1 style="color:#337ab7"  class="page-header">About Application</h1>
			</div>
		</div>
        <div class="row">
            <div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12 text-center">
								<div>Features added</div>
							</div>
						</div>
					</div>
					<div class="text-center panel-footer">
						Test Admin Login - admin/nimda<br>
						Test User login - ishaan/ishaan
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						CSS Framework used - Bootstrap
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Languages used - html,php,javascript
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Passwords stored in Hashed form
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Security against SQL injections
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						The questions are displayed randomly from a table named 'questionbank'. 
						Admin can add as many questions as he want, for user, only fixed questions will be displayed randomly.
						<div class="clearfix"></div>
					</div>
				</div>
            </div>
			<div class="col-md-4">
				<div class="panel panel-info">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12 text-center">
								<div>Features added</div>
							</div>
						</div>
					</div>
					<div class="text-center panel-footer">
						Every Answer User provides is stored in database. At the time of power cut user can restore his session.
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Server Time is used to keep time track. no alterations / manipulations can be sone by user.
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						User Remaining Time for each session can also be restored through database
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						The question paper GUI shows a side table where user can see all questions attempted/unattempted
						<div class="clearfix"></div>
					</div>
				</div>
				
            </div>
			<div class="col-md-4">
				<div class="panel panel-warning">
					<div class="panel-heading">
						<div class="row">
							<div class="col-xs-12 text-center">
								<div>Future Changes</div>
							</div>
						</div>
					</div>
					<div class="text-center panel-footer">
						Basic Authorisations on ALL pages Left
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Add feature - user can mark a question to review later
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Add Captcha registeration and login page
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Number of sections Fixed - change
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Names of sections should not be fixed
						<div class="clearfix"></div>
					</div>
					<div class="text-center panel-footer">
						Time limit per section should be Entered by admin
						<div class="clearfix"></div>
					</div>
				</div>
				
            </div>
        </div>
    </div>
</div>

</body>

</html>
