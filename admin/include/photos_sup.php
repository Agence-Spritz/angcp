<?php
// VARIABLES
$redim_wa=1200;
$redim_ha=800;

//Efface une seule photo uniquement
if ($delfile) {@unlink($chemin.$modif."-sup/".$delfile);}

// NETTOIE LE NOM DE LA PHOTO
$PHOTONAME= preg_replace("/'/","_",$_FILES['userfile']['name']);


if ( $modif )
{	$alea =$modif ;
   	if ( $Submit && strlen($_FILES['userfile']['tmp_name'])>10 )
    {	$nom_tmp = $_FILES['userfile']['tmp_name'] ;
		if ( is_uploaded_file($nom_tmp) )  
	   	{	if (!is_dir($chemin.$alea."-sup")) { umask (0000); mkdir($chemin.$alea."-sup",0777); }
        	if (file_exists($chemin.$alea."-sup")) 
			{	move_uploaded_file($_FILES['userfile']['tmp_name'],$chemin.$alea."-sup/".$PHOTONAME);  
				// REDIMENSIONNEMENT AUTOMATIQUE
				list($w,$h) = getimagesize($chemin.$alea."-sup/".$PHOTONAME) ; if ($w >$redim_wa || $h>$redim_ha) 		{ redimage($chemin.$alea."-sup/".$PHOTONAME,$chemin.$alea."-sup/".$PHOTONAME,$redim_wa,$redim_ha) ;}
				chmod ($chemin.$alea."-sup/".$PHOTONAME, 0777);
			}
      	} else { print("<p>is_uploaded_file r&eacute;pond FALSE </p>"); }
    	   
	}

?>
<form method="post" action="?alea=<?php print ($alea); ?>" enctype="multipart/form-data">
  <input type="file" name="userfile">
  <!---<input type="submit" name="Submit" value="Envoyer le fichier">
</form> --->

<table border="0" class="NormT9"><tr>
<br />
<?php
	if ( is_dir($chemin.$alea."-sup") ) 
	{  if ( $dh = opendir($chemin.$alea."-sup") ) 
		{	$n=0; while ( ($file = readdir($dh)) !== false ) 
			{	if ( substr($file,0,1) != "." )
				{	if ($n==8) { print("</tr><tr>"); $n=0;} $n++;
					list($w1,$h1) = getimagesize($chemin.$alea."-sup/".$file) ;
					$maxw = $maxh = 50 ;
					if ( $w1 > $maxw ) { $h1 = ( $h1 / $w1 ) * $maxw ; $w1 = $maxw ; }
					if ( $h1 > $maxh ) { $w1 = ( $w1 / $h1 ) * $maxh ; $h1 = $maxh ; }
            		//print("<!td>$file<!/td>");
					print("<td align='center' valign='top' width='12%'>
					<img src=\"$chemin/$alea-sup/$file\" width=\"$w1\" height=\"$h1\">
                    <br><a href=\"?modif=$modif&delfile=$file\" >[Del]</a><br>");
        			print("</td>");
      			}
   			 }
  		}
	}
	print("</table>");
} else { print ("<b>Il faut d'abord cr&eacute;er la fiche pour ajouter d'autres photos.</b>"); }
?>
