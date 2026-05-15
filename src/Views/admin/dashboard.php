<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Navexmar Admin</title>
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
            <a href="<?php echo url('/admin'); ?>" class="nav-item active">
                <i class="fas fa-tachometer-alt"></i> Dashboard
            </a>
            <a href="<?php echo url('/admin/services'); ?>" class="nav-item">
                <i class="fas fa-briefcase"></i> Hizmetler
            </a>
            <a href="<?php echo url('/admin/messages'); ?>" class="nav-item">
                <i class="fas fa-envelope"></i> Mesajlar
                <?php if (isset($unreadCount) && $unreadCount > 0): ?>
                    <span class="badge"><?php echo $unreadCount; ?></span>
                <?php endif; ?>
            </a>
            <a href="<?php echo url('/admin/pages'); ?>" class="nav-item">
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
                <h1><i class="fas fa-tachometer-alt"></i> Dashboard</h1>
            </div>
            <div class="topbar-right">
                <span class="admin-user">
                    <i class="fas fa-user-circle"></i>
                    Admin
                </span>
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

            <!-- Stats -->
            <div class="stats-grid" style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1.5rem; margin-bottom: 2rem;">
                <div class="stat-card" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h3 style="font-size: 2.5rem; margin: 0;"><?php echo $stats['total_services'] ?? 0; ?></h3>
                            <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Toplam Hizmet</p>
                        </div>
                        <i class="fas fa-briefcase" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>

                <div class="stat-card" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%); color: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h3 style="font-size: 2.5rem; margin: 0;"><?php echo $stats['total_messages'] ?? 0; ?></h3>
                            <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Toplam Mesaj</p>
                        </div>
                        <i class="fas fa-envelope" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>

                <div class="stat-card" style="background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%); color: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h3 style="font-size: 2.5rem; margin: 0;"><?php echo $stats['unread_messages'] ?? 0; ?></h3>
                            <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Okunmamış Mesaj</p>
                        </div>
                        <i class="fas fa-envelope-open" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>

                <div class="stat-card" style="background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%); color: white; padding: 2rem; border-radius: 12px; box-shadow: 0 4px 15px rgba(0,0,0,0.1);">
                    <div style="display: flex; align-items: center; justify-content: space-between;">
                        <div>
                            <h3 style="font-size: 2.5rem; margin: 0;"><?php echo $stats['total_pages'] ?? 4; ?></h3>
                            <p style="margin: 0.5rem 0 0 0; opacity: 0.9;">Sayfa</p>
                        </div>
                        <i class="fas fa-file-alt" style="font-size: 3rem; opacity: 0.3;"></i>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-bolt"></i> Hızlı İşlemler</h2>
                </div>
                <div class="card-body">
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem;">
                        <a href="<?php echo url('/admin/services'); ?>" class="action-card" style="background: white; padding: 2rem; border-radius: 12px; text-align: center; text-decoration: none; color: var(--primary); box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                            <i class="fas fa-briefcase" style="font-size: 3rem;"></i>
                            <span style="font-weight: 600;">Hizmet Yönetimi</span>
                        </a>
                        <a href="<?php echo url('/admin/messages'); ?>" class="action-card" style="background: white; padding: 2rem; border-radius: 12px; text-align: center; text-decoration: none; color: var(--primary); box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                            <i class="fas fa-envelope" style="font-size: 3rem;"></i>
                            <span style="font-weight: 600;">Mesajları Gör</span>
                        </a>
                        <a href="<?php echo url('/admin/headers'); ?>" class="action-card" style="background: white; padding: 2rem; border-radius: 12px; text-align: center; text-decoration: none; color: var(--primary); box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                            <i class="fas fa-upload" style="font-size: 3rem;"></i>
                            <span style="font-weight: 600;">Görsel Yükle</span>
                        </a>
                        <a href="<?php echo url('/admin/pages'); ?>" class="action-card" style="background: white; padding: 2rem; border-radius: 12px; text-align: center; text-decoration: none; color: var(--primary); box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                            <i class="fas fa-edit" style="font-size: 3rem;"></i>
                            <span style="font-weight: 600;">Sayfa Düzenle</span>
                        </a>
                        <a href="<?php echo url('/admin/settings'); ?>" class="action-card" style="background: white; padding: 2rem; border-radius: 12px; text-align: center; text-decoration: none; color: var(--primary); box-shadow: 0 2px 10px rgba(0,0,0,0.08); transition: all 0.3s ease; display: flex; flex-direction: column; align-items: center; gap: 1rem;">
                            <i class="fas fa-cog" style="font-size: 3rem;"></i>
                            <span style="font-weight: 600;">Ayarları Düzenle</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Messages -->
            <?php if (isset($recentMessages) && !empty($recentMessages)): ?>
            <div class="card">
                <div class="card-header">
                    <h2><i class="fas fa-envelope"></i> Son Mesajlar</h2>
                </div>
                <div class="card-body">
                    <div style="overflow-x: auto;">
                        <table style="width: 100%; border-collapse: collapse;">
                            <thead>
                                <tr style="background: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Gönderen</th>
                                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Email</th>
                                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Mesaj</th>
                                    <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Tarih</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach (array_slice($recentMessages, 0, 5) as $message): ?>
                                <tr style="border-bottom: 1px solid #dee2e6;">
                                    <td style="padding: 1rem;"><?php echo e($message['name']); ?></td>
                                    <td style="padding: 1rem;"><?php echo e($message['email']); ?></td>
                                    <td style="padding: 1rem;"><?php echo e(substr($message['message'], 0, 50)); ?>...</td>
                                    <td style="padding: 1rem;"><?php echo date('d.m.Y H:i', strtotime($message['created_at'])); ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 1.5rem; text-align: center;">
                        <a href="<?php echo url('/admin/messages'); ?>" class="btn btn-primary">
                            <i class="fas fa-envelope"></i> Tüm Mesajları Gör
                        </a>
                    </div>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>

    <script>
        // Sidebar toggle
        document.getElementById('sidebarToggle')?.addEventListener('click', function() {
            document.querySelector('.admin-sidebar').classList.toggle('collapsed');
        });

        // Action cards hover effect
        document.querySelectorAll('.action-card').forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-5px)';
                this.style.boxShadow = '0 8px 20px rgba(0,0,0,0.15)';
            });
            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0)';
                this.style.boxShadow = '0 2px 10px rgba(0,0,0,0.08)';
            });
        });
    </script>
    <script src="<?php echo asset('js/admin.js?v=' . time()); ?>"></script>
</body>
</html>
