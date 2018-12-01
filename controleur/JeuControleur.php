<?php

require_once "modele/Villes.php";
require_once "vue/Jeu.php";

class JeuControleur
{
	public function test()
	{
		$villes = new Villes();
		$jeu = new Vue();
		$jeu->afficherJeu($villes);
		$jeu->afficherFormulaire();
	}
}
