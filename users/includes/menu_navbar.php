<section class="">
		<nav class="navbar navbar-default navbar-fixed-top" id="greennav">
			<div class="container">
			    <div class="navbar-header">
			      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			    </div> <!-- End of /.navbar-header -->
			    <div class="row">
			    	<div class="col-md-4">
			    	<a href="#" class="navbar-brand">
						<img src="images/logo.png" alt="logo" class="logo">
					</a>
			    </div>

			    <div class="collapse navbar-collapse col-md-8" id="bs-example-navbar-collapse-1">
			      	<ul class="nav navbar-nav nav-main my-nav">
			        	<li><a href="index.php">HOME</a></li>
						<li class="active"><a href="menu.php">MENU</a></li>
						<li><a href="blog.php">BLOG</a></li>
						<li><a href="#about">ABOUT US</a></li>	
						<li><a href="add_cart.php"><i class="fas fa-shopping-cart" aria-hidden="true"></i> <span class="badge"><?php if(isset($_SESSION['shoppingCart'])) { echo count($_SESSION['shoppingCart']);} else { echo '0';} ?></span></a>
						</li>
						<li class="dropdown">
						<a href="#">PROFILE<span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="customer_dashbord.php">Dashboard</a></li>
							   <li><a href="includes/customer_login.php">login</a></li>
							    <li><a  href="includes/logout.php">Logout</a></l>
							</ul>
						</li>
						
			        </ul> <!-- End of /.nav-main -->
			    </div>	<!-- /.navbar-collapse -->
			    </div>
			    
			</div>	<!-- /.container-fluid -->
		</nav>	<!-- End of /.nav -->
	</section>