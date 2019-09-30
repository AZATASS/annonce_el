<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Tableau de bord</a>
    </li>
    <li class="breadcrumb-item active">La boutique</li>
</ol>

<div class="row">
	<div class="col-md-8">
		<div class="content-box-large">
			<div class="panel-body">
				<form enctype="multipart/form-data" action="<?= site_url('dashbord','add_annonce'); ?>" method="post">
					<fieldset>
						<div class="form-group">
							<label>Titre</label>
							<input class="form-control" placeholder="Text field" type="text" value="<?php echo set_value('titulaire'); ?>" name="titre">
						</div>
						<div class="form-group">
							<label>Prix</label>
							<input class="form-control" placeholder="Prix" type="text" value="1000" name="prix">
						</div>
						<div class="form-group">
							<label for="h-input">Date de publication</label>
							<div class="input-group">
								<input type="text" class="form-control mask-date" data-mask="99/99/9999" data-mask-placeholder="-" name="date_publication" value="17/09/2019">
								<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
							</div>
							<p class="note">
								Data format **/**/****
							</p>
						</div>

						<div class="form-group">
	  						<label>Catégorie</label>
  							<select class="selectpicker form-control">
  								<option value="0" selected>Choisissez une Catégorie</option>
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
	  					</div>

	  					<div class="form-group">
							<label>Pays</label>
							<select class="form-control" id="pays">
								<option value="0" selected>Choisissez un pays</option>
								<?php
				                foreach ($list_pays as $pays) :
				                ?>
				                	<option value="<?= $pays['id']; ?>"><?= $pays['nom_fr_fr']; ?></option>
				                <?php
				                endforeach;
				                ?>
							</select> 
						</div>

						<div class="form-group">
							<label>Ville</label>
							<select class="form-control" id="ville">
								<option value="0" selected>Choisissez une ville</option>
							</select> 
							<p class="msg_ville"></p>
						</div>

						<div class="form-group">
							<label>Description</label>
							<textarea class="form-control" placeholder="Description" rows="3" name="description">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</textarea>
						</div>

					</fieldset>
					<div>
						<button type="submit" class="btn btn-primary">Publier</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>