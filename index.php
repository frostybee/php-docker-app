<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Docker App</title>
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
        h1 { color: #333; margin-bottom: 10px; }
        p { color: #666; }
        ul { list-style: none; padding: 0; margin-top: 20px; }
        li { margin: 10px 0; }
        a {
            display: inline-block;
            padding: 10px 20px;
            background: #007bff;
            color: white;
            text-decoration: none;
            border-radius: 4px;
        }
        a:hover { background: #0056b3; }
        .version { color: #999; font-size: 14px; margin-top: 20px; }
    </style>
</head>
<body>
    <div class="container">
        <h1>PHP Docker App</h1>
        <p>Your Docker environment is running!</p>

        <ul>
            <li><a href="pages/phpinfo.php">View PHP Info</a></li>
            <li><a href="pages/db-test.php">Test Database Connection</a></li>
        </ul>

        <p class="version">PHP <?= phpversion() ?></p>
    </div>
</body>
</html>
