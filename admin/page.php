<?
include "include/menu-new.php";

// VARIABLES
$titrepage= "Pages";
$tableencours = $table_prefix."_pages";
$page = "page"; 										// Variable pour definir la sous cat page

// PHOTOS
$photosize = "1500x1125";									// Dimensions idéales d'information pour la photo
$chemin = "../images/pages-don-d-organes-coeur-poumons-belgique/";  							// "/" à la fin
$wmax = 100; $hmax = 80;  $tdvisuphoto = $wmax*2+20;  	// Dimension pour affichage des vigettes
$redim_w=1500; $redim_h=1125;

// masquer les vignettes pour certaines pages
// Page contact
if($modif=='135') {
	
	$masquervignette=1;
	$nbr=0; // Nombre de photos
	
// Page édito
} else if($modif=='2') {
	
	$masquervignette=0;
	$nbr=0; // Nombre de photos
	
}  else {
	$masquerdescription=0;
	$nbr=4; // Nombre de photos
}


// CHAMPS
$chps=array('page','dbu','titre','id_page_parente','rub','texte','texte2','texte3','modele_de_page','lg','masquer');
$chpsNb = count($chps);
?>

	    <section class="padding-top-30 padding-bottom-30 section-bloc bloc-titre">
		    <div class="row">
		        <div class="col-sm-6 col-md-6">
			        <h2><?=$titrepage?></h2>
		        </div>
			    <div class="col-sm-6 col-md-6">
					<a href="?#chercher" style="float:right; margin-left:20px"><i class="fa fa-search"></i> Chercher</a>
					<a href="?" style="float:right"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Ajouter</a> 
		        </div>
				<div class="clearfix"></div>
		    </div>
	    </section>
	
<?php    
// EFFACEMENT
if ( $del ) {	
	mysqli_query($link, "DELETE FROM $tableencours WHERE ID=$del");
	@unlink($chemin.$del.".jpg");
	for ($a=1; $a<=$nbr; $a++){@unlink($chemin.$del."-".$a.".jpg");}
}
elseif ($delphoto) {@unlink($chemin.$delphoto);}
unset ($del,$delphoto);
	
// TRAITEMENT DES TEXTES
if (!$masquer) {$masquer=0;}
if (!$dbu) {$dbu=date("Y-m-d");} else {$dbu=date_tiret($dbu);}
for ($a=0; $a<$chpsNb; $a++){ 
	${$chps[$a]}=preg_replace('/"/',"'",trim(${$chps[$a]}));							// " => '
	if ($a==5 || $a==6 || $a==10) {${$chps[$a]}=preg_replace('/,/',".",${$chps[$a]});}		// PRIX , => . 
}

// ADDQUERY ET LISTE
for ($a=0; $a<$chpsNb; $a++){	$addquery1.=$chps[$a]."=\"".${$chps[$a]}."\","; $liste1.=$chps[$a].",";}
$addquery1 = substr($addquery1,0,strlen($addquery1)-1);
$liste1 = substr($liste1,0,strlen($liste1)-1); //echo $liste1;
	
