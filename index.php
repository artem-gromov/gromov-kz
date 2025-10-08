<?php
$siteTitle = 'Gromov Nexus // Character Console';
$description = 'Retro-futuristic operator profile for Artem Gromov, warehouse architect and signal engineer.';
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
        'label' => 'Row Archive',
        'value' => formatMetricNumber($storageStats['total_rows']),
        'hint' => 'Indexed records across constellations',
    ],
    [
        'label' => 'Data Mass',
        'value' => formatMetricBytes($storageStats['total_bytes']),
        'hint' => formatMetricNumber($storageStats['total_bytes']) . ' bytes under command',
    ],
    [
        'label' => 'Compressed Footprint',
        'value' => formatMetricBytes($storageStats['compressed_bytes']),
        'hint' => 'Active shards on cold storage',
    ],
    [
        'label' => 'Logical Footprint',
        'value' => formatMetricBytes($storageStats['uncompressed_bytes']),
        'hint' => 'Raw expansion when inflated',
    ],
    [
        'label' => 'Active Tables',
        'value' => formatMetricNumber($storageStats['total_tables']),
        'hint' => 'Datasets linked into the grid',
    ],
    [
        'label' => 'Authorized Users',
        'value' => formatMetricNumber($storageStats['total_users']),
        'hint' => 'Identities with access tokens',
    ],
    [
        'label' => 'Query Throughput',
        'value' => formatMetricNumber($storageStats['queries_today']),
        'hint' => 'Executions processed this cycle',
    ],
    [
        'label' => 'Compression Delta',
        'value' => formatCompressionRatio($compressionRatio),
        'hint' => formatPercent($compressionSavings) . ' capacity reclaimed',
    ],
];

$heroAttributes = [
    [
        'label' => 'Division',
        'value' => 'Dataway Vanguard',
    ],
    [
        'label' => 'Designation',
        'value' => 'Signal Architect',
    ],
    [
        'label' => 'Experience',
        'value' => $age . ' cycles in field',
    ],
    [
        'label' => 'Operating Zone',
        'value' => 'Almaty Megalopolis, KZ',
    ],
    [
        'label' => 'Clearance',
        'value' => 'Level 4 - Green',
    ],
    [
        'label' => 'Specialization',
        'value' => 'Warehouse automation & real-time analytics',
    ],
];

$heroContacts = [
    [
        'label' => 'Comms Port',
        'value' => '<a href="mailto:artem@gromov.kz">artem@gromov.kz</a>',
        'is_html' => true,
    ],
    [
        'label' => 'Signal Uplink',
        'value' => '<a href="https://t.me/artem_gromov" target="_blank" rel="noopener">t.me/artem_gromov</a>',
        'is_html' => true,
    ],
    [
        'label' => 'Operative ID',
        'value' => 'AG-1988-DS',
    ],
];

$heroMeters = [
    [
        'label' => 'XP Buffer',
        'value' => 86,
        'hint' => 'Next upgrade at 90%',
    ],
    [
        'label' => 'Focus Charge',
        'value' => 72,
        'hint' => 'Maintained via deep work cycles',
    ],
    [
        'label' => 'System Load',
        'value' => 44,
        'hint' => 'Resources free for new missions',
    ],
    [
        'label' => 'Reboot Ready',
        'value' => 95,
        'hint' => 'Recovery pipelines hardened',
    ],
];

$achievements = [
    [
        'title' => 'Vault Architect Sigma',
        'tier' => 'S',
        'status' => 'Cleared 2044-06',
        'description' => 'Scaled the warehouse complex to 1.8 PB with zero downtime.',
    ],
    [
        'title' => 'Latency Whisperer',
        'tier' => 'A',
        'status' => 'Cleared 2043-11',
        'description' => 'Stabilized sub-second analytics across three business clusters.',
    ],
    [
        'title' => 'Resurrection Protocol',
        'tier' => 'A',
        'status' => 'Cleared 2042-04',
        'description' => 'Recovered a corrupted production shard overnight with bespoke restore flows.',
    ],
    [
        'title' => 'Assimilator',
        'tier' => 'B',
        'status' => 'Tracking',
        'description' => 'Unified 27 data sources into one ClickHouse spine inside a single quarter.',
    ],
];

$missions = [
    [
        'title' => 'Chronicle Sync',
        'status' => 'Running',
        'brief' => 'Re-platform legacy ingestion jobs into the streaming mesh.',
        'eta' => 'ETA: 3d 14h',
    ],
    [
        'title' => 'Echo Shield',
        'status' => 'Queued',
        'brief' => 'Design anomaly guardrails for nightly loads.',
        'eta' => 'ETA: 6d 02h',
    ],
    [
        'title' => 'Shard Uplift',
        'status' => 'Completed',
        'brief' => 'Migrated core metrics to a generational visualization stack.',
        'eta' => 'Logged: 2044-02-18',
    ],
];

