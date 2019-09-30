<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Tableau de bord</a>
    </li>
    <li class="breadcrumb-item active">Annonce</li>
</ol>

<?php 
if (isset($reponse) && $reponse=="true") {
	echo "<div class='alert alert-info col-sm-8'>Opération réussie</div>";
} else if (isset($reponse) && $reponse=="false") {
	echo "<div class='alert alert-danger col-sm-8'>Opération échouée</div>";
}
?>

<div class="row">
	<div class="col-md-8">
		<div class="content-box-large">
			<div class="panel-body">
				<form id="modal_add_annonce_f" enctype="multipart/form-data" action="<?= site_url('dashbord','add_annonce'); ?>" method="post">
					<fieldset>
						<div class="form-group">
							<label>Titre</label>
							<input data-required="true" data-describedby="titreHelp" data-description="titre" aria-describedby="titreHelp" class="form-control" type="text" name="titre" id="titre" value="Maison à louer">
							<small id="titreHelp" class="form-text text-muted"></small>
						</div>

						<div class="form-group">
							<label>Prix</label>
							<input data-required="true" data-describedby="prixHelp" data-description="prix" aria-describedby="prixHelp" class="form-control" placeholder="Prix" type="text" value="1000" name="prix" id="prix">
							<small id="prixHelp" class="form-text text-muted"></small>
						</div>

						<div class="form-group">
							<label for="h-input">Date de publication</label>
							<div class="input-group">
								<input data-required="true" data-describedby="date_publicationHelp" data-description="date_publication" aria-describedby="date_publicationHelp" type="text" class="form-control mask-date" data-mask="99/99/9999" data-mask-placeholder="-" name="date_publication" id="date_publication" value="30/09/2019">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
							<p class="note">
								Format date **/**/****
							</p>
							<small id="date_publicationHelp" class="form-text text-muted"></small>
						</div>

						<div class="form-group">
	  						<label>Catégorie</label>
  							<select data-required="true" data-describedby="idsous_categorieHelp" data-description="idsous_categorie" aria-describedby="idsous_categorieHelp" class="selectpicker form-control" id="idsous_categorie" name="idsous_categorie">
  								<option value="" selected>Choisissez une Catégorie</option>
  								<?php
  								$idCategorie = 0;
				                foreach ($list_sous_categorie as $sous_categorie) :
				                	if ($idCategorie!=$sous_categorie['idcategorie']) {
				                		$idCategorie = $sous_categorie['idcategorie'];
				                ?>
				                		<optgroup label="<?= $sous_categorie['categorie']; ?>">
				                <?php
				                	} else {
				                ?>
				                		<option value="<?= $sous_categorie['idsous_categorie']; ?>"><?= $sous_categorie['sous_categorie']; ?></option>
				                <?php
				                	}
				                endforeach;
				                ?>
							</select>
							<small id="idsous_categorieHelp" class="form-text text-muted"></small>
	  					</div>

	  					<div class="form-group">
							<label>Pays</label>
							<select data-required="true" data-describedby="idpaysHelp" data-description="idpays" aria-describedby="idpaysHelp" class="form-control" id="idpays" name="idpays">
								<option value="" selected>Choisissez un pays</option>
								<?php
				                foreach ($list_pays as $pays) :
				                ?>
				                	<option value="<?= $pays['id']; ?>"><?= $pays['nom_fr_fr']; ?></option>
				                <?php
				                endforeach;
				                ?>
							</select> 
							<small id="idpaysHelp" class="form-text text-muted"></small>
						</div>

						<div class="form-group">
							<label>Ville</label>
							<select data-required="true" data-describedby="idvilleHelp" data-description="idville" aria-describedby="idvilleHelp" class="form-control" id="idville" name="idville">
								<option value="" selected>Choisissez une ville</option>
							</select> 
							<p class="msg_ville"></p>
							<small id="idvilleHelp" class="form-text text-muted"></small>
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea data-required="true" data-describedby="descriptionHelp" data-description="description" aria-describedby="descriptionHelp" class="form-control" placeholder="Description" rows="3" name="description" id="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</textarea>
							<small id="descriptionHelp" class="form-text text-muted"></small>
						</div>

					</fieldset>
					<div>
						<input class="btn btn-primary" type="submit" name="ajouter_annonce" value="Publier">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>