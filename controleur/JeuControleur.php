<?php

require_once "modele/Villes.php";
require_once "vue/Jeu.php";
require_once "controleur/AuthControleur.php";

class JeuControleur
{
	private $modele;
	private $vue;
	public function __construct()
	{
		$this->modele = new Villes();
		$this->vue = new Vue();
	}
	public function test()
	{
		if(isset($_POST['villeALigne']) && isset($_POST['villeAColonne']) && isset($_POST['villeBLigne']) && isset($_POST['villeBColonne']))
		{
			$this->modele->lierVilles($_POST['villeALigne'], $_POST['villeAColonne'], $_POST['villeBLigne'], $_POST['villeBColonne']);
		}
		$this->vue->afficherJeu($this->modele);
		$this->vue->afficherFormulaire();
	}
}
