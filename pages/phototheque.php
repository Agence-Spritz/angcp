<?php session_start(); ?>
<!-- PAGE CONTENU
================================================== -->
<?php	// CONTENU
	list($titrep, $id_page_parente, $textep, $texte2p, $texte3p, $modele_de_page) = mysqli_fetch_array(mysqli_query($link, "SELECT titre,id_page_parente,texte,texte2,texte3,modele_de_page FROM ".$table_prefix."_pages WHERE page='page' AND ID='$id' "));
		
		if($id_page_parente) {
		// On va chercher la page parente
	        $req_parente = mysqli_query($link,"SELECT ID, titre FROM ".$table_prefix."_pages WHERE page='page' and ID='".$id_page_parente."'");
			$data_parente = mysqli_fetch_assoc($req_parente);
			
			$page_parente = $data_parente['titre'];
		} 
		
		// contrôle de la connexion
		
		$autorisation = 0;
		
		
		if( (isset($_POST['submit']))&&($_POST['submit']=='conex') ) {
			
			$login = $_POST['form_username_email'];
			$mdp = $_POST['form_password'];
			
			
			if(($login=='angcp_user')&&($mdp=='HDvUg3LWQB')) {
				
				// Création d'un cookie
				$_SESSION['autorisation'] = $login;
				$autorisation = 1;
				$message = '<div class="alert alert-danger" role="alert">Identification réussie</div>';
				
				
			} else {
				$autorisation = 1;
				$message = '<div class="alert alert-danger" role="alert">Les identifiants sont incorrects!</div>';
			}
			
		}
		
		
		?>

	<!-- Start main-content -->
	<div class="main-content">
    
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
	    
		
	    
	    <?php if(isset($_SESSION['autorisation'])) {?>
		
		    <!-- Gallery Grid 3 -->
		    <section>
		      <div class="container">
		        <div class="section-content">
		          <div class="row">
		            <div class="col-md-12">
			            
			           
		             
		              <!-- End Portfolio Filter -->
		            
		              <!-- Portfolio Gallery Grid -->
		               <div class="gallery-isotope grid-3 masonry gutter-small clearfix" data-lightbox="gallery">
			              
			              <?php $req = mysqli_query($link,"SELECT ID, titre, dbu, rub, texte, texte2 FROM ".$table_prefix."_pages WHERE page='album' AND masquer <> '1'  ORDER BY dbu DESC"); 
						  	while ($data = mysqli_fetch_array($req)) { 
							?>
							
							<div class="gallery-item">
				                <div class="thumb">
				                  	<?php if (is_file('./images/albums_phototheque/'.$data['ID'].'.jpg')) { ?>
										<img src="<?php echo './images/albums_phototheque/'.$data['ID'].'.jpg'; ?>" alt="<?php echo $data['titre']; ?>" title="<?php echo $data['titre']; ?>" class="img-fullwidth" />
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
				                        <a data-lightbox="image" href="<?php echo './images/albums_phototheque/'.$data['ID'].'.jpg'; ?>"><i class="fa fa-plus"></i></a>
				                        <a href="<?php echo slugify($data['titre']); ?>--don-d-organes-coeur-poumons-belgique--<?php echo $data['ID'] ?>--detail-album"><i class="fa fa-link"></i></a>
				                      </div>
				                    </div>
				                  </div>
				                  <a class="hover-link" data-lightbox="image" href="<?php echo slugify($data['titre']); ?>--don-d-organes-coeur-poumons-belgique--<?php echo $data['ID'] ?>--detail-album">En savoir plus</a>
				                </div>
				              </div>
							
		                <?php } ?>
		                
		            </div>
		          </div>
		        </div>
		      </div>
		    </section>
	    
	    <?php } else {  ?>
	    
		    <section>
		      <div class="container">
		        <div class="row">
		          <div class="col-md-6 col-md-push-3">
		            <h4 class="text-gray mt-0 pt-5"> Accès sécurisé</h4>
		            <hr>
		            <p>
			            
			            <?php if($message) {
				            echo $message;
				        } else { 
			            ?>
			            L'accès à la photothèque est réservé aux membres, vous devez par conséquent vous identifier, ci-après, pour y accéder.<br />
			            N'hésitez pas à <a href="contact-angcp-greffe-coeur-poumon--135--contact">nous contacter</a> pour toute information à ce sujet.
			            <?php } ?>
		            </p>
		            <form name="login-form" class="clearfix" method="POST">
		              <div class="row">
		                <div class="form-group col-md-12">
		                  <label for="form_username_email">Login</label>
		                  <input id="form_username_email" name="form_username_email" class="form-control" type="text">
		                </div>
		              </div>
		              <div class="row">
		                <div class="form-group col-md-12">
		                  <label for="form_password">Mot de passe</label>
		                  <input id="form_password" name="form_password" class="form-control" type="text">
		                </div>
		              </div>
		              <div class="form-group pull-right mt-10">
		                <button type="submit" name="submit" value="conex" class="btn btn-dark btn-sm">Se connecter</button>
		              </div>
		            </form>
		          </div>
		        </div>
		      </div>
		    </section>
	    
	    <?php } ?>
	   
	
  </div>
  <!-- end main-content -->            
			
