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

<?php echo $footer ?>