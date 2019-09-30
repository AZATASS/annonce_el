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
      <!-- STORE -->
        <div id="store">
          <?php 
          if ($nbre_post_total>0) {
          ?>
              <?php
              $valeur_finale = -1;
              for ($i=1; $i <= $nbre_page; $i++) { 
              ?>
                  <div id="<?= 'page_'.$i; ?>" class="row view_page">
                  <?php
                  // $valeur_initiale = $nbre_post_par_page*($i-1)+1;
                  // $valeur_finale = $valeur_initiale + $nbre_post_par_page -1;
                  $valeur_initiale = $valeur_finale + 1;
                  $valeur_finale = $valeur_initiale + ($nbre_post_par_page - 1);
                  if ($i==$nbre_page) {
                      $valeur_finale = $nbre_post_total - 1; 
                  }
                  for ($j=$valeur_initiale; $j <= $valeur_finale; $j++) {
                  ?>
                      <div class="row list-annonce">
                        <div class="col-md-12">
                          <div class="col-md-3">
                            <img class="img-responsive" src="<?= img_url('assets/img/','img-annonce-1.jpg'); ?>" alt="">
                          </div>
                          <div class="col-md-9">
                            <h3 class="card-title"><?= $list_post[$j]['titre']; ?></h3>
                            <h4><?= $list_post[$j]['prix']; ?></h4>
                            <p class="card-text"><?= substr($list_post[$j]['description'],0,255).' ...'; ?></p>
                            <span class="text-danger"><?= $list_post[$j]['date_publication']; ?></span>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="product-btns">
                                  <span class="product-price"><b><?= $list_post[$j]['annonceur']; ?></b></span>
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
              <?php
              }
              ?>
              <div id="page">
                  <ul class="pagination"></ul>
              </div>
          <?php    
          }
          ?>          
        </div>
        <!-- /STORE -->
    </div>
</div>