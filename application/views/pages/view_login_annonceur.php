

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Accueil</a></li>
			<li class="active">Connexion</li>
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
			<form id="checkout-form" class="clearfix" enctype="multipart/form-data" action="<?= site_url('accueil','login_annonceur'); ?>" method="post">
				<div class="col-md-6">
					<!-- Message de connexion -->
				    <div>
				      <?php 
				        if (isset($message_infos)) {
				            echo $message_infos;
				        }
				      ?>
				    </div>
					<div class="billing-details">

						<p>Pas encore inscrit ?<a href="<?= site_url('accueil','creer_cpt_annonceur'); ?>"><b> Créer votre compte rapidement ici</b></a></p>
						<div class="section-title">
							<h3 class="title">Connectez-vous</h3>
						</div>

						<div class="form-group">
							<input class="input" id="email" type="email" name="email" placeholder="Votre E-mail" value="<?php echo set_value('email'); ?>">
							<small class="form-text text-muted">
								<?php echo form_error('email','<span style="color:red;">','</span>'); ?>
							</small>
						</div>

						<div class="form-group">
							<input class="input" id="pwd" type="password" name="pwd" placeholder="Votre mot de passe">
							<small class="form-text text-muted">
								<?php echo form_error('pwd','<span style="color:red;">','</span>'); ?>
							</small>
						</div>

						<div class="form-group">
	                        <button type="submit" name="creer_cpt_annonceur" value="creer_cpt_annonceur" class="btn btn-primary">Valider</button>
	                        <button type="reset" class="btn btn-default">Annuler</button>
                        </div>

					</div>
				</div>

				<div class="col-md-6">
					
				</div>

			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

