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