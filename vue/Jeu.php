<?php

class Vue
{
	public function accueil()
	{
	?>
	<html>
	<head>
		<meta charset="utf-8">echo "<td>c</td>";
	</head>
		<body>
		<p>Bienvenue sur le jeu</p>
		<div id="jeu">
		
		</div>
		<div id="Deconnecter">
		</div>
	</body>
	</html>
	<?php
	}

	public function afficherJeu($villes)
	{
		?>
		<head>
			<meta charset="utf-8"/>
			<link rel="stylesheet" type="text/css" href="css/style.css"/>
		</head>
		<?php
		$tableauVilles = $villes->getVilles();
		echo "Vous êtes connecté en tant que ".$_SESSION['login'];
		echo "<table>";
		echo '<tr>';
		echo '<td id="indexes"></td>';
		for($i = 0; $i < 7; $i++)
		{
			echo '<td id="indexes">'.$i."</td>";
		}
		for($i = 0; $i < 7; $i++)
		{
			echo '<tr>';
			echo '<td id="indexes">'.$i.'</td>';
			for($j = 0; $j < 7; $j++)
			{
				if(isset($tableauVilles[$i][$j]))
				{
					echo "<td>".$tableauVilles[$i][$j]->getNombrePontsMax()."</td>";
				}
				else
				{
					if($villes->nbLienTraversantHorizontal($i, $j) == 1)
					{
						echo "<td>-</td>";
					}
					else if($villes->nbLienTraversantHorizontal($i, $j) == 2)
					{
						echo "<td>=</td>";
					}
					else if($villes->nbLienTraversantVertical($i, $j) == 1)
					{
						echo "<td>|</td>";
					}else if($villes->nbLienTraversantVertical($i, $j) == 2)
					{
						echo "<td>||</td>";
					}
					else
					{
						echo "<td>*</td>";
					}
				}
			}
			echo '</tr>';
		}
		echo "</table>";
		?>
		<div id="message_aide">
		<p>Bienvenue sur le bridge game !</p>
		<p>Créer des liens en selectionnant les villes grâce au formulaire</p>
		<p>Créer un lien entre deux ville qui ont déjà un lien en créera un deuxième, le refaire supprimera le lien</p>
		</div>
		<?php

		if($villes->aGagne())
		{
			echo "Vous avez gagné ";
			echo '<img src="http://image.noelshack.com/fichiers/2017/08/1487984196-789797987987464646468798798.png" alt="Image Bien Joué">';
		}
	}

	public function afficherFormulaire()
	{
		?>
		<div id="formulaire">
		<form method="POST" action="index.php">
		<p> ______Selection ville A_________ </p>
		Ligne : <input type="number" name="villeALigne"/>
		Colonne : <input type="number" name="villeAColonne"/>
		<p> ______Selection ville B_________ </p>
		Ligne : <input type="number" name="villeBLigne"/>
		Colonne : <input type="number" name="villeBColonne"/>
		<input type="submit"/>
		</form>
		<a href="recommencer.php">Recommencer</a>
		<a href="deconnexion.php">Deconnexion</a>
		</div>
		<?php
	}

	public function afficherLogin()
	{
		?>
		<form method="POST" action="index.php">
			Login : <input type="text" name="login">
			Password : <input type="password" name="password">
			<input type="submit" value="connexion">
		</form>
		<?php
	}
}
?>
