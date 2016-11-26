<?php
include('request_controller.php');

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);


//include('db_manager.php');

$controller = new RequestController();
//$qy = new DBConnector();

echo json_encode($controller->execute());
 






//echo json_encode($controller->execute());
//echo json_encode($qy);

//$result = ($qy->query($controller->execute()));
//echo json_encode($result->fetchAll());
//echo json_encode($qy->query($controller->execute()));
//die();
//$qq = $result->fetchAll();



//==

//var_dump($q);
//echo json_encode($q);
//$q = $controller->execute()

//echo json_encode($qq);
//echo json_encode($controller->execute());