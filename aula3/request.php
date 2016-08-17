<?php

//var_dump($_SERVER);



class Request
{
    private $method;
    private $protocol;
    private $ipServidor;
    private $ipRemote;
    //private $resource;
    private $parameters;

    public function __construct($method, $protocol, $ipRemote, $ipServidor, $parameters)
    {
		$this->method = $method; 
		$this->protocol = substr($protocol,0,-4);;
		$this->ipRemote = $ipRemote;
		$this->ipServidor = $ipServidor;
		//$this->resource = $resource;

		$this->parameters = self::toArray($parameters);

    }


	public function __set($atrib, $value)
	{
	
		$this->$atrib = $value;
	}
	public function __get($atrib)
	{
		return $this->$atrib;
	}
	
    public function toArray($parametros)
    {
		//$result = $this->protocol.'://'.$this->ip.'/'.$this->resource.'?';
    	//$parametros=$this->parameters;
    	$paramArray= explode("&", $parametros);

    	return $paramArray;

	}


}


//$request = new Request();
//var_dump($request);


