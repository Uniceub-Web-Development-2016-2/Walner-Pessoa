<?php

include ('poema.php');
class MostraPoema
{

	//include('mostra_poema.php');
	//$valor = new MostraPoema(); 
	//$dados=$valor->toShowPoema();
	//$dados=toShowPoema();
	///echo var_dump($dados);
	//foreach ($dados as $key => $child) 
	//	{
	//		echo "<p>".array_shift(array_values($child))." --> " . array_pop(array_values($child)). "</p>"."</br>";
	//	}

	public function toShowPoema($url)
	{
		//$contents = file_get_contents('http://localhost/poemaMP3/poema');
		$contents = file_get_contents($url);

		$dados = json_decode($contents, true);
		$dadosPoemas= new Poema($dados);
		$number=sizeof($dados);
		var_dump($dados);
		//echo "<select name='cod_autor'>";

		return $dados;

	}
}
