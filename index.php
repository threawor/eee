<?php
$message = "Привет, мир!";
$time = date('d.m.Y H:i');
$cats = ['🐱', '😺', '😸', '😻', '🐈', '🐈‍⬛'];
$cat = $cats[array_rand($cats)];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title><?= $message ?> 🐱</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #ffecd2 0%, #fcb69f 50%, #ff9a9e 100%);
            overflow: hidden;
            position: relative;
        }

        /* Плавающие котики на фоне */
        .floating-cat {
            position: absolute;
            font-size: 2.5rem;
            opacity: 0.35;
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }
        .floating-cat:nth-child(1) { top: 10%; left: 8%;  animation-delay: 0s;   }
        .floating-cat:nth-child(2) { top: 70%; left: 15%; animation-delay: 1.5s; }
        .floating-cat:nth-child(3) { top: 20%; left: 85%; animation-delay: 3s;   }
        .floating-cat:nth-child(4) { top: 80%; left: 78%; animation-delay: 4.5s; }
        .floating-cat:nth-child(5) { top: 45%; left: 5%;  animation-delay: 2s;   }
        .floating-cat:nth-child(6) { top: 55%; left: 92%; animation-delay: 5s;   }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(-5deg); }
            50%      { transform: translateY(-30px) rotate(5deg); }
        }

        /* Карточка */
        .card {
            background: rgba(255, 255, 255, 0.55);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 2px solid rgba(255, 255, 255, 0.8);
            border-radius: 28px;
            padding: 60px 80px;
            text-align: center;
            box-shadow: 0 20px 60px rgba(255, 120, 120, 0.35);
            animation: fadeIn 1s ease-out;
            position: relative;
            z-index: 2;
        }

        .big-cat {
            font-size: 5rem;
            display: block;
            margin-bottom: 20px;
            animation: bounce 2s ease-in-out infinite;
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0) scale(1); }
            50%      { transform: translateY(-15px) scale(1.08); }
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 16px;
            background: linear-gradient(90deg, #ff6b9d, #c44569, #ff6b9d);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shine 3s linear infinite;
        }

        @keyframes shine {
            to { background-position: 200% center; }
        }

        p {
            color: #6b4c4c;
            font-size: 1.05rem;
            letter-spacing: 0.5px;
        }

        .paws {
            margin-top: 20px;
            font-size: 1.4rem;
            letter-spacing: 8px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%      { opacity: 0.5; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body>
    <!-- Плавающие котики на фоне -->
    <div class="floating-cat">🐱</div>
    <div class="floating-cat">😺</div>
    <div class="floating-cat">🐈</div>
    <div class="floating-cat">😻</div>
    <div class="floating-cat">😸</div>
    <div class="floating-cat">🐈‍⬛</div>

    <!-- Главная карточка -->
    <div class="card">
        <span class="big-cat"><?= $cat ?></span>
        <h1><?= $message ?></h1>
        <p>Работает на PHP <?= PHP_VERSION ?></p>
        <p style="margin-top:6px;opacity:0.7;"><?= $time ?></p>
        <div class="paws">🐾 🐾 🐾</div>
    </div>
</body>
</html>