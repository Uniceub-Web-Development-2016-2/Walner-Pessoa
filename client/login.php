<?php

session_start();

include('httpful.phar');

//var_dump($_POST["email_user"]);
//var_dump($_POST["senha_user"]);
//var_dump($_POST);


//echo $_POST;

if($_POST["email_user"] != null && $_POST["senha_user"] != null)
{
	$login_array = array('email_user' => $_POST["email_user"], 'senha_user' =>$_POST["senha_user"]);
	$url = "http://localhost/poemaMP3/user/login";
	$body = json_encode($login_array);
	$response = \Httpful\Request::post($url)->sendsJson()->body($body)->send();   
	$array = json_decode($response->body, true)[0];
	
	//var_dump($body);
	//var_dump(json_decode($response->body, true)[0]);

	if(!empty($array) && $array["email_user"] == $_POST["email_user"] && $array["senha_user"] == $array["senha_user"]) 
	{
		$_SESSION["email"] = $array["email_user"];
		$_SESSION["nome"] = $array["nme_user"];
		$_SESSION["data"] = $array["dt_user_cadastro"];

		header('Location: http://localhost/client/menu.php');

	}else
	{
		echo "Pode não mano veio!";
		//chamar página de erro
	}
}

////

	

////



?>

