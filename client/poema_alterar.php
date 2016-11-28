<?php
	session_start();
?>	

<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<h3>ALTERAR POEMA:</h3>
<p>Digite parte do Nome do Poema que deseja Alterar:</p>
 
  <form action="poema_alterar_cont.php" method="post">
	<input  id="nome" type="text" name="nme_poema" required><br>
  	<input type="submit" value="Submit">
</form>

</body>
</html>



