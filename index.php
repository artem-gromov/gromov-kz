<?php
$siteTitle = 'Artem Gromov — персональная страничка';
$description = 'Личная страница Артема Громова: проекты, заметки и контакты.';
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?>">
    <title><?= htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="page">
    <header class="hero">
        <div class="hero__content">
            <h1 class="hero__title"><?= htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8') ?></h1>
            <p class="hero__subtitle"><?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?></p>
        </div>
        <div class="hero__photo" role="presentation">
            <span class="hero__initials">AG</span>
        </div>
    </header>

    <main class="main">
        <section class="section section--weather">
            <h2 class="section__title">Погода в Алматы</h2>
            <p class="section__intro">
                Планируешь прогулку или встречу? Проверь актуальный прогноз прямо здесь.
            </p>
            <div class="weather-widget" aria-live="polite">
                <a class="weatherwidget-io"
                   href="https://forecast7.com/ru/43d24n76d95/almaty/"
                   data-label_1="Алматы"
                   data-label_2="Погода"
                   data-font="Inter"
                   data-theme="pure">
                    Алматы Погода
                </a>
            </div>
        </section>

        <section class="section section--about">
            <h2 class="section__title">Обо мне</h2>
            <p class="section__text">
                Здесь скоро появится рассказ о моих проектах, ценных находках и идеях. Следи за обновлениями!
            </p>
        </section>
    </main>

    <footer class="footer">
        <p class="footer__text">© <?= date('Y') ?> Artem Gromov. Сделано с любовью и PHP.</p>
    </footer>
</div>

<script>
    (function loadWeatherWidget(doc, scriptId) {
        const existingScript = doc.getElementById(scriptId);
        if (existingScript) {
            return;
        }

        const script = doc.createElement('script');
        script.id = scriptId;
        script.src = 'https://weatherwidget.io/js/widget.min.js';
        script.async = true;

        const firstScript = doc.getElementsByTagName('script')[0];
        firstScript.parentNode.insertBefore(script, firstScript);
    }(document, 'weatherwidget-io-js'));
</script>
</body>
</html>
