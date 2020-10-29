<?php
	INCLUDE("conexao.php");
	$turma = $_POST['nome'];
	
	$query = "INSERT INTO turma(nome) VALUES ('$turma')";

	mysqli_query($link, $query);

	$query = "SELECT t_id FROM turma WHERE nome = '$turma'";

	$result = mysqli_query($link, $query) or die ("Erro");
	$row = mysqli_fetch_array($result, MYSQLI_NUM);

	session_start();
	$_SESSION['idGrupo'] = $row[0];

	header("location: addPartTurma.php");
	
	
?>