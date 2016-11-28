<?php

session_start();

include('httpful.phar');


function verificaNome()
{


	if($_POST["nme_poema"] != null)
	{	
		$url = "http://localhost/poemaMP3/poema_texto?nme_poema=".$_POST["nme_poema"];
		$response = \Httpful\Request::get($url)->send();
		$array=json_decode($response,true);   

		$dados=$array;
		echo "Escolha o Poema para alterar: <select name='nme_poema'>";
		
		foreach ($dados as $key => $child) 
		{
			echo "<option value='".array_shift(array_values($child))."'>" . array_pop(array_values($child)). "</option>";
		}
		echo "</select>";  	 			
		echo "<br>";

		$_SESSION["id"] = $array["poema_id"];
		$_SESSION["nome"] = $array["nme_poema"];
		$_SESSION["data"] = $array["dt_cadastro"];
		$_SESSION["cod_autor"] = $array["cod_autor"];
		$_SESSION["cod_categoria"] = $array["cod_categoria"];
		$_SESSION["cod_user"] = $array["cod_user"];

		header('Location: http://localhost/client/poema_alterar_cont.php');
	}
}

?>

