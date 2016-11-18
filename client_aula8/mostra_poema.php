<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<p>MOSTRA POEMA CADASTRADOS:</br>
<p>Nome do Poema --------------->   Tipo de Usuário:</br>


<?php


	include_once('mostrar.php');
	$valor = new MostraPoema(); 
	$dados=$valor->toShowPoema('http://localhost/poemaMP3/poema');
	//$dados=toShowPoema();


	foreach ($dados as $key => $child)

		{
			

			//echo "<p>".array_values($child)." --> " . array_pop(array_values($child)). "</p>";
			echo "<p>".array_shift(array_values($child))." --> " . array_pop(array_values($child)). "</p>";
		}

	

?>


</body>
</html>