<?php 
	INCLUDE("conexao.php");
	session_start();
	$idGrupo = $_SESSION['idGrupo'];
	
	$query = "SELECT COUNT(id) FROM membro WHERE t_id=$idGrupo";
	$result = mysqli_query($link, $query) or die("EERROO");
	$row = mysqli_fetch_array($result);

	$qtd = $row[0];

	$_SESSION['quantidadeAlunos'] = $qtd;
	echo $qtd;
	

?>