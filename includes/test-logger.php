<?php
require_once('config/config.php');
require_once('includes/activity-logger.php');

$user_id = "root" ?? null;
$user_email = "root" ?? null;

$success -= logActivity($pdo,$user_id,$user_email, 'test_activity', 'success');

if($success){
    echo "Activty log inserted successfully";
}else{
    echo "Failed to insert activity log"
}
?>

//on config
//require_once(_DIR_ . '/..includes/ativity-logger.php');