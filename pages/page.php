<!-- PAGE CONTENU
================================================== -->
<?php	// CONTENU
	list($titrep, $id_page_parente, $textep, $texte2p, $texte3p, $modele_de_page) = mysqli_fetch_array(mysqli_query($link, "SELECT titre,id_page_parente,texte,texte2,texte3,modele_de_page FROM ".$table_prefix."_pages WHERE page='page' AND ID='$id' "));
		
		if($id_page_parente) {
		// On va chercher la page parente
	        $req_parente = mysqli_query($link,"SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='page' and ID='".$id_page_parente."'");
			$data_parente = mysqli_fetch_assoc($req_parente);
			
			$page_parente = $data_parente['titre'];
		} ?>

	<!-- Start main-content -->
	<div class="main-content">
    
    <!-- ---------------
	
	Modèle de page : 1
	
	------------------ -->
	
	<?php if($modele_de_page==1) { ?>
	
	
	    <!-- Section: inner-header -->
	    <section class="inner-header divider parallax layer-overlay overlay-white-6" data-bg-img="<?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg')) {  echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg'; } ?>">
	      <div class="container pt-60 pb-60">
	        <!-- Section Content -->
	        <div class="section-content">
	          <div class="row">
	            <div class="col-md-12 text-center">
	              <h2 class="title"><?php echo $titrep; ?></h2>
	              <ol class="breadcrumb text-center text-black mt-10">
	                <li><a href="<?php echo $defaultpg; ?>.php">Accueil</a></li>
	                <?php if($id_page_parente) { ?>
	                	<li><a href="#"><?php echo $page_parente; ?></a></li>
		            <?php } ?>
	                <li class="active text-theme-colored"><?php echo $titrep; ?></li>
	              </ol>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
    
	    <!-- Section: texte 1 -->
	    <section class="bg-lighter">
	      <div class="container">
	        <div class="row">
	          <div class="col-md-12">
<!--
		          <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg')) { ?>
						<img class="pull-left flip mr-15 thumbnail" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg'; ?>" alt="<?php echo $titrep; ?>" title="<?php echo $titrep; ?>">
					<?php } ?>
