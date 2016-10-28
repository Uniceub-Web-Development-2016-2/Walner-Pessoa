<!DOCTYPE html>

<body>
 
  <form action="requests.php" method="post">

  	<input type="text" name="nme_poema" value="teste comunicacao 210"><br>
    <input type="date" name="dt_cadastro" value="20160912"><br>
 	<input type="text" name="txt_poema" value="Por que Deus permite que as maes vao-se embora. Mae não tem limite. Morrer acontece com o que eh"><br>
  	<!-- <input type="text" name="cod_autor" value="1"><br> -->






		
		<?php 
		include_once ('db_manager.php');
		$query=('select * from autor ');
		(new DBConnector())->query($query);

		//// precisa fechar essa coneção no final CLose ()
		
		$result = (new DBConnector())->query($query); 
		$resultado=$result->fetchall(PDO::FETCH_ASSOC);

		print_r($resultado);
		////////////////

		//mysql_connect('localhost:3306','root','root');
		//mysql_select_db('db_PoesiAPP');
		//$sql= "select nme_autor from autor";
		//$result = mysql_query($sql);
		echo    	"<select name='cod_autor'>";
		$i=0;
		foreach ($resultado as $key => $value) {
			$resultadoArray=$value;
			foreach ($resultadoArray as $key => $value) {
				echo "<option value='".$key."'>" . $value . "</option>";
			}
			$i++;
		}
		
		echo 	"</select>";  	 	

		?>
		
		
  	<br><br>
  	<input type="text" name="cod_categoria" value="2"><br>
  	<input type="text" name="cod_user" value="3"><br>
 	 <input type="submit" value="Submit">


</form> 

</body>



</html>



