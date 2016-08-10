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

    }


    public function setMethod($method)
    {
        $this->method = $method;
    }

    public function getMethod()
    {
        return $this->method;
    }

    public function setFName($protocol)
    {
        $this->protocol = $protocol
	}

    public function getProtocol()
    {
        return $this->protocol;
    }

    public function setIp($ip)
    {
        $this->ip = $ip;
    }

    public function getIp()
    {
        return $this->ip;
    }

    public function setResource($resource)
    {
        $this->resource = $resource;
    }

    public function getResource()
    {
        return $this->resource;
    }

    public function setParameters($parameters)
    {
        $this->parameters = $parameters;
    }

    public function getParameters()
    {
        return $this->parameters;
    }





    public function toString($parameters)
    {
        foreach ($parameters as $npar) {

        }
        return $number;
    }
}


$request= new request("https://","www.google.com.br/", "search?",);
echo $request->toString();
