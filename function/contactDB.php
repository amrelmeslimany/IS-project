<?php
$dsn    = 'mysql:host=localhost;dbname=u935885153_student';
$user   = 'u935885153_HACKM';
$pass   = 'Hakr-m123';
$option = array(
    PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8' ,
);

try{
    $con = new PDO($dsn, $user, $pass, $option);
    $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e){
    echo 'failed to connect'. $e->getMessage();
}
?>
