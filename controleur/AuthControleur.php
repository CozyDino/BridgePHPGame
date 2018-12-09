<?php
require_once "vue/Jeu.php";
require_once "modele/User.php";
class AuthControleur
{
    private $modele;
    private $vue;
    function __construct()
    {
        $this->vue = new Vue();
        $this->modele = new User();
    }

    public function login()
    {
        if(!isset($_POST['login']) && !isset($_POST['password']))
        {
            $this->vue->afficherLogin();
        }
        else
        {
            if($this->modele->verifAuth($_POST['login'],$_POST['password']))
            {
                $_SESSION['login'] = $_POST['login'];
                $this->vue->afficherJeu(new Villes());
		        $this->vue->afficherFormulaire();
            }
        }
    }
}