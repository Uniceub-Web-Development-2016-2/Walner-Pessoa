<!DOCTYPE html>

<body>
 
  <form action="requests.php" method="post">

  	<input type="text" name="nme_poema" value="teste comunicacao 210"><br>
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



