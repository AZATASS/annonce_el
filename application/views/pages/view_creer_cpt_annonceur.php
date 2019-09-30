

<!-- BREADCRUMB -->
<div id="breadcrumb">
	<div class="container">
		<ul class="breadcrumb">
			<li><a href="#">Accueil</a></li>
			<li class="active">Créer un compte</li>
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
			<form id="checkout-form" class="clearfix" enctype="multipart/form-data" action="<?= site_url('accueil','creer_cpt_annonceur'); ?>" method="post">
				<div class="col-md-6">
					<div class="billing-details">

						<p>Déjà inscrit ? <a href="<?= site_url('accueil','login_annonceur'); ?>"><b>Connectez-vous</b></a></p>
						<div class="section-title">
							<h3 class="title">Créer votre compte rapidement</h3>
						</div>

						<div class="form-group">
							<input class="input" id="titulaire" type="text" name="titulaire" placeholder="Votre nom complet" value="<?php echo set_value('titulaire'); ?>">
							<small class="form-text text-muted">
								<?php echo form_error('titulaire','<span style="color:red;">','</span>'); ?>
							</small>
						</div>

						<div class="form-group">
							<input class="input" id="email" type="email" name="email" placeholder="Votre E-mail" value="<?php echo set_value('email'); ?>">
							<small class="form-text text-muted">
								<?php echo form_error('email','<span style="color:red;">','</span>'); ?>
							</small>
						</div>

						<div class="form-group">
							<input class="input" id="telephone" type="tel" name="telephone" placeholder="Votre téléphone (facultatif)" value="<?php echo set_value('telephone'); ?>">
							<small class="form-text text-muted">
								<?php echo form_error('telephone','<span style="color:red;">','</span>'); ?>
							</small>
						</div>

						<div class="form-group">
							<select class="input" id="type_annonceur" name="type_annonceur">
	                            <option value="" selected>Sélectionnez le type d'annonceur</option>
	                            <?php 
	                            foreach ($list_type_annonceur as $type_annonceur) :
	                            ?>
	                                <option <?php if (set_value('type_annonceur')==$type_annonceur['libelle']) echo "selected"; ?> value="<?= $type_annonceur['libelle']; ?>"><?= $type_annonceur['libelle']; ?></option>       
	                            <?php 
	                            endforeach;
	                            ?>
	                        </select>
							<small class="form-text text-muted">
								<?php echo form_error('type_annonceur','<span style="color:red;">','</span>'); ?>
							</small>
						</div>

						<div class="form-group">
							<input class="input" id="pwd" type="password" name="pwd" placeholder="Votre mot de passe">
							<small class="form-text text-muted">
								<?php echo form_error('pwd','<span style="color:red;">','</span>'); ?>
							</small>
						</div>

						<div class="form-group">
							<input class="input" id="pwd_c" type="password" name="pwd_c" placeholder="Confirmez votre mot de passe">
							<small class="form-text text-muted">
								<?php echo form_error('pwd_c','<span style="color:red;">','</span>'); ?>
							</small>
						</div>

						<div class="form-group">
	                        <button type="submit" name="creer_cpt_annonceur" value="creer_cpt_annonceur" class="btn btn-primary">Valider</button>
	                        <button type="reset" class="btn btn-default">Annuler</button>
                        </div>

					</div>
				</div>

				<div class="col-md-6">
					<div class="shiping-methods">
						<div class="section-title">
							<h4 class="title">Comment ça marche ?</h4>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="shipping" id="shipping-1" checked>
							<label for="shipping-1">Etape 1</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="shipping" id="shipping-2">
							<label for="shipping-2">Etape 2</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
							</div>
						</div>
					</div>

					<div class="payments-methods">
						<div class="section-title">
							<h4 class="title">Informations</h4>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-1" checked>
							<label for="payments-1">Etape 1</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-2">
							<label for="payments-2">Etape 2</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
							</div>
						</div>
						<div class="input-checkbox">
							<input type="radio" name="payments" id="payments-3">
							<label for="payments-3">Etape 3</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
									<p>
							</div>
						</div>
					</div>
				</div>

			</form>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /section -->

