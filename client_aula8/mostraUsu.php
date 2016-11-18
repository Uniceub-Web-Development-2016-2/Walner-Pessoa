<?php


class MostraUsuario
{


	public function toShowUsuario()
	{
		$contents = file_get_contents('http://localhost/poemaMP3/user');

		$dados = json_decode($contents, true);
		$number=sizeof($dados);
		
		return $dados;

	}
}
