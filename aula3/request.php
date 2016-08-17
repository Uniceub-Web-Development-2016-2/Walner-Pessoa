<?php
//var_dump($_SERVER);
class Request
{
    private $method;
    private $protocol;
    private $ipServidor;
    private $ipRemote;
    private $resource;
    private $parameters;
    public function __construct($method, $protocol, $ipRemote, $ipServidor, $resource,  $parameters)
    {
		$this->method = $method; 
		$this->protocol = self::checkProtocol($protocol);
		$this->ipRemote = $ipRemote;
		$this->ipServidor = $ipServidor;
		$this->resource = self::getResource($resource);
		//$this->parameters = self::toArray($parameters);
		$this->parameters = $this->toArray($parameters);

    }
	public function __set($atrib, $value)
	{
		$this->$atrib = $value;
	}
	public function __get($atrib)
	{
		return $this->$atrib;
	}

	public function getResource($resource)
	{
    	$resourceArray= explode("/", $resource);

    	return $resourceArray[1];
	}
	
	public function checkProtocol($protocol)
	{
		if (substr($protocol,0,4)== 'HTTP'){
				return substr($protocol,0,-4);
			}else{ 
				print_r (substr($protocol,0,4)." Esse protocolo digitado não é aceito. Digitar nova requisição");
			}
	}
	
    public function toArray($parametros)
    {
    	$paramArray= explode("&", $parametros);

    	if ($paramArray[0]!="")
    	{   		
            foreach($paramArray as $key=>$value)
            {
   	    		$eachParameters= explode("=", $paramArray[$key]);	    	
        		$arrayParamameters[$eachParameters[0]]=$eachParameters[1];
        	} 
    		return $arrayParamameters;
    	}
	}
}
