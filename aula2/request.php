<?php
class Request
{
    private $method;
    private $protocol;
    private $ip;
    private $resource;
    private $parameters;

    public function __construct($method, $protocol, $ip, $resource, $parameters)
    {


		//$this->protocol = $protocol;
		//$this->ip = $ip;
		//$this->resource = $resource;
		//$this->parameters = $parameters;
		//$this->method = $method; 

		$this->setMethod($method); 
		$this->setProtocol($protocol);
		$this->setIp($ip); 
		$this->setResource($resource); 
		$this->setParameters($parameters);


    }


	/*public function __set($atrib, $value)
	{
	
		$this->$atrib = $value;
	}
	public function __get($atrib)
	{
		return $this->$atrib;
	}

	*/

    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->$method;
    }

    public function setProtocol($protocol)
    {
        $this->protocol = $protocol;
	}

    public function getProtocol()
    {
        return $this->$protocol;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getIp()
    {
        return $this->$ip;
    }

    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    public function getResource()
    {
        return $this->$resource;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters()
    {
        return $this->$parameters;
    }






	
    public function toString()
    {
    	//$parameterNew = new joinParameters($parameters);
		$url = $this->protocol.'://'.$this->ip.'/'.$this->resource.'?';
            foreach($this->parameters as $key=>$value)
            {
        	$url=$url.$key.'='.$value.'&amp';
        	}
            return substr($url,0,-4);	
	}

}

$param = array('q'=>'google', 'oq'=>'goog', 'aqs'=>'chrome.0.0l3j69i60j69i65l2.1110j0j4', 'sourceid'=>'chrome', 'ie'=> 'UTF-8');
$url = new Request('post','https','www.google.com.br', 'search', $param);
echo $url->toString();
