<?php

include('httpful.phar');
include_once ('crypt.php');
//$login = $_POST['login'];
//var_dump($_POST['senha_user']);
$_POST['nme_user']="";
$_POST['cod_tipo']=4;
$_POST['dt_user_cadastro']=date("Ymd");
$_POST['senha_user'] = (new Crypt())->generateHash($_POST['senha_user']);
//$uri = 'http://localhost/poemaMP3/poema_texto"';
$uri = 'http://localhost/poemaMP3/user';

$json=json_encode($_POST);

$response = \Httpful\Request::post($uri)->sendsJson()->body($json)->send();
//echo $response->body;
echo "NOVO USUÁRIO CADASTRADO COM SUCESSO!";
