<?php

include_once ('request.php');
include('db_manager.php');

class ResourceController
{	
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];
 	private $COLUNAS = 
 	[
 	'user' => 'SELECT nme_user, nme_tipo_user FROM user JOIN poema ON cod_user = user_id 
				JOIN tipo_user ON cod_tipo = tipo_user_id group by user_id' ,
 	'poema' => 'SELECT nme_poema,nme_user, nme_tipo_user FROM user
				JOIN  poema ON cod_user = user_id JOIN tipo_user ON cod_tipo = tipo_user_id  order by nme_poema' ,
	'ranking' => 'SELECT nme_poema, nme_autor,nme_categoria,nome_local_arq_MP3,
				Sum(case when like_dislike=1 then 1 else 0 end) AS totallike
 				FROM avaliacao_MP3 
  				JOIN audio_MP3 ON cod_audio_MP3 = audio_id 
  				JOIN poema ON cod_poema = poema_id
  				JOIN autor on cod_autor = autor_id
  				JOIN categoria on cod_categoria = categoria_id
  				GROUP BY cod_audio_MP3 order by nme_poema, totallike DESC;'
	];

 	//private $MAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];

	
	public function treat_request($request) {
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
		//se na Request tiver o METHOD GET' executar o método  search();
		//se na Request tiver o METHOD POST' executar o método create(); 
		//se na Request tiver o METHOD PUT' executar o método update();
		//se na Request tiver o METHOD DELETE' executar o método remove(). 
	}

	private function search($request) {
		//
		//MONTAGEM DA QUERY COM PARAMETROS E SEM PARAMETROS
		//
		if (self::queryParams($request->getParameters()))
		{
			$query = 'SELECT * FROM '.$request->getResource().' WHERE '.self::queryParams($request->getParameters());
			
		}else $query= $this->COLUNAS[$request->getResource()];
		
		var_dump($query);
		$result = (new DBConnector())->query($query);
		
		$retorno=$result->fetchall(PDO::FETCH_ASSOC);
		//$retorno=json_encode($result->fetchAll(PDO::FETCH_ASSOC));

		//var_dump("variavel : ".$retorno[1]);
		foreach ($retorno as $key=>$value) {
				var_dump($value);
		}
		return $retorno;
		
		
	}
	private function create($request) {
		// desenvolver o codigo
		return ;
	}
	private function update($request) {
		// desenvolver o codigo
		return ;
	}
	private function remove($request) {
		// desenvolver o codigo
		return ;
	}
	////////////////////////////////////////////////////
	
	private function queryParams($params) {
		$query = "";		
		foreach($params as $key => $value) {
			$query .= $key.' = '.'"'.$value.'"'.' AND ';	
		}
		$query = substr($query,0,-5);
		//var_dump($query);
		return $query;
	}

	
}




