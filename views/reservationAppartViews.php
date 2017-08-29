
<?php echo $header ?>
<header>
    <img src="/loueMonAppart/image/loue-mon-appartement.png">
    <?php if(empty($_SESSION['user']) == false):?>
<button><a href="deconnec">X</a></button>
<?php endif; ?>
</header>
<nav>
    <button><a href="/loueMonAppart/afficheAppartViews">LES LOCATIONS</a></button>
    <button><a href="/loueMonAppart/accueil">ACCUEIL</a></button>
</nav>
<?php
$affiche = Flight::get('appart');
$proprio = $affiche->getIdProprio();
$dispos = Flight::get('disponibilite');
 
?>
<?php 
if(isset($_SESSION['erreur']))
{
echo "<pre>";
print_r($_SESSION['erreur']);
echo "</pre>";
}
unset($_SESSION['erreur']);
?>

<div id="pasDispo">
    <h2>Cet appart n'est pas disponible à la location du:<h2>
<?php foreach($dispos as $a):?>
    
        <h2><br> <? $dateOriginal = $a->getDebutLoc(); echo date("d-m-Y", strtotime($dateOriginal));?> au <? $dateOriginal =  $a->getFinLoc(); echo date("d-m-Y", strtotime($dateOriginal));?></h2>

<?php endforeach;?>
</div>
<form action="/loueMonAppart/reservationAppart" method="post">
 <div id="dateLoc">  
        <h2>CHOISSISSER VOTRE DATE DE LOCATION: <br><br><span>TOUTE SEMAINE ENTAMEE EST FACTUREE COMPLETE</span></h2>
        <label>DEBUT:</label><input type="date" name="debutLoc"> -  <label>FIN:</label><input type="date" name="finLoc">
</div>
    <input type="hidden" value="<?php echo $_SESSION['user'][0]['id'];?>" name="idLocataire">
    <input type="hidden" value="<?php echo $proprio; ?>" name="idProprio">
    <input type="hidden" value="<?php echo $affiche->getId(); ?>" name="idAppart">
    <input type="hidden" value="<?php echo $affiche->getPrix(); ?>" name="prixAppart">
<div id="lesAnnonces">
    <div id="annonce">
            <h1 id="titreAnnonce"><? echo ucfirst($affiche->getType()); ?>&nbsp;- Couchages:&nbsp; <? echo $affiche->getNbCouchage(); ?>&nbsp;personnes.</h1>
            <img src="<?php if($affiche->getLienPhoto()==!null){echo $affiche->getLienPhoto();}else{echo "/loueMonAppart/image/imageVide.jpg";} ?>" id="imgAnnonce">
            <h1 id="prixAnnonce"><? echo $affiche->getPrix(); ?>€ par semaine.</h1>
            <h2 id="villeAnnonce">A <? echo ucfirst($affiche->getVille()); ?></h2>
            <p id="descriptionAnnonce">Description:&nbsp;<? echo ucfirst($affiche->getDescription()); ?></p>
            <hr class="ligne">        
            <button id="louerBien" type="submit"><p>JE VALIDE</p></button>
    </div>
</div>
</form>

<?php echo $footer ?>