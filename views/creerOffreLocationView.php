<?php echo $header ?>
<header>
    <img src="image/loue-mon-appartement.png">
</header>
<nav>
    <button><a href="location">LES LOCATIONS</a></button>
    <button><a href="accueil">ACCUEIL</a></button>
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
    <h1>Mettre en location un bien</h1>
    <form action="creerOffreLocation" method="post" enctype="multipart/form-data">
    <div class="form">
        <label>Type de bien: </label><br>
        <select name="type">
            <option value="appartement">Appartement</option>
            <option value="villa">villa</option>
            <option value="chalet">chalet</option>
            <option value="mobilhome">Mobil-Home</option>
        </select>
    </div>
    <div class="form">
        <label>Nombre de couchage: </label><br>
        <select name="nbCouchage">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
        </select>
    </div>
    <div class="form">
        <label>PRIX (à la semaine): </label><br>
        <input class="formInput" type="text" name="prix" value=""/>
    </div>
    <div class="form">
        <label>Description: </label><br>
        <textarea name="description" value=""> </textarea>
    </div>
    <div class="form">
        <label>Appartement numéro:</label><br>
        <input class="formInput" type="text" name="numAppart" value="" />
    </div>
    <div class="form">
        <label>Etage:</label><br>
        <input class="formInput" type="text" name="etage" value="" />
    </div>
    <div class="form">
        <label>Numero de la rue:</label><br>
        <input class="formInput" type="text" name="numRue" value="" />
    </div>
    <div class="form">
        <label>Nom de la rue:</label><br>
        <input class="formInput" type="text" name="nomRue" value="" />
    </div>
    <div class="form">
        <label>Code Postal:</label><br>
        <input class="formInput" type="text" name="codepostal" value="" />
    </div>
    <div class="form">
        <label>Ville:</label><br>
        <input class="formInput" type="text" name="ville" value="" />
    </div>
    <div class="form">
        <label>Pays:</label><br>
        <input class="formInput" type="text" name="pays" value="" />
    </div>
    
    <div class="form">
        <label>Disponible: </label><br>
        <select name="dispo">
            <option value="oui">Oui</option>
            <option value="non">Non</option>
        </select>
    </div>
    <input type="hidden"  name="idProprio" value="<?php echo $_SESSION['user'][0]['id'];?>">
    <div class="form" id="telechargement">
        <label >Charger une photo de l'appartement:<br>(Vous pourrez en charger d'autre dans votre page "admin") </label><br>
        <input type="file" name="photo1">
    </div>
    <button class="validation" type="submit">CREER COMPTE</button>
</form>
</div>
<?php echo $footer ?>