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
    
    $success = logActivity($pdo,$usr_id,$user_email,'db_connect','success');

    if($success){
        echo "Activity log inserted successfully";
    }else {
        echo "Failed to insert activity log";
    }


}catch(PDOExeption $e){
    die("Connection Failed: " . $e->getMessage());

}
?>