// MODIF / AJOUT
if ( $Submit ) 
{	if ( $modif ) 
	{	mysqli_query($link, "UPDATE $tableencours SET $addquery1 WHERE ID='$modif'");
		if ( $vignette ) { $updatevign="$modif.jpg"; }
		for ($a=1; $a<=$nbr; $a++){		if ( $_FILES['photo'.$a]['name'] ) { $updatefile[$a]=$modif."-".$a.".jpg";} else {$updatefile[$a]="";} }
		$msg.= "<i class='fa fa-check-circle fa-2x'></i> Mise &agrave; jour r&eacute;ussie";
    } 
	else 
	{	mysqli_query($link, "INSERT INTO $tableencours SET $addquery1");
	
		if ( $vignette ) 	{ $updatevign= mysqli_insert_id($link).".jpg"; }
		for ($a=1; $a<=$nbr; $a++){	if ( $_FILES['photo'.$a] ) { $updatefile[$a]=mysqli_insert_id($link)."-".$a.".jpg"; } }
	  	$msg.= "<i class='fa fa-check-circle fa-2x'></i> Enregistrement ajout&eacute;";
    }
	unset($ID,$page,$dbu,$titre,$id_page_parente,$rub,$texte,$texte2,$texte3,$modele_de_page,$lg,$masquer);

	// ENVOYER LES PHOTOS
	$nom_tmp = $_FILES['vignette']['tmp_name']; sent_photo($updatevign,$nom_tmp,$chemin); 
	for ($a=1; $a<=$nbr; $a++){  $nom_tmp = $_FILES['photo'.$a]['tmp_name'] ; sent_photo($updatefile[$a],$nom_tmp,$chemin);}
 	
	// REDIMENSION DES PHOTOS
	if (file_exists($chemin.$updatevign) && $updatevign ) {		list($w,$h) = getimagesize($chemin.$updatevign) ;		if ($w >$redim_w || $h>$redim_h) 		{ redimage("$chemin$updatevign","$chemin$updatevign","$redim_w","$redim_h");}}
	for ($a=1; $a<=$nbr; $a++){
		if (file_exists($chemin.$updatefile[$a]) && $updatefile[$a] ) {		
			list($w,$h) = getimagesize($chemin.$updatefile[$a]) ;		
			redimage("$chemin$updatefile[$a]","$chemin$updatefile[$a]","$redim_w","$redim_h") ;
		}
	}
		
} // FIN DU SUBMIT

