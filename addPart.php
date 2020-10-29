<?php
	include("conexao.php");
	session_start();
	$participante = $_POST['participante'];
	$turma = $_SESSION['idGrupo'];
	
	$query = "INSERT INTO membro(nome, t_id) VALUES ('$participante', $turma)";
	echo $turma;
	mysqli_query($link, $query) or die ("Errooo");
	
	header("location: addPartTurma.php?id=$turma");
?>