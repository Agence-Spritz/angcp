<?php // On démarre la session AVANT d'écrire du code HTML
session_start(); ?>
<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
	
	<!-- Ajouts liés à l'admin Remixweb -->	
	
		<!-- GOOGLE ANALYTICS -->
		<?	list($script_google, $nom_titre_meta, $url_site, $coordonnees) = mysqli_fetch_array(mysqli_query($link, "SELECT google_stats,nom_titre_meta,url_site,coordonnees FROM ".$table_prefix."_divers WHERE ID=1 "));
	        echo ("$script_google"); 
	    ?>
	    <?php include ("inc/meta.php"); ?>
	    <?php 
		setlocale(LC_TIME, 'fr','fr_FR','fr_FR@euro','fr_FR.utf8','fr-FR','fra');
		?>

<!-- Meta Tags -->
<meta name="viewport" content="width=device-width,initial-scale=1.0"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>

<meta name="author" content="Remixweb" />

<!-- Stylesheet -->
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css">
<link href="css/animate.css" rel="stylesheet" type="text/css">
<link href="css/css-plugin-collections.css" rel="stylesheet"/>
<link href="css/style.css" rel="stylesheet" type="text/css">
<!-- CSS | menuzord megamenu skins -->
<link id="menuzord-menu-skins" href="css/menuzord-skins/menuzord-boxed.css" rel="stylesheet"/>
<!-- CSS | Main style file -->
<link href="css/style-main.css" rel="stylesheet" type="text/css">
<!-- CSS | Preloader Styles -->
<link href="css/preloader.css" rel="stylesheet" type="text/css">
<!-- CSS | Custom Margin Padding Collection -->
<link href="css/custom-bootstrap-margin-padding.css" rel="stylesheet" type="text/css">
<!-- CSS | Responsive media queries -->
<link href="css/responsive.css" rel="stylesheet" type="text/css">
<!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
<!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

<!-- Revolution Slider 5.x CSS settings -->
<link  href="js/revolution-slider/css/settings.css" rel="stylesheet" type="text/css"/>
<link  href="js/revolution-slider/css/layers.css" rel="stylesheet" type="text/css"/>
<link  href="js/revolution-slider/css/navigation.css" rel="stylesheet" type="text/css"/>

<!-- CSS | Theme Color -->
<link href="css/colors/theme-skin-red.css" rel="stylesheet" type="text/css">

<!-- external javascripts -->

<script src="js/jquery-2.2.4.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!-- JS | jquery plugin collection for this theme -->
<script src="js/jquery-plugin-collection.js"></script>

