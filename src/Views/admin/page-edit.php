<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo e($page['title_tr']); ?> Düzenle - Navexmar Admin</title>
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/admin.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
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
                <h1><?php echo e($page['title_tr']); ?> - Sayfa Düzenleme</h1>
            </div>
            <div class="topbar-right">
                <a href="<?php echo url('/admin/pages'); ?>" class="btn btn-sm btn-secondary">
                    <i class="fas fa-arrow-left"></i> Geri Dön
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

            <!-- Page Edit Form -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-edit"></i> Sayfa Bilgilerini Düzenle</h2>
                </div>
                <div class="card-body">
                    <form method="POST" action="<?php echo url('/admin/pages/update'); ?>">
                        <input type="hidden" name="page_key" value="<?php echo e($page['page_key']); ?>">
                        
                        <!-- Turkish Section -->
                        <h3 style="color: var(--primary); margin-bottom: 1rem;"><i class="fas fa-flag"></i> Türkçe İçerik</h3>
                        
                        <div class="form-group">
                            <label>Sayfa Başlığı</label>
                            <input type="text" name="title_tr" value="<?php echo e($page['title_tr']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Alt Başlık</label>
                            <input type="text" name="subtitle_tr" value="<?php echo e($page['subtitle_tr'] ?? ''); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Meta Açıklama (SEO)</label>
                            <textarea name="meta_description_tr" rows="3"><?php echo e($page['meta_description_tr'] ?? ''); ?></textarea>
                        </div>
                        
                        <hr style="margin: 2rem 0; border: none; border-top: 1px solid #e0e0e0;">
                        
                        <!-- English Section -->
                        <h3 style="color: var(--primary); margin-bottom: 1rem;"><i class="fas fa-flag"></i> English Content</h3>
                        
                        <div class="form-group">
                            <label>Page Title</label>
                            <input type="text" name="title_en" value="<?php echo e($page['title_en']); ?>" required>
                        </div>
                        
                        <div class="form-group">
                            <label>Subtitle</label>
                            <input type="text" name="subtitle_en" value="<?php echo e($page['subtitle_en'] ?? ''); ?>">
                        </div>
                        
                        <div class="form-group">
                            <label>Meta Description (SEO)</label>
                            <textarea name="meta_description_en" rows="3"><?php echo e($page['meta_description_en'] ?? ''); ?></textarea>
                        </div>
                        
                        <div style="margin-top: 2rem;">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save"></i> Değişiklikleri Kaydet
                            </button>
                            <a href="<?php echo url('/admin/pages'); ?>" class="btn btn-secondary">
                                <i class="fas fa-times"></i> İptal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.admin-sidebar').classList.toggle('collapsed');
        });
    </script>
</body>
</html>
