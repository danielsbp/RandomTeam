<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	
	<link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css"/>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div class="container">
		<h1 id="titulo">SORTEADOR DE GRUPOS</h1>
		<form action="sortear.php" method="POST">
			Selecione a sala:
			<select name="sala">
				<?php
					INCLUDE("conexao.php");

					$query = "SELECT * FROM turma";

					$result = mysqli_query($link, $query) or die("Erro");

					while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
						echo "<option value='$row[0]'>$row[1]</option>";
					}

				?>
			</select>
			<input type="submit" value="teste"/>
		</form>
		<form action="" method="POST">
			Ou registre uma: <input type="submit" name="criar" value="+" class="botaoMais"/>
			
		</form>
		<?php
				if($_POST['criar']) {
					echo "<div id='criarGrupo'>
			<form method='POST' action='criarGrupo.php'>
				Digite o nome da sala: <input type='text' name='nome'/><input type='submit' value='Registrar Turma'/>
			</form>
		</div>";
				}
			?>
		<!--
		-->
		<!--<div id="addParticipante">
			<form method="post" action="addPart.php">
				<input type="text" name="participante"/>
				<input type="submit" value="Adicionar"/>
			</form>
		</div>-->
		
		
	</center>
</body>
</html>