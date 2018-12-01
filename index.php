<?php
require_once "controleur/JeuControleur.php";
require_once "controleur/Routeur.php";

$routeur = new Routeur();
$routeur->routerRequete();
