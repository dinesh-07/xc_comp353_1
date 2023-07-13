<?php
$server = 'xcc353.encs.concordia.ca';
$username = 'xcc353_1';
$password = 'TutS2023';
$database ='xcc353_1';
try {
    $conn = new PDO("mysql:host=$server; dbname = $database;",$username, $password);
} catch (PDOException $e){
    die('Connection Failed:' . $e->getMessage());
}
?>