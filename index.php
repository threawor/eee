<?php
$message = "Привет, мир!";
$time = date('d.m.Y H:i');
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $message ?> 🥊</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            /* Фон с Валуевым + затемнение для читаемости текста */
            background:
                linear-gradient(rgba(20, 20, 40, 0.75), rgba(40, 20, 60, 0.85)),
                url('valUev.jpg')
                center / cover no-repeat fixed;
            overflow: hidden;
        }

        .card {
            background: rgba(255, 255, 255, 0.12);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 2px solid rgba(255, 255, 255, 0.25);
            border-radius: 28px;
            padding: 60px 80px;
            text-align: center;
            box-shadow: 0 25px 70px rgba(0, 0, 0, 0.6);
            animation: fadeIn 1s ease-out;
        }

        h1 {
            font-size: 3.2rem;
            margin-bottom: 18px;
            background: linear-gradient(90deg, #fff, #ffd700, #fff);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shine 3s linear infinite;
            text-shadow: 0 0 30px rgba(255, 215, 0, 0.5);
        }

        @keyframes shine {
            to { background-position: 200% center; }
        }

        p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.1rem;
            letter-spacing: 1px;
        }

        .boxing {
            font-size: 4rem;
            display: block;
            margin-bottom: 20px;
            animation: bob 2s ease-in-out infinite;
        }

        @keyframes bob {
            0%, 100% { transform: translateY(0) rotate(-5deg); }
            50%      { transform: translateY(-12px) rotate(5deg); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <div class="card">
        <span class="boxing">🥊</span>
        <h1><?= $message ?></h1>
        <p>Работает на PHP <?= PHP_VERSION ?></p>
        <p style="margin-top:8px;opacity:0.7;"><?= $time ?></p>
    </div>
</body>
</html>