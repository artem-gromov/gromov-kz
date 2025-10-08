<?php
/** @var int $currentYear */
/** @var string $emailLocalPart */
/** @var string $emailDomain */
?>
<footer class="site-footer panel" role="contentinfo">
    <div class="panel-body footer-body">
        <p class="footer-copy">© <?= htmlspecialchars((string) $currentYear, ENT_QUOTES) ?> Artem Gromov</p>
        <nav aria-label="Footer quick links">
            <ul class="footer-links">
                <li>
                    <a class="footer-link footer-email"
                       data-user="<?= htmlspecialchars($emailLocalPart, ENT_QUOTES) ?>"
                       data-domain="<?= htmlspecialchars($emailDomain, ENT_QUOTES) ?>"
                       href="#"
                       rel="noopener noreferrer">
                        Email
                    </a>
                </li>
                <li>
                    <a class="footer-link" href="https://t.me/artem_gromov" target="_blank" rel="noopener noreferrer">
                        Telegram
                    </a>
                </li>
                <li>
                    <button type="button" class="footer-link footer-print" id="printCvFooter">
                        Download CV
                    </button>
                </li>
                <li>
                    <a class="footer-link" href="assets/ArtemGromov.vcf" download>
                        vCard
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</footer>
