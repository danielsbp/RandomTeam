<!DOCTYPE html>
<html>
<head>
	<title>Etapa final</title>
	<meta charset="utf-8"/>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css"/>
</head>
<body>
	<?php
	INCLUDE("conexao.php");
	session_start();
	$idGrupo = $_SESSION['idGrupo'];
	$query = "SELECT nome FROM membro WHERE t_id = $idGrupo";

	$result = mysqli_query($link, $query);
	$alunos = array();
	while($linha = mysqli_fetch_array($result, MYSQLI_NUM)) {
		array_push($alunos, $linha[0]);
	}

	$qtdGrupos = $_POST['qtdGrupos'];
	$qtdAlunos = $_SESSION['quantidadeAlunos'];
	$qtdAlunosPorGrupo = intval($qtdAlunos)/intval($qtdGrupos);

	/*echo $qtdGrupos.'+'.$qtdAlunos.'='.$qtdAlunosPorGrupo;*/
	$b = 0;
	echo "<table border='1'>";
	echo "<tr>";
	for ($i=1; $i < $qtdGrupos+1 ; $i++) { 
		echo "<td><b>$i</b><br/><hr/>";
		for($k=0; $k < ceil($qtdAlunosPorGrupo);$k++){
			$indice = rand(0, count($alunos)-1);
			if($indice<0) {
				$indice++;
			}
			//echo "<strong>".$indice."</strong>";
			echo $alunos[$indice]."<br/>";
			
			array_splice($alunos,$indice,1);
		}
	}
	echo "</tr>";
	echo "</table>";

?>

<input type="button" onclick="document.location.reload();" value="Gerar outro grupo"/>
<a href="index.php"><input type="button" value="Ir para o início"/></a>
</body>
</html>

