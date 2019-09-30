<!-- Breadcrumbs-->
<ol class="breadcrumb">
    <li class="breadcrumb-item">
      <a href="#">Tableau de bord</a>
    </li>
    <li class="breadcrumb-item active">Les annonces</li>
</ol>

<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Reference</th>
              <th>Titre</th>
              <th>Prix</th>
              <th>Date publication</th>
              <th>Description</th>
              <th>Categorie</th>
              <th>Action</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Reference</th>
              <th>Titre</th>
              <th>Prix</th>
              <th>Date publication</th>
              <th>Description</th>
              <th>Categorie</th>
            </tr>
          </tfoot>
          <tbody>
            <?php
            for ($i=1; $i <50 ; $i++) { 
            ?>
            	<tr>
	              <td><?= $i; ?></td>
	              <td>Titre <?= $i; ?></td>
	              <td><?= $i*rand(1,100); ?></td>
	              <td><?= date("d/m/Y"); ?></td>
	              <td>Description <?= $i; ?></td>
	              <td>Categorie <?= $i; ?></td>
	              <td>
	              	<a href="#" class="btn btn-info btn-xs" role="button">Voir</a> 
		        	<a href="#" class="btn btn-danger btn-xs" role="button">Supprimer</a>
		        	<a href="#" class="btn btn-primary btn-xs" role="button">Modifier</a>
	              </td>
	            </tr>
            <?php
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>
</div>