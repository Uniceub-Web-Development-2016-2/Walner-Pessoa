<?php

include('httpful.phar');

//$uri = 'http://localhost/poemaMP3/poema_texto"';
$uri = 'http://localhost/aula8/poema_texto"';

$json=json_encode($_POST);
//$uri = 'http://localhost/poemaMP3/poema/'.$_POST.'"';
//$uri = 'http://localhost/aula8/create/'.$_POST.'"';

var_dump(json_encode($_POST));                               
//var_dump(json_encode(utf8_encode($_POST)));
$response = \Httpful\Request::post($uri)->sendsJson()->body($json)->send();
echo $response->body;
//var_dump($response);                               
// put -> update
// post -> insert





// codigo DiMaria

//$get_request = 'http://172.22.51.134/aula8/user/create?first_name="'.$_POST['firstName'].'"&'.'last_name="'.$_POST['lastName'].'"&'.'email="'.$_POST['email'].'"&'.'password="'.$_POST['password'].'"&'."gender='".$_POST['gender']."'&"."birthdate='".$_POST['birthdate']."'";
//$json = json_encode($_POST);
//$get_request = 'http://172.22.51.134/aula8/user/create';
//$response = \Httpful\Request::post($get_request)
//->sendsJson()
//->body($json)
//->send();
//echo  $response->body;