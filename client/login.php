<?php

session_start();

include('httpful.phar');
include_once ('crypt.php');


//var_dump($_POST["email_user"]);
//var_dump($_POST["senha_user"]);
//var_dump($_POST);


//echo $_POST;

if($_POST["email_user"] != null && $_POST["senha_user"] != null)
{
	//echo $_POST["email_user"];
	//echo $_POST["senha_user"];
	$login_array = array('email_user' => $_POST["email_user"]);
	//$login_array = array('email_user' => $_POST["email_user"], 'senha_user' =>$_POST["senha_user"]);

	$url = "http://localhost/poemaMP3/user/login";
	$body = json_encode($login_array);
	$response = \Httpful\Request::post($url)->sendsJson()->body($body)->send();   
	$array = json_decode($response->body, true)[0];
	
	//var_dump($response->body);
	//var_dump(json_decode($response->body, true)[0]);


	if(!empty($array) && $array["email_user"] == $_POST["email_user"] && (new Crypt())->verifyHash($_POST["senha_user"], $array["senha_user"] ))
	//if(!empty($array) && $array["email_user"] == $_POST["email_user"] && $array["senha_user"] == $array["senha_user"]) 
	{
		$_SESSION["email"] = $array["email_user"];
		$_SESSION["nome"] = $array["nme_user"];
		$_SESSION["data"] = $array["dt_user_cadastro"];

		header('Location: http://localhost/client/menu.php');

	}else
	{
		echo "E-MAIL OU SENHA NÃO CONFERE!";
		//chamar página de erro
	}
}

////

	

////



?>

