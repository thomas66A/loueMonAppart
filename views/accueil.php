<?php echo $header ?>
<header><img src="image/loue-mon-appartement.png">
<?php if(empty($_SESSION['user']) == false):?>
<button><a href="deconnec">X</a></button>
<?php endif; ?>
</header>

<nav>
    <button><a href="location">LES LOCATIONS</a></button>
    <?php if(empty($_SESSION['user']) == true):?>
    <button><a href="creerCompteUserView">CREER UN COMPTE UTILISATEUR</a></button>
    <?php endif; ?>
</nav>
<?php if(empty($_SESSION['user']) == true):?>
<div id="connection">    
    <h1>CONNECTION</h1>
    <form action="loginService" method="post">
    <div class="form">
        <label>NOM: </label><br>
        <input class="formInput" type="text" name="nom" value=""/>
    </div>
    <div class="form">
        <label>MOT DE PASSE:</label><br>
        <input class="formInput" type="password" name="password" value="" />
    </div>
    <button class="validation" type="submit">Login</button>
</form>
</div>
<?php endif; ?>
<?php if(empty($_SESSION['user']) == false):?>
<nav>
    <button><a href="offreLocationView">CREER UNE OFFRE DE LOCATION</a></button>
</nav>
<?php endif; ?>
<?php echo $footer ?>