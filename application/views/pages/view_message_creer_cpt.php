
<!-- section -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-md-8 col-md-offset-2 text-center">
                <div style="border-radius: 0;" class="jumbotron">
		          <h3>Bienvenue <?php if(isset($titulaire)) echo $titulaire; ?>,</h3>
		          <p>
		            Nous vous avons envoyer un mail de confirmation à votre adresse 
		            <strong><?php if (isset($adresse)) echo $adresse; ?></strong>.
		          </p>
		          <small class="text-muet">NB : Il se peut que le mail se trouve dans votre spam ou pourriel.</small>
		        </div>
                <a href="<?= site_url('accueil','creer_cpt_annonceur'); ?>" class="btn btn-primary">Page précédente</a>
            </div>
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /section -->