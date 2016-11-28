<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<h3>CADASTRAR NOVO USUÁRIO:</h3>
 <fieldset>
  	<legend>Dados do Usuário:</legend>
  <form action="requests_user.php" method="post">

 	<label>Digite email:</label> <input type="text" name="email_user" id="email"><br>
  	<label>Digite sua Senha:</label><input type="password" name="senha_user" id="senha"><br>


<!--
  	Digite seu nome: <input type="text" name="nme_user" value=""><br>
    Confirme data de hoje:<input type="date" name="dt_user_cadastro" value=<?php echo date("Y/m/d");?> ><br>
	
	//<?php 
	//	include  ('combobox2.php');
	//	comboShow2();	
  	//?>

 --> 	
 	<input type="submit" value="Submit">

</form> 
</fieldset>
</body>
</html>
