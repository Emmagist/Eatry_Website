<!doctype html>
<html lang="en">
	<!-- Header Start -->
	  <?php require_once "includes/header.php";?>
	<!-- End of /Section -->
<body>

	<!-- signup/login Start -->
	  <?php require_once "includes/signup_signin.php";?>
	<!-- End of /Section -->
	
	<!-- Navbar Start -->
	<?php require_once "includes/menu_navbar.php";?>
	<!-- End of /Section -->


	<!-- breadcrumb Start -->
	<section id="topic-header">
		<div class="container" id="Details">
			<div class="row">
				<div class="col-md-4">
					<h4>Food Details</h4>
					<p></p>
				</div>	<!-- /.col-md-4 -->
				
			</div>	<!-- /.row -->
		</div>	<!-- /.container-->
	</section>
	<!-- /Section -->

	<section id="single-product">
		<div class="container">
			<?php

			if (isset($_GET['ref'])) {
				$ref = escape_string($_GET['ref']);
				$query = query("SELECT * FROM menu WHERE menu_reference = '$ref' ");
				confirm($query);
			}

			?>
			<div class="row">
				<?php while($row = fetch_array($query)):
					$menu_id = $row['menu_id'];
					$image = $row['image'];
					$food_title = $row['title'];
					$food_price = $row['price'];
					$food_description = $row['description'];
				?>
				<div class="col-md-5">
					<div class="single-product-img">
						<img src="<?=$image;?>" alt="" class="img-responsive">
					</div>

				</div> <!-- End of /.col-md-5 -->
				<div class="col-md-4">
					<div class="block">
						<div class="product-des">
							<h4><?=$food_title;?></h4>
							<p class="price" id="price">₦<?=$food_price;?></p>
							<p><?=$food_description;?>!</p>
							<input type="hidden" name="hidden_quantity" id="quantity<?php echo $row["menu_id"]; ?>" class="form-control" value="1" />
	                        <input type="hidden" name="hidden_title" id="title<?=$menu_id; ?>" value="<?=$food_title; ?>" />  
	                        <input type="hidden" name="hidden_price" id="price<?=$menu_id; ?>" value="<?=$food_price; ?>" /> 
							<a class="view-link add_to_cart" href="" name="add_to_cart" id="<?=$row['menu_id'];?>"><i class="fa fa-plus-circle"></i>Add To Cart</a>
						</div>	<!-- End of /.product-des -->
					</div> <!-- End of /.block -->
				</div>	<!-- End of /.col-md-4 -->
				<?php endwhile;?>
				<div class="col-md-3">
					<div class="blog-sidebar">
						<div class="block">
							<h4 class="top-catagori-heading">Latest Food Items</h4>
							<ul class="media-list">
							 	<li class="media">
							    	<a class="pull-left" href="#">
							      		<img class="media-object" src="images/post-img.png" alt="...">
							    	</a>
							    	<div class="media-body">
							      		<a href="" class="media-heading">Lamb leg roast
							      		<p>Lorem ipsum dolor sit amet.</p></a>
							    	</div>
							  	</li>	<!-- End of /.media -->
							  	<li class="media">
							    	<a class="pull-left" href="#">
							      		<img class="media-object" src="images/post-img-2.png" alt="...">
							    	</a>
							    	<div class="media-body">
							      		<a href="" class="media-heading"> Lamingtons
							      		<p>Lorem ipsum dolor.</p></a>
							    	</div>
							  	</li>	<!-- End of /.media -->
							  	<li class="media">
							    	<a class="pull-left" href="#">
							      		<img class="media-object" src="images/post-img-3.png" alt="...">
							    	</a>
							    	<div class="media-body">
							      		<a href="" class="media-heading">
							      		Anzac Salad
							      		<p>Lorem ipsum dolor sit.</p>

							      		</a>
							    	</div>
							  	</li>	<!-- End of /.media -->
							  	<li class="media">
							    	<a class="pull-left" href="#">
							      		<img class="media-object" src="images/post-img-3.png" alt="...">
							    	</a>
							    	<div class="media-body">
							      		<a href="" class="media-heading">
							      		Anzac Salad
							      		<p>Lorem ipsum dolor sit.</p>

							      		</a>
							    	</div>
							  	</li>	<!-- End of /.media -->
							</ul>	<!-- End of /.media-list -->
						</div>	<!-- End of /.block -->
						
					</div>	<!-- End of /.blog-sidebar -->
						
				</div>	<!-- End of /.col-md-3 -->
			</div>	<!-- End of /.row -->
			<div class="row">
				<div class="col-md-9">
					<!-- Nav tabs -->
					<ul class="nav nav-tabs">
						<li class="active"><a href="#home" data-toggle="tab">More Info</a></li>
						<li><a href="#profile" data-toggle="tab">Comments</a></li>
					</ul>

					<!-- Tab panes -->
					<div class="tab-content">
						<div class="tab-pane active" id="home">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus eligendi quidem vel sit expedita nam sint non explicabo magni totam?</p>
						</div>
						<div class="tab-pane" id="profile">
							<p>No customer comments for the moment.</p>
						</div>
					</div>
				</div>	<!-- End of /.col-md-9 -->
				<div class="col-md-3">
					<div class="blog-sidebar">
						<div class="block">
							<img src="images/food-ad.png" alt="">
						</div> <!-- End of /.block -->
					</div>	<!-- End of /.blog-sidebar -->
				</div>	<!-- End of /.col-md-3 -->
			</div>	<!-- End of /.row -->
		</div>	<!-- End of /.Container -->
	</section> <!-- End of /.Single-product -->


	<!--about-->
  	<?php require_once "includes/about.php";?>
    <!--/about-->

  	<!-- FOOTER Start -->
	<?php require_once "includes/footer.php";?>
	<!-- End of Section -->
</body>
</html>