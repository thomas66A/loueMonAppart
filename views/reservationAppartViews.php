
<?php echo $header ?>
<header>
    <img src="/loueMonAppart/image/loue-mon-appartement.png">
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


<div id="pasDispo">
    <h2>Cet appart n'est pas disponible à la location du:<h2>
<?php foreach($dispos as $a):?>
    
        <h2><br> <? $dateOriginal = $a->getDebutLoc(); echo date("d-m-Y", strtotime($dateOriginal));?> au <? $dateOriginal =  $a->getFinLoc(); echo date("d-m-Y", strtotime($dateOriginal));?></h2>

<?php endforeach;?>
</div>
<div id="lesAnnonces">
<div id="annonce">
        <h1 id="titreAnnonce"><? echo ucfirst($affiche->getType()); ?>&nbsp;- Couchages:&nbsp; <? echo $affiche->getNbCouchage(); ?>&nbsp;personnes.</h1>
        <img src="<?php if($affiche->getLienPhoto()==!null){echo $affiche->getLienPhoto();}else{echo "/loueMonAppart/image/imageVide.jpg";} ?>" id="imgAnnonce">
        <h1 id="prixAnnonce"><? echo $affiche->getPrix(); ?>€ par semaine.</h1>
        <h2 id="villeAnnonce">A <? echo ucfirst($affiche->getVille()); ?></h2>
        <p id="descriptionAnnonce">Description:&nbsp;<? echo ucfirst($affiche->getDescription()); ?></p>
        <hr class="ligne">
        
        <button id="louerBien"><a href="/loueMonAppart/reservationAppartViews">JE LOUE CE BIEN</a></button>
</div>
</div>
<form>
<input type="date">
</form>

<?php echo $footer ?>