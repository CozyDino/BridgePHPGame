<?php
require_once "controleur/JeuControleur.php";

class Routeur
{
    private $ctrlJeu;
    public function __construct()
    {
        $this->ctrlJeu = new JeuControleur();
    }

    public function routerRequete()
    {
        $this->ctrlJeu->test();
    }    
}