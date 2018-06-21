<?php	// Requête pour récupérer le contenu de la page concernée
		list($id, $titrep, $date, $rub, $textep) = mysqli_fetch_array(mysqli_query($link, "SELECT ID, titre, dbu, rub, texte FROM ".$table_prefix."_pages WHERE page='album' AND ID='$id' "));	
		
?>

<!-- Start main-content -->
  <div class="main-content">
  
    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-8" data-bg-img="'images/albums_phototheque/<?=$id?>.jpg'">
      <div class="container pt-60 pb-60">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row"> 
            <div class="col-md-12 xs-text-center">
              <h3 class="title text-white"><?php echo $titrep; ?></h3>
              <ol class="breadcrumb mt-10 white">
                <li><a class="text-white" href="<?php echo $defaultpg; ?>.php">Accueil</a></li>
                <li><a class="text-white" href="phototheque--155--phototheque">Photothèque</a></li>
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
	            
	            <?php // REDIM PHOTO EN SUPPLEMENT EN VIGNETTE
  
     

					$dir = "images/albums_phototheque/".$id."-sup/" ;
				    if ( is_dir($dir) ) 
				    {    
						if ( $dh = opendir($dir) ) 
				        {   
				        	$fichier= array();    
				        	$datefichier = array(); 
				        	$n=0; 
				        	
							// On constitue un tableau avec les images
				            while ( ($file = readdir($dh)) !== false ) 
				            {    
					            if(preg_match('/(\.jpg|\.png|\.bmp)$/i', $file)) {
				
					            	if ( substr($file,0,1) != "." && $file != '..')
					                {    $fichier[] = $file; $nbrphoto++;
					                }
				
				                }
				            }
				            
				            sort($fichier); // Tri par date de fichier les valeur contenu dans le tableau array
				            ?>
				            
				            <!-- Gallery Grid 3 -->
						    <section>
						      <div class="container">
						        <div class="section-content">
						          <div class="row">
						            <div class="col-md-12">
							            
						            
						              <!-- Portfolio Gallery Grid -->
						               <div class="gallery-isotope grid-3 masonry gutter-small clearfix" data-lightbox="gallery">
							              
							              <?php for ($a=0; $a<=$nbrphoto; $a++)
									            {    if(!empty($fichier[$a]))
									                {    
										                
										                $file=$dir.$fichier[$a];
									                    {   
											?>
											
											<div class="gallery-item">
								                <div class="thumb">
									                
									                <img src="<?php  echo $file; ?>" alt=""  class="img-fullwidth" />
								                  	
								                  <div class="overlay-shade"></div>
								                  
								                  <div class="icons-holder">
								                    <div class="icons-holder-inner">
								                      <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
								                        <a  data-lightbox-gallery="<?php echo $id; ?>"  href="<?php  echo $file; ?>"><i class="fa fa-plus"></i></a>
								                        
								                      </div>
								                    </div>
								                  </div>
								                 
								                </div>
								              </div>
											
						                <?php }
								                }
								              } ?>
						                
						            </div>
						          </div>
						        </div>
						      </div>
						    </section>
							
					<?php
						}
				
				    } ?>
	            
           </div>   
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->
 