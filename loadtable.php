<!DOCTYPE html>
<html>
	<head>
		<title>Database CSV format</title>
		<link rel="stylesheet" type="text/css" href="mystyle2.css">
		<script src="myscript.js"></script>
	</head>
	<body class="body">
		
		<?php
			$arqTemp = $_FILES['arquivo']['tmp_name'];
			$nome = $_FILES['arquivo']['name'];
			move_uploaded_file($arqTemp, 'Arquivos CSV/' . $nome);
			$row = 1;
			if (($handle = fopen('Arquivos CSV/' . $nome, "r")) !== FALSE) {
				echo '<div class="background">';
				echo '<h1>Database Table</h1>';
				echo '<div class="divTabela">';
			    echo '<table class="gridTabela">';

			    echo '<form method="post">';
			    echo '<p id="teste" type="hidden"></p>';
			    echo '</form>';
			    $aux = 0;
			    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
			        $num = count($data);
			        if ($row == 1) {
			            echo '<tr>';
			        }else{
			            echo '<tr>';
			        }
			        for ($c=0; $c < $num; $c++) {
						$value = $data[$c];
			            if ($row == 1) {
			                echo '<th>'.$value.'</th>';
			            }else{
			                echo '<td>'.$value.'</td>';
			            }
			        }  
			        if ($row == 1) {
			            echo '</tr>';
			        }else{
			            echo '</tr>';
			        }
			        if ($aux < 1) {
			        	echo '<h3>Selecione as caracteristicas que deseja</h3>';
			        	echo '<div class="selecionar">';
				        echo '<select multiple id="select">';
				        for ($c=0; $c < $num; $c++) {
							$value = $data[$c];
				            if($data[$c] != 'Div' && $data[$c] != 'Date'){
				            	echo '<option value="'.$value.'">'.$value.'</option>';
				            }
				        }
				        echo '</select>';
				        echo '<br>';
				        echo '<br>';
				        echo '<form action="generatecsv.php" method="post">';
				        echo '<input type="hidden" id="teste2" name="teste2">';
						echo '<input type="hidden" id="arquivo" name="arquivo" value="Arquivos CSV/' . $nome . '">';
						echo '<input type="hidden" id="nome" name="nome" value="'. $nome.'">';
				        echo '<input class="btnl" id="btnEnviar" onClick="pegarSelect()" type="submit" name="escolher" value="ESCOLHER CARACTERISTICAS">';
				        echo '</form>';
				        echo '</div>';
				        echo '<br>';
				        echo '<h2 class="teste">Tabela de dados</h2>';
			        }

			        $row++;
			        $aux++;
			    }
			    echo '</table>';
			    echo '</div>';
			    echo '</div>';
			    fclose($handle);
			}
		?>	

	</body>
</html>