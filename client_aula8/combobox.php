<?php

	 function comboShow(){
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
	}
	



	