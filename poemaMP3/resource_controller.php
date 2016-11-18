<?php

include_once ('request.php');
include_once ('db_manager.php');

class ResourceController
{	
 	private $METHODMAP = ['GET' => 'search' , 'POST' => 'create' , 'PUT' => 'update', 'DELETE' => 'remove' ];
	//
	// montagem das request de forma estática para 
	//
	//private $ENTIDADES =
	//[
	//'user', 'poema', 'avaliacao_MP3', 'audio_MP3', 'autor', 'categoria', 'tipo_user'
	//	] 

	private $FULLQUERY = 
 	[
 	'user' => 'SELECT nme_user, nme_tipo_user FROM user JOIN poema_texto ON cod_user = user_id 
				JOIN tipo_user ON cod_tipo = tipo_user_id group by user_id' ,
 	'poema' => 'SELECT nme_poema,nme_user, nme_tipo_user FROM user
				JOIN  poema_texto ON cod_user = user_id JOIN tipo_user ON cod_tipo = tipo_user_id  order by nme_poema' ,
	'ranking' => 'SELECT nme_poema, nme_autor,nme_categoria,local_arq_MP3,
				Sum(case when like_dislike=1 then 1 else 0 end) AS totallike
 				FROM avaliacao_audio 
  				JOIN grava_poema_audio ON cod_audio_poema = audio_id 
  				JOIN poema_texto ON cod_poema = poema_id
  				JOIN autor on cod_autor = autor_id
  				JOIN categoria on cod_categoria = categoria_id
  				GROUP BY cod_audio_poema order by totallike DESC',
  	'autor' => 'SELECT * FROM autor',
  	'categoria' => 'SELECT * FROM categoria',
  	'tipo_user' => 'SELECT * FROM tipo_user',
  	'audio_MP3' => 'SELECT * FROM grava_poema_audio',
 	'avaliacao_MP3' => 'SELECT * FROM avaliacao_audio',
 	'tipoUser' => 'SELECT * FROM tipo_user' ,
	'userTodos' => 'SELECT user_id,nme_user FROM user' 


	];

	public function treat_request($request) 
	{
		return $this->{$this->METHODMAP[$request->getMethod()]}($request);
	
	}
	//////////////////////////////////////////////////////////////////////////////////////

	private function search($request) 
	{
		//
		//MONTAGEM DA QUERY COM PARAMETROS E SEM PARAMETROS
		//
		if (self::queryParams($request->getParameters()))
		{
			$query = 'SELECT * FROM '.$request->getResource().' WHERE '.self::queryParams($request->getParameters());
			
		}else $query= $this->FULLQUERY[$request->getResource()];
		
		$result = (new DBConnector())->query($query);		
		$retorno=$result->fetchall(PDO::FETCH_ASSOC);

		foreach ($retorno as $key=>$value) {
		}
		return $retorno;
		$retorno= null; // fechar conexao 
	}
	//////////////////////////////////////////////////////////////////////////////////////

	private function create($request) 
	{	
		$body = $request->getBody();
		$resource = $request->getResource();
		$query = 'INSERT INTO '.$resource.' ('.$this->getColumns($body).') VALUES ('.$this->getValues($body).')';
		$result=(new DBConnector())->query($query);//->execute();
		echo $query;
		return $query;
		$result = null; // fechar conexao 
	}

	//////////////////////////////////////////////////////////////////////////////////////

	private function update($request) 
	{
		var_dump($request);
                $body = $request->getBody();
                $resource = $request->getResource();
                $query = 'UPDATE '.$resource.' SET '. $this->getUpdateCriteria($body);
                var_dump($query);
		//die();
		return $query;

    }

	
	private function getUpdateCriteria($json)
	{
		$criteria = "";
		$where = " WHERE ";
		$array = json_decode($json, true);
		var_dump($array); 
		die();
		foreach($array as $key => $value) 
		{
			if($key != 'id')

				$criteria .= $key." = '".$value."',";
			
		}
		return substr($criteria, 0, -1).$where." id = ".$array['id'];
	}	
	
	
	private function getColumns($json) 
	{
		$array = json_decode($json, true);
		$keys = array_keys($array);
		$string =  implode("`,`", $keys);
		//var_dump($string);
		//return implode(",", $keys);
		return "`".$string."`";	
	}

	private function getValues($json) 
        {
                $array = json_decode($json, true);
                $keys = array_values($array);
                $string =  implode("','", $keys);
                //var_dump($string);
		return "'".$string."'";
        
        }
		
	private function queryParams($params) 
	{
		$query = "";		
		foreach($params as $key => $value) 
		{
			$query .= $key.' = '.$value.' AND ';	
		}
		$query = substr($query,0,-5);
		return $query;
	}
		
}
