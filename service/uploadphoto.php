<?php

$dossier ="image/";
$taille_maxi = 30000000;
$taille = filesize($this->files['photo1']['tmp_name']);
$extensions = array('.png','.jpg', '.jpeg', '.JPG', '.JPEG');
$extension = strrchr($this->files['photo1']['name'], '.'); 

if(!in_array($extension, $extensions))
{
     $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg...';
}
if($taille>$taille_maxi)
{
     $erreur = 'Le fichier est trop gros...';
}
if(!isset($erreur))
{
     
     $fichier = strtr($fichier, 
          'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
          'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
     $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
     if(move_uploaded_file($this->files['photo1']['tmp_name'], $dossier . $fichier)) 
     {
          
		  
		  if ((($extension=='.jpeg')||($extension=='.jpg')) || (($extension=='.JPEG')||($extension=='.JPG')))
		  {
		  $original=$dossier.$laphoto.".jpg";
		  rename($dossier.$fichier, $original);
		  include("redimensionnerJpg.php");
		  }
		  if ($extension=='.png')
		  {
		  $original=$dossier.$laphoto.".png";
		  rename($dossier.$fichier, $original);
		  $image = imagecreatefrompng($original);
          imagejpeg($image, $dossier.$laphoto.'.jpg', 90); 
          imagedestroy($image);
		  $original=$dossier.$laphoto.".jpg";
		  unlink($dossier.$laphoto.".png");
		  include("redimensionnerJpg.php");
		  }
     }
     else
     {
          echo 'Echec de l\'upload !';
     }
}
else
{
     echo $erreur;
}

