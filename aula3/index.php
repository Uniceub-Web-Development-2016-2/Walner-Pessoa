<?php
//var_dump($_SERVER);
include("request.php");
		$method = $_SERVER['REQUEST_METHOD']; 
		$protocol = $_SERVER['SERVER_PROTOCOL'];
		$ipRemote = $_SERVER['REMOTE_ADDR'];
		$ipServidor = $_SERVER['SERVER_ADDR'];
		$resource = $_SERVER['REQUEST_URI'];
		//$this->resource = $resource;
		$parameters = $_SERVER['QUERY_STRING'];
$request = new Request($method, $protocol, $ipRemote, $ipServidor , $resource, $parameters);
var_dump($request);