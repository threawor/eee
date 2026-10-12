<?php
$time = date('d.m.Y H:i');

// Анекдоты — по одному на тему
$jokes = [
    'Смерть'      => "— Доктор, я умру?\n— Ну, все там будем.\n— А конкретнее?\n— Конкретнее — завтра в 14:30. Приходите, скидку сделаю.",
    'Работа'      => "Начальник:\n— Почему уходите в 18:00, если работы ещё на три часа?\n— Потому что если останусь, работы станет на пять.",
    'Семья'       => "Жена мужу:\n— Дорогой, я хочу, чтобы наши отношения стали глубже.\n— Хорошо, я выкопаю яму. Насколько глубоко?",
    'Медицина'    => "— Доктор, у меня всё болит. Куда ни нажму — везде больно.\n— У вас сломан палец.",
    'Деньги'      => "— Как стать миллионером?\n— Начните миллиардером и работайте над собой.",
    'Политика'    => "— Что общего у политика и подгузника?\n— Оба должны меняться регулярно. И оба воняют.",
    'IT'          => "— Почему программисты не боятся смерти?\n— У них есть бэкапы. Правда, они их лет пять не проверяли.",
];

// Викторина — вопрос + варианты + правильный индекс + подпись мема
$quiz = [
    [
        'question' => 'Что говорит программист, когда код работает, но он не знает почему?',
        'options'  => ['«Не трогай, оно живое»', '«Всё по плану»', '«Я гений»', '«Задеплоим в пятницу»'],
        'correct'  => 0,
        'meme_top' => 'It works',
        'meme_bot' => 'on my machine',
    ],
    [
        'question' => 'Понедельник. Ты открываешь рабочую почту и видишь 47 писем. Твоя реакция?',
        'options'  => ['Отвечу все', 'Закрою и сделаю вид, что не видел', 'Уволюсь', 'Перешлю начальнику'],
        'correct'  => 1,
        'meme_top' => 'I see no',
        'meme_bot' => 'differences',
    ],
    [
        'question' => 'Сколько нужно сеньоров, чтобы пофиксить баг в проде?',
        'options'  => ['Один', 'Два', 'Ни одного — это фича', 'Все, но завтра'],
        'correct'  => 2,
        'meme_top' => 'Its not a bug',
        'meme_bot' => 'its a feature',
    ],
    [
        'question' => 'Что делает студент за день до экзамена?',
        'options'  => ['Учит', 'Спит', 'Учит других', 'Начинает учить'],
        'correct'  => 3,
        'meme_top' => 'Procrastination',
        'meme_bot' => 'level 100',
    ],
];

// Логика викторины
$quizIndex  = isset($_GET['q']) ? (int)$_GET['q'] : 0;
$quizIndex  = max(0, min($quizIndex, count($quiz) - 1));
$answer     = $_GET['answer'] ?? null;
$current    = $quiz[$quizIndex];
$answered   = $answer !== null;
$isCorrect  = $answered && (int)$answer === $current['correct'];

