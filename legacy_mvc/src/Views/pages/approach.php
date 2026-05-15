<?php require VIEWS_PATH . '/components/page-header.php'; ?>

<?php
// Helper function
function getApproachContent($sections, $key, $lang, $field = 'title') {
    if (!isset($sections) || !is_array($sections)) return '';
    foreach ($sections as $section) {
        if ($section['section_key'] === $key) {
            return $section[$field . '_' . $lang] ?? '';
        }
    }
    return '';
}
?>

<!-- Approach Content -->
<section class="approach-content">
    <div class="container">
        <div class="approach-intro">
            <h2><?php echo htmlspecialchars(getApproachContent($sections, 'approach_intro', $lang), ENT_QUOTES, 'UTF-8'); ?></h2>
            <p><?php echo htmlspecialchars(getApproachContent($sections, 'approach_intro', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?></p>
        </div>

        <div class="approach-grid">
            <div class="approach-card">
                <i class="fas fa-users"></i>
                <h3><?php echo htmlspecialchars(getApproachContent($sections, 'card_1_title', $lang), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(getApproachContent($sections, 'card_1_title', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-handshake"></i>
                <h3><?php echo htmlspecialchars(getApproachContent($sections, 'card_2_title', $lang), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(getApproachContent($sections, 'card_2_title', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-cogs"></i>
                <h3><?php echo htmlspecialchars(getApproachContent($sections, 'card_3_title', $lang), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(getApproachContent($sections, 'card_3_title', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-lightbulb"></i>
                <h3><?php echo htmlspecialchars(getApproachContent($sections, 'card_4_title', $lang), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(getApproachContent($sections, 'card_4_title', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-award"></i>
                <h3><?php echo htmlspecialchars(getApproachContent($sections, 'card_5_title', $lang), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(getApproachContent($sections, 'card_5_title', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>

            <div class="approach-card">
                <i class="fas fa-globe"></i>
                <h3><?php echo htmlspecialchars(getApproachContent($sections, 'card_6_title', $lang), ENT_QUOTES, 'UTF-8'); ?></h3>
                <p><?php echo htmlspecialchars(getApproachContent($sections, 'card_6_title', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Mission Vision Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <h2 style="color: white; text-align: center; margin-bottom: 3rem; font-size: 2rem;">
                <?php echo htmlspecialchars(getApproachContent($sections, 'mission_vision_title', $lang), ENT_QUOTES, 'UTF-8'); ?>
            </h2>
            
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 4rem; max-width: 1200px; margin: 0 auto;">
                <!-- Misyon -->
                <div style="text-align: center;">
                    <div style="font-size: 5rem; color: white; margin-bottom: 1.5rem;">
                        <i class="fas fa-bullseye"></i>
                    </div>
                    <h3 style="color: white; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">
                        <?php echo htmlspecialchars(getApproachContent($sections, 'approach_mission', $lang), ENT_QUOTES, 'UTF-8'); ?>
                    </h3>
                    <p style="color: white; line-height: 1.8; font-size: 1rem;">
                        <?php echo htmlspecialchars(getApproachContent($sections, 'approach_mission', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                </div>
                
                <!-- Vizyon -->
                <div style="text-align: center;">
                    <div style="font-size: 5rem; color: white; margin-bottom: 1.5rem;">
                        <i class="fas fa-eye"></i>
                    </div>
                    <h3 style="color: white; font-size: 1.5rem; margin-bottom: 1.5rem; font-weight: 600;">
                        <?php echo htmlspecialchars(getApproachContent($sections, 'approach_vision', $lang), ENT_QUOTES, 'UTF-8'); ?>
                    </h3>
                    <p style="color: white; line-height: 1.8; font-size: 1rem;">
                        <?php echo htmlspecialchars(getApproachContent($sections, 'approach_vision', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2><?php echo htmlspecialchars(getApproachContent($sections, 'cta_title', $lang) ?: ($lang === 'tr' ? 'Bizimle Çalışmak İster Misiniz?' : 'Would You Like to Work With Us?'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <a href="<?php echo url('/iletisim'); ?>" class="btn btn-light">
            <?php echo htmlspecialchars(getApproachContent($sections, 'cta_button', $lang) ?: ($lang === 'tr' ? 'İletişime Geçin' : 'Get in Touch'), ENT_QUOTES, 'UTF-8'); ?>
        </a>
    </div>
</section>
