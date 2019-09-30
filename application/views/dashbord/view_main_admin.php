<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <title><?= $titre_page; ?></title>

  <!-- Google font -->
  <link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">
  <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

  <!-- Bootstrap -->
  <link type="text/css" rel="stylesheet" href="<?= css_url('assets/css/','bootstrap.min'); ?>">
  <!-- Slick -->
  <link type="text/css" rel="stylesheet" href="<?= css_url('assets/css/','slick'); ?>">
  <link type="text/css" rel="stylesheet" href="<?= css_url('assets/css/','slick-theme'); ?>">

  <!-- nouislider -->
  <link type="text/css" rel="stylesheet" href="<?= css_url('assets/css/','nouislider.min'); ?>">

  <!-- Font Awesome Icon -->
  <link type="text/css" rel="stylesheet" href="<?= css_url('assets/css/','font-awesome.min'); ?>">

  <!-- Custom stlylesheet -->
  <link type="text/css" rel="stylesheet" href="<?= css_url('assets/css/','style'); ?>">

  <!-- Début Dashbord stlylesheet -->
  <!-- Page level plugin CSS-->
  <link type="text/css" rel="stylesheet" href="<?= css_url('assets/dashbord/vendor/datatables/','dataTables.bootstrap4'); ?>">
  <!-- Fin Dashbord stlylesheet -->
  
  
  <style type="text/css">

    /*Script de chargement de la page*/
    .loader_page{
      background: url(<?= img_url('assets/img/','img-loader.gif'); ?>) 50% 50% no-repeat rgba(255, 255, 255, 0.8);
      cursor: wait;
      height: 100%;
      left: 0;
      position: fixed;
      top: 0;
      width: 100%;
      z-index: 9999;
    }
  </style>

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
  <!-- HEADER -->
  <header>
    <!-- top Header -->
    <div id="top-header">
      <div class="container">
        <div class="pull-left">
          <!-- <span>Bienvenue sur Easylinked</span> -->
        </div>
        <div class="pull-right">
          <ul class="header-top-links">
            <li><a href="#">Newsletter</a></li>
            <li><a href="#">FAQ</a></li>
            <li class="dropdown default-dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">FR <i class="fa fa-caret-down"></i></a>
              <ul class="custom-menu">
                <li><a href="#">Anglais (ENG)</a></li>
                <li><a href="#">Russe (Ru)</a></li>
                <li><a href="#">Français (FR)</a></li>
                <li><a href="#">Espanol (Es)</a></li>
              </ul>
            </li>
            <li class="dropdown default-dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">XOF <i class="fa fa-caret-down"></i></a>
              <ul class="custom-menu">
                <li><a href="#">Franc CFA (XOF)</a></li>
                <li><a href="#">USD ($)</a></li>
                <li><a href="#">EUR (€)</a></li>
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <!-- /top Header -->

    <!-- header -->
    <div id="header">
      <div class="container">
        <div class="pull-left">
          <!-- Logo -->
          <div class="header-logo">
            <a class="logo" href="<?= site_url('dashbord','accueil'); ?>">
              <img src="<?= img_url('assets/img/','logo.png'); ?>" alt="">
            </a>
          </div>
          <!-- /Logo -->

          <!-- Search -->
          <div class="header-search">
            <form>
                <input class="input search-input" type="text" placeholder="Entrez votre mot clé">
                <select class="selectpicker form-control input search-categories">
                    <option value="0" selected>Toutes Catégories</option>
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
                <button class="search-btn"><i class="fa fa-search"></i></button>
            </form>
          </div>
          <!-- /Search -->
        </div>
        <div class="pull-right">
          <ul class="header-btns">
            <!-- Account -->
            <li class="header-account dropdown default-dropdown">
              <div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
                <div class="header-btns-icon">
                  <i class="fa fa-user-o"></i>
                </div>
                <strong class="text-uppercase">Mon compte <i class="fa fa-caret-down"></i></strong>
              </div>
              <span class="text-uppercase"><?php if ($titulaire || $titulaire!="") echo $titulaire; else echo "XXXXXXXX"; ?></span>
              <ul class="custom-menu">
                <li><a href="<?= site_url('dashbord','add_annonce'); ?>"><i class="fa fa-exchange"></i> Publier une annonce</a></li>
                <li><a href="<?= site_url('dashbord'); ?>"><i class="fa fa-heart-o"></i> Les annonces plus vues</a></li>
                <li><a href="<?= site_url('dashbord'); ?>"><i class="fa fa-user-plus"></i> Mon profil</a></li>
                <li><a href="<?= site_url('dashbord','deconnexion'); ?>"><i class="fa fa-lock"></i> Déconnexion</a></li>
              </ul>
            </li>
            <!-- /Account -->

            <!-- Mobile nav toggle-->
            <li class="nav-toggle">
              <button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
            </li>
            <!-- / Mobile nav toggle -->
          </ul>
        </div>
      </div>
      <!-- header -->
    </div>
    <!-- container -->
  </header>
  <!-- /HEADER -->

  <!-- NAVIGATION -->
  <div id="navigation">
    <!-- container -->
    <div class="container">
      <div id="responsive-nav">
        <!-- category nav -->
        <div class="category-nav show-on-click">
          <span class="category-header">Catégories <i class="fa fa-list"></i></span>
          <ul class="category-list">
            <?php
            $i=0;
            foreach ($list_categorie as $categorie) :
              $i++;
              if ($i<=6) {
            ?>
                <li><a href="<?= $categorie['id']; ?>"><?= $categorie['libelle']; ?></a></li>
            <?php
              } else {
                break;
              }
            endforeach;
            ?>
            <li><a href="#">Toutes les catégories</a></li>
          </ul>
        </div>
        <!-- /category nav -->

        <!-- menu nav -->
        <div class="menu-nav">
          <span class="menu-header">Menu <i class="fa fa-bars"></i></span>
          <ul class="menu-list">
            <li class="dropdown mega-dropdown full-width"><a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"> ACCUEIL <i class="fa fa-caret-down"></i></a>
              <div class="custom-menu">
                <div class="row">
                  <div class="col-md-4">
                    <div class="hidden-sm hidden-xs">
                      <a class="banner banner-1" href="<?= site_url('dashbord','accueil'); ?>">
                        <img src="<?= img_url('assets/img/','logo.png'); ?>" alt="">
                        <div class="banner-caption text-center">
                          <!-- <h3 class="white-color text-uppercase">Easylinked</h3> -->
                        </div>
                      </a>
                    </div>
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title text-center"><a href="<?= site_url('dashbord','accueil'); ?>">Page 1</a></h3>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-4">
                    <div class="hidden-sm hidden-xs">
                      <a class="banner banner-1" href="<?= site_url('dashbord','accueil'); ?>">
                        <img src="<?= img_url('assets/img/','logo.png'); ?>" alt="">
                        <div class="banner-caption text-center">
                          <!-- <h3 class="white-color text-uppercase">Easylinked</h3> -->
                        </div>
                      </a>
                    </div>
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title text-center"><a href="<?= site_url('dashbord','accueil'); ?>">Page 2</a></h3>
                      </li>
                    </ul>
                  </div>
                  <div class="col-md-4">
                    <div class="hidden-sm hidden-xs">
                      <a class="banner banner-1" href="<?= site_url('dashbord','accueil'); ?>">
                        <img src="<?= img_url('assets/img/','logo.png'); ?>" alt="">
                        <div class="banner-caption text-center">
                          <!-- <h3 class="white-color text-uppercase">Easylinked</h3> -->
                        </div>
                      </a>
                    </div>
                    <ul class="list-links">
                      <li>
                        <h3 class="list-links-title text-center"><a href="<?= site_url('dashbord','accueil'); ?>">Page 3</a></h3>
                      </li>
                    </ul>
                  </div>
                </div>
              </div>
            </li>
            <li><a href="<?= site_url('dashbord','all_annonces'); ?>">Toutes les annonces</a></li>
            <li><a href="<?= site_url('dashbord','boutiques'); ?>">La boutique</a></li>
            <li><a href="<?= site_url('dashbord','contactez_nous'); ?>">Contactez-nous</a></li>
          </ul>
        </div>
        <!-- menu nav -->
      </div>
    </div>
    <!-- /container -->
  </div>
  <!-- /NAVIGATION -->

  <!-- section -->
  <div class="section section-grey">
      <!-- container -->
      <div class="container">
          
        <div class="page-content">
            <div class="row">
              <div class="col-md-3">
                <div class="sidebar content-box" style="display: block;">
                  <ul class="nav bg-nav">
                      <!-- Main menu -->
                      <li class="current"><a href="<?= site_url('dashbord'); ?>"><i class="glyphicon glyphicon-home"></i> Tableau de bord</a></li>
                      <li><a href="<?= site_url('dashbord','annonces'); ?>"><i class="glyphicon glyphicon-th-list"></i> Les annonces</a></li>
                      <li><a href="<?= site_url('dashbord','boutique'); ?>"><i class="glyphicon glyphicon-shopping-cart"></i> La boutique</a></li>
                  </ul>
                </div>
              </div>
              <div class="col-md-9">
                <div class="bg-content">
                  <!-- Conteneur de la page chargée -->
                  <?php $this->load->view($page); ?>
                </div>
              </div>
            </div>
      </div>

    </div>
      <!-- /container -->
  </div>
  <!-- /section -->

  <!-- section -->
  <div class="section">
      <!-- container -->
      <div class="container">
        <!-- row -->
        <div class="row">
          <!-- section-title -->
          <div class="col-md-12">
            <div class="section-title">
              <h2 class="title">Les dernières annonces</h2>
              <div class="pull-right">
                <div class="product-slick-dots-1 custom-dots"></div>
              </div>
            </div>
          </div>
          <!-- /section-title -->

          <!-- banner -->
          <div class="col-md-3 col-sm-6 col-xs-6">
            <!-- Bannière de publicité -->
            <?php $data = ""; ?>
            <?php $this->load->view('donnees_charges/view_banniere_pub_bottom',$data,false); ?>
          </div>
          <!-- /banner -->

          <!-- Product Slick -->
          <div class="col-md-9 col-sm-6 col-xs-6">
            <!-- Annonces VIP -->
            <?php $data = ""; ?>
            <?php $this->load->view('donnees_charges/view_annonces_vip',$data,false); ?>
          </div>
          <!-- /Product Slick -->            
          
        </div>
        <!-- /row -->
      </div>
      <!-- /container -->
  </div>
  <!-- /section -->

  <!-- FOOTER -->
  <footer id="footer" class="section section-grey">
    <!-- container -->
    <div class="container">
      <!-- row -->
      <div class="row">
        <!-- footer widget -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="footer">
            <!-- footer logo -->
            <div class="footer-logo">
              <a class="logo" href="<?= site_url('dashbord','accueil'); ?>">
                <img src="<?= img_url('assets/img/','logo.png'); ?>" alt="">
              </a>
            </div>
            <!-- /footer logo -->
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna
              <br>Cel : +225000000000 
            </p>

            <!-- footer social -->
            <ul class="footer-social">
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-instagram"></i></a></li>
              <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
              <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
            </ul>
            <!-- /footer social -->
          </div>
        </div>
        <!-- /footer widget -->

        <!-- footer widget -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="footer">
            <h3 class="footer-header">Les services</h3>
            <ul class="list-links">
              <li><a href="#">Comment ça marche ?</a></li>
              <li><a href="#">Comment vendre rapidement ?</a></li>
              <li><a href="#">Booster une annonce</a></li>
              <li><a href="#">Aide</a></li>
            </ul>
          </div>
        </div>
        <!-- /footer widget -->

        <div class="clearfix visible-sm visible-xs"></div>

        <!-- footer widget -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="footer">
            <h3 class="footer-header">Les pages du site</h3>
            <ul class="list-links">
              <li><a href="#">Accueil</a></li>
              <li><a href="#">Toutes les annonces</a></li>
              <li><a href="#">Annonceurs</a></li>
              <li><a href="#">Contactez-nous</a></li>
            </ul>
          </div>
        </div>
        <!-- /footer widget -->

        <!-- footer subscribe -->
        <div class="col-md-3 col-sm-6 col-xs-6">
          <div class="footer">
            <h3 class="footer-header">Rester connecté</h3>
            <p>Recevoir les nouvelles annonces par mail</p>
            <form>
              <div class="form-group">
                <input class="input" placeholder="Enter Email Address">
              </div>
              <button class="primary-btn">S'inscrire à la newsletter</button>
            </form>
          </div>
        </div>
        <!-- /footer subscribe -->
      </div>
      <!-- /row -->
      <hr>
      <!-- row -->
      <div class="row">
        <div class="col-md-8 col-md-offset-2 text-center">
          <!-- footer copyright -->
          <div class="footer-copyright">
            <p>© Copyright 2019. Tous droits réservés. Réalisé par AZATASS.</p>
          </div>
          <!-- /footer copyright -->
        </div>
      </div>
      <!-- /row -->
    </div>
    <!-- /container -->
  </footer>
  <!-- /FOOTER -->

  <!-- Effet de chargement de la page -->
  <div class="loader_page"></div>

  <!-- jQuery Plugins -->
  <script src="<?= js_url('assets/js/','jquery.min'); ?>"></script>
  <!-- jQuery UI -->
  <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
  <script src="<?= js_url('assets/js/','bootstrap.min'); ?>"></script>
  <script src="<?= js_url('assets/js/','slick.min'); ?>"></script>
  <script src="<?= js_url('assets/js/','nouislider.min'); ?>"></script>
  <script src="<?= js_url('assets/js/','jquery.zoom.min'); ?>"></script>

  <!-- Début Script Dashbord -->
  <!-- Page level plugin JavaScript-->
  <script src="<?= js_url('assets/dashbord/vendor/datatables/','jquery.dataTables'); ?>"></script>
  <script src="<?= js_url('assets/dashbord/vendor/datatables/','dataTables.bootstrap4'); ?>"></script>

  <!-- Demo scripts for this page-->
  <script src="<?= js_url('assets/dashbord/js/demo/','datatables-demo'); ?>"></script>
  <!-- Fin Script Dashbord -->

  
  <!-- Script validation -->
  <script src="<?= js_url('assets/js/validate.form/','jquery-validate.min'); ?>"></script>

  <script src="<?= js_url('assets/js/','main'); ?>"></script>
  
  <?php if (isset($js_page) && $js_page!=""): ?>
    <script src="<?= js_url('assets/js/js.page/',$js_page); ?>"></script>
  <?php endif ?>


  <!-- Pagination -->
  <script src="<?= js_url('assets/js/pagination/','pagination.min'); ?>"></script>
  <script type="text/javascript">
    $(function() {
        $('.view_page').hide(); // Cacher toute les pages
        $('#page_1').show(500); // Afficher la première page

        $('#page').Pagination({
            size: "<?= $nbre_post_total; ?>", //Nombre total d'éléments
            pageShow: 5, //Nombre de page à afficher
            page: 1, //Page affichée
            limit: "<?= $nbre_post_par_page; ?>", //Nombre élément par page
        }, function(obj){
            $('.view_page').hide(500);
            $('#page_'+obj.page).show(500);
        });
        $('.pagination').children('li').eq(1).addClass('active'); 
        // Séléctionne la première page
    });
  </script>
  <!-- Pagination -->

</body>

</html>







