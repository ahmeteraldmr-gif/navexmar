<?php
// Hero için header görseli
$heroImageUrl = 'https://navexmar.com/public/uploads/headers/header_home_69788db2347d7.jpeg';
if (isset($headerImage) && !empty($headerImage['image_path'])) {
    $heroImageUrl = upload($headerImage['image_path']);
}
$heroStyle = "background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('$heroImageUrl') !important; background-size: cover !important; background-position: center !important; background-repeat: no-repeat !important;";

// Helper function
if (!function_exists('getContent')) {
    function getContent($sections, $key, $lang, $field = 'title') {
        if (!isset($sections) || !is_array($sections)) return '';
        foreach ($sections as $section) {
            if ($section['section_key'] === $key) {
                return $section[$field . '_' . $lang] ?? '';
            }
        }
        return '';
    }
}
?>

<!-- Hero Section -->
<section class="hero" style="<?php echo $heroStyle; ?>">
    <div class="hero-content">
        <div class="container">
            <h1 class="hero-title">
                <?php echo htmlspecialchars(getContent($sections, 'hero_title', $lang) ?: getContent($sections, 'hero_subtitle', $lang), ENT_QUOTES, 'UTF-8'); ?>
            </h1>
            <a href="<?php echo url('/yaklasimimiz'); ?>" class="btn btn-primary">
                <?php echo htmlspecialchars(getContent($sections, 'hero_button', $lang), ENT_QUOTES, 'UTF-8'); ?>
            </a>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats">
    <div class="container">
        <div class="stats-grid">
            <div class="stat-item">
                <i class="fas fa-ship"></i>
                <h3 class="stat-number" data-target="<?php echo htmlspecialchars(getContent($sections, 'stat_1_number', $lang), ENT_QUOTES, 'UTF-8'); ?>">0</h3>
                <p><?php echo htmlspecialchars(getContent($sections, 'stat_1_label', $lang), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="stat-item">
                <i class="fas fa-wrench"></i>
                <h3 class="stat-number" data-target="<?php echo htmlspecialchars(getContent($sections, 'stat_2_number', $lang), ENT_QUOTES, 'UTF-8'); ?>">0</h3>
                <p><?php echo htmlspecialchars(getContent($sections, 'stat_2_label', $lang), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="stat-item">
                <i class="fas fa-cogs"></i>
                <h3 class="stat-number" data-target="<?php echo htmlspecialchars(getContent($sections, 'stat_3_number', $lang), ENT_QUOTES, 'UTF-8'); ?>">0</h3>
                <p><?php echo htmlspecialchars(getContent($sections, 'stat_3_label', $lang), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2>
            <?php echo htmlspecialchars(getContent($sections, 'cta_title', $lang), ENT_QUOTES, 'UTF-8'); ?>
        </h2>
        <a href="<?php echo url('/iletisim'); ?>" class="btn btn-light">
            <?php echo htmlspecialchars(getContent($sections, 'cta_button', $lang), ENT_QUOTES, 'UTF-8'); ?>
        </a>
    </div>
</section>

<!-- FLOKI Section -->
<section class="floki-section">
    <div class="container">
        <div class="floki-grid">
            <div class="floki-item">
                <h3>N</h3>
                <p><?php echo htmlspecialchars(getContent($sections, 'floki_n', $lang), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="floki-item">
                <h3>A</h3>
                <p><?php echo htmlspecialchars(getContent($sections, 'floki_a', $lang), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="floki-item">
                <h3>V</h3>
                <p><?php echo htmlspecialchars(getContent($sections, 'floki_v', $lang), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="floki-item">
                <h3>E</h3>
                <p><?php echo htmlspecialchars(getContent($sections, 'floki_e', $lang), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
            <div class="floki-item">
                <h3>X</h3>
                <p><?php echo htmlspecialchars(getContent($sections, 'floki_x', $lang), ENT_QUOTES, 'UTF-8'); ?></p>
            </div>
        </div>
    </div>
</section>

<!-- Services Section -->
<section class="services-section">
    <div class="container">
        <h2 class="section-title"><?php echo htmlspecialchars(getContent($sections, 'services_title', $lang) ?: ($lang === 'tr' ? 'Hizmetlerimiz' : 'Our Services'), ENT_QUOTES, 'UTF-8'); ?></h2>
        <div class="services-grid">
            <?php if (isset($services) && !empty($services)): ?>
                <?php foreach ($services as $service): ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="<?php echo e($service['icon'] ?? 'fas fa-ship'); ?>"></i>
                        </div>
                        <h3><?php echo e($service['name_' . $lang] ?? $service['name'] ?? ''); ?></h3>
                        <p><?php echo e($service['description_' . $lang] ?? $service['description'] ?? ''); ?></p>
                        <a href="<?php echo url('/hizmet/' . e($service['slug'] ?? '')); ?>" class="btn btn-secondary">
                            <?php echo htmlspecialchars(getContent($sections, 'service_detail_button', $lang) ?: ($lang === 'tr' ? 'Detaylar' : 'Details'), ENT_QUOTES, 'UTF-8'); ?>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- About Section -->
<section class="about-section">
    <div class="container">
        <div class="about-content">
            <p>
                <?php echo htmlspecialchars(getContent($sections, 'about_description', $lang, 'content'), ENT_QUOTES, 'UTF-8'); ?>
            </p>
        </div>
    </div>
</section>
