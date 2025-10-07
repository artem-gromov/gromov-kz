<?php
$siteTitle = 'Gromov Systems // Personnel Interface';
$description = 'Retro-futuristic dossier: profile of Artem Gromov, data engineer.';
$birthDate = new DateTime('1988-05-01');
$age = $birthDate->diff(new DateTime())->y;

$storageStats = [
    'total_rows' => 1188837503002,
    'total_bytes' => 50466318417242,
    'total_tables' => 95878,
    'total_users' => 278,
    'queries_today' => 6499418,
    'compressed_bytes' => 50348881864166,
    'uncompressed_bytes' => 172701582001172,
];

function formatMetricNumber($value)
{
    return number_format((float) $value, 0, '.', ' ');
}

function formatMetricBytes($bytes)
{
    if ($bytes <= 0) {
        return '0 B';
    }

    $units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB'];
    $index = 0;
    $normalized = $bytes;

    while ($normalized >= 1024 && $index < count($units) - 1) {
        $normalized /= 1024;
        $index++;
    }

    $precision = $index === 0 ? 0 : ($normalized < 10 ? 2 : 1);

    return number_format($normalized, $precision, '.', ' ') . ' ' . $units[$index];
}

function formatCompressionRatio($ratio)
{
    if ($ratio <= 0) {
        return '1.00×';
    }

    return number_format($ratio, $ratio < 10 ? 2 : 1, '.', ' ') . '×';
}

function formatPercent($value)
{
    return number_format($value, 1, '.', ' ') . '%';
}

$compressionRatio = $storageStats['uncompressed_bytes'] > 0
    ? $storageStats['uncompressed_bytes'] / $storageStats['compressed_bytes']
    : 0;

$compressionSavings = $storageStats['uncompressed_bytes'] > 0
    ? (1 - ($storageStats['compressed_bytes'] / $storageStats['uncompressed_bytes'])) * 100
    : 0;

