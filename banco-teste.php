
<?php
$user = 'root';
$password = 'root';
$db = 'db_PoesiAPP';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();

$success = mysqli_real_connect(
   $link, 
   $host, 
   $user, 
   $password, 
   $db,
   $port
);
var_dump($success);

if ($result = $success->query("SELECT nme_user FROM user")) {
    printf("Select returned %d rows.\n", $result->num_rows);

    /* free result set */
    $result->close();
}
echo "oi";