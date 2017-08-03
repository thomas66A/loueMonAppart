<?php echo $header ?>
<header><img src="image/loue-mon-appartement.png">
<?php if(!empty($_SESSION['user']) == false):?>
<button><a href="deconnec">X</a></button>
<?php endif; ?>
</header>

<nav>
    <button><a href="location">LES LOCATIONS</a></button>
    <button><a href="signup">CREER UN COMPTE LOCATAIRE</a></button>
    <button><a href="signup2">CREER UN COMPTE BAILLEUR</a></button>
</nav>
<?php if(empty($_SESSION['user']) == false):?>
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
<?php echo $footer ?>