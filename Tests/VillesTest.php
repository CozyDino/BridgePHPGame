<?php

require_once "../modele/Villes.php";

$lesvilles = new Villes();

$lesvilles->lierVilles(0, 0, 0, 6);
$lesvilles->lierVilles(0, 0, 3, 5);


echo "Le nombre de pont entre les deux villes est : ".$lesvilles->nbPont(0, 0, 0, 6);
