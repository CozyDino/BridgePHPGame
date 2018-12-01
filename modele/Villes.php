<?php
// cette classe ne doit pas être modifiée
require_once "Ville.php";

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
/*$this->lierVilles(0, 0, 0, 6);
$this->lierVilles(0, 0, 3, 0);
$this->lierVilles(3, 0, 3, 5);
$this->lierVilles(0, 6, 5, 6);
$this->lierVilles(0, 6, 5, 6);*/
}


// sélecteur qui retourne la ville en position $i et $j 
// précondition: la ville en position $i et $j existe
          
function getVille($i,$j){
return $this->villes[$i][$j];
}

function getVilles()
{
	return $this->villes;
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

//Lie une ville a à une ville B en fonction de ses coordonnées
function lierVilles($ALigne,$ACol, $BLigne, $BCol)
{
	$lienCoupant = false;
	if($this->existe($ALigne,$ACol) && $this->existe($BLigne, $BCol) 
	&& ($ALigne == $BLigne || $ACol == $BCol) 
	&& !$this->existeVilleEntre($ALigne,$ACol, $BLigne, $BCol))
	{
		//On doit ensuite voir si il n'y à pas de lien coupant la future liaison, il faut donc calculer pour chaque case, le nb de lien traversant horizontaux et verticaux
		if($ACol == $BCol)
		{
			for($i = $ALigne + 1; $i < $BLigne; $i++)
			{
				if($this->nbLienTraversantHorizontal($i, $ACol) > 0)
				{
					$lienCoupant = true;
				}
			}
		}
		if($ALigne == $BLigne)
		{
			for($i = $ACol + 1; $i < $BCol; $i++)
			{
				if($this->nbLienTraversantVertical($ALigne, $i) > 0)
				{
					$lienCoupant = true;
				}
			}
		}
		if(!$lienCoupant)
		{
			$this->getVille($ALigne, $ACol)->lierVille($this->getVille($BLigne, $BCol));
			$this->getVille($BLigne,$BCol)->lierVille($this->getVille($ALigne, $ACol));
		}
	}
}

//Regarde si il existe une ville entre la position d'une ville A et une autre position d'une ville B
function existeVilleEntre($ALigne,$ACol, $BLigne, $BCol)
{
	if($ALigne == $BLigne)
	{
		if($ACol < $BCol)
		{
			for($i = $ACol + 1; $i < $BCol; $i++)
			{
				if($this->existe($ALigne, $i))
				{
					return true;
				}
			}
		}
		else
		{
			for($i = $BCol + 1; $i < $ACol; $i++)
			{
				if($this->existe($ALigne, $i))
				{
					return true;
				}
			}
		}
	}
	else if($ACol == $BCol)
	{
		if($ALigne < $BLigne)
		{
			for($i = $ALigne + 1; $i < $BLigne; $i++)
			{
				if($this->existe($i, $ACol))
				{
					return true;
				}
			}
		}
		else
		{
			for($i = $BLigne + 1; $i < $ALigne; $i++)
			{
				if($this->existe($i, $ACol))
				{
					return true;
				}
			}
		}
	}
	else
	{
		return false;
	}
}

//Donne le nombre de pont liant deux villes
function nbPont($ALigne,$ACol, $BLigne, $BCol)
{
	return($this->getVille($BLigne, $BCol)->nbPont($this->getVille($ALigne, $ACol)));
}


//Calcule, pour une coordonnées (Ligne, Colonne), le nombre de liens horizontaux là traversant.
function nbLienTraversantHorizontal($ligne, $colonne)
{
	for($i = 0; $i < $colonne; $i++)
	{
		if($this->existe($ligne, $i))
		{
			for($j = $colonne; $j < 7; $j++)
			{
				if($this->existe($ligne, $j))
				{
					if($this->getVille($ligne, $i)->nbPont($this->getVille($ligne, $j)) > 0)
					{
						return $this->getVille($ligne, $i)->nbPont($this->getVille($ligne, $j));
					}
					else
					{
						return 0;
					}
				}
			}
		}
	}
}


//Calcule, pour une coordonnées (Ligne, Colonne), le nombre de liens verticaux là traversant.
function nbLienTraversantVertical($ligne, $colonne)
{
	for($i = 0; $i < $ligne; $i++)
	{
		if($this->existe($i, $colonne))
		{
			for($j = $ligne; $j < 7; $j++)
			{
				if($this->existe($j, $colonne))
				{
					if($this->getVille($i, $colonne)->nbPont($this->getVille($j, $colonne)) > 0)
					{
						return $this->getVille($i, $colonne)->nbPont($this->getVille($j, $colonne));
					}
					else
					{
						return 0;
					}
				}
			}
		}
	}
}

//rajout d'éventuelles méthodes




}
