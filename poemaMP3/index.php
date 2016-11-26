<?php
include('request_controller.php');

$controller = new RequestController();

//json_encode($controller->execute());
 echo json_encode($controller->execute());



