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
<body>
	<div class="container">
		<?php 
			session_start();
			$_SESSION['idGrupo'] = $_POST['sala'];

		?>
		Quantidade de alunos: <?php INCLUDE("qtdDeAlunos.php"); ?>
		<br>
		Em quantos grupos você deseja sortear estes alunos?: 
		<form action="gerarGrupos.php" method="POST" id="gerarGrupos">
			<div id="escolha">
			<select name="qtdGrupos" onchange="conferir();" id="qtdGrupos">
				<?php 
					$cont = $_SESSION['quantidadeAlunos'];
					
					while($cont>0){
						$inteiro = is_int($_SESSION['quantidadeAlunos']/$cont);

						if($inteiro) {
							echo "<option value='$cont'>$cont</option>";
						}

 						$cont--;
					}
					
					echo "<option value='0'>Outro</option>";

					
				?>

			</select>
			</div>
			<script>
				function conferir() {
					var escolha = document.querySelector('#escolha');
					var select = document.querySelector("#qtdGrupos");
					if(select.options[select.selectedIndex].value=='0'){
						escolha.innerHTML = "<label for='qtdGrupos'>Digite a quantidade: </label><input type='text' name='qtdGrupos'/>";
					}
				}

			</script>
			<input type="submit" value="Gerar os grupos" id="btnSortear"/>
		</form>
	</div>






	<script>
			function verificar() {
				if(document.querySelector('#qtdGrupos').value><?php include("qtdDeAlunos.php")?> || document.querySelector('#qtdGrupos').value == 0) {
					alert("Impossível dividir os grupos");
					document.querySelector('#qtdGrupos').value = 1;
				}
			}
		</script>
</body>
</html>