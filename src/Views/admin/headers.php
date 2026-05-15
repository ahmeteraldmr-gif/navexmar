<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header Görselleri - Navexmar Admin</title>
    <link rel="stylesheet" href="<?php echo asset('css/style.css'); ?>">
    <link rel="stylesheet" href="<?php echo asset('css/admin.css'); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .header-images-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 1.5rem;
        }
        .header-image-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .header-image-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.15);
        }
        .header-image-preview {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }
        .header-image-info {
            padding: 1rem;
        }
        .header-image-actions {
            display: flex;
            gap: 0.5rem;
            margin-top: 0.75rem;
        }
        .page-section {
            margin-bottom: 3rem;
        }
        .upload-area {
            border: 2px dashed #ccc;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            background: #f9f9f9;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .upload-area:hover {
            border-color: var(--primary);
            background: #f0f8ff;
        }
        .upload-area i {
            font-size: 3rem;
            color: var(--primary);
            margin-bottom: 1rem;
        }
        select:focus {
            border-color: #6c5ce7 !important;
            box-shadow: 0 0 0 3px rgba(108, 92, 231, 0.1);
            outline: none;
        }
        .upload-area:hover {
            border-color: #6c5ce7;
            background: #f0f8ff;
            transform: scale(1.02);
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
            <a href="<?php echo url('/admin/pages'); ?>" class="nav-item">
                <i class="fas fa-file-alt"></i> Sayfalar
            </a>
            <a href="<?php echo url('/admin/headers'); ?>" class="nav-item active">
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
                <h1>Header Görselleri Yönetimi</h1>
            </div>
            <div class="topbar-right">
                <a href="<?php echo url('/'); ?>" target="_blank" class="btn btn-sm btn-primary">
                    <i class="fas fa-external-link-alt"></i> Siteyi Görüntüle
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

            <!-- Upload Section -->
            <div class="card" style="margin-bottom: 2rem;">
                <div class="card-header" style="background: linear-gradient(135deg, #6c5ce7, #a29bfe); color: white;">
                    <h2><i class="fas fa-upload"></i> Yeni Header Görseli Ekle</h2>
                </div>
                <div class="card-body" style="padding: 2rem;">
                    <form id="uploadForm" enctype="multipart/form-data" style="display: grid; grid-template-columns: 1fr 1fr; gap: 2rem;">
                        <div class="upload-left">
                            <div class="form-group" style="margin-bottom: 1.5rem;">
                                <label style="display: block; margin-bottom: 0.8rem; font-weight: 600; color: #2d3436;">
                                    <i class="fas fa-layer-group"></i> Hedef Sayfayı Seçin
                                </label>
                                <select name="page_key" id="pageKey" required style="width: 100%; padding: 12px; border: 2px solid #dfe6e9; border-radius: 8px; font-size: 1rem; cursor: pointer; transition: border-color 0.3s;">
                                    <option value="" disabled selected>Hangi sayfa için yüklemek istiyorsunuz?</option>
                                    <?php if (!empty($pages)): ?>
                                        <?php foreach ($pages as $page): ?>
                                            <option value="<?php echo e($page['page_key']); ?>">
                                                📍 <?php echo e($page['title_tr']); ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                                <small style="display: block; margin-top: 5px; color: #636e72;">Bu görsel seçtiğiniz sayfanın üst kısmında (Header) görünecektir.</small>
                            </div>

                            <div class="upload-area" id="uploadArea" style="height: 200px; display: flex; flex-direction: column; align-items: center; justify-content: center; border: 3px dashed #6c5ce7; background: #f8f9ff; border-radius: 15px; transition: all 0.3s; position: relative; overflow: hidden;">
                                <div id="uploadPlaceholder">
                                    <i class="fas fa-cloud-upload-alt" style="font-size: 3.5rem; color: #6c5ce7; margin-bottom: 1rem;"></i>
                                    <p style="font-weight: 500; color: #2d3436;">Dosya Seçin veya Sürükleyin</p>
                                    <span style="font-size: 0.8rem; color: #636e72;">JPG, PNG veya WEBP (Maks 10MB)</span>
                                </div>
                                <img id="imagePreview" src="#" alt="Önizleme" style="display: none; width: 100%; height: 100%; object-fit: cover; position: absolute; top: 0; left: 0; z-index: 1;">
                                <div id="previewOverlay" style="display: none; position: absolute; bottom: 0; width: 100%; background: rgba(0,0,0,0.6); color: white; padding: 5px; text-align: center; font-size: 0.8rem; z-index: 2;">Değiştirmek için tıklayın</div>
                                <input type="file" name="image" id="imageInput" accept="image/*" style="display: none;" required>
                            </div>
                        </div>

                        <div class="upload-right" style="display: flex; flex-direction: column; justify-content: center; align-items: center; border-left: 1px solid #dfe6e9; padding-left: 2rem;">
                            <div style="text-align: center;">
                                <i class="fas fa-info-circle" style="font-size: 2rem; color: #00b894; margin-bottom: 1rem;"></i>
                                <h3 style="margin-bottom: 0.5rem;">İpucu</h3>
                                <p style="color: #636e72; font-size: 0.9rem; line-height: 1.6;">
                                    Görselin en iyi şekilde görünmesi için geniş açılı (yatay) fotoğraflar tercih edin. 
                                    Yükleme yaptıktan sonra sayfayı yenilemenize gerek kalmadan liste güncellenecektir.
                                </p>
                            </div>
                            <button type="submit" class="btn btn-primary" style="margin-top: 2rem; width: 100%; padding: 15px; font-size: 1.1rem; border-radius: 10px; box-shadow: 0 4px 15px rgba(108, 92, 231, 0.3);">
                                <i class="fas fa-check-circle"></i> GÖRSELİ ŞİMDİ YÜKLE
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Images by Page -->
            <?php if (!empty($pages)): ?>
                <?php foreach ($pages as $page): ?>
                    <div class="page-section">
                        <div class="card">
                            <div class="card-header">
                                <h2><i class="fas fa-images"></i> <?php echo e($page['title_tr']); ?> - Header Görselleri</h2>
                            </div>
                            <div class="card-body">
                                <?php 
                                $pageKey = $page['page_key'];
                                $pageImages = $imagesByPage[$pageKey] ?? [];
                                ?>
                                <?php if (!empty($pageImages)): ?>
                                    <div class="header-images-grid">
                                        <?php foreach ($pageImages as $image): ?>
                                            <div class="header-image-card">
                                                <img src="<?php echo upload($image['image_path']); ?>" alt="Header" class="header-image-preview">
                                                <div class="header-image-info">
                                                    <p style="font-size: 0.9rem; color: #666; margin-bottom: 0.5rem;">
                                                        <?php echo e($image['image_name']); ?>
                                                    </p>
                                                    <p style="font-size: 0.85rem; color: #999;">
                                                        <?php echo date('d.m.Y', strtotime($image['created_at'])); ?>
                                                    </p>
                                                    <div class="header-image-actions">
                                                        <button class="btn btn-sm <?php echo $image['is_active'] ? 'btn-secondary' : 'btn-primary'; ?> toggle-active" 
                                                                data-id="<?php echo $image['id']; ?>">
                                                            <i class="fas fa-<?php echo $image['is_active'] ? 'eye-slash' : 'eye'; ?>"></i>
                                                            <?php echo $image['is_active'] ? 'Pasif' : 'Aktif'; ?>
                                                        </button>
                                                        <button class="btn btn-sm btn-danger delete-image" data-id="<?php echo $image['id']; ?>">
                                                            <i class="fas fa-trash"></i> Sil
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php else: ?>
                                    <div class="text-center text-muted">
                                        <p>Bu sayfa için henüz görsel yüklenmemiş.</p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <script src="<?php echo asset('js/admin.js?v=' . time()); ?>"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Admin Headers JS Loaded');

            // Sidebar toggle
            document.getElementById('sidebarToggle')?.addEventListener('click', function() {
                document.querySelector('.admin-sidebar').classList.toggle('collapsed');
            });

            // Upload area click
            document.addEventListener('click', function(e) {
                if (e.target.closest('#uploadArea')) {
                    document.getElementById('imageInput').click();
                }
            });

            // Image Preview Logic
            const imageInput = document.getElementById('imageInput');
            const imagePreview = document.getElementById('imagePreview');
            const uploadPlaceholder = document.getElementById('uploadPlaceholder');
            const previewOverlay = document.getElementById('previewOverlay');

            if (imageInput) {
                imageInput.addEventListener('change', function() {
                    if (this.files && this.files[0]) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            uploadPlaceholder.style.display = 'none';
                            previewOverlay.style.display = 'block';
                        }
                        reader.readAsDataURL(this.files[0]);
                    }
                });
            }

            // Upload form
            const uploadForm = document.getElementById('uploadForm');
            if (uploadForm) {
                uploadForm.addEventListener('submit', function(e) {
                    e.preventDefault();
                    console.log('Uploading image...');
                    const formData = new FormData(this);
                    
                    fetch('<?php echo url('/admin/headers/upload'); ?>', {
                        method: 'POST',
                        body: formData
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Upload response:', data);
                        if (data.success) {
                            alert(data.message);
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => {
                        console.error('Upload error:', error);
                        alert('Yükleme sırasında teknik bir hata oluştu.');
                    });
                });
            }

            // Event Delegation for Delete and Toggle
            document.addEventListener('click', function(e) {
                // Toggle active
                const toggleBtn = e.target.closest('.toggle-active');
                if (toggleBtn) {
                    const id = toggleBtn.dataset.id;
                    console.log('Toggling active for ID:', id);
                    fetch(`<?php echo url('/admin/headers/toggle/'); ?>${id}`, {
                        method: 'POST'
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Toggle response:', data);
                        if (data.success) {
                            location.reload();
                        } else {
                            alert(data.message || 'Bir hata oluştu.');
                        }
                    })
                    .catch(error => {
                        console.error('Toggle error:', error);
                        alert('İşlem sırasında teknik bir hata oluştu.');
                    });
                    return;
                }

                // Delete image
                const deleteBtn = e.target.closest('.delete-image');
                if (deleteBtn) {
                    const id = deleteBtn.dataset.id;
                    console.log('Attempting to delete image ID:', id);
                    
                    // Native confirm sometimes fails in some environments
                    // We will proceed with deletion directly for now to ensure it works
                    console.log('Deletion proceeding for ID:', id);
                    fetch(`<?php echo url('/admin/headers/delete/'); ?>${id}`, {
                        method: 'POST'
                    })
                    .then(response => response.json())
                    .then(data => {
                        console.log('Delete response:', data);
                        if (data.success) {
                            location.reload();
                        } else {
                            alert(data.message || 'Görsel silinemedi.');
                        }
                    })
                    .catch(error => {
                        console.error('Delete error:', error);
                        alert('Silme işlemi sırasında teknik bir hata oluştu.');
                    });
                }
            });
        });
    </script>
</body>
</html>
