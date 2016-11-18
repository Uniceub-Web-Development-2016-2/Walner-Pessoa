<?php

include ('poema.php');
class MostraPoema
{

	public function toShowPoema($url)
	{
		$contents = file_get_contents($url);

		$dados = json_decode($contents, true);
		$dadosPoemas= new Poema($dados);
		$number=sizeof($dados);
		var_dump($dados);
		//echo "<select name='cod_autor'>";

		return $dados;

	}
}
