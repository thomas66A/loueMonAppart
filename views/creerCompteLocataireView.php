<?php echo $header ?>
<header>
    <img src="image/loue-mon-appartement.png">
</header>
<nav>
    <button><a href="location">LES LOCATIONS</a></button>
    <button><a href="accueil">ACCUEIL</a></button>
    <button><a href="creerCompteBailleur">CREER UN COMPTE BAILLEUR</a></button>
</nav>
<div id="connection">    
    <h1>Creer votre compte locataire</h1>
    <form action="creerCompteLocataire" method="post">
    <div class="form">
        <label>NOM: </label><br>
        <input class="formInput" type="text" name="nom" value=""/>
    </div>
    <div class="form">
        <label>PRENOM: </label><br>
        <input class="formInput" type="text" name="prenom" value=""/>
    </div>
    <div class="form">
        <label>EMAIL: </label><br>
        <input class="formInput" type="email" name="email" value=""/>
    </div>
    <div class="form">
        <label>TELEPHONE:</label><br>
        <input class="formInput" type="telephone" name="telephone" value="" />
    </div>
    <div class="form">
        <label>MOT DE PASSE:</label><br>
        <input class="formInput" type="password" name="password" value="" />
    </div>
    <div class="form">
        <label>COMFIRMEZ VOTRE MOT DE PASSE:</label><br>
        <input class="formInput" type="password" name="password2" value="" />
    </div>

    <button class="validation" type="submit">CREER COMPTE</button>
</form>
</div>
<?php echo $footer ?>