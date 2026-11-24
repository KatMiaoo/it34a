<?php
// Step out of admin/ and app/ to reach config/
require_once '../../config/config.php';
require_once '../../functions/csv.php';   // add this line

requireRole('admin');

$section = $_GET['section'] ?? 'activity-logs';
$action = $_GET['action'] ?? '';

// Export CSV (runs first so the file downloads before any HTML is sent)
if ($action === 'export') {
    if ($section === 'activity-logs') {

        $stmt = $pdo->query("
            SELECT 
                activity_log_id,
                user_id,
                user_email,
                activity_log_action,
                activity_log_status,
                activity_log_ip_address,
                activity_log_user_agent,
                activity_log_created_at
            FROM activity_logs
            ORDER BY activity_log_created_at
        ");

        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        logActivity(
            $pdo,
            $_SESSION['user_id'],
            $_SESSION['user_email'],
            'export_activity_logs',
            'success'
        );

        exportCsv(
            'activity_logs',
            [
                'Record ID', 'User ID', 'User Email', 'Action',
                'Status', 'IP Address', 'User Agent', 'Date & Time'
            ],
            $rows
        );
    }
}

// Query #3 Get All Activity Logs (only needed when displaying the page)
$stmt = $pdo->query("
    SELECT * 
    FROM activity_logs
    ORDER BY activity_log_created_at DESC
");

$activityLogs = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <h1>Welcome Admin! (˶˃ ᵕ ˂˶)</h1>
    <a href="../auth/signout.php">Sign Out</a>

    <?php if ($section === 'activity-logs'): ?>

        <h4>Activity Logs</h4>
        <a href="?section=activity-logs&amp;action=export">Export Activity Logs</a>

        <table id="example" class="table table-striped" style="width:auto">
            <thead>
                <tr>
                    <th>Record ID</th>
                    <th>User ID</th>
                    <th>User Email</th>
                    <th>Action</th>
                    <th>Status</th>
                    <th>IP Address</th>
                    <th>User Agent</th>
                    <th>Date &amp; Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($activityLogs as $activity): ?>
                    <tr>
                        <td><?= htmlspecialchars($activity['activity_log_id']) ?></td>
                        <td><?= htmlspecialchars($activity['user_id']) ?></td>
                        <td><?= htmlspecialchars($activity['user_email']) ?></td>
                        <td><?= htmlspecialchars($activity['activity_log_action']) ?></td>
                        <td><?= htmlspecialchars($activity['activity_log_status']) ?></td>
                        <td><?= htmlspecialchars($activity['activity_log_ip_address']) ?></td>
                        <td><?= htmlspecialchars($activity['activity_log_user_agent']) ?></td>
                        <td><?= htmlspecialchars($activity['activity_log_created_at']) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    <?php endif; ?>

</body>
</html>