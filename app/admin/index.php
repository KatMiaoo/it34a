<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Hello Admin</h1>
    <a href="../auth/signout.php">Sign Out</a>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Action</th>
                <th>Status</th>
                <th>Ip Address</th>
                <th>User Agent</th>
                <th>Timestamp</th>
            </tr>
        </thead>
        <tbody>
            <? foreach($activities as $activity): ?>
                <tr>
                    <td>
                        <?= htmlspecialchars(
                            $activity['activity_log_status_id']
                        ) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars(
                            $activity['user_username']
                        ) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars(
                            $activity['user_email']
                        ) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars(
                            $activity['activity_log_action']
                        ) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars(
                            $activity['activity_log_status']
                        ) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars(
                            $activity['activity_log_ip_address']
                        ) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars(
                            $activity['activity_log_user_agent']
                        ) ?>
                    </td>
                    <td>
                        <?= htmlspecialchars(
                            $activity['activity_log_created_at']
                        ) ?>
                    </td>
                </tr>
            <? endforeach; ?>
        </tbody>
    </table>
</body>
</html>