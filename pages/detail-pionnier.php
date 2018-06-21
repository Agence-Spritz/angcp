<?php	// Requête pour récupérer le contenu de la page concernée
		list($id, $titrep, $date, $rub, $textep) = mysqli_fetch_array(mysqli_query($link, "SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='pionnier' AND ID='$id' "));	
		
?>

<!-- Start main-content -->
  <div class="main-content allpages">
  
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="'images/pages-don-d-organes-coeur-poumons-belgique/<?=$id?>.jpg'">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-12 xs-text-center">
              <h3 class="title text-white"><?php echo $titrep; ?></h3>
              <ol class="breadcrumb mt-10 white">
                <li><a class="text-white" href="<?php echo $defaultpg; ?>.php">Accueil</a></li>
                <li><a class="text-white" href="quelques-pionniers--175--pionniers">Quelques pionniers</a></li>
                <li class="active text-theme-colored"><?php echo $titrep; ?></li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: Blog -->
    <section id="blog">
      <div class="container mt-30 mb-30 pt-30 pb-30">
        <div class="row">
          <div class="col-md-8 col-md-offset-2">
            <div class="blog-posts single-post">
              <article class="post clearfix mb-0">
                <div class="entry-header">
                  	<div class="post-thumb thumb">
	                  	<?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg')) { ?>
							<img class="img-responsive img-fullwidth" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg'; ?>" title="<?php echo $titrep; ?>" alt="<?php echo $titrep; ?>">
						<?php } else { ?>
							<img alt="" class="img-responsive img-fullwidth" src="./images/photo-replace.jpg">
						<?php } ?>
	                </div>
                </div>
                <div class="entry-content">
                  <div class="entry-meta media no-bg no-border mt-15 pb-20">
                    
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0"><a href="#"><?php echo $titrep; ?></a></h4>
                      </div>
                    </div>
                  </div>
                  <p class="mb-15"><?php echo $textep; ?></p>
                  <div class="mt-30 mb-0">
                    <h5 class="pull-left mt-10 mr-20 text-theme-colored">Partager :</h5>
                    <ul class="styled-icons icon-circled m-0">
                      <li><a href="http://www.facebook.com/sharer.php?u=http://<?=$_SERVER['HTTP_HOST']?><?=$_SERVER[REQUEST_URI]?>&t=<?=$titrep?>" data-bg-color="#3A5795" target="_blank"><i class="fa fa-facebook text-white"></i></a></li>
                      <li><a href="http://twitter.com/intent/tweet/?url=<?=$_SERVER['HTTP_HOST']?><?=$_SERVER[REQUEST_URI]?>&text=<?=$titrep?>" data-bg-color="#55ACEE" target="_blank"><i class="fa fa-twitter text-white"></i></a></li>
                      <li><a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=$_SERVER['HTTP_HOST']?><?=$_SERVER[REQUEST_URI]?>&title=<?=$ogtitre?>" data-bg-color="#A11312" target="_blank"><i class="fa fa-linkedin text-white"></i></a></li>
                    </ul>
                  </div>
                </div>
              </article>
              
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
  
  
    