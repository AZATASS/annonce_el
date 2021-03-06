

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Accueil</a></li>
			<li class="active">Toutes les annonces</li>
		</ul>
	</div>
</div>
<!-- /BREADCRUMB -->

<!-- section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
		
			<!-- MAIN -->
			<div id="main" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="pull-left">
						<div class="sort-filter">
							<span class="text-uppercase">Trier par:</span>
							<select class="input">
									<option value="0">Prix</option>
									<option value="0">Date</option>
								</select>
							<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
						</div>
					</div>
					<div class="pull-right">
						<div class="page-filter">
							<span class="text-uppercase">Montrer:</span>
							<select class="input">
									<option value="0">10</option>
									<option value="1">20</option>
									<option value="2">30</option>
								</select>
						</div>
						<ul class="store-pages">
							<li><span class="text-uppercase">Page:</span></li>
							<li class="active">1</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- /store top filter -->

				<!-- STORE -->
				<div id="store">

					<?php 
					for ($i=1; $i < 8 ; $i++) {
					?>
						<!-- Product Single -->
						<div class="row list-annonce">
							<div class="col-md-12">
								<div class="col-md-3">
									<img class="img-responsive" src="<?= img_url('assets/img/','img-annonce-1.jpg'); ?>" alt="">
								</div>
								<div class="col-md-9">
									<h3 class="card-title">Titre de l'annonce</h3>
						            <h4>Prix</h4>
						            <p class="card-text">Description : Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente dicta fugit fugiat hic aliquam itaque facere, soluta. Totam id dolores, sint aperiam sequi pariatur praesentium animi perspiciatis molestias iure, ducimus!</p>
						        	<span class="text-danger">Date de publication</span>
						            <div class="row">
						            	<div class="col-md-12">
						            		
						            		<div class="product-btns">
						            			<span class="product-price"><b>Nom de l'annonceur</b></span>
												<button class="main-btn icon-btn"><i class="fa fa-heart"></i></button>
												<button class="main-btn icon-btn"><i class="fa fa-question"></i></button>
												<a class="primary-btn add-to-cart" href="<?= site_url('accueil','details_annonce'); ?>"> Voir l'annonce</a>
											</div>
						            	</div>
						            </div>
								</div>
							</div>
						</div>
					<?php
					}
					?>

					
				</div>
				<!-- /STORE -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<div class="pull-left">
						<div class="sort-filter">
							<span class="text-uppercase">Trier par:</span>
							<select class="input">
									<option value="0">Prix</option>
									<option value="0">Date</option>
								</select>
							<a href="#" class="main-btn icon-btn"><i class="fa fa-arrow-down"></i></a>
						</div>
					</div>
					<div class="pull-right">
						<div class="page-filter">
							<span class="text-uppercase">Montrer:</span>
							<select class="input">
									<option value="0">10</option>
									<option value="1">20</option>
									<option value="2">30</option>
								</select>
						</div>
						<ul class="store-pages">
							<li><span class="text-uppercase">Page:</span></li>
							<li class="active">1</li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#"><i class="fa fa-caret-right"></i></a></li>
						</ul>
					</div>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /MAIN -->

			<div class="col-md-3"><!-- SECTION PUB -->
				<!-- PUB -->
				<div class="row">
					<!-- section-title -->
					<div class="col-md-12">
						<div class="section-title">
							<h2 class="title">Publicité</h2>
							<div class="pull-right">
								<div class="product-slick-dots-3 custom-dots"></div>
							</div>
						</div>
					</div>
					<!-- /section-title -->

					<!-- Bannière de publicité -->
					<?php $data = ""; ?>
					<?php $this->load->view('donnees_charges/view_banniere_pub_right',$data,false); ?>

				</div>
				<!-- /row -->
			</div>
			<!-- SECTION PUB -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

	