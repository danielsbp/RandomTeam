
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css"/>
</head>
<?php session_start(); ?>
<body>
	<div class="container">
		<h1 id="titulo">SORTEADOR DE GRUPOS</h1>
		
		<div id="addParticipante">
			<form method="post" action="addPart.php">
				Id da Sala: <?php echo $_SESSION['idGrupo']; ?> <br>
				Qtd de alunos: 
				<?php 
					INCLUDE("qtdDeAlunos.php");
				 ?>
				 <br>
				Nome do Aluno: <input type="text" name="participante"/>
				<br>

				<input type="submit" value="Adicionar"/>
			</form>
			<form action="sortear.php">
				<input type="submit" value="SORTEAR"/>
			</form>
		</div>
		<div id="mostrarParticipantes" class="container">
		<?php 
			$linha = array();
			include("conexao.php");
			$idGrupo = $_SESSION['idGrupo'];
			$result = mysqli_query($link,"SELECT * FROM membro WHERE t_id = $idGrupo") or die("Não foi possível consultar");

			while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {

				echo $row[1]."<br>";
			}			
		?>
		</div>
		
		
	</center>
</body>
</html>


