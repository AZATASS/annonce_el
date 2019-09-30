<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Tableau de bord</a>
    </li>
    <li class="breadcrumb-item active">La boutique</li>
</ol>

<div class="jumbotron">
  <h3>Nom de la boutique</h3>
  <div>
  	<img class="img-responsive center-block" src="<?= img_url('assets/img/','img-boutique-2.jpg'); ?>" alt="">
  </div>
  <p>
  	<a class="btn btn-primary btn-xs" href="#" role="button">Changer</a>
  	<a class="btn btn-primary btn-xs" href="#" role="button">Supprimer</a>
  </p>
</div>

<div class="row">

	<?php
    for ($i=1; $i <=9; $i++) { 
    ?>
    	<div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="<?= img_url('assets/img/','img-boutique-1.png'); ?>" alt="...">
		      <div class="caption">
		        <h3>Libelle produit <?= $i; ?></h3>
		        <span class="label label-danger"><?= $i*rand(1,100).' Fr'; ?></span>
		        <p>Description du produite <?= $i; ?></p>
		        <p>
		        	<a href="#" class="btn btn-info btn-xs" role="button">Changer</a> 
		        	<a href="#" class="btn btn-default btn-xs" role="button">Supprimer</a>
		        </p>
		      </div>
		    </div>
		</div>
    <?php
    }
    ?>

  
</div>