<!-- Revolution Slider 5.x SCRIPTS -->
<script src="js/revolution-slider/js/jquery.themepunch.tools.min.js"></script>
<script src="js/revolution-slider/js/jquery.themepunch.revolution.min.js"></script>

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<div id="wrapper" class="clearfix">
  <!-- preloader -->
  <div id="preloader">
    <div id="spinner">
      <img src="images/preloaders/1.gif" alt="">
    </div>
    <div id="disable-preloader" class="btn btn-default btn-sm">Passer l'introduction</div>
  </div>

  <!-- Header -->
  <header id="header" class="header">
	  
	<?php if($pg == $defaultpg) { ?> 
    <div class="header-nav navbar-fixed-top header-dark navbar-white navbar-transparent bg-transparent-1 navbar-sticky-animated animated-active">
      <div class="header-nav-wrapper">
	<?php } else { ?>   
	<div class="header-nav">
      <div class="header-nav-wrapper navbar-scrolltofixed bg-lightest">
	<?php } ?>     
	      
        <div class="container">
          <nav id="menuzord-right" class="menuzord blue no-bg"><a class="menuzord-brand pull-left flip xs-pull-center mb-15" href="<?php echo $defaultpg; ?>.php" <?php if ($pg==$defaultpg) { echo 'active'; } else { echo ''; } ?>><img src="images/logo-wide.png" alt=""></a>
            <ul class="menuzord-menu">
	            <?php // On va chercher les pages parentes
	        	$req_parente = mysqli_query($link,"SELECT ID, id_page_parente FROM ".$table_prefix."_pages WHERE page='page' and ID='".$id."'");
				$data_parente = mysqli_fetch_assoc($req_parente);
				?>
              <li class="<?php if ($data_parente['id_page_parente']==147) { echo 'active'; } ?>"><a href="#">A propos</a>
                <ul class="dropdown">
	                <?php 	$req = mysqli_query($link,"SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='page' AND id_page_parente = '147' ORDER BY ID ASC"); 
				  			while ($data = mysqli_fetch_array($req)) {
					?>
                      <li class="<?php if ($id==$data['ID']) { echo 'active'; } ?>"><a href="a-propos-angcp-greffe-coeur-poumons--<?php echo $data['ID']; ?>--page"><?php echo $data['titre']; ?></a></li>
                    <?php } ?>
                </ul>
              </li>

              <li class="<?php if ($data_parente['id_page_parente']==156) { echo 'active'; } ?>"><a href="#">Le don d'organes</a>
                <ul class="dropdown">
	                <?php 	$req = mysqli_query($link,"SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='page' AND id_page_parente = '156' AND id<>'157' ORDER BY ID ASC"); 
				  			while ($data = mysqli_fetch_array($req)) {
					?>
                      <li class="<?php if ($id==$data['ID']) { echo 'active'; } ?>"><a href="don-d-organes-coeur-poumons-belgique--<?php echo $data['ID']; ?>--page"><?php echo $data['titre']; ?></a></li>
                    <?php } ?>
                    <li class="<?php if ($id==157) { echo 'active'; } ?>"><a href="don-d-organes-coeur-poumons-belgique--157--faq">FAQ Don d'organes</a></li>
                </ul>
              </li>

                <li class="<?php if ($data_parente['id_page_parente']==162) { echo 'active'; } ?>"><a href="#">Transplantation</a>
                  <ul class="dropdown">
                    <?php 	$req = mysqli_query($link,"SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='page' AND id_page_parente = '162' ORDER BY ID ASC"); 
				  			while ($data = mysqli_fetch_array($req)) {
					?>
                      <li class="<?php if ($id==$data['ID']) { echo 'active'; } ?>"><a href="transplantation-coeur-poumon--<?php echo $data['ID']; ?>--page"><?php echo $data['titre']; ?></a></li>
                    <?php } ?>
                  </ul>
                </li>

                <li class="<?php if ($data_parente['id_page_parente']==170) { echo 'active'; } ?>"><a href="#">Traitements</a>
                  <ul class="dropdown">
                    <?php 	$req = mysqli_query($link,"SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='page' AND id_page_parente = '170' ORDER BY ID ASC"); 
				  			while ($data = mysqli_fetch_array($req)) {
					?>
                      <li class="<?php if ($id==$data['ID']) { echo 'active'; } ?>"><a href="traitements-greffe-coeur-poumons--<?php echo $data['ID']; ?>--page"><?php echo $data['titre']; ?></a></li>
                    <?php } ?>
                  </ul>
                </li>

                <li class="<?php if ($id==176) { echo 'active'; } ?>"><a href="temoignages-transplantation-belgique--176--page">Témoignages</a></i>

                <li class="<?php if ($data_parente['id_page_parente']==177) { echo 'active'; } ?>"><a href="#">Médias</a>
                  <ul class="dropdown">
                    <?php 	$req = mysqli_query($link,"SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='page' AND id_page_parente = '177' ORDER BY ID ASC"); 
				  			while ($data = mysqli_fetch_array($req)) {
					?>
                      <li class="<?php if ($id==$data['ID']) { echo 'active'; } ?>"><a href="don-d-organes-coeur-poumons-belgique--<?php echo $data['ID']; ?>--page"><?php echo $data['titre']; ?></a></li>
                    <?php } ?>
                  </ul>
                </li>

                <li class="<?php if ($id==135) { echo 'active'; } ?>"><a href="contact-angcp-greffe-coeur-poumon--135--contact" title="Contactez-nous">Contact</a></li>
            </ul>
          </nav>
        </div>
      </div>
    </div>
  </header>

  <!-- Contenu principal
	================================================== -->
   <div> <?php include ("pages/".$pg.".php"); ?></div>

  <!-- Footer -->
  <footer id="footer" class="footer pb-0" data-bg-img="images/footer-bg.png" data-bg-color="#25272e">
    <div class="container pt-90 pb-60">

      <div class="row">
        <div class="col-md-12">
          <div class="horizontal-contact-widget mt-30 pt-30 text-center">
            <div class="col-sm-12 col-sm-4">
              <div class="each-widget"> <i class="pe-7s-phone font-36 mb-10"></i>
                <h5 class="text-white">Nous soutenir</h5>
                <p>Belfius <a href="https://www.belfius.be" target="_" title="Belfius"> BE95 0014 5827 4758 </a></p>
              </div>
            </div>
            <div class="col-sm-12 col-sm-4 mt-sm-50">
              <div class="each-widget"> <i class="pe-7s-map font-36 mb-10"></i>
                <h5 class="text-white">Adresse</h5>
                <p>Hôpital Erasme - Route de Lennik, 808 - Bruxelles</p>
              </div>
            </div>
            <div class="col-sm-12 col-sm-4 mt-sm-50">
              <div class="each-widget"> <i class="pe-7s-mail font-36 mb-10"></i>
                <h5 class="text-white">Email</h5>
                <p><a href="mailto:info@angcp.be" target="_blank">info <i class='fa fa-at'></i> angcp.be</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
		    <ul class="list-inline styled-icons icon-hover-theme-colored icon-gray icon-circled text-center mt-30 mb-10">
				<li><a target="_blank" href="http://twitter.com/intent/tweet/?url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&text=<?=$ogtitre?>">
						<i class="fa fa-twitter"></i>
					</a>
				</li>
				<li><a target="_blank" href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&t=<?=$ogtitre?>">
						<i class="fa fa-facebook"></i>
					</a>
				</li>
				<li><a target="_blank" href="https://plus.google.com/share?url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>">
						<i class="fa fa-google-plus"></i>
					</a>
				</li>
				<li><a target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&amp;url=<?=$_SERVER[HTTP_HOST]?><?=$_SERVER[REQUEST_URI]?>&title=<?=$ogtitre?>">
						<i class="fa fa-linkedin"></i>
					</a>
				</li>
			</ul>
        </div>
      </div>
    </div>
    <div class="container-fluid bg-theme-colored p-20 subfooter">
      <div class="row text-center">
        <div class="col-md-12">
          <p class="text-white font-11 m-0">&copy;2018 ANGCP-NVHL. <a href="mentions-legales-angcp--1--page" title="Contactez-nous">Mentions</a> - <a href="credits-angcp--181--page" title="Contactez-nous">Crédits</a> - Création du site <a href="https://www.remixweb.eu" title="Création de sites" target="_blank">Remix Web</a> <img src='images/Salamandre.png'></p>
        </div>
      </div>
    </div>
  </footer>
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a></div>
<!-- end wrapper -->

<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script src="js/custom.js"></script>

<!-- SLIDER REVOLUTION 5.0 EXTENSIONS
      (Load Extensions only on Local File Systems !
       The following part can be removed on Server for On Demand Loading) -->
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.actions.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.carousel.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.migration.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.navigation.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.parallax.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js"></script>
<script type="text/javascript" src="js/revolution-slider/js/extensions/revolution.extension.video.min.js"></script>

</body>
</html>
