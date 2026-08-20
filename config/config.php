<?php
session_start();
require_once("..Includes/activity-logger.php");

//define('', '');
define('BASE_URL', 'https://localhost/it34a');

define('DB_HOST', 'localhost');
define('DB_NAME', 'it34a_lab_db');
define('DB_USER', 'root');
define('DB_PASS', '');

$user_id = "root" ?? null;
$user_email = "root" ?? null;

try{
    pdo = new PDO{
        "mysql:host=" . DB_HOST . ",dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXEPTION]
    };
    echo ("Connection Successfull");
    logActivity($pdo,$user_id,$user_email,'connect_db_success','success');

}catch(PDOExeption $e){
    die("Connection Failed: " . $e->getMessage());

}
?>
