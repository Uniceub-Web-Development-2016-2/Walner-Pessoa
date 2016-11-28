<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<p>Cadastrar Usuário:</p>
 
  <form action="requests_user.php" method="post">

 	<input type="text" name="email_user" value=""><br>
  	<input type="text" name="nme_user" value=""><br>
  	<input type="text" name="senha_user" value=""><br>
    <input type="date" name="dt_user_cadastro" value=""><br>
		
	<?php 
		include  ('combobox2.php');
		comboShow2();	
  	?>
 	<input type="submit" value="Submit">

</form> 
</body>
</html>