$storageMetrics = [
    [
        'label' => 'Total Rows',
        'value' => formatMetricNumber($storageStats['total_rows']),
        'hint' => 'Unified records across clusters',
    ],
    [
        'label' => 'Data Volume',
        'value' => formatMetricBytes($storageStats['total_bytes']),
        'hint' => formatMetricNumber($storageStats['total_bytes']) . ' bytes indexed',
    ],
    [
        'label' => 'Compressed Footprint',
        'value' => formatMetricBytes($storageStats['compressed_bytes']),
        'hint' => 'Active parts on disk',
    ],
    [
        'label' => 'Logical Footprint',
        'value' => formatMetricBytes($storageStats['uncompressed_bytes']),
        'hint' => 'Raw columnar expansion',
    ],
    [
        'label' => 'Active Tables',
        'value' => formatMetricNumber($storageStats['total_tables']),
        'hint' => 'Operational datasets',
    ],
    [
        'label' => 'Authorized Users',
        'value' => formatMetricNumber($storageStats['total_users']),
        'hint' => 'Identities with data access',
    ],
    [
        'label' => 'Queries Today',
        'value' => formatMetricNumber($storageStats['queries_today']),
        'hint' => 'Cluster-wide executions',
    ],
    [
        'label' => 'Compression Ratio',
        'value' => formatCompressionRatio($compressionRatio),
        'hint' => formatPercent($compressionSavings) . ' space saved',
    ],
];
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
    <?php $styleVersion = filemtime(__DIR__ . '/assets/css/style.css'); ?>
    <link rel="stylesheet" href="/assets/css/style.css?v=<?= $styleVersion ?>">
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
                            <dt>Age:</dt>
                            <dd><?= $age ?> years</dd>
                        </div>
                        <div class="identity__item">
                            <dt>Home sector:</dt>
                            <dd>Almaty, KZ</dd>
                        </div>
                        <div class="identity__item">
                            <dt>Email:</dt>
                            <dd><a href="mailto:artem@gromov.kz">artem@gromov.kz</a></dd>
                        </div>
                        <div class="identity__item">
                            <dt>Telegram:</dt>
                            <dd><a href="https://t.me/artem_gromov" target="_blank" rel="noopener">t.me/artem_gromov</a></dd>
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

        <section class="panel panel--storage">
            <div class="panel__header">
                <span class="panel__title">STORAGE GRID</span>
                <span class="panel__status">PROPRIETARY</span>
            </div>
            <p class="panel__caption">Data warehouse engineered and maintained by Artem Gromov</p>
            <div class="metrics metrics--storage">
                <?php foreach ($storageMetrics as $metric): ?>
                    <article class="metric">
                        <span class="metric__label"><?= htmlspecialchars($metric['label'], ENT_QUOTES, 'UTF-8') ?></span>
                        <span class="metric__value"><?= htmlspecialchars($metric['value'], ENT_QUOTES, 'UTF-8') ?></span>
                        <?php if (!empty($metric['hint'])): ?>
                            <span class="metric__hint"><?= htmlspecialchars($metric['hint'], ENT_QUOTES, 'UTF-8') ?></span>
                        <?php endif; ?>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="panel panel--stack">
            <div class="panel__header">
                <span class="panel__title">TECHNOLOGY MATRIX</span>
                <span class="panel__status panel__status--blink">VERIFIED</span>
            </div>
            <div class="modules modules--stack">
                <article class="module module--stack">
                    <div class="module__heading">
                        <span class="module__icon" aria-hidden="true" data-code="PL"></span>
                        <div class="module__meta">
                            <h2 class="module__title">Programming Languages</h2>
                            <span class="module__subtitle">Cognitive routines engaged</span>
                        </div>
                    </div>
                    <ul class="module__matrix">
                        <li class="module__matrix-item">Python</li>
                        <li class="module__matrix-item">SQL</li>
                        <li class="module__matrix-item">Bash</li>
                        <li class="module__matrix-item">Go</li>
                    </ul>
                </article>

                <article class="module module--stack">
                    <div class="module__heading">
                        <span class="module__icon" aria-hidden="true" data-code="DE"></span>
                        <div class="module__meta">
                            <h2 class="module__title">Data Engineering</h2>
                            <span class="module__subtitle">Pipelines and orchestration</span>
                        </div>
                    </div>
                    <ul class="module__matrix">
                        <li class="module__matrix-item">Airflow</li>
                        <li class="module__matrix-item">dbt</li>
                        <li class="module__matrix-item">Kafka</li>
                        <li class="module__matrix-item">ClickHouse</li>
                        <li class="module__matrix-item">PostgreSQL</li>
                    </ul>
                </article>

                <article class="module module--stack">
                    <div class="module__heading">
                        <span class="module__icon" aria-hidden="true" data-code="IO"></span>
                        <div class="module__meta">
                            <h2 class="module__title">Infrastructure Ops</h2>
                            <span class="module__subtitle">Deployment and control</span>
                        </div>
                    </div>
                    <ul class="module__matrix">
                        <li class="module__matrix-item">Docker</li>
                        <li class="module__matrix-item">Kubernetes</li>
                        <li class="module__matrix-item">GitHub Actions</li>
                        <li class="module__matrix-item">Linux</li>
                    </ul>
                </article>

                <article class="module module--stack">
                    <div class="module__heading">
                        <span class="module__icon" aria-hidden="true" data-code="AV"></span>
                        <div class="module__meta">
                            <h2 class="module__title">Analytics &amp; Viz</h2>
                            <span class="module__subtitle">Situational awareness</span>
                        </div>
                    </div>
                    <ul class="module__matrix">
                        <li class="module__matrix-item">Metabase</li>
                        <li class="module__matrix-item">Superset</li>
                        <li class="module__matrix-item">Grafana</li>
                        <li class="module__matrix-item">Plotly</li>
                        <li class="module__matrix-item">Matplotlib</li>
                        <li class="module__matrix-item">Jupyter</li>
                    </ul>
                </article>

                <article class="module module--stack">
                    <div class="module__heading">
                        <span class="module__icon" aria-hidden="true" data-code="BA"></span>
                        <div class="module__meta">
                            <h2 class="module__title">Backend / API</h2>
                            <span class="module__subtitle">Service interfaces</span>
                        </div>
                    </div>
                    <ul class="module__matrix">
                        <li class="module__matrix-item">FastAPI</li>
                        <li class="module__matrix-item">Flask</li>
                        <li class="module__matrix-item">Redis</li>
                        <li class="module__matrix-item">Celery</li>
                        <li class="module__matrix-item">gRPC</li>
                        <li class="module__matrix-item">GraphQL</li>
                    </ul>
                </article>

                <article class="module module--stack">
                    <div class="module__heading">
                        <span class="module__icon" aria-hidden="true" data-code="QS"></span>
                        <div class="module__meta">
                            <h2 class="module__title">Quality Systems</h2>
                            <span class="module__subtitle">Integrity safeguards</span>
                        </div>
                    </div>
                    <ul class="module__matrix">
                        <li class="module__matrix-item">pytest</li>
                        <li class="module__matrix-item">mypy</li>
                        <li class="module__matrix-item">flake8</li>
                        <li class="module__matrix-item">black</li>
                        <li class="module__matrix-item">Sentry</li>
                        <li class="module__matrix-item">Prometheus</li>
                    </ul>
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
