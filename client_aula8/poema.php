<?php
class Poema{
        private $poemaId;
        private $nmePoema;
        private $dtCadastro;
        private $txtPoema;
        private $codAutor;
        private $codCategoria;
	    private $cod_user;
  
  	 public function __construct( $poemaId, $nmePoema, $dtCadastro, $txtPoema , $codAutor, $codCategoria,  $cod_user)
    {

        $this->poemaId=$poemaId;
        $this-> nmePoema=$nmePoema;
        $this-> dtCadastro=$dtCadastro;
        $this-> txtPoema=$txtPoema;
        $this-> codAutor=$codAutor;
        $this-> codCategoria=$codCategoria;
        $this-> cod_user=$cod_user;
        
    }

    public function __set($atrib, $value)
    {
        $this->$atrib = $value;
    }
    public function __get($atrib)
    {
        return $this->$atrib;
    }

}