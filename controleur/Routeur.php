<?php
require_once "controleur/JeuControleur.php";
require_once "controleur/AuthControleur.php";

session_start();

class Routeur
{
    private $ctrlJeu;
    private $ctrlAuth;

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
        $this->ctrlAuth = new AuthControleur();
    }

    public function routerRequete()
    {
            if(!isset($_SESSION['login']))
            {
                $this->ctrlAuth->login();
            }
            else{
                $this->ctrlJeu->test();    
            }
    }    
}
