<?php

	 function comboShow2(){
		$contents = file_get_contents('http://localhost/poemaMP3/tipo_user');
		$dados = json_decode($contents, true);
		$number=sizeof($dados);
		//var_dump($dados[0]);
		echo "<select name='cod_tipo'>";
		foreach ($dados as $key => $child) 
		{
			echo "<option value='".array_shift(array_values($child))."'>" . array_pop(array_values($child)). "</option>";
		}
		echo "</select>";  	 			
		echo "<br>";

		
	}
	



	