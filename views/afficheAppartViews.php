<?php echo $header ?>
<header>
    <img src="/loueMonAppart/image/loue-mon-appartement.png">
    <?php if(empty($_SESSION['user']) == false):?>
<button><a href="/loueMonAppart/deconnec">X</a></button>
<?php endif; ?>
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
        <?php if(empty($_SESSION['user']) == false):?>
        <button id="louerBien"><a href="/loueMonAppart/reservationAppartViews/<?php echo $a->getId();?>">JE LOUE CE BIEN</a></button>
        <?php endif;?>
        <?php if(empty($_SESSION['user']) == true):?>
        <button id="louerBien"><a href="/loueMonAppart/accueil">JE ME LOGUE</a></button>
        <?php endif;?>
</div>
<?php endforeach;?> 
</div>

<?php echo $footer ?>