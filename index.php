<?php
require("header.php");
?>
<!-- home -->
		<section class="home">
			<div class="intro">
				<div id="home" class="carousel slide" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#home" data-slide-to="0" class="active"></li>
						<li data-target="#home" data-slide-to="1"></li>
						<li data-target="#home" data-slide-to="2"></li>
						<li data-target="#home" data-slide-to="3"></li>
					</ol>
					<div class="carousel-inner" role="listbox">
						<div class="item active">
							<div class="container">
								<div class="row">
									<div class="col-sm-7">
										<div class="intro-content">
											<h3>Don't MISS Out</h3>
											<h4>wonderful <span class="highlight">RESERACH MATERIAL</span></h4>
											<p>your choice is here. Only check and see your problem solved</p>
										
										</div>
									</div>
									<div class="col-sm-5">
										<img class="img-responsive" src="images/ha.jpg" height="400" alt="" />
									</div>	
								</div>	
							</div>	
						</div>
						<div class="item">
							<div class="container">
								<div class="row">
									<div class="col-sm-7">
										<div class="intro-content">
											<h3>Lucky Chance</h3>
											<h4>To solve that <span class="highlight">Reseach Problems</span></h4>
											<p>We assure you the best ansers and solutions</p>
											
										</div>
									</div>
									<div class="col-sm-5">
										<img class="img-responsive" src="images/kn.jpg" alt="" height="400" />
									</div>	
								</div>	
							</div>	
						</div>
						<div class="item">
							<div class="container">
								<div class="row">
									<div class="col-sm-7">
										<div class="intro-content">
											<h3>Less  Study</h3>
											<h4>Quality  <span class="highlight">Materials</span></h4>
											<p>wELL arranged and summarized. Touching every aspect of the question .</p>
									
										</div>
									</div>
									<div class="col-sm-5">
										<img class="img-responsive" src="images/st.jpg" alt="" height="400" />
									</div>	
								</div>	
							</div>	
						</div>
						<div class="item">
							<div class="container">
								<div class="row">
									<div class="col-sm-7">
										<div class="intro-content">
											<h3>Last Chance</h3>
											<h4>Biggest <span class="highlight">Sale</span></h4>
											
			
										</div>
									</div>
									<div class="col-sm-5">
										<img class="img-responsive" src="images/book.jpg" alt="" height="400" />
									</div>	
								</div>	
							</div>	
						</div>
							
						</div>	
					</div>
					<!-- Controls -->
					<a class="left carousel-control" href="#home" role="button" data-slide="prev"><i class="fa fa-angle-left"></i></a>
					<a class="right carousel-control" href="#home" role="button" data-slide="next"><i class="fa fa-angle-right"></i></a>
				</div>
			</div>
		</section>	
		
		
		<!-- service -->
		<?php
				include_once 'includes/category.php';
				$categories = Categories::category();
				echo $categories;
		?>
		<!-- featured product -->
			<!-- section title -->
				<?php
				include_once 'includes/product.php';
				$product = Product::product();
				echo $product;
				?>

		
					
								
							
		</section>		
		
		<!-- emarket adds -->
		<section class="emarket-adds">
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="single-add">
							<h4>Get <span>50%</span> Discount</h4>
							<a href="#" class="btn btn-default" role="button">Learn More</a>
							<span class="img-add"><img src="images/te.jpg" alt="" /></span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-add">
							<h4>Best <span>Offer</span> for You</h4>
							<a href="#" class="btn btn-default" role="button">Learn More</a>
							<span class="img-add"><img src="images/red-tablet.png" alt="" /></span>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="single-add">
							<h4><span>Only</span> Best smartphone</h4>
							<a href="#" class="btn btn-default" role="button">Learn More</a>
							<span class="img-add"><img src="images/red-tablet.png" alt="" /></span>
						</div>
					</div>
				</div>
			</div>
		</section>	
		
		
		
		<!-- special price -->
		<section class="special-price">
			<div class="price-intro">
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							<div class="pull-left">
								<blockquote>
								<h1> Learning Never Ends</h1>
								<p>Study to show yourself approved</p>								
							</div>
							</blockquote>
							<div class="pull-right"><a class="btn btn-default btn-lg" href="admin/login.php" > </a>
							</div> 
						</div>
					</div> <!-- section title -->

				</div>
			</div>
		</section>	
			
		<!-- product info -->
		
<?php
require("footer.php");
?>
</div>
    <!-- ALL JAVASCRIPT -->         
    <script src='js/jquery.js'></script>
    <script src='bootstrap/js/bootstrap.min.js'></script>
    <script src='js/custom.js'></script>
</body>
<script type="text/javascript" src="js/bootstrap.min.jscol-lg-4 "></script>
</body>
</html>


