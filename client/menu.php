<?php
	session_start();
?>	
<!DOCTYPE html>

<head>
	<title>POEMA MP3 - TRABALHO DISCIPLINA DESENVOLVIMENTO WEB - PROF CAIO</title>
</head>
<body>

			<?php	
			echo "<h3>Seja bem-vindo, {$_SESSION["nome"]},  você está cadastrada desde  : {$_SESSION["data"]}</h3>";
			?>

	<h1>Poema MP3 - beta</h1>
	<p>Menu Principal:</br>

	<p>CRUD POEMA:</br>
		<a href="http://localhost/client/mostra_poema.php">Mostrar Poemas cadastrados</a> <br>
		<a href="http://localhost/client/poema_cadastro.php">Cadastrar NOVO Poema</a> <br>
		<a href="http://localhost/client/poema_alterar.php">Alterar Poema</a> <br>

		</p>
		</br>


	 <p>MOSTRAR RANKING:</br>
	 	<a href="http://localhost/client/mostra_ranking.php"">Mostrar Ranking</a> 
		</br>
	 	</p>

	 <p>AREA ADMINISTRADOR:</br>
	 	<a href="http://localhost/client/mostra_usuarios.php">Mostrar Usuários cadastrados</a> <br>
 		</p>

</body>
</html>