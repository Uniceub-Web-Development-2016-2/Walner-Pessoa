<?php

include('httpful.phar');


$get_request = 'http://127.0.0.1/aula8/user/search?first_name="'.$_GET['search'].'"';

$response = \Httpful\Request::get($get_request)->send();

echo  $response->body;
