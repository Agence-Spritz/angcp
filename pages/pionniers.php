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
	
	    
	    
	    <!-- Gallery Grid 3 -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
	            
	           
             
              <!-- End Portfolio Filter -->
            
              <!-- Portfolio Gallery Grid -->
               <div class="gallery-isotope grid-3 masonry gutter-small clearfix" data-lightbox="gallery">
	              
	              <?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='pionnier' AND masquer <> '1'  ORDER BY dbu DESC"); 
				  	while ($data = mysqli_fetch_array($req)) { 
					?>
					
					<div class="gallery-item">
		                <div class="thumb">
		                  	<?php if (is_file('./images/pages-don-d-organes-coeur-poumons-belgique/'.$data['ID'].'.jpg')) { ?>
								<img src="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$data['ID'].'.jpg'; ?>" alt="<?php echo $data['titre']; ?>" title="<?php echo $data['titre']; ?>" class="img-fullwidth" />
							<?php } else { ?>
								<img src="http://placehold.it/540x370" alt="Association nationale des greffés cardiaques et pulmonaires" title="Association nationale des greffés cardiaques et pulmonaires" class="img-fullwidth">
							<?php } ?>
						
		                  <div class="overlay-shade"></div>
		                  <div class="text-holder">
		                    <div class="title text-center"><?php echo $data['titre'] ?></div>
		                  </div>
		                  <div class="icons-holder">
		                    <div class="icons-holder-inner">
		                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
		                        <a data-lightbox="image" href="<?php echo './images/pages-don-d-organes-coeur-poumons-belgique/'.$data['ID'].'.jpg'; ?>"><i class="fa fa-plus"></i></a>
		                        <a href="<?php echo slugify($data['titre']); ?>--don-d-organes-coeur-poumons-belgique--<?php echo $data['ID'] ?>--detail-pionnier"><i class="fa fa-link"></i></a>
		                      </div>
		                    </div>
		                  </div>
		                  <a class="hover-link" data-lightbox="image" href="<?php echo slugify($data['titre']); ?>--don-d-organes-coeur-poumons-belgique--<?php echo $data['ID'] ?>--detail-pionnier">En savoir plus</a>
		                </div>
		              </div>
					
					
	                
                
                <?php } ?>
                
            </div>
          </div>
        </div>
      </div>
    </section>
	
		
	    
			
	
		   
	
  </div>
  <!-- end main-content -->            
			
