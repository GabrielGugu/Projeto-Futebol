<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="mystyle2.css">
</head>
<body>
	<?php
		$arquivo = $_POST['arquivo'];
		$cont = 0;
		if (($arquivoCSV = fopen($arquivo, "r")) != FALSE) {
			echo "<div class='divTabela'>";
			echo "<table class='gridTabela'>";
			echo 
			"<tr>
				<th>Equipes de futebol</th>
			</tr>";
			while (($csvData = fgetcsv($arquivoCSV, 1000, ",")) != FALSE && $cont <= 20) {
				$contador = count($csvData);
				if ($csvData[2] != 'HomeTeam') {
					echo "<tr>";
					echo "<td>".$csvData[2]."</td>";
					echo "<br>";
					echo "</tr>";
				}
				$cont++;
			}
			echo "</table>";
			echo "</div>";
		}
	?>
</body>
</html>

