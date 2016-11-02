<?php

include('httpful.phar');


$uri = 'http://localhost/aula7/poema/'.$_POST.'"';
var_dump(json_encode($_POST));                               
//var_dump(json_encode(utf8_encode($_POST)));
$response = \Httpful\Request::post($uri)->sendsJson()->body(json_encode($_POST))->send();
//var_dump($response);                               
// put -> update
// post -> insert
