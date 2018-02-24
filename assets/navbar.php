        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/">Aakash Institute</a>
            </div>
            <ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
                    <a class="dropdown-toggle" href="/">
                        <i class="fa fa-home fa-fw"></i>  Home</i>
                    </a>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" href="/about.php">
                        <i class="fa fa-info-circle fa-fw"></i>  About</i>
                    </a>
                </li>
				<?php
					if(!isset($_SESSION['user_userid']) or $_SESSION['user_userid']!=-99)
					{
						echo '<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="#">
									<i class="fa fa-edit fa-fw"></i> Aptitude Test <i class="fa fa-caret-down"></i>
								</a>
								<ul class="dropdown-menu dropdown-user">
									<li><a href="/test"><i class="fa fa-info fa-fw"></i> View Exam Details</a>
									</li>
									<li><a href="/results.php"><i class="fa fa-sign-out fa-fw"></i> View Results Chart</a>
									</li>
								</ul>
							</li>';
					}
				?>
				
				<?php
					if(isset($_SESSION['user_userid']))
					{ ?>
				
				
				<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> <?php  if(isset($_SESSION['user_fullname'])) echo $_SESSION['user_fullname']; ?> <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
						 <?php
						if(isset($_SESSION['user_userid']) and $_SESSION['user_userid']==-99)
						{
							echo '<li><a href="/admin"><i class="fa fa-user fa-fw"></i> Administrative Page</a>
                        </li>';
						}
						else
						{
							echo '<li><a href="/profile"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>';
						} ?>
                        <li><a href="/etc/logout.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                        </li>
                    </ul>
                </li>
					<?php }
					else {
						?>
				<li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i> Login <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="/login.php"><i class="fa fa-sign-in fa-fw"></i> Login</a>
                        </li>
						<li><a href="/registeration.php"><i class="fa fa-sign-out fa-fw"></i> Register</a>
                        </li>
                    </ul>
                </li>
					<?php } ?>
            </ul>
        </nav>
