 <?php
$original2=$dossier.$laphoto.".jpg";
$image2=$original2;
$image=$original;
    $dimension=getimagesize($image);
            if ($dimension[0]>=$dimension[1])
			{
                
                    $max=1024; //taille a redimensionensionner
                    $reduc=$max/$dimension[0];
                    $coef_l=$max;
                    $coef_h=$dimension[1]*$reduc;
                    $chemin = imagecreatefromjpeg($image);
                    $nouvelle =imagecreatetruecolor($coef_l, $coef_h);
                    imagecopyresampled($nouvelle,$chemin,0,0,0,0,$coef_l,$coef_h,$dimension[0],$dimension[1]);
                    imagejpeg($nouvelle,$image2);
                    imagedestroy ($chemin);
					
					
                  
			}
			else if ($dimension[0]<$dimension[1])
			{
				
                    $max=680; //taille a redimensionensionner
                    $reduc=$max/$dimension[1];
                    $coef_l=$max;
                    $coef_h=$dimension[0]*$reduc;
                    $chemin = imagecreatefromjpeg($image);
                    $nouvelle =imagecreatetruecolor($coef_h, $coef_l);
                    imagecopyresampled($nouvelle,$chemin,0,0,0,0,$coef_h,$coef_l,$dimension[0],$dimension[1]);
                    imagejpeg($nouvelle,$image2);
                    imagedestroy ($chemin);
					
                    
			}
				
?>
