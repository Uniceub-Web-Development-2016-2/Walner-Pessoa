<?php
//11/novembro/2016
class DBConnector extends PDO {
   
    private $engine;
    private $host;
    private $database;
    private $user;
    private $pass;
    private $connector;	
   
    public function __construct(){
        $this->engine = 'mysql';
        $this->host = 'localhost:3306';
        $this->database = 'db_PoesiAPP';
        $this->user = 'root';
        $this->pass = 'root';
        $dns = $this->engine.':dbname='.$this->database.";host=".$this->host;
        parent::__construct( $dns, $this->user, $this->pass );
    }	
		
}















