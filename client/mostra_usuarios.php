<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<h3>MOSTRA USUARIOS CADASTRADOS:</h3>
<p>Nome do Usuário -------->   Tipo de usuário:</br>


<?php


	include_once('mostraUsu.php');
	$valor = new MostraUsuario(); 
	$dados=$valor->toShowUsuario();


	foreach ($dados as $key => $child)

		{
			
			echo "<p>".array_shift(array_values($child))." --> " . array_pop(array_values($child)). "</p>";
		}

	

?>


</body>
</html>