<!-- Start main-content -->
  <div class="main-content">
    <!-- Section: home -->
    <section id="home" class="divider parallax fullscreen" data-stellar-background-ratio="0.4" data-bg-img="images/accueil-don-du-coeur-belgique.jpg">
      <div class="display-table">
        <div class="display-table-cell">
          <div class="container pt-100 pb-100">
            <div class="row">
              <div class="col-md-7 col-md-push-5">
                <div class="inline-block pb-60 pl-40 pr-40 pt-90">
                  <h3 class="font-28 font-weight-300 text-left">&nbsp;</h3>
                  <h2 class="font-60 text-white text-uppercase line-height-1"><span class="text-theme-colored">&nbsp;</span></h2>
                  <p>&nbsp;</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Call To Action -->
    <section class="bg-theme-colored bandeau-liens">
      <div class="container pt-0 pb-20">
        <div class="row">
          <div class="call-to-action pt-20 pb-20">
            <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
              <i class="flaticon-medical-hospital14 text-white font-36 pull-left flip mt-15 mr-20"></i>
              <h4 class="font-16 font-weight-600 text-white">Soutenir notre Association</h4>
              <h6 class="text-white"><a href="contact-angcp-greffe-coeur-poumon--135--contact" title="Contactez-nous">Devenir Membre, Dons, Goodies...</a></h6>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 mb-sm-30">
              <i class="flaticon-medical-hospitals text-white font-36 pull-left flip mt-15 mr-20"></i>
              <h4 class="font-16 font-weight-600 text-white">Hôpital Erasme</h4>
              <h6 class="text-white">Route de Lennik, 808 - Bruxelles</h6>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4">
              <i class="flaticon-medical-medical50 text-white font-36 pull-left flip mt-15 mr-20"></i>
              <h4 class="font-16 font-weight-600 text-white">Nous contacter</h4>
              <h6 class="text-white"><a href="contact-angcp-greffe-coeur-poumon--135--contact" title="Contactez-nous">Envoyez-nous un email ></a></h6>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section: About -->
    <section class="">
      <div class="container pb-0">
        <div class="section-content">
          <div class="row">
	        <?php 
	        	$req = mysqli_query($link,"SELECT ID, titre, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='page' and rub='edito'");
				$data = mysqli_fetch_assoc($req);
			?>
			<?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$data['ID'].'.jpg')) { ?>
	            <div class="col-md-4">
	              <img style="width: 100%;" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$data['ID'].'.jpg'; ?>" alt="<?php echo $data['titre']; ?>" title="<?php echo $data['titre']; ?>" >
	            </div>
	        <?php } ?>
	        
            <div class="col-md-8">
              <h3 class="text-gray">Edito</h3>
              <h2 class="mt-0 text-theme-colored"><?php echo $data['titre']; ?></h2>
              <p class="font-weight-600">
                  <?php echo $data['texte']; ?>
              </p>
              <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FANGCP.NVHL.asbl&tabs=timeline&width=500&height=70&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=235382260148315" width="500" height="140" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
<!--               <a href="#" class="btn btn-theme-colored mt-20 mb-sm-50">En savoir <i class="fa fa-plus"></i></a> -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <br >/<br />

    <!-- VIDEO  -->
    <section class="divider parallax layer-overlay overlay-theme-colored-9" data-bg-img="images/don-d-organes.jpg" data-parallax-ratio="0.7">
      <div class="container pt-100 pb-100">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12 text-center">
              <h3 class="text-white text-uppercase font-30 font-weight-600 mt-0 mb-20">Dites OUI au don d'organes</h3>
			  <a href="tout-savoir-sur-le-don-d-organes--146--page" class="btn btn-theme-colored mt-20 mb-sm-50">Tout savoir sur le don d'organes</a>
<!--               <a href="https://www.youtube.com/watch?v=gGLzevECQkY" data-lightbox-gallery="youtube-video"><i class="fa fa-play-circle text-white font-72"></i> -->
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ACTUS -->
    <section id="blog">
      <div class="container">
        <div class="section-title text-center">
          <div class="row">
            <div class="col-md-8 col-md-offset-2">
              <h2 class="text-uppercase mt-0 line-height-1">Actualités</h2>
              <div class="title-icon">
                <img class="mb-10" src="images/title-icon.png" alt="">
              </div>
              <p>Restez informé de l'évolution des greffes cardiaques et pulmonaires<br> <b>avec l'Angcp</</p>
            </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <div class="owl-carousel-3col">
	              
	              	<?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='blog' AND masquer <> '1'  ORDER BY dbu DESC"); 
				  	while ($data = mysqli_fetch_array($req)) { 
					  	
					  	//$date = date_fr($data['dbu']);
					  	$date = new DateTime($data['dbu']);
					  	
					  	 
					?>
					
	                <div class="item">
	                  <article class="post clearfix bg-lighter">
	                    <div class="entry-header">
	                      <div class="post-thumb thumb">
		                      <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$data['ID'].'.jpg')) { ?>
									<img src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$data['ID'].'.jpg'; ?>" alt="<?php echo $data['titre']; ?>" title="<?php echo $data['titre']; ?>" />
								<?php } else { ?>
									<img src="images/depertments/s2.jpg" alt="Association nationale des greffés cardiaques et pulmonaires" title="Association nationale des greffés cardiaques et pulmonaires" class="img-responsive img-fullwidth">
								<?php } ?>
	                      </div>
	                      <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
	                        <ul>
	                          <li class="font-16 text-white font-weight-600"><?php echo $date->format('d'); ?></li>
	                          <li class="font-12 text-white text-uppercase"><?php echo $date->format('M'); ?></li>
	                        </ul>
	                      </div>
	                    </div>
	                    <div class="entry-content p-15 pt-10 pb-10">
	                      <div class="entry-meta media no-bg no-border mt-0 mb-10">
	                        <div class="media-body pl-0">
	                          <div class="event-content pull-left flip">
	                            <h4 class="entry-title text-white text-uppercase font-weight-600 m-0 mt-5"><a href="<?php echo slugify($data['titre']); ?>--don-d-organes-coeur-poumons-belgique--<?php echo $data['ID'] ?>--detail-actu"><?php echo $data['titre']; ?></a></h4>
	                          </div>
	                        </div>
	                      </div>
	                      <p class="mt-5"><?php echo cleanCut($data['texte'], 120); ?></p>
	                      <a class="text-theme-color-2 font-12 ml-5" href="<?php echo slugify($data['titre']); ?>--don-d-organes-coeur-poumons-belgique--<?php echo $data['ID'] ?>--detail-actu"> En savoir <i class="fa fa-plus"></i></a>
	                    </div>
	                  </article>
	                </div>
                
                <?php } ?>
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- SPONSORS -->
    <section class="clients bg-theme-colored">
      <div class="container pt-0 pb-0">
        <div class="row">
          <div class="col-md-12">
            <!-- Section: Clients -->
            <div class="owl-carousel-6col clients-logo transparent text-center">
              <div class="item"> <a href="#"><img src="images/clients/w1.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w2.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w3.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w4.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w5.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w6.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w3.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w4.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w5.png" alt=""></a></div>
              <div class="item"> <a href="#"><img src="images/clients/w6.png" alt=""></a></div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->