<!DOCTYPE html>

<body>
 
  <form action="requests.php" method="post">

  	<input type="text" name="nme_poema" value="teste comunicacao 210"><br>
    <input type="date" name="dt_cadastro" value="20160912"><br>
 	<input type="text" name="txt_poema" value="Por que Deus permite que as maes vao-se embora. Mae não tem limite. Morrer acontece com o que eh"><br>
		
	<?php 

		$contents = file_get_contents('http://localhost/poemaMP3/autor');
		$dados = json_decode($contents, true);
		$number=sizeof($dados);
		//var_dump($dados[0]);
		echo "<select name='cod_autor'>";
		foreach ($dados as $key => $child) 
		{
			echo "<option value='".array_shift(array_values($child))."'>" . array_pop(array_values($child)). "</option>";
		}
		echo "</select>";  	 			
		echo "<br>";

		$contents = file_get_contents('http://localhost/poemaMP3/categoria');
		$dados = json_decode($contents, true);
		$number=sizeof($dados);
		//var_dump($dados[0]);
		echo "<select name='cod_categoria'>";
		foreach ($dados as $key => $child) 
		{
			echo "<option value='".array_shift(array_values($child))."'>" . array_pop(array_values($child)). "</option>";
		}
		echo "</select>";  	 			
		echo "<br>";

		$contents = file_get_contents('http://localhost/poemaMP3/tipoUser');
		$dados = json_decode($contents, true);
		$number=sizeof($dados);
		//var_dump($dados[0]);
		echo "<select name='cod_user'>";
		foreach ($dados as $key => $child) 
		{
			echo "<option value='".array_shift(array_values($child))."'>" . array_pop(array_values($child)). "</option>";
		}
		echo "</select>";  	 			
		echo "<br>";
	

  	?>
 	<input type="submit" value="Submit">

</form> 
</body>
</html>



