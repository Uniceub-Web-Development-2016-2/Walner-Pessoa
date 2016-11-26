<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<p>Alterar Poema:</p>


 
  <form action="requests.php" method="post">

  	<input type="text" name="nme_poema" value=""><br>
  	<input type="submit" value="Submit">
</form>




  <form action="requests.php" method="post">

    <input type="date" name="dt_cadastro" value="20160912"><br>
 	<input type="text" name="txt_poema" value="Por que Deus permite que as maes vao-se embora. Mae não tem limite. Morrer acontece com o que eh"><br>
		
	<?php 
		include  ('combobox.php');
		comboShow();	
  	?>
	
 	<input type="submit" value="Submit">

</form> 
</body>
</html>



