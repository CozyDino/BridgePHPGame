<?php
// cette classe ne doit pas être modifiée
require "Ville.php";

class Villes{

private $villes;

function __construct(){
// tableau représentatif d'un jeu qui servira à développer votre code

$this->villes[0][0]=new Ville("0",3,0);
$this->villes[0][6]=new Ville("1",2,0);
$this->villes[3][0]=new Ville("2",6,0);
$this->villes[3][5]=new Ville("3",2,0);
$this->villes[5][1]=new Ville("4",1,0);
$this->villes[5][6]=new Ville("5",2,0);
$this->villes[6][0]=new Ville("6",2,0);

}


// sélecteur qui retourne la ville en position $i et $j 
// précondition: la ville en position $i et $j existe
          
function getVille($i,$j){
return $this->villes[$i][$j];
}


// modifieur qui value le nombre de ponts de la ville en position $i et $j;
// précondition: la ville en position $i et $j existe

function setVille($i,$j,$nombrePonts){
$this->villes[$i][$j]->setNombrePonts($nombrePonts);
}


// permet de tester si la ville en position $i et $j existe 
// postcondition: vrai si la ville existe, faux sinon

function existe($i,$j){
return isset($this->villes[$i][$j]);
}

function lierVilles($ALigne,$ACol, $BLigne, $BCol)
{
	$this->getVille($ALigne, $ACol)->lierVille($this->getVille($BLigne, $BCol));
	$this->getVille($BLigne,$BCol)->lierVille($this->getVille($ALigne, $ACol));
}

function nbPont($ALigne,$ACol, $BLigne, $BCol)
{
	return($this->getVille($BLigne, $BCol)->nbPont($this->getVille($ALigne, $ACol)));
}


//rajout d'éventuelles méthodes




}
