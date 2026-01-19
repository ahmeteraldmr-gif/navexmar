<?php require VIEWS_PATH . '/components/page-header.php'; ?>

<!-- Services Detail Section -->
<section class="services-detail">
    <div class="container">
        <?php if (isset($services) && !empty($services)): ?>
            <?php foreach ($services as $service): ?>
                <div class="service-detail-card" id="<?php echo e($service['slug']); ?>">
                    <div class="service-detail-icon">
                        <i class="<?php echo e($service['icon']); ?>"></i>
                    </div>
                    <div class="service-detail-content">
                        <h2><?php echo e($service['name_' . $lang]); ?></h2>
                        <p class="service-description"><?php echo e($service['description_' . $lang]); ?></p>
                        
                        <?php if (!empty($service['features'])): ?>
                            <div class="service-features">
                                <h3><?php echo $lang === 'tr' ? 'Özellikler' : 'Features'; ?></h3>
                                <ul>
                                    <?php 
                                    $features = $lang === 'tr' ? $service['features'] : $service['features_en'];
                                    foreach ($features as $feature): 
                                    ?>
                                        <li><i class="fas fa-check-circle"></i> <?php echo e($feature); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        
                        <a href="<?php echo url('/iletisim'); ?>" class="btn btn-primary">
                            <?php echo $lang === 'tr' ? 'Teklif Alın' : 'Get Quote'; ?>
                        </a>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p style="text-align: center; padding: 3rem 0;">
                <?php echo $lang === 'tr' ? 'Henüz hizmet bulunmamaktadır.' : 'No services available yet.'; ?>
            </p>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="cta-section">
    <div class="container">
        <h2 data-i18n="services.cta.title">Hizmetlerimiz Hakkında Detaylı Bilgi Almak İster Misiniz?</h2>
        <a href="<?php echo url('/iletisim'); ?>" class="btn btn-light" data-i18n="services.cta.button">Bize Ulaşın</a>
    </div>
</section>