$skillClusters = [
    [
        'code' => 'CORE',
        'title' => 'Core Protocols',
        'subtitle' => 'Languages compiled into muscle memory',
        'items' => ['Python', 'SQL', 'Go', 'Bash'],
    ],
    [
        'code' => 'PIPE',
        'title' => 'Pipeline Forge',
        'subtitle' => 'Movement, modeling, and orchestration',
        'items' => ['Airflow', 'dbt', 'Kafka', 'ClickHouse', 'PostgreSQL'],
    ],
    [
        'code' => 'OPS',
        'title' => 'Ops Shell',
        'subtitle' => 'Deployment and observability toolchain',
        'items' => ['Docker', 'Kubernetes', 'GitHub Actions', 'Linux', 'Prometheus', 'Sentry'],
    ],
    [
        'code' => 'API',
        'title' => 'Interface Layer',
        'subtitle' => 'Backends, services, and distributed glue',
        'items' => ['FastAPI', 'Flask', 'Redis', 'Celery', 'gRPC', 'GraphQL'],
    ],
    [
        'code' => 'VIS',
        'title' => 'Signal Viz',
        'subtitle' => 'Analytics and exploration surfaces',
        'items' => ['Metabase', 'Superset', 'Grafana', 'Plotly', 'Matplotlib', 'Jupyter'],
    ],
    [
        'code' => 'QA',
        'title' => 'Quality Core',
        'subtitle' => 'Validation and resilience suites',
        'items' => ['pytest', 'mypy', 'flake8', 'black'],
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
    <header class="hud">
        <div class="hud__channel">
            <span class="hud__label">channel</span>
            <span class="hud__value">nexus-03 // character console</span>
        </div>
        <div class="hud__status">
            <span class="hud__label">status</span>
            <span class="hud__value">online // build <?= date('Y') ?>.<?= date('m') ?></span>
        </div>
    </header>

    <main class="interface">
        <section class="panel panel--hero">
            <div class="panel__header">
                <span class="panel__title">CHARACTER SHELL</span>
                <span class="panel__status panel__status--blink">ACTIVE</span>
            </div>
            <div class="hero">
                <div class="hero__portrait">
                    <img src="https://i.pravatar.cc/420?u=artem.gromov" alt="Portrait of Artem Gromov">
                    <span class="hero__marker">AG-2044</span>
                </div>
                <div class="hero__meta">
                    <div class="hero__callout">
                        <h1 class="hero__name">Artem Gromov</h1>
                        <p class="hero__alias">Codename: Signal Forge</p>
                        <p class="hero__tagline">Data engineer. Warehouse orchestrator. Retro-future native.</p>
                    </div>
                    <dl class="hero__grid">
                        <?php foreach ($heroAttributes as $stat): ?>
                            <div class="hero__stat">
                                <dt><?= htmlspecialchars($stat['label'], ENT_QUOTES, 'UTF-8') ?>:</dt>
                                <dd><?= htmlspecialchars($stat['value'], ENT_QUOTES, 'UTF-8') ?></dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                    <dl class="hero__grid hero__grid--compact">
                        <?php foreach ($heroContacts as $stat): ?>
                            <div class="hero__stat">
                                <dt><?= htmlspecialchars($stat['label'], ENT_QUOTES, 'UTF-8') ?>:</dt>
                                <dd>
                                    <?php if (!empty($stat['is_html'])): ?>
                                        <?= $stat['value'] ?>
                                    <?php else: ?>
                                        <?= htmlspecialchars($stat['value'], ENT_QUOTES, 'UTF-8') ?>
                                    <?php endif; ?>
                                </dd>
                            </div>
                        <?php endforeach; ?>
                    </dl>
                    <div class="hero__meters">
                        <?php foreach ($heroMeters as $meter): ?>
                            <div class="meter">
                                <div class="meter__header">
                                    <span class="meter__label"><?= htmlspecialchars($meter['label'], ENT_QUOTES, 'UTF-8') ?></span>
                                    <span class="meter__hint"><?= htmlspecialchars($meter['hint'], ENT_QUOTES, 'UTF-8') ?></span>
                                </div>
                                <div class="meter__bar">
                                    <span class="meter__fill" style="width: <?= (int) $meter['value'] ?>%;"></span>
                                    <span class="meter__value"><?= (int) $meter['value'] ?>%</span>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>

        <section class="panel panel--vitals">
            <div class="panel__header">
                <span class="panel__title">HUD STREAM</span>
                <span class="panel__status panel__status--pulse">STABLE SIGNAL</span>
            </div>
            <div class="metrics metrics--vitals">
                <article class="metric metric--pulse">
                    <span class="metric__label">Bio pulse</span>
                    <div class="pulse">
                        <span class="pulse__value" data-role="pulse-value">-- bpm</span>
                        <span class="pulse__heart" aria-hidden="true">&#10084;</span>
                    </div>
                    <span class="metric__hint">Autonomous sensors calibrated</span>
                </article>
                <article class="metric">
                    <span class="metric__label">Signal lock</span>
                    <span class="metric__value" data-role="coordinates">43.2389° N, 76.8897° E</span>
                    <span class="metric__hint">Drift compensated in real time</span>
                </article>
                <article class="metric metric--temp">
                    <span class="metric__label">External temp</span>
                    <span class="metric__value" data-role="temperature">-- °C</span>
                    <span class="metric__hint" data-role="temperature-updated">Awaiting feed...</span>
                </article>
                <article class="metric">
                    <span class="metric__label">Galactic sync</span>
                    <span class="metric__value" data-role="sync">--.--.---- --:--:--</span>
                    <span class="metric__hint">Chronometer steady</span>
                </article>
            </div>
        </section>

        <section class="panel panel--vault">
            <div class="panel__header">
                <span class="panel__title">DATA VAULT</span>
                <span class="panel__status">PROPRIETARY</span>
            </div>
            <p class="panel__caption">Warehouse core engineered and maintained by Artem Gromov</p>
            <div class="metrics metrics--vault">
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

        <section class="panel panel--skills">
            <div class="panel__header">
                <span class="panel__title">SKILL TREE</span>
                <span class="panel__status panel__status--blink">VERIFIED</span>
            </div>
            <div class="modules">
                <?php foreach ($skillClusters as $cluster): ?>
                    <article class="module">
                        <div class="module__heading">
                            <span class="module__icon" aria-hidden="true" data-code="<?= htmlspecialchars($cluster['code'], ENT_QUOTES, 'UTF-8') ?>"></span>
                            <div class="module__meta">
                                <h2 class="module__title"><?= htmlspecialchars($cluster['title'], ENT_QUOTES, 'UTF-8') ?></h2>
                                <span class="module__subtitle"><?= htmlspecialchars($cluster['subtitle'], ENT_QUOTES, 'UTF-8') ?></span>
                            </div>
                        </div>
                        <ul class="module__matrix">
                            <?php foreach ($cluster['items'] as $item): ?>
                                <li class="module__matrix-item"><?= htmlspecialchars($item, ENT_QUOTES, 'UTF-8') ?></li>
                            <?php endforeach; ?>
                        </ul>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="panel panel--achievements">
            <div class="panel__header">
                <span class="panel__title">ACHIEVEMENT LOG</span>
                <span class="panel__status">ARCHIVED</span>
            </div>
            <div class="achievements">
                <?php foreach ($achievements as $achievement): ?>
                    <article class="achievement">
                        <div class="achievement__grade"><?= htmlspecialchars($achievement['tier'], ENT_QUOTES, 'UTF-8') ?></div>
                        <div class="achievement__body">
                            <h3 class="achievement__title"><?= htmlspecialchars($achievement['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                            <p class="achievement__status"><?= htmlspecialchars($achievement['status'], ENT_QUOTES, 'UTF-8') ?></p>
                            <p class="achievement__desc"><?= htmlspecialchars($achievement['description'], ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>

        <section class="panel panel--missions">
            <div class="panel__header">
                <span class="panel__title">MISSION FEED</span>
                <span class="panel__status panel__status--pulse">UPDATED</span>
            </div>
            <div class="missions">
                <?php foreach ($missions as $mission): ?>
                    <article class="mission">
                        <div class="mission__status"><?= htmlspecialchars($mission['status'], ENT_QUOTES, 'UTF-8') ?></div>
                        <div class="mission__body">
                            <h3 class="mission__title"><?= htmlspecialchars($mission['title'], ENT_QUOTES, 'UTF-8') ?></h3>
                            <p class="mission__brief"><?= htmlspecialchars($mission['brief'], ENT_QUOTES, 'UTF-8') ?></p>
                        </div>
                        <span class="mission__eta"><?= htmlspecialchars($mission['eta'], ENT_QUOTES, 'UTF-8') ?></span>
                    </article>
                <?php endforeach; ?>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="footer__channel">
            <span>channel</span>
            <span>retro-future // signal forge</span>
        </div>
        <div class="footer__copyright">© <?= date('Y') ?> Artem Gromov. Console rendered in real time.</div>
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
            const bpm = Math.floor(68 + Math.random() * 14);
            pulseEl.textContent = `${bpm} bpm`;
        }

        async function updateTemperature() {
            if (!temperatureEl || !temperatureUpdatedEl) {
                return;
            }
            try {
                temperatureUpdatedEl.textContent = 'Awaiting feed...';
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
                temperatureUpdatedEl.textContent = `Sync ${pad(timeStamp.getHours())}:${pad(timeStamp.getMinutes())}`;
            } catch (error) {
                temperatureEl.textContent = '-- °C';
                temperatureUpdatedEl.textContent = 'Signal interrupted';
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
