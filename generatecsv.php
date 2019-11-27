<!DOCTYPE html>
<html>
	<head>
		<title>Base de dados limpa</title>
		<link rel="stylesheet" type="text/css" href="mystyle2.css">
		<script src="myscript.js"></script>
	</head>
	<body class="body">
		<?php
			$caracteristicas = $_POST['teste2'];
			$arquivo = $_POST['arquivo'];
			$novoNome = $_POST['nome'];
			$cont = 0;
			$arrayTeste = array();
			$gerar = TRUE;
			
			$arrayCarac = array();
			
			
			for ($i = 0; $i < strlen($caracteristicas); $i++) {
				if($caracteristicas[$i] != ""){
					$arrayCarac = explode(",", $caracteristicas);
				} 	
			}

			echo '<p> CARACTERISTICAS SELECIONADAS: </p>';
			for ($i = 0; $i < count($arrayCarac); $i++) {
				if(($arrayCarac[$i] != "") && ($i != count($arrayCarac) - 1)){
					echo "<a>".$arrayCarac[$i] . ", </a>";
				} else {
					echo "<a>".$arrayCarac[$i]."</a>";
				}
			}
			echo '<p> Nome do arquivo: '.$novoNome.'</p>';

			echo '<br>';

			$f = fopen($arquivo, 'r');
			$novo = fopen('Arquivos CSV/novo' . $novoNome, 'w');
			$row = 1;
			if ($f) {
				echo '<div class="background">';
				echo '<div class="divTabela">';
				echo '<table class="gridTabela" id="tabela">';
				$cabecalho = fgetcsv($f, 0, ',');
				while (!feof($f)) {
					$linha = fgetcsv($f, 0, ",");
					if(!$linha){
						continue;
					}
					$registro = array_combine($cabecalho, $linha);
					if ($row == 1) {
			            echo '<tr>';
			        }else{
			            echo '<tr>';
			        }
					for ($i=0; $i < count($arrayCarac); $i++) {
						if($arrayCarac[$i] != ""){
							if ($row == 1) {
								echo '<th>'.$arrayCarac[$i].'</th>';
								if($i == count($arrayCarac) - 1){
									fwrite($novo, $arrayCarac[$i] . PHP_EOL );
								} else {
									fwrite($novo, $arrayCarac[$i] . ',' );
								}
								
				            }else{
								echo '<td>'.$registro[$arrayCarac[$i]].'</td>';
								if($i == count($arrayCarac) - 1){
									fwrite($novo, $registro[$arrayCarac[$i]] . PHP_EOL );
								} else {
									fwrite($novo, $registro[$arrayCarac[$i]] . ',' );
								}
							}
						}
					}
					if ($row == 1) {
			            echo '</tr>';
			        }else{
			            echo '</tr>';
			        }
					$row++;
				}
				fclose($novo);
				echo '</table>';
			    echo '</div>';
				echo '</div>';
			}
		?>
	</body>
</html>