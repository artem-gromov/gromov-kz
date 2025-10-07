<?php
$siteTitle = 'Gromov Systems // Personnel Interface';
$description = 'Retro-futuristic dossier system: profile of Artem Gromov, data engineer.';
$birthDate = new DateTime('1988-05-01');
$age = $birthDate->diff(new DateTime())->y;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= htmlspecialchars($description, ENT_QUOTES, 'UTF-8') ?>">
    <title><?= htmlspecialchars($siteTitle, ENT_QUOTES, 'UTF-8') ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Share+Tech+Mono&family=VT323&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
<div class="scanlines" aria-hidden="true"></div>
<div class="haze" aria-hidden="true"></div>
<div class="page">

    <main class="terminal">
        <section class="panel panel--identity">
            <div class="panel__header">
                <span class="panel__title">PERSONNEL DOSSIER</span>
                <span class="panel__status">ONLINE</span>
            </div>
            <div class="identity">
                <div class="identity__photo">
                    <img src="https://i.pravatar.cc/420?u=artem.gromov" alt="Portrait of Artem Gromov">
                    <span class="identity__photo-frame" aria-hidden="true"></span>
                </div>
                <div class="identity__meta">
                    <h1 class="identity__name">Artem Gromov</h1>
                    <p class="identity__role">Data Engineer</p>
                    <dl class="identity__list">
                        <div class="identity__item">
                            <dt>Date of birth</dt>
                            <dd>01.05.1988 (<?= $age ?>)</dd>
                        </div>
                        <div class="identity__item">
                            <dt>Home sector</dt>
                            <dd>Almaty, KZ</dd>
                        </div>
                        <div class="identity__item">
                            <dt>UID</dt>
                            <dd>AG-1988-0501</dd>
                        </div>
                    </dl>
                </div>
            </div>
        </section>

        <section class="panel panel--metrics">
            <div class="panel__header">
                <span class="panel__title">VITAL METRICS</span>
                <span class="panel__status panel__status--pulse">STABLE</span>
            </div>
            <div class="metrics">
                <article class="metric metric--pulse">
                    <span class="metric__label">Pulse</span>
                    <div class="pulse">
                        <span class="pulse__value" data-role="pulse-value">-- bpm</span>
                        <span class="pulse__heart" aria-hidden="true">❤</span>
                    </div>
                </article>
                <article class="metric">
                    <span class="metric__label">Location</span>
                    <span class="metric__value" data-role="coordinates">43.2389° N, 76.8897° E</span>
                </article>
                <article class="metric metric--temp">
                    <span class="metric__label">Outside temp</span>
                    <span class="metric__value" data-role="temperature">-- °C</span>
                    <span class="metric__hint" data-role="temperature-updated">Fetching...</span>
                </article>
                <article class="metric">
                    <span class="metric__label">Last sync</span>
                    <span class="metric__value" data-role="sync">--.--.---- --:--:--</span>
                    <span class="metric__hint">AUTONOMOUS BACKUP ACTIVE</span>
                </article>
            </div>
        </section>

    </main>

    <footer class="footer">
        <div class="footer__channel">
            <span>CHANNEL</span>
            <span>RETRO-FUTURE / CYBERNETICS</span>
        </div>
        <div class="footer__copyright">© <?= date('Y') ?> Artem Gromov. Observation mode engaged.</div>
    </footer>
</div>

<script>
    (function () {
        const coordsEl = document.querySelector('[data-role="coordinates"]');
        const pulseEl = document.querySelector('[data-role="pulse-value"]');
        const temperatureEl = document.querySelector('[data-role="temperature"]');
        const temperatureUpdatedEl = document.querySelector('[data-role="temperature-updated"]');
        const syncEl = document.querySelector('[data-role="sync"]');

        const baseLat = 43.238949;
        const baseLon = 76.889709;

        function pad(value) {
            return String(value).padStart(2, '0');
        }

        function updateSyncTimestamp() {
            const now = new Date();
            syncEl.textContent = `${pad(now.getDate())}.${pad(now.getMonth() + 1)}.${now.getFullYear()} ${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
        }

        function updateCoordinates() {
            const driftLat = (Math.random() - 0.5) * 0.02;
            const driftLon = (Math.random() - 0.5) * 0.02;
            const latitude = baseLat + driftLat;
            const longitude = baseLon + driftLon;
            const latSuffix = latitude >= 0 ? 'N' : 'S';
            const lonSuffix = longitude >= 0 ? 'E' : 'W';
            coordsEl.textContent = `${latitude.toFixed(4)}° ${latSuffix}, ${Math.abs(longitude).toFixed(4)}° ${lonSuffix}`;
        }

        function updatePulse() {
            if (!pulseEl) {
                return;
            }
            const bpm = Math.floor(72 + Math.random() * 10);
            pulseEl.textContent = `${bpm} bpm`;
        }

        async function updateTemperature() {
            if (!temperatureEl || !temperatureUpdatedEl) {
                return;
            }
            try {
                temperatureUpdatedEl.textContent = 'Fetching...';
                const response = await fetch('https://api.open-meteo.com/v1/forecast?latitude=43.2389&longitude=76.8897&current=temperature_2m&timezone=auto');
                if (!response.ok) {
                    throw new Error('Request failed');
                }
                const data = await response.json();
                const temperature = data?.current?.temperature_2m;
                if (typeof temperature !== 'number') {
                    throw new Error('Missing temperature');
                }
                temperatureEl.textContent = `${Math.round(temperature)} °C`;
                const timeStamp = data?.current?.time ? new Date(data.current.time) : new Date();
                temperatureUpdatedEl.textContent = `Updated ${pad(timeStamp.getHours())}:${pad(timeStamp.getMinutes())}`;
            } catch (error) {
                temperatureEl.textContent = '-- °C';
                temperatureUpdatedEl.textContent = 'Update failed';
            }
        }



        updateSyncTimestamp();
        updateCoordinates();
        updatePulse();
        updateTemperature();

        setInterval(updateCoordinates, 2200);
        setInterval(updatePulse, 2800);
        setInterval(updateSyncTimestamp, 10000);
        setInterval(updateTemperature, 15 * 60 * 1000);
    })();
</script>
</body>
</html>
