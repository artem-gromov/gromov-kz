<?php
/** @var int $age */
/** @var string $obfuscatedEmail */
/** @var string $emailLocalPart */
/** @var string $emailDomain */
?>
<header class="site-header panel" role="banner">
    <div class="panel-header">
        <h1 class="site-title">> Artem Gromov<span class="caret" aria-hidden="true"></span></h1>
    </div>
    <div class="panel-body header-body">
        <figure class="avatar-frame">
            <img src="assets/img/420.jpeg" alt="Portrait of Artem Gromov" width="210" height="210" loading="lazy">
            <figcaption class="sr-only">Temporary avatar placeholder</figcaption>
        </figure>
        <div class="identity">
            <p class="identity-title">Data Engineer · Age: <span id="liveAge"><?= htmlspecialchars((string) $age, ENT_QUOTES) ?></span></p>
            <p class="identity-subtitle">Developing and maintaining distributed data warehouses, resilient pipelines, and operational visibility for analytical decision-making.</p>
            <div class="contact-grid" aria-label="Contact actions">
                <div class="contact-item">
                    <span class="contact-label">Email</span>
                    <span class="contact-value obfuscated-email"
                          data-user="<?= htmlspecialchars($emailLocalPart, ENT_QUOTES) ?>"
                          data-domain="<?= htmlspecialchars($emailDomain, ENT_QUOTES) ?>">
                        <?= htmlspecialchars($obfuscatedEmail, ENT_QUOTES) ?>
                    </span>
                    <button type="button"
                            class="btn btn-secondary copy-email"
                            data-copy-target=".obfuscated-email"
                            aria-label="Copy email address">
                        Copy
                    </button>
                    <span class="copy-email-status sr-only" aria-live="polite"></span>
                </div>
                <div class="contact-item">
                    <span class="contact-label">Telegram</span>
                    <a class="contact-link" href="https://t.me/artem_gromov" target="_blank" rel="noopener noreferrer">
                        @artem_gromov
                    </a>
                </div>
                <div class="contact-item">
                    <span class="contact-label">Download</span>
                    <button type="button" class="btn btn-secondary" id="printCv" aria-label="Download PDF version">
                        Print / Save PDF
                    </button>
                </div>
            </div>
        </div>
        <div class="status-panel" role="status">
            <div class="status-line">
                <span class="status-label">Location</span>
                <span class="status-value">Remote · Kazakhstan/Almaty</span>
            </div>
            <div class="status-line">
                <span class="status-label">Current Focus</span>
                <span class="status-value">Data platform leadership, observability, scalability.</span>
            </div>
            <div class="status-line">
                <span class="status-label">Availability</span>
                <span class="status-value status-pill">Open to impactful collaborations</span>
            </div>
        </div>
    </div>
</header>
