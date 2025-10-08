<?php
/** @var array|null $metricsLatest */
?>
<section class="panel metrics-panel" aria-labelledby="metrics-title">
    <div class="panel-header">
        <h2 id="metrics-title" class="panel-title">> DWH Metrics Feed</h2>
        <span class="caret" aria-hidden="true"></span>
    </div>
    <div class="panel-body metrics-body">
        <div class="metrics-grid">
            <div class="metric-card">
                <span class="metric-label">Queries executed</span>
                <span class="metric-value">
                    <?= htmlspecialchars(isset($metricsLatest) ? formatNumber($metricsLatest['queries_executed'] ?? null) : 'N/A', ENT_QUOTES) ?>
                </span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Total disk usage</span>
                <span class="metric-value">
                    <?= htmlspecialchars(isset($metricsLatest) ? formatBytesToTB($metricsLatest['total_disk_usage_bytes'] ?? null) : 'N/A', ENT_QUOTES) ?>
                </span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Total uncompressed data</span>
                <span class="metric-value">
                    <?= htmlspecialchars(isset($metricsLatest) ? formatBytesToTB($metricsLatest['total_data_uncompressed_bytes'] ?? null) : 'N/A', ENT_QUOTES) ?>
                </span>
            </div>
            <div class="metric-card">
                <span class="metric-label">Total rows</span>
                <span class="metric-value">
                    <?= htmlspecialchars(isset($metricsLatest) ? formatNumber($metricsLatest['total_rows_count'] ?? null) : 'N/A', ENT_QUOTES) ?>
                </span>
            </div>
        </div>
        <div class="metric-footer">
            <span class="metric-updated">
                Updated: <?= htmlspecialchars($metricsLatest['date'] ?? 'N/A', ENT_QUOTES) ?>
            </span>
            <div class="metric-sparkline" role="presentation" aria-hidden="true">
                <span class="spark-bar spark-1"></span>
                <span class="spark-bar spark-2"></span>
                <span class="spark-bar spark-3"></span>
                <span class="spark-bar spark-4"></span>
                <span class="spark-bar spark-5"></span>
            </div>
        </div>
    </div>
</section>
