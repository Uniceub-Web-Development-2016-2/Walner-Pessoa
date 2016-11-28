<!DOCTYPE html>
<head>
	<title>POEMA MP3</title>
</head>
<body>

<h3>CADASTRAR NOVO POEMA:</h3>


 
 <form action="requests.php" method="post">

	<fieldset>
  	<legend>Dados do Poema:</legend>

  	Título do Poema: <input type="text" name="nme_poema" ><br>
    <!--Data do Cadatro: <input type="date" name="dt_cadastro" value=date()><br> Gerar a data de hoje para cadastrar no banco-->
	Data do Cadatro: <input type="date" name="dt_cadastro" value= <?php echo date("Y/m/d");?> id="data"> <br>
 	Texto do Poema: <input type="text" name="txt_poema" ><br>
		
	<?php 
		include  ('combobox.php');
		comboShow();	
  	?>
	
	</fieldset>
 	<input type="submit" value="Submit">

</form> 
</body>
</html>



