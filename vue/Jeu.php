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
		echo "<table>";
		for($i = 0; $i < 7; $i++)
		{
			echo '<tr>';
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
	}

	public function afficherFormulaire()
	{
		?>
		<form method="POST" action="routeur.php">
		<p> ______Selection ville A_________ </p>
		Ligne : <input type="number" name="villeALigne"/>
		Colonne : <input type="number" name="villeAColonne"/>
		<p> ______Selection ville B_________ </p>
		Ligne : <input type="number" name="villeBLigne"/>
		Colonne : <input type="number" name="villeBColonne"/>
		</form>
		<?php
	}
}
?>