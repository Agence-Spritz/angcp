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
	<div class="main-content faq">
    
     
	<!-- ---------------
	
	Modèle de page : le choix du modèle de page ne fonctionne pas pour la FAQ, modèle unique
	
	------------------ -->
    
    
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
	    
			<section>
		      <div class="container">
		        <div class="row">
			        
			        <?php  	$req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='faq' AND masquer <> '1' ORDER BY ID ASC "); 
				        	$total_faq = mysqli_num_rows($req);
				    ?>
			        
			        <div class="col-md-12">
		            
			            <div id="accordion1" class="panel-group accordion">
				            
				            <?php while ($data = mysqli_fetch_array($req)) { ?>
				        
					  	
								  		<div class="panel">
						                	<div class="panel-title"> <a data-parent="#accordion1" data-toggle="collapse" href="#accordion<?php echo $data['ID']; ?>" class="" aria-expanded="true"> <span class="open-sub"></span> <?php echo $data['titre']; ?></a> </div>
											<div id="accordion<?php echo $data['ID']; ?>" class="panel-collapse collapse" role="tablist" aria-expanded="true">
												<div class="panel-content">
													<p><?php echo $data['texte']; ?></p>
						                  		</div>
						                	</div>
						              	</div>
			              	
							<?php } ?>
					  	
					  	</div>
		             
		           	</div>
		           	
		
		      </div>
		    </section>
	
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
	
  </div>
  <!-- end main-content -->            
			
