<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Connection Test</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            max-width: 600px;
            margin: 50px auto;
            padding: 20px;
            background: #f5f5f5;
        }
        .container {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        h1 { color: #333; }
        .success { color: #28a745; }
        .error { color: #dc3545; }
        pre {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 4px;
            overflow-x: auto;
        }
        a { color: #007bff; }
    </style>
</head>
<body>
    <div class="container">
        <h1>Database Connection Test</h1>

        <?php
        // Database configuration
        $host = 'db';
        $dbname = 'php_app';
        $username = 'php_user';
        $password = 'php_pass';

        try {
            $pdo = new PDO(
                "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
                $username,
                $password,
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]
            );

            echo '<p class="success">Connected successfully!</p>';

            // Get server info
            $version = $pdo->query('SELECT VERSION()')->fetchColumn();
            echo "<p>MariaDB Version: <strong>$version</strong></p>";

            // Show tables
            $tables = $pdo->query("SHOW TABLES")->fetchAll(PDO::FETCH_COLUMN);

            if (count($tables) > 0) {
                echo '<h3>Tables in database:</h3>';
                echo '<ul>';
                foreach ($tables as $table) {
                    echo "<li>$table</li>";
                }
                echo '</ul>';
            } else {
                echo '<p>No tables found. Add SQL files to <code>docker/init-db/</code> to auto-import.</p>';
            }

        } catch (PDOException $e) {
            echo '<p class="error">Connection failed!</p>';
            echo '<pre>' . htmlspecialchars($e->getMessage()) . '</pre>';
        }
        ?>

        <p><a href="../index.php">&larr; Back to home</a></p>
    </div>
</body>
</html>