// RECUPERATION DES VALEURS ENREGISTREES
if ( $modif ) 
{	$result = mysqli_fetch_array( mysqli_query($link, " SELECT ID,$liste1 FROM $tableencours WHERE ID='$modif' ") );
	list($ID,$page,$dbu,$titre,$id_page_parente,$rub,$texte,$texte2,$texte3,$modele_de_page,$lg,$masquer) = $result;
	${$chps[1]}=date_barre(${$chps[1]});
}  
?>
	
		<!-- Messages d'alertes ou de confirmation -->
		<div class="row">
	        <div class="col-sm-12 col-md-12">
				<?php if ($msg) {?>
					<div class="alert alert-success" role="alert"><?=$msg?></div>
				<?php } ?>
				<?php if ($msgerror) {?>
				<div class="alert alert-danger" role="alert"><?=$msgerror?></div>
				<?php } ?>
	        </div>
		</div>
			
		<section class="padding-top-30 padding-bottom-30 section-bloc">
		    <div class="row">
					<form method="post" action="" enctype="multipart/form-data">
					    <input type="hidden" name="modif" value="<?=$modif?>">
					    <input type="hidden" name="word" value="<?=$word?>">
					    <input type="hidden" name="rub" value="<?=$rub?>">
					    
							<div class="col-sm-12 col-md-6">
					    
						        	<?	// BOUTON LANGUES    
							        if (isset($langues) && count($langues)>1) {
							            echo "<h4><i class='fa fa-flag '></i> Langue</h4>";
							            echo '<div class="radio" style="margin-bottom: 25px;">';
							            for ( $a=0 ; $a<count($langues) ; $a++ ) {
							                if ( $lg == $langues[$a] || (!$a&&!$lg) ) { $addselected = " checked"; } else { $addselected = ""; }
							                if ( $a ) { print ",&nbsp;"; } 
							            echo '<label class="radio-inline">';
							            echo "<input type=\"radio\" name=\"lg\" value=\"".$langues[$a]."\"$addselected>".$langues[$a];
							            echo "</label>";
							            }
							            echo '</div>';
							            
							        } else { echo '<input type="hidden" name="lg" value="'.$langues[0].'">';}
							        ?>
	
							        <h4><i class='fa fa-pencil-square-o '></i> Titre</h4>
							        <div class="form-group">
								        <input name="<?=$chps[2]?>" value="<?=${$chps[2]}?>" class="form-control" type="text" required  />
							        </div>
							        
							        
							        <h4><i class='fa fa-list-ol fa-1x'></i> Page parente</h4>
							        <div class="form-group">   
							          	<select name="<?=$chps[3]?>" class="form-control">
								          	<option value="">Page de premier niveau</option>
							             <?
								            $result = mysqli_query($link, "SELECT ID, titre FROM $tableencours WHERE page='page' GROUP BY titre ORDER BY titre asc") ;
								          
								            while ($data = mysqli_fetch_array($result)) 
								            {	echo " <option value=".$data['ID'];
								                if ( $data['ID']==$$chps[3] ) { print(" selected"); } 
								                echo " >".$data['titre']."</option>";
								            }		?>
										</select>
							        </div>
							        
							        <h4><i class='fa fa-newspaper fa-1x'></i> Modèle de page</h4>
							        <div class="form-group">   
							          	<select name="<?=$chps[8]?>" class="form-control">
								          	<option value="1" <?php if($$chps[8]==1) {echo "selected";}  ?>>Modèle 1</option>
								          	<option value="2" <?php if($$chps[8]==2) {echo "selected";}  ?>>Modèle 2</option>
								          	<option value="3" <?php if($$chps[8]==3) {echo "selected";}  ?>>Modèle 3</option>
										</select>
							        </div>
	
							</div> 
							<div class="col-sm-12 col-md-6 ">
								<?php if ($masquervignette!=1) { ?>
								
								<div class="zone-photos"> 
					        			    
								    	 <h4><i class='fa fa-camera '></i> Photos (format: .jpg | taille: <?=$photosize?> pixels)</h4>
								    	 <div class="form-group">
								         <label>Vignette (photo en-tête)</label>
								         	<input type="file" name="vignette"  value="" />
								         </div>
										<?
										 if ( $modif && file_exists($chemin.$modif.".jpg") ) {	
												redim_img_url($chemin.$modif.".jpg",$wmax,$hmax);
												print("<a href=?modif=$modif&delphoto=$modif.jpg><i class='fa fa-trash-o '></i></a> photo $a<br/><br/>");
											}
										for ($a=1; $a<=$nbr; $a++){ ?>
										<div class="form-group">
								        <label>Photo (facultatif) <?=$a?></label>
									        <input type="file" name="photo<?=$a?>"  value="">
								        </div>
								        <?php 
										} 	
										//Afficher les photos
										for ($a=1; $a<=$nbr; $a++){
											if ( $modif && file_exists($chemin.$modif."-".$a.".jpg") ) {	
												redim_img_url($chemin.$modif."-".$a.".jpg",$wmax,$hmax);
												print("<a href=?modif=$modif&delphoto=$modif-$a.jpg> <i class='fa fa-trash-o '></i></a> photo $a<br/><br/>");
											}
										} 
										?>
								</div>
								
								<?php } ?>
							</div>
							<div class="clearfix"></div>
				
					<div class="col-sm-12 col-md-12 texte-principal">
			    
					<?php if($masquerdescription!=1) { ?>
				      <h4><i class='fa fa-align-justify '></i> Zone de texte 1</h4>
				      <textarea name="<?=$chps[5]?>" row contenu-admins="10" cols="50" ><?=${$chps[5]}?></textarea><script type="text/javascript">CKEDITOR.replace( '<?=$chps[5]?>' );</script>
				      
				      <hr>
				      
				      <h4><i class='fa fa-align-justify '></i> Zone de texte 2</h4>
				      <textarea name="<?=$chps[6]?>" row contenu-admins="10" cols="50" ><?=${$chps[6]}?></textarea><script type="text/javascript">CKEDITOR.replace( '<?=$chps[6]?>' );</script>
				      
				      <hr>
				      
				      <h4><i class='fa fa-align-justify '></i> Zone de texte 3</h4>
				      <textarea name="<?=$chps[7]?>" row contenu-admins="10" cols="50" ><?=${$chps[7]}?></textarea><script type="text/javascript">CKEDITOR.replace( '<?=$chps[7]?>' );</script>
				    <?php } ?>
				    
				      <div class="clearfix"></div>
				      <button type="submit" name="Submit" value="Enregistrer" class="btn btn-default bouton-submit">Enregistrer</button>
				      
					</div>
				</form>
		    </div>
		</section>
		
		<section class="padding-top-30 padding-bottom-30 margin-top-20 section-bloc">
		
			<div class="row">
				<div class="col-sm-12 col-md-12">
		
					<a name="chercher" id="chercher"></a>
					
					<form method="post" action="">
					  <?php if ($word) {?>
					  <span class="VertNorm"><i class='fa fa-check '></i> recherche exécutée</span>
					  <?php } ?>
					  
					  	<div class="input-group">
					      <input type="text" class="form-control" placeholder="Rechercher..." name="word" value="<?php print(htmlentities($word)); ?>">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="submit">OK</button>
					      </span>
					    </div><!-- /input-group -->
	
					  <?php if ($word) {?>
					  <span class="BleuNorm">
					  	<a href="?"><i class="fa fa-undo "></i> Reset</a>
					  </span>
					  <?php } ?>
					</form>
					
					
					<? // Requête d'affichage des résultats existants
					if ($page) {$addQ="AND page='$page'";} 
					if ($word)  {$result = mysqli_query($link, "SELECT ID,".$liste1." FROM $tableencours WHERE (".$chps[1]." LIKE '%$word%' OR ".$chps[2]." LIKE '%$word%' OR ".$chps[3]." LIKE '%$word%' OR ".$chps[4]." LIKE '%$word%' OR ID LIKE '%$word%') ".$addQ." ORDER  BY dbu DESC ");}
					else {  $result = mysqli_query($link, " SELECT ID,".$liste1." FROM $tableencours WHERE 1 ".$addQ."  ORDER BY dbu DESC ");} 
					?>
					  	<table style="margin-top: 25px;" class="table table-bordered table-striped">
						  	<thead>
							    <tr>
							      <th>&nbsp;</th>
							      <th><i class='fa fa-sort-numeric-asc '></i> - <i class='fa fa-flag '></i></th>
							      <th><i class='fa fa-list-ol '></i> Page parente</th>
							      <th><i class='fa fa-pencil-square-o '></i> Titre</th>
							      <th><i class='fa fa-align-justify'></i> Rubrique</th>
							      <th><i class='fa fa-calendar '></i> Mise à jour</th>
							      
						        </tr>
					      	</thead>
							<tbody>
							  <?php 
							  while ( list($ID,$page,$dbu,$titre,$id_page_parente,$rub,$texte,$texte2,$texte3,$modele_de_page,$lg,$masquer) = mysqli_fetch_array($result) ) 
							  { 
							  	if ($masquer=="1") {$class="normalgrisclair";} else {$class="";}
							  	
							  		// Ici on fait la liaison entre l'ID de page parente enregistrée et son titre
							  		$req_id_parent = mysqli_query($link,"SELECT titre FROM ".$table_prefix."_pages WHERE ID='".$id_page_parente."'");
							  		
							  		$data_id_parent = mysqli_fetch_assoc($req_id_parent);
							  	
							  		$page_parente = $data_id_parent['titre'];
							  	
							  		// On affiche l'angle que s'il y a une page parente.
								  	if(!empty($page_parente)) {
									  	$page_parente .= " <i class='fa fa-angle-right '></i> ";
								  	}
							  	
							    echo "<tr class='".$class."'>";
							    echo "<td><a href=\"?modif=$ID&word=$word\"><i class='fa fa-pencil '></i></a></td>";
							    echo "<td>$ID - $lg</td><td>".$page_parente." </td><td>".strip_tags($titre)."</td><td>".strip_tags($rub)."</td><td>".date_barre($dbu)."</td>";
							    echo "</tr>";
							  }
							 ?>
							</tbody>
						</table>
						<div class="clearfix hidden-sm"></div>
				</div>
			</div>
		</section>
	
	</div><!-- Fin container ouvert dans menu.php -->
</body>
</html>