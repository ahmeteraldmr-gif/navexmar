<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Düzenle</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Arial, sans-serif;
            background: #f8f9fa;
            padding: 15px;
        }
        .top {
            background: #6c5ce7;
            color: white;
            padding: 12px 18px;
            border-radius: 8px;
            margin-bottom: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .top h1 { font-size: 1.3rem; font-weight: 600; }
        .back { 
            background: white; 
            color: #6c5ce7; 
            padding: 6px 18px; 
            border-radius: 5px; 
            text-decoration: none; 
            font-weight: 600;
        }
        .box {
            background: white;
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 6px;
            border-left: 3px solid #6c5ce7;
        }
        .title {
            font-weight: 600;
            margin-bottom: 8px;
            color: #2d3436;
            font-size: 0.95rem;
        }
        .row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 8px;
        }
        @media (max-width: 768px) {
            .row {
                grid-template-columns: 1fr;
            }
            .top {
                flex-direction: column;
                gap: 10px;
            }
            .top h1 {
                font-size: 1.1rem;
            }
        }
        .col { position: relative; }
        .flag {
            position: absolute;
            top: 8px;
            right: 8px;
            font-size: 1.2rem;
            pointer-events: none;
        }
        input, textarea {
            width: 100%;
            padding: 8px 35px 8px 10px;
            border: 1px solid #dfe6e9;
            border-radius: 5px;
            font-size: 0.9rem;
            font-family: inherit;
        }
        input:focus, textarea:focus {
            outline: none;
            border-color: #6c5ce7;
        }
        textarea {
            resize: vertical;
            min-height: 70px;
            padding-top: 10px;
        }
        .save {
            background: #6c5ce7;
            color: white;
            border: none;
            padding: 14px;
            width: 100%;
            border-radius: 6px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            margin-top: 15px;
        }
        .save:hover { background: #5f4fd1; }
        .msg {
            background: #00b894;
            color: white;
            padding: 10px 15px;
            border-radius: 6px;
            margin-bottom: 12px;
        }
    </style>
</head>
<body>
    <div class="top">
        <h1><?php echo htmlspecialchars($page['title_tr'], ENT_QUOTES, 'UTF-8'); ?></h1>
        <div style="display: flex; gap: 10px;">
            <button type="submit" form="editForm" class="back" style="background: #00b894; color: white; border: none; cursor: pointer; font-size: 0.95rem;">✓ Kaydet</button>
            <a href="<?php echo url('/admin/pages'); ?>" class="back">← Geri</a>
        </div>
    </div>

    <?php if (isset($flash)): ?>
        <div class="msg">✓ <?php echo htmlspecialchars($flash['message'], ENT_QUOTES, 'UTF-8'); ?></div>
    <?php endif; ?>

    <?php
    $sectionsCount = isset($sections) && is_array($sections) ? count($sections) : 0;
    if ($sectionsCount === 0):
    ?>
        <div class="box" style="text-align: center; padding: 30px; color: #636e72;">
            İçerik bulunamadı
        </div>
    <?php else: ?>
        <form id="editForm" method="POST" action="<?php echo url('/admin/pages/update-sections'); ?>">
            <input type="hidden" name="page_key" value="<?php echo htmlspecialchars($page['page_key'], ENT_QUOTES, 'UTF-8'); ?>">
            
            <!-- Ana Sayfa Bilgileri (pages tablosu) -->
            <div class="box" style="border-left-color: #00b894; background: #f0fff4;">
                <div class="title">Sayfa Başlık Bilgileri (Hero Bölümü)</div>
                <div class="row">
                    <div class="col">
                        <span class="flag">🇹🇷</span>
                        <input type="text" name="title_tr" value="<?php echo htmlspecialchars($page['title_tr'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Sayfa Başlığı (TR)">
                        <input type="text" name="subtitle_tr" value="<?php echo htmlspecialchars($page['subtitle_tr'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" style="margin-top: 8px;" placeholder="Alt Başlık (TR)">
                    </div>
                    <div class="col">
                        <span class="flag">🇬🇧</span>
                        <input type="text" name="title_en" value="<?php echo htmlspecialchars($page['title_en'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" placeholder="Sayfa Başlığı (EN)">
                        <input type="text" name="subtitle_en" value="<?php echo htmlspecialchars($page['subtitle_en'] ?? '', ENT_QUOTES, 'UTF-8'); ?>" style="margin-top: 8px;" placeholder="Alt Başlık (EN)">
                    </div>
                </div>
            </div>
            
            <hr style="margin: 20px 0; border: 0; border-top: 2px dashed #dfe6e9;">
            <?php
            $labels = [
                // Ana Sayfa
                'hero_title' => 'Ana Başlık',
                'hero_subtitle' => 'Alt Başlık',
                'hero_description' => 'Açıklama',
                'hero_button' => 'Buton',
                'stat_1_number' => 'İstatistik 1 Sayı',
                'stat_1_label' => 'İstatistik 1 Yazı',
                'stat_2_number' => 'İstatistik 2 Sayı',
                'stat_2_label' => 'İstatistik 2 Yazı',
                'stat_3_number' => 'İstatistik 3 Sayı',
                'stat_3_label' => 'İstatistik 3 Yazı',
                'floki_n' => 'NAVEXMAR - N',
                'floki_a' => 'NAVEXMAR - A',
                'floki_v' => 'NAVEXMAR - V',
                'floki_e' => 'NAVEXMAR - E',
                'floki_x' => 'NAVEXMAR - X',
                'services_title' => 'Hizmetler Başlık',
                'service_detail_button' => 'Detay Buton',
                'cta_title' => 'Çağrı Başlık',
                'cta_button' => 'Çağrı Buton',
                'about_description' => 'Hakkımızda',
                
                // Hizmetler Sayfası
                'main_title' => 'Ana Başlık',
                'agency_title' => 'Gemi Acenteliği - Başlık',
                'agency_item_1' => 'Gemi Acenteliği - Madde 1',
                'agency_item_2' => 'Gemi Acenteliği - Madde 2',
                'agency_item_3' => 'Gemi Acenteliği - Madde 3',
                'agency_item_4' => 'Gemi Acenteliği - Madde 4',
                'agency_item_5' => 'Gemi Acenteliği - Madde 5',
                'operation_title' => 'Operasyon - Başlık',
                'operation_item_1' => 'Operasyon - Madde 1',
                'operation_item_2' => 'Operasyon - Madde 2',
                'operation_item_3' => 'Operasyon - Madde 3',
                'operation_item_4' => 'Operasyon - Madde 4',
                'personnel_title' => 'Personel & Teknik - Başlık',
                'personnel_item_1' => 'Personel & Teknik - Madde 1',
                'personnel_item_2' => 'Personel & Teknik - Madde 2',
                'personnel_item_3' => 'Personel & Teknik - Madde 3',
                'personnel_item_4' => 'Personel & Teknik - Madde 4',
                'broker_title' => 'Brokerlik - Başlık',
                'broker_item_1' => 'Brokerlik - Madde 1',
                'broker_item_2' => 'Brokerlik - Madde 2',
                'broker_item_3' => 'Brokerlik - Madde 3',
                'why_title' => 'Neden Biz? - Başlık',
                'why_item_1' => 'Neden Biz? - Özellik 1',
                'why_item_2' => 'Neden Biz? - Özellik 2',
                'why_item_3' => 'Neden Biz? - Özellik 3',
                'why_item_4' => 'Neden Biz? - Özellik 4',
                'why_item_5' => 'Neden Biz? - Özellik 5',
                'conclusion' => 'Sonuç Metni',
                
                // Yaklaşımımız
                'approach_intro' => 'Giriş Açıklaması',
                'mission_vision_title' => 'Misyon & Vizyon Başlık',
                'approach_mission' => 'Misyon Başlık',
                'mission_content' => 'Misyon İçerik',
                'approach_vision' => 'Vizyon Başlık',
                'vision_content' => 'Vizyon İçerik',
                'card_1_title' => 'Kart 1 Başlık',
                'card_1_content' => 'Kart 1 İçerik',
                'card_2_title' => 'Kart 2 Başlık',
                'card_2_content' => 'Kart 2 İçerik',
                'card_3_title' => 'Kart 3 Başlık',
                'card_3_content' => 'Kart 3 İçerik',
                'card_4_title' => 'Kart 4 Başlık',
                'card_4_content' => 'Kart 4 İçerik',
                'card_5_title' => 'Kart 5 Başlık',
                'card_5_content' => 'Kart 5 İçerik',
                'card_6_title' => 'Kart 6 Başlık',
                'card_6_content' => 'Kart 6 İçerik',
                
                // Politikalar
                'intro_title' => 'Giriş Başlık',
                'intro_description' => 'Giriş Açıklama',
                'quality_title' => 'Kalite - Başlık',
                'quality_content' => 'Kalite - İçerik',
                'safety_title' => 'Güvenlik - Başlık',
                'safety_content' => 'Güvenlik - İçerik',
                'environment_title' => 'Çevre - Başlık',
                'environment_content' => 'Çevre - İçerik',
                'ethics_title' => 'Etik - Başlık',
                'ethics_content' => 'Etik - İçerik',
                
                // İletişim
                'form_title' => 'Form Başlık',
                'form_description' => 'Form Açıklama',
                'field_name' => 'Alan: İsim',
                'field_email' => 'Alan: E-posta',
                'field_phone' => 'Alan: Telefon',
                'field_company' => 'Alan: Firma',
                'field_service' => 'Alan: Hizmet',
                'field_message' => 'Alan: Mesaj',
                'button_send' => 'Buton: Gönder',
                'info_title' => 'İletişim Bilgileri Başlık',
                'info_address' => 'Bilgi: Adres',
                'info_phone' => 'Bilgi: Telefon',
                'info_email' => 'Bilgi: E-posta',
                'info_hours' => 'Bilgi: Çalışma Saatleri',
                'social_title' => 'Sosyal Medya Başlık',
            ];
            
            foreach ($sections as $index => $section):
                $label = $labels[$section['section_key']] ?? $section['section_key'];
                $isLongText = !empty($section['content_tr']) || !empty($section['content_en']);
            ?>
            
            <div class="box">
                <div class="title"><?php echo ($index + 1); ?>. <?php echo $label; ?></div>
                
                <input type="hidden" name="sections[<?php echo $index; ?>][section_key]" value="<?php echo htmlspecialchars($section['section_key'], ENT_QUOTES, 'UTF-8'); ?>">
                
                <div class="row">
                    <div class="col">
                        <span class="flag">🇹🇷</span>
                        <?php if ($isLongText): ?>
                        <textarea name="sections[<?php echo $index; ?>][title_tr]"><?php echo htmlspecialchars($section['title_tr'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                        <?php if (!empty(trim($section['content_tr'] ?? ''))): ?>
                        <textarea name="sections[<?php echo $index; ?>][content_tr]" style="margin-top: 8px;"><?php echo htmlspecialchars($section['content_tr'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                        <?php else: ?>
                        <input type="hidden" name="sections[<?php echo $index; ?>][content_tr]" value="">
                        <?php endif; ?>
                        <?php else: ?>
                        <input type="text" name="sections[<?php echo $index; ?>][title_tr]" value="<?php echo htmlspecialchars($section['title_tr'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="hidden" name="sections[<?php echo $index; ?>][content_tr]" value="">
                        <?php endif; ?>
                    </div>
                    
                    <div class="col">
                        <span class="flag">🇬🇧</span>
                        <?php if ($isLongText): ?>
                        <textarea name="sections[<?php echo $index; ?>][title_en]"><?php echo htmlspecialchars($section['title_en'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                        <?php if (!empty(trim($section['content_en'] ?? ''))): ?>
                        <textarea name="sections[<?php echo $index; ?>][content_en]" style="margin-top: 8px;"><?php echo htmlspecialchars($section['content_en'] ?? '', ENT_QUOTES, 'UTF-8'); ?></textarea>
                        <?php else: ?>
                        <input type="hidden" name="sections[<?php echo $index; ?>][content_en]" value="">
                        <?php endif; ?>
                        <?php else: ?>
                        <input type="text" name="sections[<?php echo $index; ?>][title_en]" value="<?php echo htmlspecialchars($section['title_en'] ?? '', ENT_QUOTES, 'UTF-8'); ?>">
                        <input type="hidden" name="sections[<?php echo $index; ?>][content_en]" value="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            
            <?php endforeach; ?>
            
            <button type="submit" class="save">KAYDET</button>
        </form>
    <?php endif; ?>
    <script src="<?php echo asset('js/admin.js?v=' . time()); ?>"></script>
</body>
</html>
