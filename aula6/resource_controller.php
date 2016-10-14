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
	'texto' => 'SELECT nme_poema, txt_poema, nme_user,  poema_id,  nme_tipo_user FROM user JOIN poema ON cod_user = user_id 		JOIN tipo_user ON cod_tipo = tipo_user_id  HAVING poema_id = 11'
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

		//var_dump($retorno);
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




