<?php

include('httpful.phar');

$uri = 'http://localhost/poemaMP3/poema_texto';

$json=json_encode($_POST);

$response = \Httpful\Request::post($uri)->sendsJson()->body($json)->send();
echo "Poema Cadastrado";



