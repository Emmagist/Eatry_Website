<!doctype html>
<html lang="en">

	<!-- signup/login Start -->
	  <?php require_once "includes/header.php";?>
	<!-- End of /Section -->

<body>


	
		
	<!-- Navbar Start -->
	<?php require_once "includes/main_navbar.php";?>
	<!-- End of /Section -->
	


	


	
	<!-- Menu Start -->
	<section id="menu">
	<div class="container" id="shop">
			<div class="row">
				<div class="col-md-12">
					<div class="col-md-3">
						<div class="blog-sidebar">
							<div class="block">
								<h4>Categories</h4>
								<div class="list-group">
									<a href="#" class="list-group-item">
										<i class="fa  fa-dot-circle-o"></i>
										Italian Foods
									</a>
									<a href="#" class="list-group-item">
										<i class="fa  fa-dot-circle-o"></i>
										Traditional Food
									</a>
									<a href="#" class="list-group-item">
										<i class="fa  fa-dot-circle-o"></i>
										Indian Food
									</a>
									<a href="#" class="list-group-item">
										<i class="fa  fa-dot-circle-o"></i>
										Spanish Food
									</a>
									<a href="#" class="list-group-item">
										<i class="fa  fa-dot-circle-o"></i>
										Thai FoodN
									</a>
								</div>
							</div>
							<div class="block">
								<img src="images/food-ad.png" alt="">
							</div>
							<div class="block">
								<h4>Latest Food Items</h4>
								<ul class="media-list">
								 	<li class="media">
								    	<a class="pull-left" href="#">
								      		<img class="media-object" src="images/post-img.png" alt="...">
								    	</a>
								    	<div class="media-body">
								      		<a href="" class="media-heading">Lamb leg roast
								      		<p>Lorem ipsum dolor sit amet.</p></a>
								    	</div>
								  	</li>
								  	<li class="media">
								    	<a class="pull-left" href="#">
								      		<img class="media-object" src="images/post-img-2.png" alt="...">
								    	</a>
								    	<div class="media-body">
								      		<a href="" class="media-heading"> Lamingtons
								      		<p>Lorem ipsum dolor.</p></a>
								    	</div>
								  	</li>
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
								  	</li>
								  </ul>
							</div>

							<div class="block">
								<h4>Food Tag</h4>
								<div class="tag-link">
									<a href="">BALLET</a>
									<a href="">CHRISTMAS</a>
									<a href="">ELEGANCE</a>
									<a href="">ELEGANT</a>
									<a href="">SHOPPING</a>
									<a href="">SHOP</a>
								</div>	
							</div>
						</div>
					</div>	<!-- End of /.col-md-3 -->
					<div class="col-md-9">
						<div class="products-heading">
							<h2>MENU</h2>
						</div>	<!-- End of /.Products-heading -->
						<div class="product-grid">
							<?php
							$query = query("SELECT * FROM menu WHERE active = 1");
							confirm($query);?>
						    <ul id="box">
						    	<?php while($row = fetch_array($query)):?>
						        <li>
						            <div id="products">
										<a href="#">
											<img src="<?=$row['image'];?>" alt="" class="img-responsive">
										</a>
										<a href="#">
											<h4><?=$row['title'];?></h4>
										</a>
										<p class="price" id="price">Price: ₦<?=$row['price'];?></p>
										<input type="hidden" name="hidden_quantity" id="quantity<?php echo $row["menu_id"]; ?>" class="form-control" value="1" />
	                               		<input type="hidden" name="hidden_title" id="title<?php echo $row["menu_id"]; ?>" value="<?php echo $row["title"]; ?>" />  
	                               		<input type="hidden" name="hidden_price" id="price<?php echo $row["menu_id"]; ?>" value="<?php echo $row["price"]; ?>" /> 
										<div>
											<a href="menu_detail.php?ref=<?=$row['menu_reference'];?>" class="view-link shutte col-md-6" name="add_to_cart" id="<?=$row['menu_id'];?>">More Info</a>
											<a href="" class="view-link shutter add_to_cart col-md-6" name="add_to_cart" id="<?=$row['menu_id'];?>">Add To Cart</a>
										</div>
									</div>	<!-- End of /.products -->
						        </li>
						    	<?php endwhile;?>
						       
						        <!--  ... -->
						    </ul>
						</div>	<!-- End of /.products-grid -->

						<!-- Pagination -->

						<div class="pagination-bottom">
							<ul class="pagination">
							  	<li class="disabled"><a href="#">&laquo;</a></li>
							  	<li class="active"><a href="#">1 <span class="sr-only"></span></a></li>
							  	<li><a href="#">2</a></li>
							  	<li><a href="#">3</a></li>
							  	<li><a href="#">4</a></li>
							  	<li><a href="#">»</a></li>
							</ul>	<!-- End of /.pagination -->
						</div>
					</div>	<!-- End of /.col-md-9 -->
					
				</div>
			</div>	<!-- End of /.row -->
	</div>	
	</section>
	<!-- End of Section -->


	<!--about-->
  	<?php require_once "includes/about.php";?>
  	<!--/about-->
	
	<!-- CALL TO ACTION Start-->
	<section id="call-to-area">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="block">
						<div class="block-heading">
							<h2>Our Partners</h2>
						</div>
					</div>	<!-- End of /.block -->
					<div id="owl-example" class="owl-carousel">
						<div> <img src="images/company-1.png" alt=""></div>
						<div> <img src="images/company-2.png" alt=""></div>
						<div> <img src="images/company-3.png" alt=""></div>
						<div> <img src="images/company-4.png" alt=""></div>
						<div> <img src="images/company-5.png" alt=""></div>
						<div> <img src="images/company-6.png" alt=""></div>
						<div> <img src="images/company-8.png" alt=""></div>
						<div> <img src="images/company-9.png" alt=""></div>
					</div>	<!-- End of /.Owl-Slider -->
				</div>	<!-- End of /.col-md-12 -->
			</div> <!-- End Of /.Row -->
		</div> <!-- End Of /.Container -->
	</section>	
	<!-- End of Section -->
	
	

	<!-- FOOTER Start -->
	<?php require_once "includes/footer.php";?>
	<!-- End of Section -->
</body>
</html>