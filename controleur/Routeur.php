<?php
require_once "controleur/JeuControleur.php";

session_start();

class Routeur
{
    private $ctrlJeu;
    public function __construct()
    {
        if(!isset($_SESSION['jeu']))
        {
            $this->ctrlJeu = new JeuControleur();
            $_SESSION['jeu'] = $this->ctrlJeu;
        }
        else
        {
            $this->ctrlJeu = $_SESSION['jeu'];
        }
    }

    public function routerRequete()
    {
        $this->ctrlJeu->test();
    }    
}