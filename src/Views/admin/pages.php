<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sayfalar - Navexmar Admin</title>
    <link rel="stylesheet" href="<?php echo asset('css/admin.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .btn {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.75rem 1.5rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .btn-sm {
            padding: 0.5rem 1rem;
            font-size: 0.875rem;
        }
        .btn-primary {
            background: linear-gradient(135deg, #1a4d7d, #2563a8);
            color: white;
        }
        .btn-secondary {
            background: #6c757d;
            color: white;
        }
        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .page-card {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 1.5rem;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            display: flex;
            justify-content: space-between;
            align-items: center;
            border-left: 4px solid #1a4d7d;
        }
        .page-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .page-info h3 {
            margin: 0 0 0.5rem 0;
            color: #1a4d7d;
            font-size: 1.5rem;
        }
        .page-info p {
            margin: 0.25rem 0;
            color: #666;
            font-size: 0.95rem;
        }
        .page-icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #1a4d7d, #2563a8);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            color: white;
        }
    </style>
</head>
<body class="admin-body">
    <!-- Sidebar -->
    <div class="admin-sidebar">
        <div class="sidebar-header">
            <h2><i class="fas fa-anchor"></i> NAVEXMAR</h2>
        </div>
        <nav class="sidebar-nav">
            <a href="<?php echo url('/admin'); ?>" class="nav-item">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="<?php echo url('/admin/services'); ?>" class="nav-item">
                <i class="fas fa-briefcase"></i> Hizmetler
            </a>
            <a href="<?php echo url('/admin/messages'); ?>" class="nav-item">
                <i class="fas fa-envelope"></i> Mesajlar
            </a>
            <a href="<?php echo url('/admin/pages'); ?>" class="nav-item active">
                <i class="fas fa-file-alt"></i> Sayfalar
            </a>
            <a href="<?php echo url('/admin/headers'); ?>" class="nav-item">
                <i class="fas fa-images"></i> Header Görselleri
            </a>
            <a href="<?php echo url('/admin/settings'); ?>" class="nav-item">
                <i class="fas fa-cog"></i> Ayarlar
            </a>
        </nav>
        <div class="sidebar-footer">
            <a href="<?php echo url('/admin/logout'); ?>" class="nav-item">
                <i class="fas fa-sign-out-alt"></i> Çıkış
            </a>
        </div>
    </div>

    <!-- Main Content -->
    <div class="admin-main">
        <!-- Top Bar -->
        <div class="admin-topbar">
            <div class="topbar-left">
                <button class="sidebar-toggle" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>
                <h1><i class="fas fa-file-alt"></i> Sayfa Yönetimi</h1>
            </div>
            <div class="topbar-right">
                <a href="<?php echo url('/admin'); ?>" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Geri
                </a>
            </div>
        </div>

        <!-- Content -->
        <div class="admin-content">
            <?php if (isset($flash)): ?>
                <div class="alert alert-<?php echo e($flash['type']); ?>">
                    <i class="fas fa-<?php echo $flash['type'] === 'success' ? 'check-circle' : 'exclamation-circle'; ?>"></i>
                    <?php echo e($flash['message']); ?>
                </div>
            <?php endif; ?>

            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-edit"></i> Tüm Sayfalar</h2>
                    <p style="margin: 0.5rem 0 0 0; color: #666; font-size: 0.9rem;">
                        Aşağıdaki sayfaların içeriklerini düzenleyebilirsiniz. Her sayfanın Türkçe ve İngilizce versiyonları bulunmaktadır.
                    </p>
                </div>
                <div class="card-body">
                    <?php if (!empty($pages)): ?>
                        <?php foreach ($pages as $page): ?>
                            <div class="page-card">
                                <div style="display: flex; align-items: center; gap: 2rem; flex: 1;">
                                    <div class="page-icon">
                                        <?php 
                                        $icons = [
                                            'home' => 'fa-home',
                                            'approach' => 'fa-lightbulb',
                                            'services' => 'fa-briefcase',
                                            'contact' => 'fa-envelope',
                                            'policies' => 'fa-file-contract'
                                        ];
                                        $icon = $icons[$page['page_key']] ?? 'fa-file-alt';
                                        ?>
                                        <i class="fas <?php echo $icon; ?>"></i>
                                    </div>
                                    <div class="page-info">
                                        <h3><?php echo e($page['title_tr']); ?></h3>
                                        <p><strong>İngilizce:</strong> <?php echo e($page['title_en']); ?></p>
                                        <p><strong>URL:</strong> /<?php echo e($page['page_key']); ?></p>
                                        <?php if (!empty($page['meta_description_tr'])): ?>
                                            <p style="font-size: 0.85rem; font-style: italic; color: #999;">
                                                <?php echo e(substr($page['meta_description_tr'], 0, 100)); ?>...
                                            </p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <div>
                                    <a href="<?php echo url('/admin/pages/edit/' . $page['page_key']); ?>" 
                                       class="btn btn-primary">
                                        <i class="fas fa-edit"></i> Düzenle
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <div style="text-align: center; padding: 3rem; color: #999;">
                            <i class="fas fa-file-alt" style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                            <p style="font-size: 1.2rem; margin: 0;">Henüz sayfa bulunmamaktadır.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Info Card -->
            <div class="card" style="margin-top: 2rem; background: linear-gradient(135deg, #e3f2fd, #ffffff); border-left: 4px solid #2196F3;">
                <div class="card-body">
                    <h3 style="color: #1976D2; margin-bottom: 1rem;">
                        <i class="fas fa-info-circle"></i> Sayfa Düzenleme Hakkında
                    </h3>
                    <div style="color: #555; line-height: 1.8;">
                        <p><strong>✓</strong> Her sayfanın <strong>Türkçe</strong> ve <strong>İngilizce</strong> içeriği ayrı ayrı düzenlenebilir.</p>
                        <p><strong>✓</strong> Sayfa başlıkları, alt başlıklar ve SEO açıklamaları güncellenebilir.</p>
                        <p><strong>✓</strong> <strong>Sayfa Bölümleri</strong> ile her sayfanın detaylı içeriğini yönetebilirsiniz.</p>
                        <p><strong>✓</strong> Değişiklikler <strong>anında</strong> sitede yayınlanır.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Page cards hover effect
        document.querySelectorAll('.page-card').forEach(card => {
            const btn = card.querySelector('.btn');
            if (btn) {
                btn.addEventListener('mouseenter', function() {
                    card.style.borderLeftColor = '#ff6b35';
                });
                btn.addEventListener('mouseleave', function() {
                    card.style.borderLeftColor = '#1a4d7d';
                });
            }
        });
    </script>
    <script src="<?php echo asset('js/admin.js?v=' . time()); ?>"></script>
</body>
</html>
