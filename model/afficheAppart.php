<?php
$bdd = new bddManager();
$affiche = $bdd->getAllById();
echo "<pre>";
print_r($affiche);
echo "</pre>";


