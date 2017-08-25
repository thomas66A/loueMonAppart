<?php
$bdd = new BddManager();
$idAppart = $bdd->getLastId();
echo$idAppart[0];