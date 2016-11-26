<?php

$servidor = 'dblib:host=localhost;dbname=db_PoesiAPP;charset=UTF-8'; /*maquina a qual o banco de dados está*/
$usuario = 'root'; /*usuario do banco de dados MySql*/
$senha = 'root'; /*senha do banco de dados MySql*/
$banco = 'db_PoesiAPP'; /*seleciona o banco a ser usado*/


$pdo=new PDO($servidor, $usuario, $senha);
$statement=$pdo->prepare("SELECT * FROM user");
$statement->execute();
$results=$statement->fetchAll(PDO::FETCH_ASSOC);
$json=json_encode($results);
var_dump($json);
?>