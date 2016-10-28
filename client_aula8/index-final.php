<!DOCTYPE html>

<body>
 
  <form action="requests.php" method="post">

  	<input type="text" name="nme_poema" value="teste comunicacao 210"><br>
    <input type="date" name="dt_cadastro" value="20160912"><br>
 	<input type="text" name="txt_poema" value="Por que Deus permite que as maes vao-se embora. Mae não tem limite. Morrer acontece com o que eh"><br>
		
	<?php 

		$conexao = mysqli_connect("localhost:3306","root","root", "db_PoesiAPP");

		$dados = mysqli_query($conexao, "SELECT * FROM autor");
		$result = mysqli_fetch_array($dados);
		$number= mysqli_num_rows($dados);

		echo "<select name='cod_autor'>";
		for ($i=0; $i < $number; $i++) 
		{
			echo "<option value='".$result['autor_id']."'>" . $result['nme_autor']. "</option>";
			$result = mysqli_fetch_array($dados);
			print_r($result);
		}
		echo "</select>";  	 			
		echo "<br>";

		$dados = mysqli_query($conexao, "SELECT * from categoria");
		$result = mysqli_fetch_array($dados);
		$number= mysqli_num_rows($dados);

		echo "<select name='cod_categoria'>";
		for ($i=0; $i < $number; $i++) 
		{
			echo "<option value='".$result['categoria_id']."'>" . $result['nme_categoria']. "</option>";
			$result = mysqli_fetch_array($dados);
			print_r($result);
		}
		echo "</select>";  
		echo "<br>";

		$dados = mysqli_query($conexao, "SELECT user_id, nme_user from user");
		$result = mysqli_fetch_array($dados);
		$number= mysqli_num_rows($dados);

		echo "<select name='cod_user'>";
		for ($i=0; $i < $number; $i++) 
		{
			echo "<option value='".$result['user_id']."'>" . $result['nme_user']. "</option>";
			$result = mysqli_fetch_array($dados);
			print_r($result);
		}
		echo "</select>";  
		echo "<br>";

  	?>
 	<input type="submit" value="Submit">

</form> 
</body>
</html>



