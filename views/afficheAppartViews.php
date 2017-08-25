<?php echo $header ?>
<header>
    <img src="/loueMonAppart/image/loue-mon-appartement.png">
</header>
<nav>
    <button><a href="/loueMonAppart/afficheAppartViews">LES LOCATIONS</a></button>
    <button><a href="/loueMonAppart/accueil">ACCUEIL</a></button>
</nav>
<?php
$affiche = Flight::get('affiche');?>
<div id="lesAnnonces">
<?php foreach($affiche as $a):?>
<div id="annonce">
        <h1 id="titreAnnonce"><? echo ucfirst($a->getType()); ?>&nbsp;- Couchages:&nbsp; <? echo $a->getNbCouchage(); ?>&nbsp;personnes.</h1>
        <img src="<?php if($a->getLienPhoto()==!null){echo $a->getLienPhoto();}else{echo "/loueMonAppart/image/imageVide.jpg";} ?>" id="imgAnnonce">
        <h1 id="prixAnnonce"><? echo $a->getPrix(); ?>€ par semaine.</h1>
        <h2 id="villeAnnonce">A <? echo ucfirst($a->getVille()); ?></h2>
        <p id="descriptionAnnonce">Description:&nbsp;<? echo ucfirst($a->getDescription()); ?></p>
        <hr class="ligne">
        <button id="louerBien"><a href="/loueMonAppart/louerAppartViews/<?=$a->getId()?>">JE LOUE CE BIEN</a></button>
</div>
<?php endforeach;?> 
</div>
<?php echo $footer ?>