<?php
session_start();
?>

<!DOCTYPE html>
<head>
	<title>ALTERAR USUÁRIO</title>
</head>
<body>
<?php
echo "<h3>Seja bem-vindo, {$_SESSION["nome"]},  você está cadastrada desde  : {$_SESSION["data"]}</h3>";
?>
<p>Alterar Usuário:</p>
 
  <form action="requests.php" method="post">

 	<input type="text" name="email_user" value= <?php isset($_SESSION["email"])? print $_SESSION["email"]:false; ?> id="email"/> <br>
  	<input type="text" name="nme_user" value= <?php isset($_SESSION["nome"])? print $_SESSION["nome"]:false; ?> id="nome"/> <br>

  	

    <input type="date" name="dt_user_cadastro" value= <?php echo date("Ymd");?> id="data" /><br>
		
	<?php 
		include  ('combobox2.php');
		comboShow2();	
  	?>
 	<input type="submit" value="Submit">

</form> 
</body>
</html>


