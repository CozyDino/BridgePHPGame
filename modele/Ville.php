<?php


class Ville{
// permet d'identifier de manière unique la ville
private $id;
private $nombrePontsMax;
private $nombrePonts;
// un tableau associatif qui stocke les villes qui sont reliées à la ville cible et le nombre de ponts qui les relient (ce nombre de ponts doit être <=2)
private $villesLiees;


// constructeur qui permet de valuer les 2 attributs de la classe
function __construct($id,$nombrePontsMax,$nombrePonts){
$this->id=$id;
$this->nombrePontsMax=$nombrePontsMax;
$this->nombrePonts=$nombrePonts;
$this->villesLiees= null;

}

// sélecteur qui retourne la valeur de l'attribut id
function getId(){
return $this->id;
}


// sélecteur qui retourne la valeur de l'attribut nombrePontsMax
function getNombrePontsMax(){
return $this->nombrePontsMax;
}
// sélecteur qui retourne la valeur de l'attribut nombrePonts
function getNombrePonts(){
return $this->nombrePonts;
}

//modifieur qui permet de valuer l'attribut nombrePonts
function setNombrePonts($nb){
$this->nombrePonts=$nb;
}


function lierVille($laville)
{
	if(isset($this->villesLiees[$laville->getId()])) //Si la valeur dans le tableau existe déjà
	{
		if($this->villesLiees[$laville->getId()] < 2) //On vérifie si il y a moins de deux ponts entre les deux
		{
			$this->villesLiees[$laville->getId()] = $this->villesLiees[$laville->getId()] + 1; //Si c'est le cas, on additionne
			$this->setNombrePonts($this->getNombrePonts() + 1);
		}
		else
		{
			$this->delierVille($laville);
		}
		
	}
	else //ici il n'y a pas de liaison entre les deux
	{
		$this->villesLiees[$laville->getId()] = 1;
		$this->setNombrePonts($this->getNombrePonts() + 1);
		print_r($this->villesLiees);
	}
}

function delierVille($laville)

{	
	$this->setNombrePonts($this->getNombrePonts() - $this->villesLiees[$laville->getId()]);
	$this->villesLiees[$laville->getId()] = null;
}

function nbPont($laville)
{
	if(isset($this->villesLiees[$laville->getId()]))
	{
		return($this->villesLiees[$laville->getId()]);
	}
	else //Si la valeur n'est pas dans le tableau associatif, alors il y a 0 ponts entre les deux villes.
	{
		return(0);
	}
}

function estLiee($villeB)
{
	return(isset($this->villesLiees[$laville->getId()]));
}


//il faut ici implémenter les méthodes qui permettent de lier des villes entre elles, ...

}
