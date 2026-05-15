<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mesajlar - Navexmar Admin</title>
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
        .btn-success {
            background: #28a745;
            color: white;
        }
        .btn-danger {
            background: #dc3545;
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
            <a href="<?php echo url('/admin/messages'); ?>" class="nav-item active">
                <i class="fas fa-envelope"></i> Mesajlar
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
                <h1><i class="fas fa-envelope"></i> Mesajlar</h1>
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
                    <h2><i class="fas fa-inbox"></i> Gelen Mesajlar</h2>
                    <p style="margin: 0.5rem 0 0 0; color: #666; font-size: 0.9rem;">
                        Toplam: <?php echo count($messages); ?> mesaj
                    </p>
                </div>
                <div class="card-body">
                    <?php if (!empty($messages)): ?>
                        <div style="overflow-x: auto;">
                            <table style="width: 100%; border-collapse: collapse;">
                                <thead>
                                    <tr style="background: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Durum</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Gönderen</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Email & Telefon</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Firma</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Hizmet</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Mesaj</th>
                                        <th style="padding: 1rem; text-align: left; font-weight: 600; color: var(--primary);">Tarih</th>
                                        <th style="padding: 1rem; text-align: center; font-weight: 600; color: var(--primary);">İşlemler</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($messages as $message): ?>
                                    <tr style="border-bottom: 1px solid #dee2e6; <?php echo $message['is_read'] == 0 ? 'background: #fff9e6;' : ''; ?>">
                                        <td style="padding: 1rem;">
                                            <?php if ($message['is_read'] == 0): ?>
                                                <span style="background: #ffc107; color: #333; padding: 0.3rem 0.75rem; border-radius: 12px; font-size: 0.75rem; font-weight: 600;">
                                                    <i class="fas fa-star"></i> YENİ
                                                </span>
                                            <?php else: ?>
                                                <span style="background: #28a745; color: white; padding: 0.3rem 0.75rem; border-radius: 12px; font-size: 0.75rem; font-weight: 600;">
                                                    <i class="fas fa-check"></i> Okundu
                                                </span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="padding: 1rem; font-weight: 600; color: var(--primary);">
                                            <?php echo e($message['name']); ?>
                                        </td>
                                        <td style="padding: 1rem;">
                                            <div style="font-size: 0.9rem; color: #555;">
                                                <div><i class="fas fa-envelope"></i> <?php echo e($message['email']); ?></div>
                                                <div style="margin-top: 0.25rem;"><i class="fas fa-phone"></i> <?php echo e($message['phone'] ?? '-'); ?></div>
                                            </div>
                                        </td>
                                        <td style="padding: 1rem;"><?php echo e($message['company'] ?? '-'); ?></td>
                                        <td style="padding: 1rem;">
                                            <?php if (!empty($message['service'])): ?>
                                                <span style="background: #e7f3ff; color: #0066cc; padding: 0.3rem 0.75rem; border-radius: 12px; font-size: 0.85rem;">
                                                    <?php echo e($message['service']); ?>
                                                </span>
                                            <?php else: ?>
                                                <span style="color: #999;">-</span>
                                            <?php endif; ?>
                                        </td>
                                        <td style="padding: 1rem; max-width: 300px;">
                                            <div style="overflow: hidden; text-overflow: ellipsis; white-space: nowrap; cursor: pointer;" 
                                                 onclick="this.style.whiteSpace = this.style.whiteSpace === 'nowrap' ? 'normal' : 'nowrap';"
                                                 title="<?php echo e($message['message']); ?>">
                                                <?php echo e(strlen($message['message']) > 100 ? substr($message['message'], 0, 100) . '...' : $message['message']); ?>
                                            </div>
                                        </td>
                                        <td style="padding: 1rem; white-space: nowrap; font-size: 0.9rem; color: #666;">
                                            <?php echo date('d.m.Y', strtotime($message['created_at'])); ?><br>
                                            <?php echo date('H:i', strtotime($message['created_at'])); ?>
                                        </td>
                                        <td style="padding: 1rem; text-align: center;">
                                            <div style="display: flex; gap: 0.5rem; justify-content: center;">
                                                <?php if ($message['is_read'] == 0): ?>
                                                <button onclick="markAsRead(<?php echo $message['id']; ?>)" 
                                                        class="btn btn-sm btn-success" 
                                                        style="padding: 0.5rem 1rem; font-size: 0.85rem;"
                                                        title="Okundu İşaretle">
                                                    <i class="fas fa-check"></i>
                                                </button>
                                                <?php endif; ?>
                                                <button onclick="deleteMessage(<?php echo $message['id']; ?>)" 
                                                        class="btn btn-sm btn-danger" 
                                                        style="padding: 0.5rem 1rem; font-size: 0.85rem;"
                                                        title="Sil">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </div>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    <?php else: ?>
                        <div style="text-align: center; padding: 3rem; color: #999;">
                            <i class="fas fa-inbox" style="font-size: 4rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                            <p style="font-size: 1.2rem; margin: 0;">Henüz mesaj bulunmamaktadır.</p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Mark message as read
        function markAsRead(messageId) {
            if (!confirm('Bu mesajı okundu olarak işaretlemek istediğinize emin misiniz?')) {
                return;
            }

            fetch('<?php echo url('/admin/messages/read/'); ?>' + messageId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Hata: ' + (data.message || 'İşlem başarısız oldu.'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Bir hata oluştu.');
            });
        }

        // Delete message
        function deleteMessage(messageId) {
            if (!confirm('Bu mesajı silmek istediğinize emin misiniz? Bu işlem geri alınamaz!')) {
                return;
            }

            fetch('<?php echo url('/admin/messages/delete/'); ?>' + messageId, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    location.reload();
                } else {
                    alert('Hata: ' + (data.message || 'İşlem başarısız oldu.'));
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Bir hata oluştu.');
            });
        }
    </script>
    <script src="<?php echo asset('js/admin.js?v=' . time()); ?>"></script>
</body>
</html>
