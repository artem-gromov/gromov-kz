<?php
declare(strict_types=1);

$timezone = new DateTimeZone('Asia/Almaty');
$birthDate = new DateTimeImmutable('1988-05-01', $timezone);
$today = new DateTimeImmutable('now', $timezone);
$age = $today->diff($birthDate)->y;
$currentYear = (int) $today->format('Y');

$emailLocalPart = 'artem';
$emailDomain = 'gromov.kz';
$obfuscatedEmail = sprintf('%s [at] %s', $emailLocalPart, $emailDomain);

$skillsGroups = [
    [
        'title' => 'Data Engineering & Distributed Systems',
        'icon' => '🛰',
        'items' => [
            'ClickHouse',
            'dbt',
            'Apache Kafka',
            'PostgreSQL',
            'MySQL',
            'MS SQL Server',
            'Redis',
            'ZooKeeper',
            'Airflow',
            'Prefect',
            'Distributed storage design',
            'Big Data processing',
            'ETL/ELT pipelines',
            'Data sensitivity classification',
            'Role-based access control',
        ],
    ],
    [
        'title' => 'Programming & Automation',
        'icon' => '⌨️',
        'items' => [
            'Python',
            'Go (Golang)',
            'Bash scripting',
            'YAML-based configuration',
            'Markdown/Confluence automation',
            'API integrations (GitLab, Confluence, GitHub)',
        ],
    ],
    [
        'title' => 'DevOps & Infrastructure',
        'icon' => '🛠',
        'items' => [
            'Docker',
            'Kubernetes',
            'Kaniko',
            'GitLab CI/CD',
            'GitHub Actions',
            'Harbor',
            'Teleport',
            'Linux (SSH, networking, automation)',
            'Prometheus monitoring',
        ],
    ],
    [
        'title' => 'Analytics & Visualization',
        'icon' => '🖥',
        'items' => [
            'Power BI',
            'Data documentation generation',
            'Automated report generation (PDF, Wiki)',
        ],
    ],
    [
        'title' => 'System & Hardware',
        'icon' => '🔧',
        'items' => [
            'Computer hardware',
            'Networking',
            'Servers',
            'Infrastructure optimization',
            'Budgeting & procurement',
            'Capacity planning for distributed systems',
        ],
    ],
    [
        'title' => 'Leadership & Management',
        'icon' => '🧭',
        'items' => [
            'Team leadership',
            'Mentoring',
            'Project planning (Jira, Atlassian)',
            'Architecture design',
            'Cross-functional coordination',
            'Stakeholder communication',
            'Conflict resolution',
        ],
    ],
];

$optionalSections = [
    'About' => 'Coming soon — a concise narrative connecting mission and impact.',
    'Experience' => 'Coming soon — detailed timeline of pivotal projects.',
    'Selected Projects' => 'Coming soon — curated highlights of complex builds.',
    'Certifications' => 'Coming soon — professional credentials and trainings.',
    'Talks' => 'Coming soon — conference and meetup appearances.',
    'Publications' => 'Coming soon — articles and long-form writing samples.',
];

$metricsLatest = loadLatestMetrics(__DIR__ . '/data/metrics.json');

/**
 * @return array{date:string, queries_executed:int|float|null, total_disk_usage_bytes:int|float|null, total_data_uncompressed_bytes:int|float|null, total_rows_count:int|float|null}|null
 */
function loadLatestMetrics(string $path): ?array
{
    $fallback = [
        [
            'date' => '2025-10-08',
            'queries_executed' => 7828901721,
            'total_disk_usage_bytes' => 25337180487461,
            'total_data_uncompressed_bytes' => 86533439724831,
            'total_rows_count' => 586636725304,
        ],
    ];

    $records = $fallback;

    if (is_readable($path)) {
        $contents = file_get_contents($path);
        if ($contents !== false) {
            $decoded = json_decode($contents, true);
            if (is_array($decoded) && $decoded !== []) {
                $records = $decoded;
            }
        }
    }

    $latest = $records[0] ?? null;

    if (!is_array($latest)) {
        return null;
    }

    return [
        'date' => (string) ($latest['date'] ?? 'N/A'),
        'queries_executed' => isset($latest['queries_executed']) ? (float) $latest['queries_executed'] : null,
        'total_disk_usage_bytes' => isset($latest['total_disk_usage_bytes']) ? (float) $latest['total_disk_usage_bytes'] : null,
        'total_data_uncompressed_bytes' => isset($latest['total_data_uncompressed_bytes']) ? (float) $latest['total_data_uncompressed_bytes'] : null,
        'total_rows_count' => isset($latest['total_rows_count']) ? (float) $latest['total_rows_count'] : null,
    ];
}

function formatNumber(?float $value): string
{
    if ($value === null) {
        return 'N/A';
    }

    return number_format($value, 0, '.', ',');
}

function formatBytesToTB(?float $bytes): string
{
    if ($bytes === null) {
        return 'N/A';
    }

    $tb = $bytes / 1_000_000_000_000;

    return number_format($tb, 2, '.', ',') . ' TB';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Artem Gromov — Data Engineer</title>
    <meta name="description" content="Retro-futuristic CV of Artem Gromov, Data Engineer focused on distributed systems, analytics, and infrastructure.">
    <meta name="author" content="Artem Gromov">

    <meta property="og:type" content="profile">
    <meta property="og:title" content="Artem Gromov — Data Engineer">
    <meta property="og:description" content="Retro-futuristic CV for Artem Gromov. Data engineering, distributed systems, analytics leadership.">
    <meta property="og:image" content="assets/img/420.jpeg">
    <meta property="og:url" content="https://gromov.kz/">

    <meta name="twitter:card" content="summary">
    <meta name="twitter:title" content="Artem Gromov — Data Engineer">
    <meta name="twitter:description" content="Retro-futuristic CV for Artem Gromov. Data engineering, distributed systems, analytics leadership.">
    <meta name="twitter:image" content="assets/img/420.jpeg">

    <link rel="icon" type="image/png" href="assets/img/favicon.png">

    <link rel="stylesheet" href="assets/css/style.css">
    <script defer src="assets/js/app.js"></script>

    <script type="application/ld+json">
    {
        "@context": "https://schema.org",
        "@type": "Person",
        "name": "Artem Gromov",
        "jobTitle": "Data Engineer",
        "email": "mailto:<?= htmlspecialchars($emailLocalPart, ENT_QUOTES) ?>@<?= htmlspecialchars($emailDomain, ENT_QUOTES) ?>",
        "sameAs": [
            "https://t.me/artem_gromov"
        ],
        "knowsAbout": [
            "Data engineering",
            "Distributed systems",
            "ETL pipelines",
            "Analytics automation",
            "DevOps",
            "Infrastructure optimization"
        ]
    }
    </script>
</head>
<body class="crt-ready">
<a class="skip-link" href="#main">Skip to content</a>
<div id="viewport" class="viewport">
    <div class="noise-overlay" aria-hidden="true"></div>
    <div class="scanline-overlay" aria-hidden="true"></div>
    <?php include __DIR__ . '/partials/header.php'; ?>
    <main id="main" class="main-content" role="main">
        <?php include __DIR__ . '/partials/skills.php'; ?>
        <?php include __DIR__ . '/partials/metrics.php'; ?>
    </main>
    <?php include __DIR__ . '/partials/footer.php'; ?>
</div>
</body>
</html>
