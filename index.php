<?php
$message = "Привет, мир!";
$time = date('d.m.Y H:i');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $message ?></title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            overflow: hidden;
        }

        .card {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 24px;
            padding: 60px 80px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: fadeIn 1s ease-out;
        }

        h1 {
            font-size: 3rem;
            color: #fff;
            margin-bottom: 16px;
            background: linear-gradient(90deg, #fff, #ffe0f0, #fff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shine 3s linear infinite;
        }

        p {
            color: rgba(255, 255, 255, 0.85);
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }

        .dot {
            display: inline-block;
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: #4ade80;
            margin-right: 8px;
            box-shadow: 0 0 12px #4ade80;
            animation: pulse 1.5s infinite;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @keyframes shine {
            to { background-position: 200% center; }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%      { opacity: 0.4; }
        }
    </style>
</head>
<body>
    <div class="card">
        <h1><?= $message ?></h1>
        <p><span class="dot"></span>Работает на PHP <?= PHP_VERSION ?></p>
        <p style="margin-top:8px;opacity:0.6;"><?= $time ?></p>
    </div>
</body>
</html>