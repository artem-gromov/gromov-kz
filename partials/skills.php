<?php
/** @var array<int, array{title:string, icon:string, items:array<int, string>}> $skillsGroups */
?>
<section class="panel skills-panel" aria-labelledby="skills-title">
    <div class="panel-header">
        <h2 id="skills-title" class="panel-title">> Core Systems Map</h2>
        <span class="caret" aria-hidden="true"></span>
    </div>
    <div class="panel-body skills-grid">
        <?php foreach ($skillsGroups as $group): ?>
            <article class="skill-card">
                <header class="skill-card-header">
                    <span class="skill-icon" aria-hidden="true"><?= htmlspecialchars($group['icon'], ENT_QUOTES) ?></span>
                    <h3><?= htmlspecialchars($group['title'], ENT_QUOTES) ?></h3>
                </header>
                <ul class="skill-chip-grid">
                    <?php foreach ($group['items'] as $item): ?>
                        <li class="skill-chip"><?= htmlspecialchars($item, ENT_QUOTES) ?></li>
                    <?php endforeach; ?>
                </ul>
            </article>
        <?php endforeach; ?>
    </div>
</section>
