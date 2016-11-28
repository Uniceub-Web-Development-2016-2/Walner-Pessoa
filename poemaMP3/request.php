<?php
class Request{
        private $method;
        private $protocol;
        private $server_ip;
        private $remote_ip;
        private $resource;
        private $operation;
        private $params;
	    private $body;
  
	 public function __construct($method, $protocol, $serverAddress, $clientAddress, $path, $queryString, $body)
    {
        $this->method = $method;
        $this->protocol = $protocol;
        $this->server_ip = $serverAddress;
        $this->remote_ip = $clientAddress;
        $this->setResource($path);  /// forma mais simples de codigo
        //$this->resource = self::setResource($path);
        $this->setOperation($path);  /// forma mais simples de codigo

        $this->setParams($queryString);   /// forma mais simples de codigo
        //$this->params = $this->setParams($queryString);
        $this->body = $body;
    }
		 
        public function toString(){
                $request = "";
                $Inc = 1;
                foreach($this->params as $param) {
                        $request .= "P".$Inc."=".$param."&amp";
                        // não entedi essa linha ///////////////////// pedir ajuda para CAIO
                        $Inc++;
        }
        return $this->protocol.'://'.$this->server_ip.'/'.$this->resource.'?'.$request;
        }

//////////////////////////////////////////////
        // GETs AND SETs
//////////////////////////////////////////////
        public function setResource($resource){
            $s = explode("?", $resource);
            $r = explode("/", $s[0]);
            $this->resource = $r[2];  
            //var_dump($s);      
        }
        public function getResource(){
                return $this->resource;
        }
//////////////////////////////////////////////

        public function setOperation($path){
            $s = explode("?", $path);
            $r = explode("/", $s[0]);
            $this->operation = $r[3];  
            //var_dump($s);      
        }
        public function getOperation(){
                return $this->operation;
        }
//////////////////////////////////////////////

        public function setParams($paramsString)
        {
            parse_str($paramsString, $paramsArray);
             $this->params = $paramsArray;
             //var_dump ($this->param);
        }  
        public function getParameters(){
                return $this->params;
        } 
//////////////////////////////////////////////
        public function setMethod($method){
                $this->method = $method;
        }
        public function getMethod(){
                return $this->method;
        }
        public function setProtocol($protocol){
               $this->protocol = $protocol;
        }
        public function getProtocol(){
                return $this->protocol;
        }
        public function setServer_IP($server_ip){
                $this->server_ip = $server_ip;
        }
        public function getServer_IP(){
                return $this->server_ip;
        }
        public function setRemote_IP($Remote_ip){
                $this->remote_ip = $remote_ip;
        }
        public function getRemote_IP(){
                return $this->remote_ip;
        }
        public function getBody() {
        return $this->body;
    }

}
