<?php
$message = "Привет, мир!";
$time = date('d.m.Y H:i');

// Случайный большой кот
$cats = ['🐱', '😺', '😸', '😻', '🐈', '🐈‍⬛', '😼', '😽'];
$cat = $cats[array_rand($cats)];

// Анекдоты дня
$jokes = [
    "— Мяу.\n— Мяу-мяу.\n— Ага, понял. (разговор двух котов, очень содержательный)",
    "Кот сидит на дереве и кричит:\n— Снимите меня!\n— А как ты туда залез?\n— Я не залезал, я тут родился!",
    "— Почему коты всегда падают на лапы?\n— Потому что у них нет выбора — на спину больно.",
    "Приходит кот к ветеринару:\n— Доктор, у меня проблема: я всё время гоняюсь за лазерной точкой.\n— И давно это с вами?\n— С тех пор, как хозяин купил указку... ААА! ВОН ОНА! (убегает)",
    "— Как отличить кота от кошки?\n— По паспорту. Или спросить. Но лучше не спрашивать — обидятся.",
    "Кот заходит в бар и говорит:\n— Мне, пожалуйста, молока.\nБармен:\n— У нас нет молока.\nКот выходит. Через минуту заходит снова:\n— Мне, пожалуйста, молока.\nБармен:\n— Я же сказал, нет у нас молока!\nКот:\n— А теперь?",
    "Сидит кот на подоконнике, смотрит в окно. Хозяин спрашивает:\n— О чём думаешь?\nКот:\n— Ни о чём. У меня отпуск.",
];
$joke = $jokes[array_rand($jokes)];
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
            padding: 20px;
        }

        /* Плавающие котики на фоне */
        .floating-cat {
            position: absolute;
            font-size: 4rem;
            opacity: 0.35;
            animation: float 8s ease-in-out infinite;
            pointer-events: none;
        }
        .floating-cat:nth-child(1) { top: 8%;  left: 5%;  animation-delay: 0s;   }
        .floating-cat:nth-child(2) { top: 70%; left: 10%; animation-delay: 1.5s; }
        .floating-cat:nth-child(3) { top: 15%; left: 88%; animation-delay: 3s;   }
        .floating-cat:nth-child(4) { top: 78%; left: 80%; animation-delay: 4.5s; }
        .floating-cat:nth-child(5) { top: 45%; left: 2%;  animation-delay: 2s;   }
        .floating-cat:nth-child(6) { top: 50%; left: 94%; animation-delay: 5s;   }

        @keyframes float {
            0%, 100% { transform: translateY(0) rotate(-5deg); }
            50%      { transform: translateY(-35px) rotate(5deg); }
        }

        /* Карточка */
        .card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(16px);
            -webkit-backdrop-filter: blur(16px);
            border: 2px solid rgba(255, 255, 255, 0.9);
            border-radius: 32px;
            padding: 50px 70px;
            text-align: center;
            box-shadow: 0 25px 70px rgba(255, 120, 120, 0.4);
            animation: fadeIn 1s ease-out;
            position: relative;
            z-index: 2;
            max-width: 700px;
        }

        .big-cat {
            font-size: 9rem;
            display: block;
            margin-bottom: 10px;
            line-height: 1;
            animation: bounce 2s ease-in-out infinite;
            filter: drop-shadow(0 10px 25px rgba(255, 100, 150, 0.5));
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0) scale(1); }
            50%      { transform: translateY(-20px) scale(1.12); }
        }

        h1 {
            font-size: 3.5rem;
            margin-bottom: 20px;
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

        .joke-box {
            background: rgba(255, 255, 255, 0.75);
            border-left: 6px solid #ff6b9d;
            border-radius: 14px;
            padding: 22px 26px;
            margin: 24px 0;
            text-align: left;
            box-shadow: 0 6px 20px rgba(200, 80, 130, 0.15);
        }

        .joke-title {
            font-size: 0.85rem;
            font-weight: 700;
            letter-spacing: 2px;
            color: #c44569;
            text-transform: uppercase;
            margin-bottom: 10px;
        }

        .joke-text {
            font-size: 1.05rem;
            color: #4a2c3a;
            line-height: 1.6;
            white-space: pre-line;
        }

        .meta {
            color: #6b4c4c;
            font-size: 0.95rem;
            letter-spacing: 0.5px;
        }

        .paws {
            margin-top: 20px;
            font-size: 1.6rem;
            letter-spacing: 10px;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50%      { opacity: 0.5; }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(25px); }
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

        <div class="joke-box">
            <div class="joke-title">😹 Анекдот дня</div>
            <div class="joke-text"><?= htmlspecialchars($joke) ?></div>
        </div>

        <p class="meta">Работает на PHP <?= PHP_VERSION ?> • <?= $time ?></p>
        <div class="paws">🐾 🐾 🐾</div>
    </div>
</body>
</html>