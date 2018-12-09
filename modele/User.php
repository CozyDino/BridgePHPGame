<?php

class User
{
    private $connexion;
    function __construct()
    {
        $this->connexion = new PDO('mysql:host=localhost;dbname=E175119X', 'E175119X', 'E175119X');
    }
    function verifAuth()
    {
        $requete = $this->connexion->prepare("select * from joueurs where pseudo=?");
        $requete->bindParam(1, $_POST['login']);
        $requete->execute();
        $resultat = $requete->fetch();
        if(crypt($_POST['password'], $resultat['motDePasse']) == $resultat['motDePasse'])
        {
            return true;
        }
        return false;
    }
}