<?php
session_start();
?>

<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<h3>ALTERAR POEMA:</h3>

<?php

		$_SESSION["nome"] = $_POST["nme_poema"];
		$teste=$_SESSION["nome"];
		$contents = file_get_contents('http://localhost/poemaMP3/poema_texto?poema_id='.$_SESSION["nome"]."&exact");
		$array = json_decode($contents, true)[0];
		$_SESSION["id"] = $array["poema_id"];
		$_SESSION["nome"] = $array["nme_poema"];
		$_SESSION["data"] = $array["dt_cadastro"];
		$_SESSION["cod_autor"] = $array["cod_autor"];
		$_SESSION["cod_categoria"] = $array["cod_categoria"];
		$_SESSION["cod_user"] = $array["cod_user"];

		echo "<h3>Você escolheu o poema , {$_SESSION["nome"]}, cadastrado na data {$_SESSION["data"]}</h3>";
?>
  <form action="requests.php" method="post">
	<fieldset>
  	<legend>Dados do Poema:</legend>
  	Título do Poema: <input type="text" name="nme_poema" value="<?php echo $array["nme_poema"];?>" ><br>
  	Data do Cadatro: <input type="date" name="dt_cadastro" value= "<?php echo $array["dt_cadastro"];?>"" id="data"> <br>
 	Texto do Poema: <input type="text" name="txt_poema" value="<?php echo $array["txt_poema"];?>"><br>
	<?php 
		include  ('combobox.php');
		comboShow();	
  	?>
	</fieldset>
 	<input type="submit" value="Submit">
</form> 
</body>
</html>



