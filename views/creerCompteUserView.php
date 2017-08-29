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
<h1><?php 
if(isset($_SESSION['erreur']))
{
echo "<pre>";
print_r($_SESSION['erreur']);
echo "</pre>";
}
?>
<div id="connection">    
    <h1>Creer votre compte Locataire</h1>
    <form action="/loueMonAppart/registerService" method="post">
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