<?php


class MostraPoema
{


	public function toShowPoema($url)
	{
		$contents = file_get_contents($url);

		$dados = json_decode($contents, true);
		$number=sizeof($dados);

		return $dados;

	}
}
