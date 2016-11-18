<?php


class MostraRank
{


	public function toShowRank()
	{
		$contents = file_get_contents('http://localhost/poemaMP3/ranking');

		$dados = json_decode($contents, true);
		$number=sizeof($dados);

		return $dados;

	}
}
