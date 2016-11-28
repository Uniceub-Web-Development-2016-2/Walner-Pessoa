<?php
	session_start();
?>	

<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<h3>ALTERAR POEMA:</h3>

<form action="poema_alterar_final.php" method="post">
	<fieldset>
 		<?php 
		include  ('login_poema.php');
		verificaNome();	
  		?>
	</fieldset>
 	<input type="submit" value="Submit">

</body>
</html>

