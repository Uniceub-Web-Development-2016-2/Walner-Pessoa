<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<h3>MOSTRA POEMA CADASTRADOS:</h3></br>
<p>TÍTULO DO POEMA --------------->   TIPO DE USUÁRIO:</br>


<?php


	include_once('mostrar.php');
	$valor = new MostraPoema(); 
	$dados=$valor->toShowPoema('http://localhost/poemaMP3/poema');


	foreach ($dados as $key => $child)

		{
			
			echo "<p>".array_shift(array_values($child))." ----------> " . array_pop(array_values($child)). "</p>";

		
		}



?>


</body>
</html>