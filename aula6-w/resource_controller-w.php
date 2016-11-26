<?php

include_once ('request.php');
include('db_manager.php');

class ResourceController
{	
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];

 	//private $MAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];

	
	public function treat_request($request) {
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
		//se na Request tiver o METHOD GET' executar o método  search();
		//se na Request tiver o METHOD POST' executar o método create(); 
		//se na Request tiver o METHOD PUT' executar o método update();
		//se na Request tiver o METHOD DELETE' executar o método remove(). 
	}

	private function search($request) {
		$query = 'SELECT * FROM '.$request->getResource().' WHERE '.self::queryParamsGet($request->getParameters());		
		$result = (new DBConnector())->query($query);
		var_dump($result);
		die();
		//return self::select($query); 
		return $result->fetchAll(); 
	}


	private function select($query){
		$result = (new DBConnector())->query($query);
		var_dump($query) ;
		return $result->fetchAll();
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
		var_dump($query);
		return $query;
	}

	
}




