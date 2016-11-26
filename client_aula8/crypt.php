<?php

class Crypt {



public function generateHash($message) {
	if(CRYPT_BLOWFISH == 1){	
		$salt = '$2y$11$'. substr(md5(uniqid(rand(), true)),0,22);
		return crypt($message, $salt);
	}
}

public function verifyHash($userinput,$serveroutput) {
	return crypt($userinput,$serveroutput) == $serveroutput;

}
}

//$user = "123456";

//$bd = (new Crypt)->generateHash("123456");

//if((new Crypt)->verifyHash($user, $bd))
//	echo "Logou seu viado!";
//else
//	echo "Sai fora seu homem!";

?>