// Анекдот дня — привязан к дате
$topics     = array_keys($jokes);
$dayIndex   = (int)date('z') % count($topics);
$todayTopic = $topics[$dayIndex];
$joke       = $jokes[$todayTopic];
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>😈 Чёрный юмор + Мемы</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, sans-serif;
            background: linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%);
            color: #e0e0e0;
            padding: 40px 20px;
        }

        .container { max-width: 900px; margin: 0 auto; }

        h1 {
            text-align: center;
            font-size: 2.6rem;
            margin-bottom: 10px;
            background: linear-gradient(90deg, #ff6b6b, #c44569, #ff6b6b);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: shine 4s linear infinite;
        }

        @keyframes shine { to { background-position: 200% center; } }

        .subtitle {
            text-align: center;
            color: #888;
            margin-bottom: 35px;
            font-size: 0.95rem;
        }

        /* Общий стиль карточек */
        .card {
            background: rgba(255, 255, 255, 0.04);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 22px;
            padding: 35px 40px;
            margin-bottom: 30px;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
            animation: fadeIn 0.6s ease-out;
            position: relative;
            overflow: hidden;
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0; left: 0;
            width: 5px; height: 100%;
            background: linear-gradient(180deg, #ff6b6b, #c44569);
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        .label {
            font-size: 0.75rem;
            letter-spacing: 3px;
            text-transform: uppercase;
            color: #ff6b6b;
            margin-bottom: 18px;
            font-weight: 700;
        }

        .joke-text {
            font-size: 1.2rem;
            line-height: 1.7;
            white-space: pre-line;
            color: #e8e8e8;
        }

        /* Викторина */
        .question {
            font-size: 1.25rem;
            line-height: 1.6;
            margin-bottom: 22px;
            color: #fff;
            font-weight: 600;
        }

        .options {
            display: grid;
            gap: 12px;
            margin-bottom: 20px;
        }

        .option {
            display: block;
            padding: 16px 20px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.12);
            border-radius: 12px;
            color: #ddd;
            text-decoration: none;
            font-size: 1rem;
            transition: all 0.25s ease;
        }

        .option:hover {
            background: rgba(255, 107, 107, 0.18);
            border-color: rgba(255, 107, 107, 0.5);
            color: #fff;
            transform: translateX(4px);
        }

        .option.correct {
            background: rgba(76, 175, 80, 0.25);
            border-color: #4caf50;
            color: #b9f6ca;
        }

        .option.wrong {
            background: rgba(244, 67, 54, 0.22);
            border-color: #f44336;
            color: #ffcdd2;
        }

        .option.disabled {
            pointer-events: none;
            opacity: 0.6;
        }

        .result {
            text-align: center;
            font-size: 1.3rem;
            font-weight: 700;
            margin-bottom: 20px;
        }

        .result.ok  { color: #4caf50; }
        .result.bad { color: #f44336; }

        /* Мем */
        .meme-wrap {
            text-align: center;
            margin-top: 20px;
            animation: fadeIn 0.8s ease-out;
        }

        .meme-wrap img {
            max-width: 100%;
            border-radius: 16px;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.6);
        }

        /* Кнопки */
        .actions {
            display: flex;
            gap: 12px;
            justify-content: center;
            flex-wrap: wrap;
        }

        .btn {
            padding: 13px 26px;
            border-radius: 12px;
            text-decoration: none;
            font-size: 0.98rem;
            font-weight: 600;
            transition: all 0.25s ease;
            display: inline-block;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ff6b6b, #c44569);
            color: #fff;
            box-shadow: 0 8px 25px rgba(255, 107, 107, 0.4);
        }

        .btn-primary:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 30px rgba(255, 107, 107, 0.6);
        }

        .btn-secondary {
            background: rgba(255, 255, 255, 0.08);
            color: #ccc;
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        .btn-secondary:hover {
            background: rgba(255, 255, 255, 0.15);
            color: #fff;
        }

        .meta {
            text-align: center;
            margin-top: 30px;
            color: #555;
            font-size: 0.85rem;
        }

        .progress {
            text-align: center;
            color: #888;
            font-size: 0.9rem;
            margin-bottom: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>😈 Чёрный юмор + Мемы</h1>
        <p class="subtitle">Анекдот дня и викторина, где неправильный ответ тоже смешной.</p>

        <!-- Анекдот дня -->
        <div class="card">
            <div class="label">😹 Анекдот дня — <?= htmlspecialchars($todayTopic) ?></div>
            <div class="joke-text"><?= htmlspecialchars($joke) ?></div>
        </div>

        <!-- Викторина -->
        <div class="card">
            <div class="label">🎯 Викторина с мемами</div>

            <div class="progress">Вопрос <?= $quizIndex + 1 ?> из <?= count($quiz) ?></div>

            <div class="question"><?= htmlspecialchars($current['question']) ?></div>

            <?php if ($answered): ?>
                <div class="result <?= $isCorrect ? 'ok' : 'bad' ?>">
                    <?= $isCorrect ? '✅ Верно! Ты умён. Пока что.' : '❌ Мимо. Но мем всё равно твой.' ?>
                </div>
            <?php endif; ?>

            <div class="options">
                <?php foreach ($current['options'] as $i => $opt): ?>
                    <?php
                        $cls = 'option';
                        if ($answered) {
                            $cls .= ' disabled';
                            if ($i === $current['correct']) $cls .= ' correct';
                            elseif ($i === (int)$answer)      $cls .= ' wrong';
                        }
                    ?>
                    <?php if (!$answered): ?>
                        <a href="?q=<?= $quizIndex ?>&answer=<?= $i ?>" class="<?= $cls ?>">
                            <?= htmlspecialchars($opt) ?>
                        </a>
                    <?php else: ?>
                        <div class="<?= $cls ?>"><?= htmlspecialchars($opt) ?></div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>

            <!-- Мем показывается после ответа -->
            <?php if ($answered): ?>
                <div class="meme-wrap">
                    <img src="https://api.memegen.link/images/custom/<?= urlencode($current['meme_top']) ?>/<?= urlencode($current['meme_bot']) ?>.png?background=https://i.imgflip.com/1ur9b0.jpg&width=600"
                         alt="Мем">
                </div>
            <?php endif; ?>

            <div class="actions" style="margin-top:25px;">
                <?php if (!$answered): ?>
                    <a href="?q=<?= $quizIndex ?>" class="btn btn-secondary">🤷 Пропустить</a>
                <?php else: ?>
                    <a href="?q=<?= ($quizIndex + 1) % count($quiz) ?>" class="btn btn-primary">
                        ➡️ Следующий вопрос
                    </a>
                    <a href="?q=<?= $quizIndex ?>" class="btn btn-secondary">🔁 Ещё раз</a>
                <?php endif; ?>
            </div>
        </div>

        <div class="actions">
            <a href="?" class="btn btn-secondary">🏠 С начала</a>
        </div>

        <p class="meta">Работает на PHP <?= PHP_VERSION ?> • <?= $time ?></p>
    </div>
</body>
</html>