-->
	            <p><?php echo $textep; ?></p>
	            <div class="clearfix"></div>
	            
	        <!-- Section: texte 2 --> 
		        <?php if($texte2p) { ?>   
		            <p><?php echo $texte2p; ?></p>
		        <?php } ?>
	        <!-- Section: Images 2, 3, 4, 5 -->
	        
	        	<?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg')) { ?>  
	        		<div class="separator separator-rouned">
		              <i class="fa fa-cog fa-spin"></i>
		            </div>
		        
		            <div class="row">
			          <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg')) { ?>
		              	<div class="col-xs-6 col-md-3"> <a class="thumbnail" href="#"> <img alt="don-d-organes-coeur-poumons-belgique" title="don-d-organes-coeur-poumons-belgique" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg'; ?>" class="img-fullwidth"> </a> </div>
		              <?php } ?>
		              
		              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg')) { ?>
		              	<div class="col-xs-6 col-md-3"> <a class="thumbnail" href="#"> <img alt="don-d-organes-coeur-poumons-belgique" title="don-d-organes-coeur-poumons-belgique" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg'; ?>" class="img-fullwidth"> </a> </div>
		              <?php } ?>
		              
		              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg')) { ?>
		              	<div class="col-xs-6 col-md-3"> <a class="thumbnail" href="#"> <img alt="don-d-organes-coeur-poumons-belgique" title="don-d-organes-coeur-poumons-belgique" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg'; ?>" class="img-fullwidth"> </a> </div>
		              <?php } ?>
		              
		              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-4.jpg')) { ?>
		              	<div class="col-xs-6 col-md-3"> <a class="thumbnail" href="#"> <img alt="don-d-organes-coeur-poumons-belgique" title="don-d-organes-coeur-poumons-belgique" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-4.jpg'; ?>" class="img-fullwidth"> </a> </div>
		              <?php } ?>
		              
		            </div>
	            <?php } ?>
	           
	        <!-- Section: texte 3 -->
	        	<?php if($texte3p) { ?>
		         	<div class="separator separator-rouned">
		              <i class="fa fa-cog"></i>
		            </div>
		            <p><?php echo $texte3p; ?></p>
		            </div>
	            <?php } ?>
	        </div>
	      </div>
	    </section>
	    
	<!-- ---------------
	
	Modèle de page : 2
	
	------------------ -->
    
    <?php } else if($modele_de_page==2) { ?>
    
	    <section class="inner-header divider parallax layer-overlay overlay-dark-8" <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg')) { ?>data-bg-img="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg'; ?>"<?php } ?>>
	      <div class="container pt-60 pb-60">
	        <!-- Section Content -->
	        <div class="section-content">
	          <div class="row"> 
	            <div class="col-md-12 xs-text-center">
	              <h3 class="title text-white"><?php echo $titrep; ?></h3>
	              <ol class="breadcrumb mt-10 white">
	                <li><a class="text-white" href="<?php echo $defaultpg; ?>.php">Accueil</a></li>
	                <?php if($id_page_parente) { ?>
	                	<li><a class="text-white" href="#"><?php echo $page_parente; ?></a></li>
	                <?php } ?>
	                <li class="active text-theme-colored"><?php echo $titrep; ?></li>
	              </ol>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	
	    <!-- Section: texte 1 -->
	    <section class=" bg-lighter">
	      <div class="container pb-20">
	        <div class="section-title text-center">
	          <div class="row">
	            <div class="col-md-8 col-md-offset-2">
	              <h2 class="text-uppercase mt-0 line-height-1"><?php echo $titrep; ?></h2>
	              <div class="title-icon">
	                <img class="mb-10" src="images/title-icon.png" alt="<?php echo $titrep; ?>">
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="section-content">
	          <div class="row">
	            <div class="col-xs-12 col-sm-12 col-md-12 mb-50">
	              <p><?php echo $textep; ?></p>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	
		<?php if($texte2p) { ?>
	    <!-- Section: texte 2 -->
	    <section class="divider parallax layer-overlay overlay-dark-8" <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg')) { ?>data-bg-img="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg'; ?>"<?php } ?> data-parallax-ratio="0.7">
	      <div class="container pt-60 pb-60">
	        <div class="row">
	          <div class="col-xs-12 col-sm-12 col-md-12 mb-md-50">
	            <div class="funfact text-white text-left">
	              <p><?php echo $texte2p; ?></p>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	    <?php } ?>
	
		<?php if($texte3p) { ?>
	    <!-- Section: texte 3 + image 3 -->
	    <section data-bg-img="images/pattern/p4.png">
	      <div class="container">
	        
	        <div class="section-centent">
	          <div class="row">
	            <div class="col-md-12">
	              <div class="services-tab border-10px bg-white">
	               
	                <div class="tab-content">
	                  <div class="tab-pane fade in active" id="tab11">
	                    <div class="row">
		                  <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg')) { ?>
	                      <div class="col-md-7">
		                  <?php } else { ?>
		                  <div class="col-md-12">
			              <?php }?>
	                        <div class="service-content ml-20 ml-sm-0">
	                          <p><?php echo $texte3p; ?></p>
	                        </div>
	                      </div>
	                      <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg')) { ?>
	                      <div class="col-md-5">
	                        <div class="thumb">
	                          	<img class="img-fullwidth" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg'; ?>" alt="<?php echo $titrep; ?>">
	                        </div>
	                      </div>
	                      <?php } ?>
	                    </div>
	                  </div>
	                 </div>
	                  
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	    <?php } ?>
	
		<?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg')) { ?> 
	    <!-- Section: Galerie d'images -->
	    <section id="team">
	      <div class="container">
	        <div class="section-title text-center">
	          <div class="row">
	            <div class="col-md-8 col-md-offset-2">
	              <h2 class="text-uppercase mt-0 line-height-1">Galerie d'images</h2>
	              <div class="title-icon">
	                <img class="mb-10" src="images/title-icon.png" alt="<?php echo $titrep; ?>">
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-md-12">
	           
	            <!-- Portfolio Gallery Grid -->
	
	            <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
	              <!-- Portfolio Item Start -->
	              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg')) { ?>
	              <div class="gallery-item dental">
	                <div class="thumb">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg'; ?>" class="img-fullwidth">
	                  <div class="overlay-shade"></div>
	                  <div class="icons-holder">
	                    <div class="icons-holder-inner">
	                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
	                        <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg'; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Portfolio Item End -->
	              <?php } ?>
	              
	              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg')) { ?>
	              <!-- Portfolio Item Start -->
	              <div class="gallery-item photography">
	                <div class="thumb">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg'; ?>" class="img-fullwidth">
	                  <div class="overlay-shade"></div>
	                  <div class="icons-holder">
	                    <div class="icons-holder-inner">
	                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
	                        <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg'; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Portfolio Item End -->
	              <?php } ?>
	              
	              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg')) { ?>
	              <!-- Portfolio Item Start -->
	              <div class="gallery-item surgery">
	                <div class="thumb">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg'; ?>" class="img-fullwidth">
	                  <div class="overlay-shade"></div>
	                  <div class="icons-holder">
	                    <div class="icons-holder-inner">
	                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
	                        <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg'; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Portfolio Item End -->
	              <?php } ?>
	              
	              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-4.jpg')) { ?>
	              <!-- Portfolio Item Start -->
	              <div class="gallery-item laboratory">
	                <div class="thumb">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-4.jpg'; ?>" class="img-fullwidth">
	                  <div class="overlay-shade"></div>
	                  <div class="icons-holder">
	                    <div class="icons-holder-inner">
	                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
	                        <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-4.jpg'; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Portfolio Item End -->
	              <?php } ?>
	              
	            </div>
	            <!-- End Portfolio Gallery Grid -->
	
	          </div>
	        </div>
	      </div>
	    </section> 
	    <?php } ?>   
	<!-- ---------------
	
	Modèle de page : 3
	
	------------------ -->
    
    <?php } else if($modele_de_page==3) { ?>
    
    	<section class="inner-header divider parallax layer-overlay overlay-dark-8" <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg')) { ?>data-bg-img="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg'; ?>"<?php } ?>>
	      <div class="container pt-60 pb-60">
	        <!-- Section Content -->
	        <div class="section-content">
	          <div class="row"> 
	            <div class="col-md-12 xs-text-center">
	              <h3 class="title text-white"><?php echo $titrep; ?></h3>
	              <ol class="breadcrumb mt-10 white">
	                <li><a class="text-white" href="<?php echo $defaultpg; ?>.php">Accueil</a></li>
	                <?php if($id_page_parente) { ?>
	                	<li><a class="text-white" href="#"><?php echo $page_parente; ?></a></li>
	                <?php } ?>
	                <li class="active text-theme-colored"><?php echo $titrep; ?></li>
	              </ol>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	
	    <!-- Section: texte 1 -->
	    <section class="">
	      <div class="container">
	        <div class="section-content">
	          <div class="row">
		        <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg')) { ?>
	            <div class="col-md-6">
		        <?php } else { ?>
		        <div class="col-md-12">
		        <?php } ?>
	              <h2 class="text-uppercase font-weight-600 mt-0 font-28 line-bottom"><?php echo $titrep; ?></h2>
	              <p><?php echo $textep; ?></p>
	            </div>
	            <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg')) { ?>
	            <div class="col-md-6">
	              <div class="video-popup">                
	                <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg'; ?>" data-lightbox-gallery="image angcp" title="image angcp">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'.jpg'; ?>" class="img-responsive img-fullwidth">
	                </a>
	              </div>
	            </div>
	            <?php } ?>
	          </div>
	        </div>
	      </div>
	    </section>
	
		<?php if($texte2p) { ?>
	    <!-- Section: texte 2 -->
	    <section>
	      <div class="container-fluid pt-0 pb-0">
	        <div class="row equal-height">
	          <div class="col-md-6 bg-img-cover sm-height-auto" <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg')) { ?>data-bg-img="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg'; ?>"<?php } ?>></div>
	          <div class="col-md-6 bg-theme-colored sm-height-auto">
	            <div class="p-50 p-sm-0 p-sm-0 pt-sm-30 pb-sm-30 text-white">
	              <p><?php echo $texte2p; ?></p>
	            </div>
	          </div>
	          
	        </div>
	      </div>
	    </section>
	    <?php } ?>
	
		<?php if($texte3p) { ?>
	    <!-- Section: texte 3 + image principale -->
	    <section data-bg-img="images/pattern/p4.png">
	      <div class="container">
	        
	        <div class="section-centent">
	          <div class="row">
	            <div class="col-md-12">
	              <div class="services-tab border-10px bg-white">
	               
	                <div class="tab-content">
	                  <div class="tab-pane fade in active" id="tab11">
	                    <div class="row">
	                      <div class="col-md-7">
	                        <div class="service-content ml-20 ml-sm-0">
	                          <p><?php echo $texte3p; ?></p>
	                        </div>
	                      </div>
	                      <div class="col-md-5">
	                        <div class="thumb">
		                      <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg')) { ?>
	                          	<img class="img-fullwidth" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg'; ?>" alt="<?php echo $titrep; ?>">
	                          <?php } ?>
	                        </div>
	                      </div>
	                    </div>
	                  </div>
	                 </div>
	                  
	                </div>
	              </div>
	            </div>
	          </div>
	        </div>
	      </div>
	    </section>
	    <?php } ?>
	
		<?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg')) { ?> 
	    <!-- Section: Galerie d'images -->
	    <section class="">
	      <div class="container">
	        <div class="section-title text-center">
	          <div class="row">
	            <div class="col-md-8 col-md-offset-2">
	              <h2 class="text-uppercase mt-0 line-height-1">Galerie d'images</h2>
	              <div class="title-icon">
	                <img class="mb-10" src="images/title-icon.png" alt="<?php echo $titrep; ?>">
	              </div>
	            </div>
	          </div>
	        </div>
	        <div class="row">
	          <div class="col-md-12">
	           
	            <!-- Portfolio Gallery Grid -->
	
	            <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
	              <!-- Portfolio Item Start -->
	              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg')) { ?>
	              <div class="gallery-item dental">
	                <div class="thumb">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg'; ?>" class="img-fullwidth">
	                  <div class="overlay-shade"></div>
	                  <div class="icons-holder">
	                    <div class="icons-holder-inner">
	                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
	                        <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-1.jpg'; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Portfolio Item End -->
	              <?php } ?>
	              
	              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg')) { ?>
	              <!-- Portfolio Item Start -->
	              <div class="gallery-item photography">
	                <div class="thumb">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg'; ?>" class="img-fullwidth">
	                  <div class="overlay-shade"></div>
	                  <div class="icons-holder">
	                    <div class="icons-holder-inner">
	                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
	                        <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-2.jpg'; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Portfolio Item End -->
	              <?php } ?>
	              
	              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg')) { ?>
	              <!-- Portfolio Item Start -->
	              <div class="gallery-item surgery">
	                <div class="thumb">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg'; ?>" class="img-fullwidth">
	                  <div class="overlay-shade"></div>
	                  <div class="icons-holder">
	                    <div class="icons-holder-inner">
	                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
	                        <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-3.jpg'; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Portfolio Item End -->
	              <?php } ?>
	              
	              <?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-4.jpg')) { ?>
	              <!-- Portfolio Item Start -->
	              <div class="gallery-item laboratory">
	                <div class="thumb">
	                  <img alt="<?php echo $titrep; ?>" src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-4.jpg'; ?>" class="img-fullwidth">
	                  <div class="overlay-shade"></div>
	                  <div class="icons-holder">
	                    <div class="icons-holder-inner">
	                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
	                        <a href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$id.'-4.jpg'; ?>"  data-lightbox-gallery="gallery"><i class="fa fa-picture-o"></i></a>
	                      </div>
	                    </div>
	                  </div>
	                </div>
	              </div>
	              <!-- Portfolio Item End -->
	              <?php } ?>
	              
	              
	            </div>
	            <!-- End Portfolio Gallery Grid -->
	
	          </div>
	        </div>
	      </div>
	    </section>
	    <?php } ?> 
    
    <?php } ?>
    
    
    
    
    
    
  </div>
  <!-- end main-content -->            
			
