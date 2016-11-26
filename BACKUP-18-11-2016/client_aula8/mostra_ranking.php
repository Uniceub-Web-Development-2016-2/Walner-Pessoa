<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<p>MOSTRA RANKING DOS POEMAS:</br>
<p>Nome do Poema --------------->   Total de Likes:</br>


<?php


	include_once('mostraRank.php');
	$valor = new MostraRank(); 
	$dados=$valor->toShowRank();
	//$dados=toShowPoema();


	foreach ($dados as $key => $child)

		{
			//echo var_dump(array_values($child));

			//echo "<p>".array_values($child)." --> " . array_pop(array_values($child)). "</p>";
			echo "<p>".array_shift(array_values($child))." --> " . array_pop(array_values($child)). "</p>";
		}

	

?>


</body>
</html>