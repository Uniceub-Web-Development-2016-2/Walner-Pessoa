<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<h3>MOSTRA RANKING DOS POEMAS:</h3>
<p>Nome do Poema --------------->   Total de Likes:</br>


<?php


	include_once('mostraRank.php');
	$valor = new MostraRank(); 
	$dados=$valor->toShowRank();


	foreach ($dados as $key => $child)

		{
			
			echo "<p>".array_shift(array_values($child))." --> " . array_pop(array_values($child)). "</p>";
		}

	

?>


</body>
</html>