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
    <header class="top-bar">
        <div class="top-bar__badge">GROMOV SYS // ID: AG-042</div>
        <div class="top-bar__clock" data-role="clock">--:--:--</div>
    </header>

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
                        <div class="identity__item">
                            <dt>Clearance</dt>
                            <dd>ALPHA-3</dd>
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
                    <div class="metric__info">
                        <span class="metric__label">Pulse</span>
                        <span class="metric__value" data-role="pulse-value">-- bpm</span>
                    </div>
                    <svg class="metric__graph" viewBox="0 0 300 100" preserveAspectRatio="none">
                        <path data-role="pulse-path" d="M0,50 L20,50 L40,30 L60,70 L80,50 L110,50 L130,20 L150,80 L170,50 L200,50 L220,35 L240,65 L260,50 L280,50 L300,50"></path>
                    </svg>
                </article>
                <article class="metric">
                    <span class="metric__label">Location</span>
                    <span class="metric__value" data-role="coordinates">43.2389° N, 76.8897° E</span>
                    <span class="metric__hint">ALMATY DRIFT</span>
                </article>
                <article class="metric">
                    <span class="metric__label">Network status</span>
                    <span class="metric__value">Quantum Link // SECURE</span>
                    <span class="metric__hint">LATENCY: 12ms</span>
                </article>
                <article class="metric">
                    <span class="metric__label">Last sync</span>
                    <span class="metric__value" data-role="sync">--.--.---- --:--:--</span>
                    <span class="metric__hint">AUTONOMOUS BACKUP ACTIVE</span>
                </article>
            </div>
        </section>

        <section class="panel panel--logs">
            <div class="panel__header">
                <span class="panel__title">SYSTEM LOGS</span>
                <span class="panel__status panel__status--blink">LIVE FEED</span>
            </div>
            <div class="logs" data-role="logs">
                <p>[SYS] Initializing analytical protocols...</p>
                <p>[AI] Processed 12.4 TB of data across 4 continents</p>
                <p>[NET] Connection to cluster «CYBERSTEP» confirmed</p>
                <p>[OPS] Workload forecast stabilized at 87%</p>
                <p>[LAB] Recommendation: Launch experiment #AURORA</p>
            </div>
        </section>

        <section class="panel panel--projects">
            <div class="panel__header">
                <span class="panel__title">ACTIVE MODULES</span>
                <span class="panel__status">ACCESS GRANTED</span>
            </div>
            <div class="modules">
                <article class="module">
                    <h2 class="module__title">NEURONET PIPELINE</h2>
                    <p class="module__desc">Realtime ETL core for telemetry analytics across distributed systems.</p>
                    <div class="module__status">
                        <span class="module__tag">STREAM</span>
                        <span class="module__tag module__tag--active">ACTIVE</span>
                    </div>
                </article>
                <article class="module">
                    <h2 class="module__title">ASTRODATA VAULT</h2>
                    <p class="module__desc">Data vault platform ingesting orbital L2 sensor feeds.</p>
                    <div class="module__status">
                        <span class="module__tag">BATCH</span>
                        <span class="module__tag">MAINTENANCE</span>
                    </div>
                </article>
                <article class="module">
                    <h2 class="module__title">CHIMERA AI LAB</h2>
                    <p class="module__desc">Adaptive model experiments and anomaly hunts in data streams.</p>
                    <div class="module__status">
                        <span class="module__tag">R&D</span>
                        <span class="module__tag module__tag--active">PRIORITY</span>
                    </div>
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
        const clockEl = document.querySelector('[data-role="clock"]');
        const coordsEl = document.querySelector('[data-role="coordinates"]');
        const pulseEl = document.querySelector('[data-role="pulse-value"]');
        const syncEl = document.querySelector('[data-role="sync"]');
        const logsEl = document.querySelector('[data-role="logs"]');
        const pulsePath = document.querySelector('[data-role="pulse-path"]');

        const baseLat = 43.238949;
        const baseLon = 76.889709;

        function pad(value) {
            return String(value).padStart(2, '0');
        }

        function updateClock() {
            const now = new Date();
            clockEl.textContent = `${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
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
            const bpm = Math.floor(72 + Math.random() * 10);
            pulseEl.textContent = `${bpm} bpm`;
        }

        function animatePulseGraph() {
            if (!pulsePath) {
                return;
            }
            const length = pulsePath.getTotalLength();
            pulsePath.style.setProperty('--dash', length);
        }

        function pushLogLine() {
            if (!logsEl) {
                return;
            }
            const now = new Date();
            const phrases = [
                'Integrity sweep completed.',
                'New telemetry source detected.',
                'Clustering cycle finished successfully.',
                'Anomaly scan: no deviations.',
                'Visualization protocol loaded.',
                'Access level confirmed.',
                'Load forecast recalibrated.',
                'Security signatures synchronized.'
            ];
            const randomPhrase = phrases[Math.floor(Math.random() * phrases.length)];
            const timestamp = `${pad(now.getHours())}:${pad(now.getMinutes())}:${pad(now.getSeconds())}`;
            const entry = document.createElement('p');
            entry.textContent = `[${timestamp}] ${randomPhrase}`;
            logsEl.appendChild(entry);
            logsEl.scrollTop = logsEl.scrollHeight;
            if (logsEl.children.length > 12) {
                logsEl.removeChild(logsEl.firstElementChild);
            }
        }

        updateClock();
        updateSyncTimestamp();
        updateCoordinates();
        updatePulse();
        animatePulseGraph();

        setInterval(updateClock, 1000);
        setInterval(updateCoordinates, 2200);
        setInterval(updatePulse, 2800);
        setInterval(updateSyncTimestamp, 10000);
        setInterval(pushLogLine, 6000);
    })();
</script>
</body>
</html>
